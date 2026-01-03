-----------------------------------
-- Pratica: Preparacion del entorno
-----------------------------------
create user Tienda IDENTIFIED by oracle;
create TABLESPACE Tienda datafile 
   'C:\tableSpace\tienda1.dbf' size 20M,
   'C:\tableSpace\tienda2.dbf' size 15M,
   'C:\tableSpace\tienda3.dbf' size 15M,
   'C:\tableSpace\tienda4.dbf' size 10M;

grant all privileges to Tienda;

create table Empleado(
   P_id number,
   nombreCompleto varchar2(64)
)TABLESPACE Tienda;

----------------------------
-- Practica: Backups en frio
----------------------------

-- obtener lista actualizada de todos los archivos
select name from v$datafile;
select name from v$controlfile;
show parameter spfile;

SHUTDOWN IMMEDIATE;

-- copiarlos con commando de windows o linux y ponlo en zip o tar...

STARTUP OPEN;

--------------------------------------
-- Practica: Backup manual en caliente
--------------------------------------

-- backup del controlfile;
alter database backup CONTROLFILE to 'c:\backup\controlfile.bak';

-- Backup de un tablespace
-- 1. entra modo archivelog
alter DATABASE ARCHIVELOG

alter tablespace Tienda Begin backup;

-- copiarlos con commando de windows o linux y ponlo en zip o tar...

alter tablespace Tienda End backup;

alter system switch logfile;

-- para ver estado de tablespcae
select f.name,b.* from v$backup b,v$datafile f
   where f.file# = b.file#;

-- Backup completo

-- igual pero usa 
alter database begin backup;
alter database end backup;

-- para plugable
alter pluggable database begin backup;
alter pluggable database end backup;

------------------------------
-- restauracion manual en frio
------------------------------

shutdown IMMEDIATE;
startup nomount;
-- recupera los copias
alter database open resetlogs; -- arranque y borra log de anterio porque ya era innecesario.

----------------------------
-- Practica: Backup con RMAN
----------------------------

-- rman target=/
-- RMAN> backup database;

-- rman puede usa run{} escribe un script de sqlplus
-- run{
--    command;
--    command;
-- }

