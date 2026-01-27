-- 2) La sede de Madrid se encarga de :


-- Comprobar estado

select * from user_db_links;
select * from dba_users;

-- Crear usuario
create user userMad IDENTIFIED by oracle;
grant all PRIVILEGES to userMad;
Drop user Madrid cascade;

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
alter user userMad DEFAULT TABLESPACE TIENDA;


-- Crear link
create database link LinkCentrar connect to userCentral
   identified by oracle using 'CENTRAL'; -- link central

drop database link LinkCentrar;

create database link LinkVigo connect to userVig
   identified by oracle using 'TIENDAVIGO';

drop database link LinkVigo;

--create database link LinkMad connect to Madrid
--   identified by oracle using 'TIENDA';

select * from dba_table@LINKCENTRAR;
select * from empleado@LINKCENTRAR; -- para usar link tiene que ser todo mayuscura
select * from cliente@LINKVIGO; -- para usar link tiene que ser todo mayuscura
select * from ventas@LINKVIGO;


-- seq_ventas
-- d) Creará vistas con join entre la tabla productos de la central y la suya para obtener la tabla completa

create or replace VIEW v_productos AS
select a.*,b.stock from producto@LINKCENTRAR a, producto b
   where a.codproducto = b.codproducto;

select * from v_productos;

create or replace VIEW v_empleados AS
Select * from empleado@LINKCENTRAR
   where upper(Ciudad) like upper('Madrid');

create or replace VIEW v_productosShort AS
select a.prCoste, a.prVenta,b.stock from producto@LINKCENTRAR a, producto b
   where a.codproducto = b.codproducto;

select * from v_empleados;
select * from userCentral.clientes@LINKCENTRAR;
create public synonym seq_venta for usercentral.seq_ventas@LINKCENTRAR; -- OBTENER MAX ID DE CENTRAL
select * from venta;

create MATERIALIZED VIEW vm_productos
tablespace TIENDA build immediate 
refresh complete start with sysdate next sysdate+1
disable query REWRITE
AS
select a.*,b.stock from producto@LINKCENTRAR a, producto b
   where a.codproducto = b.codproducto;

select * from vm_productos;
/*
CREATE SEQUENCE usercentral.seq_ventas
    START WITH 1
    INCREMENT BY 1
    NOCACHE
    NOCYCLE;
*/
select * from userCentral.productos@LINKCENTRAR;
Insert into VENTA (CODVENTA,FECHAHORA,DNIEMPL,DNICL) values (seq_venta.nextval,to_date('02/11/22','DD/MM/RR'),'98103495','30001231');
commit;