## los que lo hecho
```sql

SQL> create TABLESPACE TiendaVirtual DATAFILE 'C:\datafile\TiendaVirtual.DBF' SIZE 1M, 'E:datafile\TiendaVirtual.DBF' SIZE 1M;

Tablespace creado.

SQL> create table pruebainstorage(
  2  id number(8),
  3    4    5  ^C
C:\Users\Administrador>sqlplus / as sysdba

SQL*Plus: Release 21.0.0.0.0 - Production on Jue Oct 2 11:42:30 2025
Version 21.3.0.0.0

Copyright (c) 1982, 2021, Oracle.  All rights reserved.


Conectado a:
Oracle Database 21c Express Edition Release 21.0.0.0.0 - Production
Version 21.3.0.0.0

SQL> create table pruebainstorage(
  2  id number(3),
  3  nombre varchar2(59)
  4  )tablespace TiendaVirtual;

Tabla creada.

SQL> insert into pruebainstorage(id,nombre) values(1,Xuan);
insert into pruebainstorage(id,nombre) values(1,Xuan)
                                                *
ERROR en lÝnea 1:
ORA-00984: columna no permitida aquÝ


SQL> insert into pruebainstorage(id,nombre) values(1,'Xuan');

1 fila creada.

SQL> select * from pruebainstorage;

        ID NOMBRE
---------- -----------------------------------------------------------
         1 Xuan

SQL>

```