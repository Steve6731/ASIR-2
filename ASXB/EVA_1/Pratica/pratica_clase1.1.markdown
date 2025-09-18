## CONSULTAR EL CATÁLOGO, TABLESPACES Y DATAFILES

Los tablespaces son la unidad lógica en la que se engloban los objetos de la base de
datos y que se corresponde con al menos un datafile (que es un fichero físico de la base
de datos que se encuentra en el oradata). Existe un tablespace especial que es el
temporal que no tiene asociado un datafile sinó un tempfile. Una vista para obtener
información de los ficheros de datos es V$DATAFILE

<font size="5" color = "red">No olvida poner "<font size="8"><b>;</b></font>"</font>
1. Conéctate con sys as sysdba al contenedor (XE) y consulta los tablespaces
SQL>connect sys@XE as sysdba
SQL>select tablespace_name from dba_tablespaces

2. Consulta los datafiles, como las columnas pueden ser muy largas vamos a formatearlas
SQL> set linesize 190
SQL> column file_name format a60
SQL> select file_name, tablespace_name from dba_data_files;

3. Conéctate ahora a la pluggable database y haz lo mismo. Mira las diferencias

4. Consulta ahora las vistas dba_temp_files



## CREAR ESQUEMA HR

1. Vete a <a herf="https://github.com/oracle-samples/db-sample-schemas/releases/tag/v23.2">este site </a>y bájate el zip de la última versión de los esquemas
2. Descomprime el zip
3. Desde el terminal vete al directorio human_resources, verás un archivo llamado
hr_install.sql este archivo es el que tienes que correr en Oracle.
4. Lógate en Oracle usando el sqlplus con el usuario system o sys en la pluggable
database (ya que el usuario HR será un usuario solo de esa pluggable.
SQL> connect system@XEPDB1
SQL> @hr_install.sql
Te preguntará por la password de hr (ponle por ejemplo oracle), el tablespace (puedes
darle a enter y se crearán las tablas en el tablespace USERS que es el que tiene por
defecto.
Una vez haya terminado saldrá del sqlplus. Prueba a entrar con el usuario hr y lista sus
tablas.
Fíjate que no podrás entrar con connect hr/oracle porque eso intenta conectarse a XE,
tienes que poner la pluggable database

```sql
C:\Users\Administrador>sqlplus /nolog

SQL*Plus: Release 21.0.0.0.0 - Production on Jue Sep 18 11:42:08 2025
Version 21.3.0.0.0

Copyright (c) 1982, 2021, Oracle.  All rights reserved.

SQL> connect system@XEPDB1
Introduzca la contrase±a:
Conectado.
SQL> @C:\Users\Administrador\Desktop\db-sample-schemas-main\human_resources\hr_install.sql

Thank you for installing the Oracle Human Resources Sample Schema.
This installation script will automatically exit your database session
at the end of the installation or if any error is encountered.
The entire installation will be logged into the 'hr_install.log' log file.

Enter a password for the user HR:


Enter a tablespace for HR [USERS]:
Do you want to overwrite the schema, if it already exists? [YES|no]:
******  Creating REGIONS table ....
```



#### probar y entrar
```sql
C:\Users\Administrador>sqlplus hr/oracle@xepdb1

SQL*Plus: Release 21.0.0.0.0 - Production on Jue Sep 18 11:48:11 2025
Version 21.3.0.0.0

Copyright (c) 1982, 2021, Oracle.  All rights reserved.


Conectado a:
Oracle Database 21c Express Edition Release 21.0.0.0.0 - Production
Version 21.3.0.0.0

SQL>
```

## pratica de spool

```sql

SQL> spool c:\oradata\salida.txt
SQL> spool c:\oradata\salida.txt append
SQL> select table_name,tablespace_name from user_tables;

TABLE_NAME                     TABLESPACE_NAME
------------------------------ ------------------------------
REGIONS                        USERS
LOCATIONS                      USERS
DEPARTMENTS                    USERS
JOBS                           USERS
EMPLOYEES                      USERS
JOB_HISTORY                    USERS
COUNTRIES

7 filas seleccionadas.

SQL> spool c:\oradata\salida.txt on
SP2-0768: Comando SPOOL no vßlido
Sintaxis: SPOOL { <archivo> | OFF | OUT }
donde <archivo> es nombre_archivo[.ext] [CRE[ATE]|REP[LACE]|APP[END]]
SQL> spool on
SQL>
```

### en c:/oradata\salida.txt

```sql
SQL> spool c:\oradata\salida.txt append
SQL> select table_name,tablespace_name from user_tables;

TABLE_NAME                     TABLESPACE_NAME                                  
------------------------------ ------------------------------                   
REGIONS                        USERS                                            
LOCATIONS                      USERS                                            
DEPARTMENTS                    USERS                                            
JOBS                           USERS                                            
EMPLOYEES                      USERS                                            
JOB_HISTORY                    USERS                                            
COUNTRIES                                                                       

7 filas seleccionadas.

SQL> spool c:\oradata\salida.txt on
SP2-0768: Comando SPOOL no válido
Sintaxis: SPOOL { <archivo> | OFF | OUT }
donde <archivo> es nombre_archivo[.ext] [CRE[ATE]|REP[LACE]|APP[END]]
SQL> spool on

```
