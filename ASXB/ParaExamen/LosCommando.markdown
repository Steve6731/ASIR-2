contenedor: xe <= pluggable(xepdb1)  
ORACLE-SID = XE   

sqlplus [user]/[passwd][@contenedor] [as (sysdba | sysper)]
sqlplus / as sysdba
sqlplus system/oracle@xe
conn / @xepdb1 as sysdba
alter session set container=XEPDB1;

### DESC tablas:
DBA_PDBS
DBA_TABLESPACE
DBA_USERS
DBA_AUDIT_TRAIL
DBA_COMMON_AUDIT_TRAIL
DBA_SYS_PRIVS: todos los privilegios asignados a usuarios o a roles
DBA_TAB_PRIVS: privilegios concedidos sobre tablas
DBA_COL_PRIVS: privilegions concedidos sobre columnas de tablas
DBA_ROLE_PRIVS: roles concedidos a usuarios u otros roles
USER|ALL|DBA_OBJECTS: información de cualquier objeto de la base de datos.
USER|ALL|DBA_TABLES: información de las tablas.
USER|ALL|DBA_TAB_COLUMNS: información de las columnas de las tablas.
USER|ALL|DBA_INDEXES: información de los indices.
USER|ALL|DBA_TRIGGERS: información sobre los disparadores.
USER|ALL|DBA_CONSTRAINTS: información sobre las restricciones.
USER|ALL|DBA_CONS_COLUMNS: información sobre las columnas de las restricciones.
USER|ALL|DBA_VIEWS: información de las vistas.
USER|ALL|DBA_SYNONYMS: información de los sinónimos.
USER|ALL|DBA_SEQUENCES: información de las secuencias.

### SHOW:
SHOW ALL: muestra el valor de todas las variables del sistema.
SHOW PDBS: muestra el identificador y el nombre de cada uno de los contenedores visibles por el usuario.
SHOW CON_ID: muestra el identificador del contenedor actual.
SHOW CON_NAME: muestra el nombre del contenedor actual.
SHOW SPOOL: muestra con OFF y ON si la salida a fichero está activada.
SHOW USER:muestra el usuario activo.


## conectar al sqlplus
```sql

-- para cambiar contraseña
alter user system IDENTIFIED BY oracle
-- para conectar al pluggable tiene que añadir en TNSNAMES.ORA
```
## document

SQLNET.ORA "C:\app\Administrador\product\21c\homes\OraDB21Home1\network\admin\sqlnet.ora"

SQLNET.AUTHENTICATION_SERVICES= (NONE)
NAMES.DIRECTORY_PATH= (TNSNAMES, EZCONNECT)

TNSNAMES.ORA "C:\app\Administrador\product\21c\homes\OraDB21Home1\network\admin\tnsnames.ora"

RUBEN =
  (DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = 172.20.3.60)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = XEPDB1)
    )
  )

crea pluggable
```sql
SQL> create pluggable database XUANDB 
   ADMIN USER XUANDBA 
   IDENTIFIED BY ORACLE 
   FILE_NAME_CONVERT=('C:\app\Administrador\product\21c\oradata\XE\pdbseed','C:\app\Administrador\product\21c\oradata\XE\XUANDB1\');
```

crea rol
```
SQL> CREATE ROLE [nombreRole] [CONTAINER=ALL];
SQL> GRANT [permiso por ejemplo:SELECT ANY TABLE] [on [tableName]] TO [nombreRole];
SQL> GRANT [nombreRole] TO [User];
```

CREATE USER nombre IDENTIFIED {BY contraseña | EXTERNALLY}
   [DEFAULT TABLESPACE nombre_tablespace]
   [TEMPORARY TABLESPACE nombre_espacio_temporal]
   [QUOTA {valor [K | M]  | UNLIMITED} ON nombre_tablespace...]
   [PROFILE nombre_perfil]
   [PASSWORD EXPIRE]
   [ACCOUNT LOCKI UNLOCKl]
   [[CONTAINER=ALL | CURRENT]]

grant connect,RESOURCE to [NEWUSER];

#### en pl/sql solo puede hacer delete,insert,update,select immeidate.  
```sql
create trigger OPEN_ALL_PDBS after startup on database
begin
   execute immediate 'alter pluggable database all open';
end OPEN_ALL_PDBS;
/
```


create directory backup_tablespace_users as 'C:\backup\tableSpace\users';
alter tablespace users read only;