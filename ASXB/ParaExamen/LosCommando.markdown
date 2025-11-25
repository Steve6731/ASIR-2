## conectar al sqlplus
```sql
sqlplus [user]/[passwd][@contenedor] [as (sysdba | sysper)]
-- para cambiar contraseña
alter user system IDENTIFIED BY oracle
-- para conectar al pluggable tiene que añadir en TNSNAMES.ORA
```
## ejemplo de un pluggable para TNSNAMES.ORA
```
XE =
  (DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-RO2VM93)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = XE)
    )
  )
```

## unos Commando para comprobar
```sql
sql> show con_name -- nombre de contenedor
sql> show pdbs
sql> desc [tablename]
select tablespace_name from dba_tablespaces; --obtener lista de tablespace
```
prueba los comandos de PowerShell indicados a continuacion. Con cada tarea haz una captura de pantalla y añade una breve explicacion de su funcionalidad 

## command para trabajo
crea pluggable
```sql
SQL> create pluggable database XUANDB 
   ADMIN USER XUANDBA 
   IDENTIFIED BY ORACLE 
   FILE_NAME_CONVERT=('C:\app\Administrador\product\21c\oradata\XE\pdbseed','C:\app\Administrador\product\21c\oradata\XE\XUANDB1\');
SQL> alter session set container=XUANDB; --necesita configura en tnsnames.ora
```
crea rol
```
SQL> CREATE ROLE [nombreRole] [CONTAINER=ALL];
SQL> GRANT [permiso por ejemplo:SELECT ANY TABLE] [on [tableName]] TO [nombreRole];
SQL> GRANT [nombreRole] TO [User];
```


## unos conocimiento de PL/SQL

en pl/sql solo puede hacer delete,insert,update,select immeidate.  
si quiere hacer otro necesita hacer:
```sql
begin
   exceute immediate 'alter pluggable database all open'
end;
/
--un trigger basedo por este
create trigger OPEN_ALL_PDBS after startup on database
begin
   execute immediate 'alter pluggable database all open';
end OPEN_ALL_PDBS;
/
```
