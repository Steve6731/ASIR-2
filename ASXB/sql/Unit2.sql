------------------------------------
-- Practica: configuracion de la SGA
------------------------------------
-- Indica los parámetros y valores que configurar atendiendo a los siguientes requisitos:

-- a) El tamaño máximo de la SGA es de 2 gigabytes.
ALTER SYSTEM SET SGA_MAX_SIZE = 2G SCOPE=SPFILE;
-- b) El tamaño de la caché de datos es de 512 megabytes.
ALTER SYSTEM SET DB_CACHE_SIZE = 512M SCOPE=SPFILE;
-- c) El tamaño del pool compartido es de 128 megabytes.
ALTER SYSTEM SET SHARED_POOL_SIZE = 128M SCOPE=SPFILE;
-- d ) La gestión automática de memoria compartida está activada. El tamaño de la SGA es de 1500 megabytes.
ALTER SYSTEM SET SGA_TARGET = 1500M SCOPE=SPFILE;
ALTER SYSTEM SET MEMORY_TARGET = 0 SCOPE=SPFILE;

--SGA_MAX_SIZE=2G
--SGA_TARGET=1500M
--DB_CACHE_SIZE=512M
--SHARED_POOL_SIZE=128M
--MEMORY_TARGET=0



----------------------------------------------
-- Pratica: Obener informacion de los procesos
----------------------------------------------
select * from v$process;
desc v$process;
-- (a) Mostrar la ubicación y el fichero de traza de los procesos LGWR y DBW.
select PNAME,TRACEFILE from v$process 
   where PNAME like '%LGWR%' or PNAME like '%DBW%';
-- (b) Con relación a la memoria privada de los procesos, mostrar la cantidad que se está .usando, la asignada y la que se puede asignar de los procesos ARC, CKPT y PMON.
select PNAME,PGA_USED_MEM,PGA_FREEABLE_MEM,PGA_MAX_MEM from v$process
   where PNAME like '%CKPT%' or PNAME like '%ARC%' or PNAME like '%PMON%';
-- (c) Mostrar Ia cantidad de CPU usada del proceso DBW
select PNAME,CPU_USED from v$process
   where PNAME like '%DBW%';
-- (d) Mostrar la cantidad de memoria de tipo PGA usada en total.
select sum(PGA_USED_MEM) from v$process;

------------------------------------------
-- Pratica: Obtener informacion del spfile
------------------------------------------
-- a) ¿Cuál es la ubicación del fichero init<sid>.ora? Y la del fichero spfile<sid>.ora?
-- C:\APP\ADMINISTRATOR\PRODUCT\21C\DATABASE\SPFILEXE.ORA
SELECT name, value FROM v$parameter WHERE name = 'spfile';

-- b) ¿Qué contienen estos ficheros? ¿Contienen un enlace a otro fichero a través del parámetro IFILE? 
-- 数据库的初始化参数（如内存设置、控制文件路径等）
-- no tiene otro fichero a traves de parametro IFILE;
SELECT name, value FROM v$parameter WHERE name = 'ifile';

-- c) Para que se usa el parámetro SPFILE?
--SPFILE（服务器参数文件）是二进制文件，存储数据库初始化参数。

-- d) Si el fichero abierto contiene un enlace a otro fichero de configuración, abre este nuevo fichero. Una vez abierto el fichero de parámetros de inicialización correspondiente, anota los valores de los parámetros de la tabla que hemos visto de la SGA y los valores de SGA_MAX_SIZE, DB_CACHE_SIZE, SHARED_POOL_SIZE, SGA_TARGET.
-- no hay enlace a otro fichero de configuracion
-- puede ver los valores con seguiente select
SELECT name,value FROM v$parameter 
WHERE name IN (
   'sga_max_size',
   'db_cache_size',
   'shared_pool_size',
   'sga_target'
);

