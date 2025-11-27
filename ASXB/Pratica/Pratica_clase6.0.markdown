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

 create directory backup_dir as 'C:\backup';

C:\Users\Administrador>expdp system/oracle FULL=y DIRECTORY=backup_dir DUMPFILE=oracle_exp.dmp LOGFILE=oracle_exp.log

Export: Release 21.0.0.0.0 - Production on Jue Nov 27 09:05:26 2025
Version 21.3.0.0.0

Copyright (c) 1982, 2021, Oracle and/or its affiliates.  All rights reserved.

Conectado a: Oracle Database 21c Express Edition Release 21.0.0.0.0 - Production

Advertencia: Las operaciones de Oracle Data Pump no se necesitan normalmente cuando se conecta a la raÝz o al elemento inicial de una base de datos del contenedor.

Iniciando "SYSTEM"."SYS_EXPORT_FULL_01":  system/******** FULL=y DIRECTORY=backup_dir DUMPFILE=oracle_exp.dmp LOGFILE=oracle_exp.log
Procesando el tipo de objeto DATABASE_EXPORT/EARLY_OPTIONS/VIEWS_AS_TABLES/TABLE_DATA
Procesando el tipo de objeto DATABASE_EXPORT/NORMAL_OPTIONS/TABLE_DATA
Procesando el tipo de objeto DATABASE_EXPORT/NORMAL_OPTIONS/VIEWS_AS_TABLES/TABLE_DATA
Procesando el tipo de objeto DATABASE_EXPORT/SCHEMA/TABLE/TABLE_DATA
Procesando el tipo de objeto DATABASE_EXPORT/SCHEMA/TABLE/INDEX/STATISTICS/INDEX_STATISTICS
Procesando el tipo de objeto DATABASE_EXPORT/SCHEMA/TABLE/STATISTICS/TABLE_STATISTICS
Procesando el tipo de objeto DATABASE_EXPORT/PRE_SYSTEM_IMPCALLOUT/MARKER
Procesando el tipo de objeto DATABASE_EXPORT/PRE_INSTANCE_IMPCALLOUT/MARKER
Procesando el tipo de objeto DATABASE_EXPORT/TABLESPACE
Procesando el tipo de objeto DATABASE_EXPORT/PROFILE
Procesando el tipo de objeto DATABASE_EXPORT/RADM_FPTM
Procesando el tipo de objeto DATABASE_EXPORT/GRANT/SYSTEM_GRANT/PROC_SYSTEM_GRANT
Procesando el tipo de objeto DATABASE_EXPORT/SCHEMA/ROLE_GRANT
Procesando el tipo de objeto DATABASE_EXPORT/SCHEMA/DEFAULT_ROLE
Procesando el tipo de objeto DATABASE_EXPORT/SCHEMA/ON_USER_GRANT
Procesando el tipo de objeto DATABASE_EXPORT/SCHEMA/TABLESPACE_QUOTA
Procesando el tipo de objeto DATABASE_EXPORT/RESOURCE_COST
Procesando el tipo de objeto DATABASE_EXPORT/SCHEMA/DB_LINK
Procesando el tipo de objeto DATABASE_EXPORT/TRUSTED_DB_LINK
Procesando el tipo de objeto DATABASE_EXPORT/DIRECTORY/DIRECTORY
Procesando el tipo de objeto DATABASE_EXPORT/DIRECTORY/GRANT/OWNER_GRANT/OBJECT_GRANT
Procesando el tipo de objeto DATABASE_EXPORT/SYSTEM_PROCOBJACT/PRE_SYSTEM_ACTIONS/PROCACT_SYSTEM
Procesando el tipo de objeto DATABASE_EXPORT/SYSTEM_PROCOBJACT/PROCOBJ
Procesando el tipo de objeto DATABASE_EXPORT/SYSTEM_PROCOBJACT/POST_SYSTEM_ACTIONS/PROCACT_SYSTEM
Procesando el tipo de objeto DATABASE_EXPORT/SCHEMA/PROCACT_SCHEMA
Procesando el tipo de objeto DATABASE_EXPORT/EARLY_OPTIONS/VIEWS_AS_TABLES/TABLE
Procesando el tipo de objeto DATABASE_EXPORT/EARLY_POST_INSTANCE_IMPCALLOUT/MARKER
Procesando el tipo de objeto DATABASE_EXPORT/NORMAL_OPTIONS/TABLE
Procesando el tipo de objeto DATABASE_EXPORT/NORMAL_OPTIONS/VIEWS_AS_TABLES/TABLE
Procesando el tipo de objeto DATABASE_EXPORT/NORMAL_POST_INSTANCE_IMPCALLOUT/MARKER
Procesando el tipo de objeto DATABASE_EXPORT/SCHEMA/TABLE/TABLE
Procesando el tipo de objeto DATABASE_EXPORT/SCHEMA/TABLE/COMMENT
Procesando el tipo de objeto DATABASE_EXPORT/SCHEMA/TABLE/INDEX/INDEX
Procesando el tipo de objeto DATABASE_EXPORT/FINAL_POST_INSTANCE_IMPCALLOUT/MARKER
Procesando el tipo de objeto DATABASE_EXPORT/AUDIT_UNIFIED/AUDIT_POLICY_ENABLE
Procesando el tipo de objeto DATABASE_EXPORT/POST_SYSTEM_IMPCALLOUT/MARKER
. . "SYS"."KU$_USER_MAPPING_VIEW"               6.093 KB      38 filas exportadas
. . "SYSTEM"."REDO_DB"                          26.01 KB       1 filas exportadas
. . "WMSYS"."WM$WORKSPACES_TABLE$"              12.10 KB       1 filas exportadas
. . "WMSYS"."WM$HINT_TABLE$"                    9.984 KB      97 filas exportadas
. . "LBACSYS"."OLS$INSTALLATIONS"               6.960 KB       2 filas exportadas
. . "WMSYS"."WM$WORKSPACE_PRIV_TABLE$"          7.078 KB      11 filas exportadas
. . "SYS"."DAM_CONFIG_PARAM$"                   6.531 KB      14 filas exportadas
. . "SYS"."TSDP_SUBPOL$"                        6.328 KB       1 filas exportadas
. . "WMSYS"."WM$NEXTVER_TABLE$"                 6.375 KB       1 filas exportadas
. . "LBACSYS"."OLS$PROPS"                       6.234 KB       5 filas exportadas
. . "WMSYS"."WM$ENV_VARS$"                      6.015 KB       3 filas exportadas
. . "SYS"."TSDP_PARAMETER$"                     5.953 KB       1 filas exportadas
. . "SYS"."TSDP_POLICY$"                        5.921 KB       1 filas exportadas
. . "WMSYS"."WM$VERSION_HIERARCHY_TABLE$"       5.984 KB       1 filas exportadas
. . "WMSYS"."WM$EVENTS_INFO$"                   5.812 KB      12 filas exportadas
. . "LBACSYS"."OLS$AUDIT_ACTIONS"               5.757 KB       8 filas exportadas
. . "LBACSYS"."OLS$DIP_EVENTS"                  5.539 KB       2 filas exportadas
. . "AUDSYS"."AUD$UNIFIED":"AUD_UNIFIED_P0"         0 KB       0 filas exportadas
. . "AUDSYS"."AUD$UNIFIED":"SYS_P261"           92.91 KB      79 filas exportadas
. . "AUDSYS"."AUD$UNIFIED":"SYS_P328"           54.18 KB       3 filas exportadas
. . "AUDSYS"."AUD$UNIFIED":"SYS_P368"           55.20 KB       7 filas exportadas
. . "AUDSYS"."AUD$UNIFIED":"SYS_P388"           54.01 KB       4 filas exportadas
. . "AUDSYS"."AUD$UNIFIED":"SYS_P408"           53.07 KB       2 filas exportadas
. . "AUDSYS"."AUD$UNIFIED":"SYS_P428"           56.90 KB      11 filas exportadas
. . "AUDSYS"."AUD$UNIFIED":"SYS_P448"           53.82 KB       4 filas exportadas
. . "AUDSYS"."AUD$UNIFIED":"SYS_P468"           58.77 KB      15 filas exportadas
. . "AUDSYS"."AUD$UNIFIED":"SYS_P508"           54.78 KB       7 filas exportadas
. . "LBACSYS"."OLS$AUDIT"                           0 KB       0 filas exportadas
. . "LBACSYS"."OLS$COMPARTMENTS"                    0 KB       0 filas exportadas
. . "LBACSYS"."OLS$DIP_DEBUG"                       0 KB       0 filas exportadas
. . "LBACSYS"."OLS$GROUPS"                          0 KB       0 filas exportadas
. . "LBACSYS"."OLS$LAB"                             0 KB       0 filas exportadas
. . "LBACSYS"."OLS$LEVELS"                          0 KB       0 filas exportadas
. . "LBACSYS"."OLS$POL"                             0 KB       0 filas exportadas
. . "LBACSYS"."OLS$POLICY_ADMIN"                    0 KB       0 filas exportadas
. . "LBACSYS"."OLS$POLS"                            0 KB       0 filas exportadas
. . "LBACSYS"."OLS$POLT"                            0 KB       0 filas exportadas
. . "LBACSYS"."OLS$PROFILE"                         0 KB       0 filas exportadas
. . "LBACSYS"."OLS$PROFILES"                        0 KB       0 filas exportadas
. . "LBACSYS"."OLS$PROG"                            0 KB       0 filas exportadas
. . "LBACSYS"."OLS$SESSINFO"                        0 KB       0 filas exportadas
. . "LBACSYS"."OLS$USER"                            0 KB       0 filas exportadas
. . "LBACSYS"."OLS$USER_COMPARTMENTS"               0 KB       0 filas exportadas
. . "LBACSYS"."OLS$USER_GROUPS"                     0 KB       0 filas exportadas
. . "LBACSYS"."OLS$USER_LEVELS"                     0 KB       0 filas exportadas
. . "SYS"."AUD$"                                    0 KB       0 filas exportadas
. . "SYS"."DAM_CLEANUP_EVENTS$"                     0 KB       0 filas exportadas
. . "SYS"."DAM_CLEANUP_JOBS$"                       0 KB       0 filas exportadas
. . "SYS"."TSDP_ASSOCIATION$"                       0 KB       0 filas exportadas
. . "SYS"."TSDP_CONDITION$"                         0 KB       0 filas exportadas
. . "SYS"."TSDP_FEATURE_POLICY$"                    0 KB       0 filas exportadas
. . "SYS"."TSDP_PROTECTION$"                        0 KB       0 filas exportadas
. . "SYS"."TSDP_SENSITIVE_DATA$"                    0 KB       0 filas exportadas
. . "SYS"."TSDP_SENSITIVE_TYPE$"                    0 KB       0 filas exportadas
. . "SYS"."TSDP_SOURCE$"                            0 KB       0 filas exportadas
. . "SYSTEM"."REDO_LOG"                             0 KB       0 filas exportadas
. . "WMSYS"."WM$BATCH_COMPRESSIBLE_TABLES$"         0 KB       0 filas exportadas
. . "WMSYS"."WM$CONSTRAINTS_TABLE$"                 0 KB       0 filas exportadas
. . "WMSYS"."WM$CONS_COLUMNS$"                      0 KB       0 filas exportadas
. . "WMSYS"."WM$LOCKROWS_INFO$"                     0 KB       0 filas exportadas
. . "WMSYS"."WM$MODIFIED_TABLES$"                   0 KB       0 filas exportadas
. . "WMSYS"."WM$MP_GRAPH_WORKSPACES_TABLE$"         0 KB       0 filas exportadas
. . "WMSYS"."WM$MP_PARENT_WORKSPACES_TABLE$"        0 KB       0 filas exportadas
. . "WMSYS"."WM$NESTED_COLUMNS_TABLE$"              0 KB       0 filas exportadas
. . "WMSYS"."WM$RESOLVE_WORKSPACES_TABLE$"          0 KB       0 filas exportadas
. . "WMSYS"."WM$RIC_LOCKING_TABLE$"                 0 KB       0 filas exportadas
. . "WMSYS"."WM$RIC_TABLE$"                         0 KB       0 filas exportadas
. . "WMSYS"."WM$RIC_TRIGGERS_TABLE$"                0 KB       0 filas exportadas
. . "WMSYS"."WM$UDTRIG_DISPATCH_PROCS$"             0 KB       0 filas exportadas
. . "WMSYS"."WM$UDTRIG_INFO$"                       0 KB       0 filas exportadas
. . "WMSYS"."WM$VERSION_TABLE$"                     0 KB       0 filas exportadas
. . "WMSYS"."WM$VT_ERRORS_TABLE$"                   0 KB       0 filas exportadas
. . "WMSYS"."WM$WORKSPACE_SAVEPOINTS_TABLE$"        0 KB       0 filas exportadas
. . "MDSYS"."RDF_PARAM$"                        6.515 KB       3 filas exportadas
. . "SYS"."AUDTAB$TBS$FOR_EXPORT"               5.953 KB       2 filas exportadas
. . "SYS"."DBA_SENSITIVE_DATA"                      0 KB       0 filas exportadas
. . "SYS"."DBA_TSDP_POLICY_PROTECTION"              0 KB       0 filas exportadas
. . "SYS"."FGA_LOG$FOR_EXPORT"                      0 KB       0 filas exportadas
. . "SYS"."GV_$UNIFIED_AUDIT_TRAIL"                 0 KB       0 filas exportadas
. . "SYS"."NACL$_ACE_EXP"                           0 KB       0 filas exportadas
. . "SYS"."NACL$_HOST_EXP"                      6.976 KB       2 filas exportadas
. . "SYS"."NACL$_WALLET_EXP"                        0 KB       0 filas exportadas
. . "SYS"."SQL$TEXT_DATAPUMP"                       0 KB       0 filas exportadas
. . "SYS"."SQL$_DATAPUMP"                           0 KB       0 filas exportadas
. . "SYS"."SQLOBJ$AUXDATA_DATAPUMP"                 0 KB       0 filas exportadas
. . "SYS"."SQLOBJ$DATA_DATAPUMP"                    0 KB       0 filas exportadas
. . "SYS"."SQLOBJ$PLAN_DATAPUMP"                    0 KB       0 filas exportadas
. . "SYS"."SQLOBJ$_DATAPUMP"                        0 KB       0 filas exportadas
. . "SYSTEM"."SCHEDULER_JOB_ARGS"                   0 KB       0 filas exportadas
. . "SYSTEM"."SCHEDULER_PROGRAM_ARGS"               0 KB       0 filas exportadas
. . "WMSYS"."WM$EXP_MAP"                        7.718 KB       3 filas exportadas
. . "WMSYS"."WM$METADATA_MAP"                       0 KB       0 filas exportadas
La tabla maestra "SYSTEM"."SYS_EXPORT_FULL_01" se ha cargado/descargado correctamente
******************************************************************************
El juego de archivos de volcado para SYSTEM.SYS_EXPORT_FULL_01 es:
  C:\BACKUP\ORACLE_EXP.DMP
El trabajo "SYSTEM"."SYS_EXPORT_FULL_01" ha terminado correctamente en Jue Nov 27 09:07:56 2025 elapsed 0 00:02:28

```