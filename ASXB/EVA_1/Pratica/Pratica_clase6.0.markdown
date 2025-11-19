# backup manual en frio
```bash
# unos select para localiza files.
# buscamos los ficheros de datos

SQL> select name from v$datafile;

NAME
--------------------------------------------------------------------------------
/opt/oracle/oradata/dbcentos/system01.dbf
/opt/oracle/oradata/dbcentos/sysaux01.dbf
/opt/oracle/oradata/dbcentos/undotbs01.dbf
/opt/oracle/oradata/dbcentos/users01.dbf
# buscamos los ficheros de control

SQL> show parameters control_files

NAME                                 TYPE        VALUE
------------------------------------ ----------- ------------------------------
control_files                        string      /opt/oracle/oradata/dbcentos/c
                                                 ontrol01.ctl, /opt/oracle/flas
                                                 h_recovery_area/dbcentos/contr
                                                 ol02.ctl
# buscamos los ficheros de log

SQL> select member  from v$logfile;

MEMBER
-------------------------------------------------------------------------------
/opt/oracle/oradata/dbcentos/redo03.log
/opt/oracle/oradata/dbcentos/redo02.log
/opt/oracle/oradata/dbcentos/redo01.log
# Localizar los fichero de redo log, en caso de estar habilitado el modo archive log

SQL> show parameters archive_dest
# localizar el fichero de password, pfile y el spfile, suele estar todos en el mismo directorio

SQL> show parameters pfile

NAME                                 TYPE        VALUE
------------------------------------ ----------- ------------------------------
spfile                               string      /opt/oracle/product/11.2.0/dbh
                                                 ome_1/dbs/spfiledbcentos.ora
# ya tenemos todos los ficheros a realizar copia, por lo que paramos la base de datos


SQL> shutdown immediate
Base de datos cerrada.
Base de datos desmontada.
Instancia ORACLE cerrada.
SQL> exit

tar cvfz E:\backup\oradata.tar C:\app\Administrador\product\21c\oradata
tar: Removing leading drive letter from member names
a app/Administrador/product/21c/oradata
a app/Administrador/product/21c/oradata/XE
a app/Administrador/product/21c/oradata/XE/CONTROL01.CTL
a app/Administrador/product/21c/oradata/XE/CONTROL02.CTL
a app/Administrador/product/21c/oradata/XE/CUNQUEIRO
a app/Administrador/product/21c/oradata/XE/FICTICIO
a app/Administrador/product/21c/oradata/XE/pdbseed
a app/Administrador/product/21c/oradata/XE/REDO01.LOG
a app/Administrador/product/21c/oradata/XE/REDO02.LOG
a app/Administrador/product/21c/oradata/XE/REDO03.LOG
a app/Administrador/product/21c/oradata/XE/SYSAUX01.DBF
a app/Administrador/product/21c/oradata/XE/SYSTEM01.DBF
a app/Administrador/product/21c/oradata/XE/TEMP01.DBF
a app/Administrador/product/21c/oradata/XE/UNDOTBS01.DBF
a app/Administrador/product/21c/oradata/XE/USERS01.DBF
a app/Administrador/product/21c/oradata/XE/XEPDB1
a app/Administrador/product/21c/oradata/XE/XEPDB1/SYSAUX01.DBF
a app/Administrador/product/21c/oradata/XE/XEPDB1/SYSTEM01.DBF
a app/Administrador/product/21c/oradata/XE/XEPDB1/TEMP01.DBF
a app/Administrador/product/21c/oradata/XE/XEPDB1/UNDOTBS01.DBF
a app/Administrador/product/21c/oradata/XE/XEPDB1/USERS01.DBF
a app/Administrador/product/21c/oradata/XE/pdbseed/SYSAUX01.DBF
a app/Administrador/product/21c/oradata/XE/pdbseed/SYSTEM01.DBF
a app/Administrador/product/21c/oradata/XE/pdbseed/TEMP012025-09-11_09-04-11-187-AM.DBF
a app/Administrador/product/21c/oradata/XE/pdbseed/UNDOTBS01.DBF
a app/Administrador/product/21c/oradata/XE/FICTICIO/SYSAUX01.DBF
a app/Administrador/product/21c/oradata/XE/FICTICIO/SYSTEM01.DBF
a app/Administrador/product/21c/oradata/XE/FICTICIO/TEMP012025-09-11_09-04-11-187-AM.DBF
a app/Administrador/product/21c/oradata/XE/FICTICIO/UNDOTBS01.DBF
a app/Administrador/product/21c/oradata/XE/CUNQUEIRO/SYSAUX01.DBF
a app/Administrador/product/21c/oradata/XE/CUNQUEIRO/SYSTEM01.DBF
a app/Administrador/product/21c/oradata/XE/CUNQUEIRO/TEMP012025-09-11_09-04-11-187-AM.DBF
a app/Administrador/product/21c/oradata/XE/CUNQUEIRO/UNDOTBS01.DBF

# arranca despuede de shutdown immediate
SQL> STARTUP
```

