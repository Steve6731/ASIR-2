-- Comprobar estado

select * from user_db_links;
select * from dba_users;

-- Crear usuario
create user Madrid IDENTIFIED by oracle;
grant all PRIVILEGES to Madrid;

-- Crear pluggable
CREATE PLUGGABLE DATABASE TIENDA
   ADMIN USER Madrid IDENTIFIED BY oracle
   FILE_NAME_CONVERT = (
      'C:\app\Administrator\product\21c\oradata\XE\pdbseed',
      'C:\app\Administrator\product\21c\oradata\XE\TIENDA');

alter pluggable database all open;

--crea tablaspace tienda
create tablespace TIENDA
   datafile 'c:\tablespace\tienda.dbf' size 100M
   autoextend on next 200M MAXSIZE unlimited;
-- cambiar tablespace default de user Madrid
alter user Madrid DEFAULT TABLESPACE TIENDA;


-- Crear link
create database link LinkCentrar connect to userCentral
   identified by oracle using 'CENTRAL'; -- link central

drop database link LinkCentrar;

create database link LinkVigo connect to userVig
   identified by oracle using 'TIENDAVIGO';

drop database link LinkVigo

--create database link LinkMad connect to Madrid
--   identified by oracle using 'TIENDA';

select * from empleado@LINKCENTRAR; -- para usar link tiene que ser todo mayuscura
select * from cliente@LINKVIGO; -- para usar link tiene que ser todo mayuscura


-- b) La sede de Madrid se encarga de :
-- a) El stock de Madrid por lo que habrá que crear un campo stock en la tabla productos.
-- b) Los clientes de Madrid.
-- c) Las ventas realizadas en Madrid son gestionadas por Madrid.
-- d) Creará vistas con join entre la tabla productos de la central y la suya para obtener la tabla completa


