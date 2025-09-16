## CONSULTAR EL CATÁLOGO, TABLESPACES Y DATAFILES

Los tablespaces son la unidad lógica en la que se engloban los objetos de la base de
datos y que se corresponde con al menos un datafile (que es un fichero físico de la base
de datos que se encuentra en el oradata). Existe un tablespace especial que es el
temporal que no tiene asociado un datafile sinó un tempfile. Una vista para obtener
información de los ficheros de datos es V$DATAFILE

1. Conéctate con sys as sysdba al contenedor (XE) y consulta los tablespaces
SQL>connect sys@XE as sysdba
SQL>select tablespace_name from dba_tablespaces

2. Consulta los datafiles, como las columnas pueden ser muy largas vamos a formatearlas
SQL> set linesize 190
SQL> column file_name format a60
SQL> select file_name, tablespace_name from dba_data_files;

3. Conéctate ahora a la pluggable database y haz lo mismo. Mira las diferencias

4. Consulta ahora las vistas dba_temp_files