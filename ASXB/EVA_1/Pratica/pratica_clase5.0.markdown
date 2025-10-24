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
SQL> select s.grantee,s.privilege,r.grantee from cdb_sys_privs s, cdb_role_privs r where s.grantee = r.granted_role(+) and r.grantee like 'JEFE%';

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

### Haz una lista de todos los privilegios concedidos a jefecompras sea directamente o a través de roles. Concédele el privilegio de create any table y repite la query.
```sql
select nvl(r.grantee,'grant direc') as grantee,s.grantee as role,s.privilege 
   from cdb_sys_privs s, cdb_role_privs r 
   where s.grantee(+) = r.granted_role 
   and r.grantee like 'JEFE%';
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