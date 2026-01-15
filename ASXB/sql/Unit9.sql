create database link LinkCentrar connect to central
   identified by oracle using 'CENTRAL'; -- link central

create database link LinkVigo connect to userVigo
   identified by oracle using 'userVigo';

create database link LinkMad connect to userMad
   identified by oracle using 'userMad';

select * from dba_tables@Central;

select * from user_db_links;


CREATE PLUGGABLE DATABASE TIENDA
   ADMIN USER Madrid IDENTIFIED BY oracle
   FILE_NAME_CONVERT = (
      'C:\app\Administrator\product\21c\oradata\XE\pdbseed',
      'C:\app\Administrator\product\21c\oradata\XE\TIENDA');

show pdbs;
show con_name;
alter pluggable database all open;

create tablespace TIENDA
   datafile 'c:\tablespace\tienda.dbf' size 100M
   autoextend on next 200M MAXSIZE unlimited;

drop tablespace tienda;

create user Madrid IDENTIFIED by oracle;
alter user Madrid DEFAULT TABLESPACE TIENDA;



-- b) La sede de Madrid se encarga de :
-- a) El stock de Madrid por lo que habrá que crear un campo stock en la tabla productos.
-- b) Los clientes de Madrid.
-- c) Las ventas realizadas en Madrid son gestionadas por Madrid.
-- d) Creará vistas con join entre la tabla productos de la central y la suya para obtener la tabla completa