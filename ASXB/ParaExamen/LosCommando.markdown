## para coneccion
contenedor: xe <= pluggable(xepdb1)  
ORACLE-SID = XE   

para usar link tiene que ser todo mayuscura
```sql
create database link LinkCentrar connect to userCentral
   identified by oracle using 'CENTRAL'; -- link central
```
``` sql
sqlplus [<user>]/[<passwd>][@<contenedor>] [as (sysdba | sysper)]  
sqlplus / as sysdba  
sqlplus system/oracle@xe  
conn / @xepdb1 as sysdba  
alter session set container=XEPDB1;
alter system kill session '<sid>,<serial#>' IMMEDIATE;
```

## usefull
``` sql
set linesize <number>; 设置sqlplus显示宽度为120字符  
desc <table_name>;
col[umn] <file_name> format a<number>;  
DEFlNE <variable> = <valor>;  
CREATE PFILE='<Ubricacion>' FROM SPFILE;  
ALTER SYSTEM SET <clave>=<valor> SCOPE=SPFILE; 动态修改并持久化  
```

### DESC tablas:
DBA_PDBS  
DBA_TABLESPACE  
DBA_USERS  

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

AUD$: almacena los registros de auditoria  
DBA_AUDIT_TRAIL: parametro de auditoria  
DBA_COMMON_AUDIT_TRAIL:  
DBA_PRIV_AUDIT_OPTS; vista de auditorias sobre privilegios
DBA_STMT_AUDIT_OPTS: vista de auditorias sobre sentencias  
DBA_OBJ_AUDIT_OPTS: vista de auditorias sobre objetos  

### vistas

V\$SQL : tiene una fila por cada sentencia corriente almacenada en la Shared Pool  
[V\$DATABASE](./masDetalle/v_database.markdown): sobre la base de datos  
V\$DATAFILE: Sobre los datafiles. Accesible con la base de datos en MOUNT  
V\$LOGFILE: Sobre los ficheros de log  
V\$TABLESPACE : Sobre los tablespaces.  
[V\$INSTANCE](./masDetalle/v_instance.markdown) o V\$SYSTAT: sobre la instancia actual. Accesible desde NOMOUNT   
V\$OPTION: sobre las opciones de instalación en el servidor.  
V\$PARAMETER: sobre los parámetros de inicialización.  
V\$PROCESS: sobre los procesos activos.  
V\$SESSION: sobre la sesión actual.  
V\$SGA y V$SGAINFO: sobre la memoria compartida SGA.  
V\$VERSION: sobre los componentes y sus versiones.  

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
```

## sobre talbe space
```sql
create tablespace tiendaVirtual
   datafile 'C:\tableSpace\tiendaVirtual1.dbf' size 10M
   datafile 'C:\tableSpace\tiendaVirtual2.dbf' size 10M;

ALTER TABLESPACE <nome>  ADD DATAFILE '<ARQUIVO>' SIZE <TAMAÑO>
ALTER DATABASE DATAFILE '<ARQUIVO>' RESIZE <TAMAÑO>
ALTER DATABASE RENAME FILE '<ARQUIVO1>' TO '<ARQUIVO2>'
DROP TABLESPACE <NOME> [INCLUDING CONTENTS [AND DATAFILES]]
```

## document

SQLNET.ORA "C:\app\Administrador\product\21c\homes\OraDB21Home1\network\admin\sqlnet.ora"

SQLNET.AUTHENTICATION_SERVICES= (NONE)
NAMES.DIRECTORY_PATH= (TNSNAMES,EZCONNECT)

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