-- e) ¿Qué ocurre cuando se usa PFILE en el comando STARTUP?
--强制使用指定的 PFILE 文本文件启动，忽略默认的 SPFILE。

-- f) De aquellos parámetros no definidos en el fichero comprueba su valor actual.
SELECT name,value,isdefault
 FROM v$parameter 
 WHERE isdefault = 'TRUE';



--------------------------------------------------
-- Practica: Parametros de configuracion generales
--------------------------------------------------
-- Abre el fichero init.ora y analiza cada uno de los parámetros que se indican en Ia Tabla 
-- anterior, anotando el valor actual. A continuación, haz una copia de seguridad de ese 
-- fichero con la notación init.anioMesDia.back. Modifica los parámetros que correspondan 
-- con el fin de cumplir los requisitos siguientes:
--"C:\app\Administrator\product\21c\dbhomeXE\dbs\init.ora"
-- a) El nombre de la base de datos es XE.
-- db_name=XE

-- b) El nombre y la ubicación de los ficheros de control son c:\oradata\oradata\xe\controI01 .ctI y c:\oradata\oradata\xe\control02.ctl.
-- control_files = ("\\.\clustdb_control1", "\\.\clustdb_control2")

-- c) El número de procesos que se pueden conectar a Ia vez a la instancia es 50.
-- processes = 50

-- d) EI nivel de estadisticas para las funcionalidades automáticas es máximo.
-- statistics_level = all

-- e) Se le asignan a la instancia 4GB
-- memory_target = 4G

-- f) El tamaño del bloque es de 8KB
-- db_block_size = 8192



----------------------------------------------------
-- Pratica: Mostrar informacion sobre los parametros
----------------------------------------------------
show parameter [text_filter];

-- a) El valor de los parámetros que contienen el texto SIZE.
show parameter SIZE;

-- b) La cabecera de la vista V$SYSTEM_PARAMETER2. Atendiendo a esta información, mostrar de los parámetros que empiezan por db si el valor es el mismo que el predeterminado.
desc v$system_parameter2;
SELECT NAME,VALUE,ISDEFAULT FROM V$SYSTEM_PARAMETER2 
   WHERE name LIKE 'db%';

-- c) La cabecera de la vista VSPARAMETER2. Atendiendo a esta información, mostrar, de los parámetros que tienen el texto pool, si el parámetro no se usa.
select name,value,isdefault from V$SYSTEM_PARAMETER2
   where name LIKE '%pool%'
   and isdefault='TRUE'
   and value is null;



--------------------------------------------------
-- Pratica: Mostrar informacion sobre la instancia
--------------------------------------------------

-- La siguiente consulta muestra información muy interesante sobre la instancia:
SELECT INSTANCE_NAME,STARTUP_TIME,
   STATUS,ARCHIVER,LOG_SWITCH_WAIT,
   DATABASE_STATUS,LOGINS,INSTANCE_MODE 
   FROM V$INSTANCE;
-- Indica el valor de cada columna y deduce que información muestra la consulta



-----------------------------------
-- Pratica: Actividad Final Resumen
-----------------------------------
-- Indica cuál seria el comando para llevar a cabo cada acción:

-- a) Iniciar la base de datos en modo instancia.
STARTUP NOMOUNT;

-- b) Dimensionar en fichero la memoria caché de datos para un tamaño de bloque de 16K de 1,5 gigabytes.
ALTER SYSTEM SET DB_CACHE_SIZE = 1536M SCOPE=SPFILE;

-- c) Usando una vista, mostrar el identificador único de la base de datos.
SELECT DBID FROM V$DATABASE;

-- d) Abrir la base de datos XE solo para los usuarios de sesión restringida.
-- ALTER DATABASE OPEN RESTRICTED SESSION;
ALTER PLUGGABLE DATABASE XE OPEN RESTRICTED; -- O específico para XE:

-- e) Mostrar el tipo de los ficheros de control.
SELECT TYPE FROM V$CONTROLFILE;

