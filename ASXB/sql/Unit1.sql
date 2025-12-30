-- Practica: consultar el catalogo, tablespaces y adtafiles
-- (1)
connect sys@XE as sysdba;

select tablespace_name from dba_tablespaces;

-- (2)
set linesize 120; --很好用
column file_name format a60
col file_name forma a60
--para ver diferencia
select file_name,tablespace_name from dba_data_files;

-- (3)
conn sys/oracle@xepdb1 as sysdba;

-- (4)
desc dba_temp_files;

select file_name,file_id,TABLESPACE_NAME,bytes from dba_temp_files;


-- Pratica: crear esquema HR

@|start C:\db-sample-schemas-23.2\human_resources\hr_install.sql;
@|start C:\db-sample-schemas-23.2\human_resources\hr_create.sql;


