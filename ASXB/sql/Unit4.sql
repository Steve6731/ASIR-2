----------------------------------
-- Pratica: creacion de pluggables
----------------------------------
-- (a) Crea una pluggable database llamada con tu nombre clonando la pdbSeed. Haz que el tablespace por defecto sea USERS. Si no existe tendrás que crearlo. Instala el esquema de hr en esa pluggable.
create PLUGGABLE DATABASE XUANDB 
   ADMIN USER XUANDB
   IDENTIFIED by oracle 
   FILE_NAME_CONVERT=(
      'C:\app\Administrator\product\21c\oradata\XE\pdbseed',
      'C:\app\Administrator\product\21c\oradata\XE\XUANDB\');

-- (b) Clona la pluggable llamándole como tu nombre2. Intercambia la pluggable con tu compañero de fila. Los datafiles de la pluggable de tu compañero tienen que estar en el nuevo disco que montaste.
alter PLUGGABLE DATABASE XUANDB OPEN READ WRITE;
alter PLUGGABLE DATABASE XUANDB CLOSE;
alter PLUGGABLE DATABASE XUANDB OPEN READ ONLY;
select * from v$pdbs;

create PLUGGABLE DATABASE XUANDBCOPY FROM XUANDB
   FILE_NAME_CONVERT=(
      'C:\app\Administrator\product\21c\oradata\XE\XUANDB\',
      'C:\app\Administrator\product\21c\oradata\XE\XUANDBCOPY\');

-- (c) haz plug de la pluggable original de nuevo.
alter PLUGGABLE DATABASE XUANDB CLOSE;
select * from v$pdbs;
alter PLUGGABLE DATABASE XUANDB UNPLUG 
   into 'C:\app\Administrator\product\21c\oradata\XE\XUANDB\XUANDB.xml';

drop PLUGGABLE DATABASE XUANDB;

create PLUGGABLE DATABASE NEWXUANDB 
   using 'C:\app\Administrator\product\21c\oradata\XE\XUANDB\XUANDB.xml'
   copy FILE_NAME_CONVERT=(
      'C:\app\Administrator\product\21c\oradata\XE\XUANDB\',
      'C:\app\Administrator\product\21c\oradata\XE\NEWXUANDB\'
   );

-- (d)  Crea un trigger que abra todas las pluggables. Deberías tener todo funcionando
create trigger OPEN_ALL_PDBS after startup on database
begin
   execute immediate 'alter pluggable database all open';
end OPEN_ALL_PDBS;
/