-- f) Mostrar, usando una vista, si la base de datos usa múltiples instancias.
SELECT PARALLEL FROM V$INSTANCE;
SELECT INSTANCES FROM V$DATABASE;-- O alternativamente:

-- g) Desactivar de forma dinámica el modo de la base de datos a abierto restringido.
ALTER SYSTEM DISABLE RESTRICTED SESSION;

-- h) Mostrar el modo en el que se generan los registros logs.
SELECT LOG_MODE FROM V$DATABASE;

-- i) Parar la base de datos en modo normal.
SHUTDOWN NORMAL;-- O:
SHUTDOWN IMMEDIATE;

-- j) Para la instancia actual y usando el comando ALTER SYSTEM, obligar a que se use
ALTER SYSTEM SET CONTROL_FILES = 'c:\oradata\ctlprueba.ctl' SCOPE=SPFILE; -- Necesita reinicio

-- k) el fichero de control c:\oradata\ctlprueba.ctl.
-- ???

-- l) Mostrar aquellos parámetros cuyo valor es diferente al valor predeterminado.
SELECT NAME, VALUE, ISDEFAULT 
   FROM V$PARAMETER 
   WHERE ISDEFAULT = 'FALSE';

-- m) Mostrar Ia fecha de la última copia de los ficheros de control.
SELECT MAX(TIME) FROM V$BACKUP_DATAFILE WHERE FILE_TYPE = 'CONTROLFILE';-- o:
SELECT CONTROLFILE_TIME FROM V$DATABASE;

-- n) Declarar en fichero el tamaño máximo de la memoria compartida en 1G.
ALTER SYSTEM SET MEMORY_MAX_TARGET = 1G SCOPE=SPFILE;

-- o) Dimensionar en fichero el parámetro del tamaño del pool compartido a 64 megabytes.
ALTER SYSTEM SET SHARED_POOL_SIZE = 64M SCOPE=SPFILE;

-- p) Mostrar si la base de datos es un contenedor CDB.
SELECT CDB FROM V$DATABASE;

-- q) Desactivar en fichero la configuración automática de la memoria compartida.
ALTER SYSTEM SET MEMORY_TARGET = 0 SCOPE=SPFILE;

-- r) Mostrar los ficheros de traza de los procesos que tienen un uso de la CPU mayor que la media.
SELECT TRACEFILE FROM V$PROCESS 
WHERE (CPU_USED / (SYSDATE - LOGON_TIME)) > 
      (SELECT AVG(CPU_USED / (SYSDATE - LOGON_TIME)) FROM V$PROCESS);

-- s) Cambiar el nombre de la base de datos a 'PRUEBA' con el comando ALTER SESSION.
-- NOTA: ALTER SESSION no cambia el nombre real, solo en sesión
ALTER SESSION SET CONTAINER = 'PRUEBA';
-- Para cambiar realmente el nombre:
-- NID TARGET=sys/password DBNAME=PRUEBA

-- t) Asignar en fichero un tamaño del DataBuffer de 256 megabytes.
ALTER SYSTEM SET DB_CACHE_SIZE = 256M SCOPE=SPFILE;

-- u) Modificar usando ALTER SESSION, solo para la instancia actual, el parámetro DB__CACHE_SIZE a 128M.
ALTER SYSTEM SET DB_CACHE_SIZE = 128M SCOPE=MEMORY;
-- O para sesión específica: ALTER SESSION SET DB_CACHE_SIZE = 128M;

-- v) Mostrar el estado de la instancia.
SELECT STATUS FROM V$INSTANCE;

-- w)Limitar en fichero el tamaño máximo para la zona Result Cache a 1 megabyte.
ALTER SYSTEM SET RESULT_CACHE_MAX_SIZE = 1M SCOPE=SPFILE;

-- x) Mostrar el nombre de la base de datos con el comando SHOW.
SHOW PARAMETER DB_NAME;
