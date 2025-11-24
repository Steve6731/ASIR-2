en pl/sql solo puede hacer delete,insert,update,select immeidate.  
si quiere hacer otro necesita hacer:
```sql
begin
   exceute immediate 'alter pluggable database all open'
end;
```


```sql
SQL> create pluggable database XUANDB ADMIN USER XUANDBA IDENTIFIED BY ORACLE FILE_NAME_CONVERT=('C:\app\Administrador\product\21c\oradata\XE\pdbseed','C:\app\Administrador\product\21c\oradata\XE\XUANDB1\');

Base de datos de conexi¾n creada.

SQL> create tablespace users datafile 'C:\datafile\user.dbf' size 100M autoextend on next 5M maxsize unlimited;
create tablespace users datafile 'C:\datafile\user.dbf' size 100M autoextend on next 5M maxsize unlimited
*
ERROR en lÝnea 1:
ORA-01543: el tablespace 'USERS' ya existe


SQL> alter database default tablespace users;

Base de datos modificada.


SQL> alter pluggable database all open;

Base de datos de conexi¾n modificada.

SQL> alter session set container=XUANDB;

Sesi¾n modificada.
SQL>

--#añadir:
--XUANDB =
--  (DESCRIPTION =
--    (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-RO2VM93)(PORT = 1521))
--    (CONNECT_DATA =
--      (SERVER = DEDICATED)
--      (SERVICE_NAME = XUANDB)
--    )
--  )
--en : tnsnames.ora
--ahora puede conectar al xuandb

--b) Clona la pluggable llamándole como tu nombre2. Intercambia la pluggable con tu compañero de fila. Los datafiles de la pluggable de tu compañero tienen que estar en el nuevo disco que montaste.
SQL> alter pluggable database xuandb close;

Base de datos de conexi¾n modificada.

SQL> alter pluggable database xuandb open read only;

Base de datos de conexi¾n modificada.

SQL> create pluggable database xuandb2 from xuandb file_name_convert=('C:\app\Administrador\product\21c\oradata\XE\XUANDB1\','C:\app\Administrador\product\21c\oradata\XE\XUANDB2\');

Base de datos de conexi¾n creada.

alter pluggable database xuandb upplug into 'C:\app\Administrador\product\21c\oradata\XE\XuanDB1\xuandb.xml';
-- copiado el pdb de compañero que es mipdb1

SQL> create pluggable database DANIDB using 'C:\app\Administrador\product\21c\oradata\XE\MIPDB1\m1pdb1.xml' copy
  2  file_name_convert=('C:\app\Administrador\product\21c\oradata\XE\MIPDB1','C:\app\Administrador\product\21c\oradata\XE\DANIDB');

Base de datos de conexi¾n creada.

SQL> col name forma a40
SQL> select name,open_mode from v$pdbs;

NAME                                     OPEN_MODE
---------------------------------------- ----------
PDB$SEED                                 READ ONLY
XEPDB1                                   READ WRITE
DANIDB                                   MOUNTED
XUANDB2                                  READ WRITE
XUANDB                                   READ WRITE

--c) haz plug de la pluggable original de nuevo. 


SQL> DROP pluggable database xuandb


SQL> create pluggable database xuandb using 'C:\app\Administrador\product\21c\oradata\XE\XUANDB1\xuandb1.xml' copy
  2  file_name_convert=('C:\app\Administrador\product\21c\oradata\XE\XUANDB1','C:\app\Administrador\product\21c\oradata\XE\XUANDB');

Base de datos de conexi¾n creada.

--d) Crea un trigger que abra todas las pluggables. Deberías tener todo funcionando

   create triger OPEN_ALL_PDBS after startup on database
   begin
      execute immediate 'alter pluggable database all open';
   end OPEN_ALL_PDBS;
   /


```