# backup manual en caliente
``` bash
# backup de tablsepace
SQL> alter tablespace [nombre] Begin Backup;
SQL> alter tablespace [nombre] End Backup;
SQL> alter system switch logfile
SQL> select * from v$backup
# backup de controlfile
SQL> alter database backup controfile to 'ubicacion'
# backup completo
# para SPFILE usa
SQL> alter database begin/end backup
SQL> alter pluggable database nombre begin/end backup
```

```bash
shutdown
start mountada
alter pluggable database xepdb1 begin backup
alter pluggable database xepdb1 end backup

alter session set container=xepdb1
```

rman target /
backup pluggable database xepdb1

``` bash
C:\Users\Administrador>rman target /

Recovery Manager : Release 21.0.0.0.0 - Production on Mar Nov 18 12:10:15 2025
Version 21.3.0.0.0

Copyright (c) 1982, 2021, Oracle and/or its affiliates.  All rights reserved.

conectado a la base de datos de destino: XE (DBID=3092654103, no abierto)

RMAN> backup pluggable database xepdb1
2> ;

Empezando backup a las 18/11/25
se utiliza el archivo de control de la base de datos destino en lugar del catßlogo de recuperaci¾n
canal asignado: ORA_DISK_1
canal ORA_DISK_1: SID=14 tipo de dispositivo=DISK
canal ORA_DISK_1: iniciando juego de copias de seguridad de archivo de datos completo
canal ORA_DISK_1: especificando archivo(s) de datos en el juego de copias de seguridad
n·mero de archivo de datos de entrada=00010 nombre=C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\XEPDB1\SYSAUX01.DBF
n·mero de archivo de datos de entrada=00009 nombre=C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\XEPDB1\SYSTEM01.DBF
n·mero de archivo de datos de entrada=00011 nombre=C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\XEPDB1\UNDOTBS01.DBF
n·mero de archivo de datos de entrada=00012 nombre=C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\XEPDB1\USERS01.DBF
canal ORA_DISK_1: iniciando parte 1 en 18/11/25
canal ORA_DISK_1: finalizando parte 1 en 18/11/25
manejador de parte=C:\APP\ADMINISTRADOR\PRODUCT\21C\DBHOMEXE\DATABASE\01493ATO_1_1_1 etiqueta=TAG20251118T121028 comentario=NONE
canal ORA_DISK_1: juego de copias de seguridad terminado, tiempo transcurrido: 00:00:05
Se ha finalizado backup a las 18/11/25

Empezando Control File and SPFILE Autobackup a las 18/11/25
manejador de parte=C:\APP\ADMINISTRADOR\PRODUCT\21C\DBHOMEXE\DATABASE\C-3092654103-20251118-00 comentario=NONE
Se ha finalizado Control File and SPFILE Autobackup a las 18/11/25

RMAN>
```