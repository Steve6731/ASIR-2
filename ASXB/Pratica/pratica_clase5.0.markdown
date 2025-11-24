los usuarios comunes (guarda en CDB$root) tiene que empieza por "C##"   
los usuarios locales solo existen en los pluggable donde lo creaba

## unos commandos utiles
```sql
--para enseñame todo configuraciones de permisos y usuarios
select s.grantee,s.privilege,r.grantee from dba_sys_privs s, dba_role_privs r where s.grantee = r.granted_role;
--para obtener todo tablespace en un pluggable
select tablespace_name from dba_tablespaces;
```
## unas praticas

### Concédele los roles CONNECT y RESOURCE a jefecompras
```sql
grant connect to jefecompras;

Concesi¾n terminada correctamente.
```

### Mira todos los privilegios, roles y privilegios sobre tablas concedidos a jefecompras
```sql
SQL> select s.grantee,s.privilege,r.grantee 
   from cdb_sys_privs s, cdb_role_privs r 
   where s.grantee = r.granted_role(+) and r.grantee like 'JEFE%';

GRANTEE              PRIVILEGE                      GRANTEE
-------------------- ------------------------------ --------------------
CONNECT              CREATE SESSION                 JEFECOMPRAS
RESOURCE             CREATE TABLE                   JEFECOMPRAS
RESOURCE             CREATE CLUSTER                 JEFECOMPRAS
RESOURCE             CREATE SEQUENCE                JEFECOMPRAS
RESOURCE             CREATE PROCEDURE               JEFECOMPRAS
RESOURCE             CREATE TRIGGER                 JEFECOMPRAS
RESOURCE             CREATE TYPE                    JEFECOMPRAS
RESOURCE             CREATE OPERATOR                JEFECOMPRAS
RESOURCE             CREATE INDEXTYPE               JEFECOMPRAS
CONNECT              SET CONTAINER                  JEFECOMPRAS
```

### [Hecho por Manuel] Haz una lista de todos los privilegios concedidos a jefecompras sea directamente o a través de roles. Concédele el privilegio de create any table y repite la query.
```sql
-- select
select null as role,privilege from dba_sys_privs where grantee like 'JEFE%'
union 
select grantee as role,privilege from cdb_sys_privs
   where grantee in (select granted_role from dba_role_privs where grantee like 'JEFE%');
-- crea vista
create view premisos as 
select null as role,privilege from dba_sys_privs where grantee like 'JEFE%'
union 
select grantee as role,privilege from cdb_sys_privs
   where grantee in (select granted_role from dba_role_privs where grantee like 'JEFE%');
-- select permiso de cada tabla
select owner,table_name,privilege,null as column from dba_col_privs where grantee='JEFECOMPRAS'
union
select owner,table_name,privilege,column_name as column from dba_col_privs where grantee='JEFECOMPRAS';

-- ya creado un vista de regions en usuario hr.
-- crea sinonimo
create synonym jefecompras.regions form hr.regions;
```

###  Revoca el rol RESOURCE
```sql
SQL> revoke resource from jefecompras;

Revocaci¾n terminada correctamente.

SQL> select s.grantee,s.privilege,r.grantee from cdb_sys_privs s, cdb_role_privs r where s.grantee = r.granted_role(+) and r.grantee like 'JEFE%';

GRANTEE              PRIVILEGE                      GRANTEE
-------------------- ------------------------------ --------------------
CONNECT              CREATE SESSION                 JEFECOMPRAS
CONNECT              SET CONTAINER                  JEFECOMPRAS

```
### crea un sinonimo privado y public de regions de hr
```sql
SQL> create view v_regions as select * from regions;

Vista creada.

SQL> create synonym s_regions for v_regions;

Sin¾nimo creado.

SQL> connect / @xepdb1 as sysdba
Conectado.

SQL> create public synonym ps_regions for hr.v_regions;

Sin¾nimo creado.

SQL> grant select on ps_regions to jefecompras;

Concesi¾n terminada correctamente.

SQL> connect jefecompras @xepdb1
Introduzca la contrase±a:
Conectado.
SQL> select * from ps_regions;

 REGION_ID REGION_NAME
---------- -------------------------
        10 Europe
        20 Americas
        30 Asia
        40 Oceania
        50 Africa

SQL>
```