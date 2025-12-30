-- user XEPDB1:SYS
------------------------------------
-- Practica: Creacion de tablespaces
------------------------------------
-- (a) Crea un tablespace llamado TiendaVirtual con dos ficheros del tamaño minimo posible
create tablespace tiendaVirtual
   datafile 'C:\tableSpace\tiendaVirtual1.dbf'
   size 10M;
-- (B) Crea una tabla en ese tablespace llamada pruebainstorage(id, nombre), donde id es de tipo NUMBER(3) y nombre es de tipo VARCHAR2(59).
create table pruebainstorage(
   id number,
   nombre VARCHAR2(59)
)tablespace tiendaVirtual;
-- (c) Comprueba el tamaño ocupado en el espacio de tablas
desc user_segments;
select SEGMENT_NAME,BYTES/1024/1024 as byteUsadoMB from USER_SEGMENTS where SEGMENT_NAME = upper('pruebainstorage');

/
DECLARE
   i number;
   nombre varchar2(59);
BEGIN
   FOR i IN 100000..200000 LOOP
      nombre := DBMS_RANDOM.STRING('A', 59);
      insert into PRUEBAINSTORAGE(id,nombre) values(i,nombre);
   END LOOP;
END;

/

SELECT count(*) from PRUEBAINSTORAGE;