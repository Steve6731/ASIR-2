# apunte RMAN
```bash
rman target=sys@xe # para entrar como sys con RMAN
```
# pratica de backup manual en frio


``` bash
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

``` sql
shutdown
start mounta
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
#termina correctamente

```

hecho otra vez

``` bash
C:\Users\Administrador>sqlplus / as sysdba
SQL> shutdown immediate
Base de datos cerrada.
Base de datos desmontada.
Instancia ORACLE cerrada.
SQL> startup mount
Instancia ORACLE iniciada.

Total System Global Area 1291844832 bytes
Fixed Size                  9854176 bytes
Variable Size             520093696 bytes
Database Buffers          754974720 bytes
Redo Buffers                6922240 bytes
Base de datos montada.
SQL> alter database archivelog;

Base de datos modificada.

SQL> exit

C:\Users\Administrador>rman target sys@xe

Recovery Manager : Release 21.0.0.0.0 - Production on Jue Nov 20 09:48:37 2025
Version 21.3.0.0.0

Copyright (c) 1982, 2021, Oracle and/or its affiliates.  All rights reserved.

Contrase±a de la base de datos destino:
conectado a la base de datos de destino: XE (DBID=3092654103, no abierto)

RMAN> backup pluggable database xepdb1;

Empezando backup a las 20/11/25
se utiliza el archivo de control de la base de datos destino en lugar del catßlogo de recuperaci¾n
canal asignado: ORA_DISK_1
canal ORA_DISK_1: SID=17 tipo de dispositivo=DISK
canal ORA_DISK_1: iniciando juego de copias de seguridad de archivo de datos completo
canal ORA_DISK_1: especificando archivo(s) de datos en el juego de copias de seguridad
n·mero de archivo de datos de entrada=00010 nombre=C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\XEPDB1\SYSAUX01.DBF
n·mero de archivo de datos de entrada=00009 nombre=C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\XEPDB1\SYSTEM01.DBF
n·mero de archivo de datos de entrada=00011 nombre=C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\XEPDB1\UNDOTBS01.DBF
n·mero de archivo de datos de entrada=00012 nombre=C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\XEPDB1\USERS01.DBF
canal ORA_DISK_1: iniciando parte 1 en 20/11/25
canal ORA_DISK_1: finalizando parte 1 en 20/11/25
manejador de parte=C:\APP\ADMINISTRADOR\PRODUCT\21C\DBHOMEXE\DATABASE\03498BCD_3_1_1 etiqueta=TAG20251120T094901 comentario=NONE
canal ORA_DISK_1: juego de copias de seguridad terminado, tiempo transcurrido: 00:00:04
Se ha finalizado backup a las 20/11/25

Empezando Control File and SPFILE Autobackup a las 20/11/25
manejador de parte=C:\APP\ADMINISTRADOR\PRODUCT\21C\DBHOMEXE\DATABASE\C-3092654103-20251120-00 comentario=NONE
Se ha finalizado Control File and SPFILE Autobackup a las 20/11/25

RMAN> backup pluggable database CUNQUEIRO;

Empezando backup a las 20/11/25
usando el canal ORA_DISK_1
canal ORA_DISK_1: iniciando juego de copias de seguridad de archivo de datos completo
canal ORA_DISK_1: especificando archivo(s) de datos en el juego de copias de seguridad
n·mero de archivo de datos de entrada=00017 nombre=C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\CUNQUEIRO\SYSAUX01.DBF
n·mero de archivo de datos de entrada=00016 nombre=C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\CUNQUEIRO\SYSTEM01.DBF
n·mero de archivo de datos de entrada=00018 nombre=C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\CUNQUEIRO\UNDOTBS01.DBF
canal ORA_DISK_1: iniciando parte 1 en 20/11/25
canal ORA_DISK_1: finalizando parte 1 en 20/11/25
manejador de parte=C:\APP\ADMINISTRADOR\PRODUCT\21C\DBHOMEXE\DATABASE\05498BD8_5_1_1 etiqueta=TAG20251120T094928 comentario=NONE
canal ORA_DISK_1: juego de copias de seguridad terminado, tiempo transcurrido: 00:00:07
Se ha finalizado backup a las 20/11/25

Empezando Control File and SPFILE Autobackup a las 20/11/25
manejador de parte=C:\APP\ADMINISTRADOR\PRODUCT\21C\DBHOMEXE\DATABASE\C-3092654103-20251120-01 comentario=NONE
Se ha finalizado Control File and SPFILE Autobackup a las 20/11/25

```

```bash
# hace backup de tablespace users con transport

sql> create directory backup_tablespace_users as 'C:\backup\tableSpace\users';
sql> alter tablespace users read only;

C:\Users\Administrador>expdp \"/ as sysdba\" DIRECTORY=backup_tablespace_users DUMPFILE=users_exp.dmp LOGFILE=tablespace_exp.log TRANSPORT_TABLESPACES=users

Export: Release 21.0.0.0.0 - Production on Mar Nov 25 11:28:21 2025
Version 21.3.0.0.0

Copyright (c) 1982, 2021, Oracle and/or its affiliates.  All rights reserved.

Conectado a: Oracle Database 21c Express Edition Release 21.0.0.0.0 - Production

Advertencia: Las operaciones de Oracle Data Pump no se necesitan normalmente cuando se conecta a la raÝz o al elemento inicial de una base de datos del contenedor.

Iniciando "SYS"."SYS_EXPORT_TRANSPORTABLE_01":  "/******** AS SYSDBA" DIRECTORY=backup_tablespace_users DUMPFILE=users_exp.dmp LOGFILE=tablespace_exp.log TRANSPORT_TABLESPACES=users
Procesando el tipo de objeto TRANSPORTABLE_EXPORT/STATISTICS/TABLE_STATISTICS
Procesando el tipo de objeto TRANSPORTABLE_EXPORT/STATISTICS/MARKER
Procesando el tipo de objeto TRANSPORTABLE_EXPORT/PLUGTS_BLK
Procesando el tipo de objeto TRANSPORTABLE_EXPORT/POST_INSTANCE/PLUGTS_BLK
Procesando el tipo de objeto TRANSPORTABLE_EXPORT/TABLE
Procesando el tipo de objeto TRANSPORTABLE_EXPORT/INDEX/INDEX
Procesando el tipo de objeto TRANSPORTABLE_EXPORT/CONSTRAINT/CONSTRAINT
Procesando el tipo de objeto TRANSPORTABLE_EXPORT/CONSTRAINT/REF_CONSTRAINT
La tabla maestra "SYS"."SYS_EXPORT_TRANSPORTABLE_01" se ha cargado/descargado correctamente
******************************************************************************
El juego de archivos de volcado para SYS.SYS_EXPORT_TRANSPORTABLE_01 es:
  C:\BACKUP\TABLESPACE\USERS\USERS_EXP.DMP
******************************************************************************
Archivos de datos necesarios para tablespace transportable USERS:
  C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\USERS01.DBF
El trabajo "SYS"."SYS_EXPORT_TRANSPORTABLE_01" ha terminado correctamente en Mar Nov 25 11:28:45 2025 elapsed 0 00:00:24

CREATE USER test IDENTIFIED BY password
DEFAULT TABLESPACE USERS
QUOTA UNLIMITED ON USERS;

```