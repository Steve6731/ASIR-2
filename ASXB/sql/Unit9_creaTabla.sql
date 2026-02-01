
-- Madrid
-- a) El stock de Madrid por lo que habrá que crear un campo stock en la tabla productos.
-- b) Los clientes de Madrid.
-- c) Las ventas realizadas en Madrid son gestionadas por Madrid.
-- empieza crear los tablas.
drop table empleado cascade constraints;
drop table lineaventa cascade constraints;
drop table lineacompra cascade constraints;
drop table venta cascade constraints;
drop table compra cascade constraints;
drop table proveedor cascade constraints;
drop table producto cascade constraints;
drop table cliente cascade constraints;

  CREATE TABLE "LINEAVENTA" 
   (	"CODVENTA" NUMBER, 
	"CODPRODUCTO" NUMBER, 
	"CANT" NUMBER
   );

Insert into LINEAVENTA (CODVENTA,CODPRODUCTO,CANT) values ('2','5','3');

  CREATE TABLE "PRODUCTO" 
   (	"CODPRODUCTO" NUMBER, 
      "STOCK" NUMBER
   ) ;

Insert into PRODUCTO (CODPRODUCTO,STOCK) values ('1','5');
Insert into PRODUCTO (CODPRODUCTO,STOCK) values ('2','4');
Insert into PRODUCTO (CODPRODUCTO,STOCK) values ('3','2');
Insert into PRODUCTO (CODPRODUCTO,STOCK) values ('4','3');
Insert into PRODUCTO (CODPRODUCTO,STOCK) values ('5','1');


  CREATE TABLE "VENTA" 
   (	"CODVENTA" NUMBER, 
	"FECHAHORA" DATE, 
	"DNIEMPL" NUMBER, 
	"DNICL" NUMBER
   ) ;

Insert into VENTA (CODVENTA,FECHAHORA,DNIEMPL,DNICL) values (seq_venta.nextval,to_date('02/11/22','DD/MM/RR'),'98103495','30001231');
-- SELECT * FROM VENTA;
-- delete from venta where codventa=2;
  CREATE TABLE "CLIENTE" 
   (	"DNICL" NUMBER, 
	"NOMBRE" VARCHAR2(16 BYTE), 
	"PRAPELLIDO" VARCHAR2(16 BYTE), 
	"SGAPELLIDO" VARCHAR2(16 BYTE), 
	"DIRECCION" VARCHAR2(64 BYTE), 
	"TELEFONO" NUMBER, 
	"CORREO" VARCHAR2(32 BYTE), 
	"CIUDAD" VARCHAR2(16 BYTE)
   );

Insert into CLIENTE (DNICL,NOMBRE,PRAPELLIDO,SGAPELLIDO,DIRECCION,TELEFONO,CORREO,CIUDAD) values ('33810321','Margarita','Salas','Blanco','Avda. Itala, 143','618098381','marga@gmail.com','Madrid');
Insert into CLIENTE (DNICL,NOMBRE,PRAPELLIDO,SGAPELLIDO,DIRECCION,TELEFONO,CORREO,CIUDAD) values ('30001231','Rosa','Menéndez','Beltrán','C/ Rosas, 29, ático','983912001','morr132@gmail.com','Madrid');

 CREATE UNIQUE INDEX "CLIENTE_PK" ON "CLIENTE" ("DNICL");
  ALTER TABLE "CLIENTE" ADD CONSTRAINT "CLIENTE_PK" PRIMARY KEY ("DNICL");

  CREATE UNIQUE INDEX "SYS_C00305886" ON "LINEAVENTA" ("CODVENTA", "CODPRODUCTO");
  ALTER TABLE "LINEAVENTA" ADD PRIMARY KEY ("CODVENTA", "CODPRODUCTO");

  CREATE UNIQUE INDEX "SYS_C00305885" ON "PRODUCTO" ("CODPRODUCTO");
  ALTER TABLE "PRODUCTO" ADD PRIMARY KEY ("CODPRODUCTO");
  
  CREATE UNIQUE INDEX "VENTA_PK" ON "VENTA" ("CODVENTA") ;

  ALTER TABLE "VENTA" ADD CONSTRAINT "VENTA_PK" PRIMARY KEY ("CODVENTA");

--  ALTER TABLE "VENTA" ADD CONSTRAINT "VENTA_FK1" FOREIGN KEY ("DNIEMPL")
--	  REFERENCES "EMPLEADO" ("DNIEMPL") ENABLE;
  ALTER TABLE "VENTA" ADD CONSTRAINT "VENTA_FK2" FOREIGN KEY ("DNICL")
	  REFERENCES "CLIENTE" ("DNICL") ENABLE;
 
  -- ALTER TABLE "VENTA" drop CONSTRAINT "VENTA_FK2";

  ALTER TABLE "LINEAVENTA" ADD FOREIGN KEY ("CODVENTA") REFERENCES VENTA;
--   alter table "LINEAVENTA" drop constraint "SYS_C008232";
  alter table lineaventa add foreign key(codproducto) references producto;