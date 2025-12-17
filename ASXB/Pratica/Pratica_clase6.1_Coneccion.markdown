cambia 
"C:\app\Administrador\product\21c\homes\OraDB21Home1\network\admin\sqlnet.ora"

SQLNET.AUTHENTICATION_SERVICES= (NONE)
NAMES.DIRECTORY_PATH= (TNSNAMES, EZCONNECT)

"C:\app\Administrador\product\21c\homes\OraDB21Home1\network\admin\tnsnames.ora"

RUBEN =
  (DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = 172.20.3.60)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = XEPDB1)
    )
  )

  


```bash
C:\Users\Administrador>sqlplus system/oracle@RUBEN

SQL> select tablespace_name from dba_tablespaces;

TABLESPACE_NAME
------------------------------
SYSTEM
SYSAUX
UNDOTBS1
TEMP
USERS
TIENDAVIRTUAL
TIENDAVIRTUAL2


C:\Users\Administrador>sqlplus system/oracle as sysdba

SQL> select tablespace_name from dba_tablespaces;

TABLESPACE_NAME
------------------------------
SYSTEM
SYSAUX
UNDOTBS1
TEMP
USERS

SQL> create database link ruben connect to system identified by oracle using 'ruben';

Enlace con la base de datos creado.

SQL> create database link ruben connect to system identified by oracle using 'ruben';

SQL> select table_name from all_tables@ruben;
```