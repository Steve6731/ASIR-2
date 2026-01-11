--------------------
-- Introduccion JOBS
--------------------
select * from DBA_SCHEDULER_JOBS; -- obtener informacion sobre los jobs se guarda en la tabla
-- Permisos necesario de unos acciones de JOBS
/*
Create a job    =>    CREATE JOB or CREATE ANY JOB
alter,run,copy,drop,stop,disable,enable a job => ALTER or CREATE ANY JOB or be the owner
*/
-- todo commando basico está almacenado en paquete DBMS_SCHEDULER.
/*
DBMS_SCHEDULER.CREATE_JOB(
   job_name IN <VARCHAR2>,                               nombre del job
   job_type IN <VARCHAR2>,                               PLSQL_BLOCK, STORED_PROCEDURE, EXTERNAL_SCRIPT
   job_action IN <VARCHAR2>,                             nombre del programa PL/SQL o sentencias a realizar
   number_of_arguments IN <PLS_INTEGER>                  argumentos del job
   start_date IN <TIMESTAMP WITHTIME ZONE>               cuando comienza. Null para comience cuando se habilite
   repeat_interval IN <VARCHAR2>,                        intervalo repetición. Si nulo sólo se hace unha vez
   end_date IN <TIMESTAMP WITH TIME ZONE> DEFAULT NULL,  data fin. Si null lo hará infinitamente
   enabled IN <BOOLEAN> DEFAULT FALSE,                   habilitado
   auto_drop IN <BOOLEAN> DEFAULT TRUE,                  borra el job una vez deshabilitado
)
DBMS_SCHEDULER.ALTER_JOB
DBMS_SCHEDULER.RUN_JOB (nombre)
DBMS_SCHEDULER.COPY_JOB (nombre1, nombre2)
DBMS_SCHEDULER.DROP_JOB (nombre)
DBMS_SCHEDULER.STOP_JOB (nombre)
DBMS_SCHEDULER.DISABLE (nombre,TRUE|FALSE)
DBMS_SCHEDULER.ENABLE (nombre)
*/
-- <repeat_interval>



-----------------------------------------------
-- Pratica: Jobs plsql_block y stored_procedure
-----------------------------------------------
/*
Haz un job que se ejecute todos los días que inserte en una tabla. Hazlo con un bloque 
plsql y con un procedimiento almacenado pasándole como parámetro el valor a insertar.
Mira que funcione
*/
Create table tareas(
   id number,
   fecha date
);

create or replace procedure insertTareasDeHR --()
as
   v_id number;
   v_fecha date;
BEGIN
   select nvl(max(id),0) into v_id from hr.tareas;
   select sysdate into v_fecha from dual;
   v_id := v_id + 1;
   insert into hr.tareas(id,fecha) 
      values(v_id,v_fecha);
END;
/

Begin
   DBMS_SCHEDULER.CREATE_JOB(
      job_name => 'MY_JOB', 
      job_type => 'PLSQL_BLOCK', 
      job_action => 'insertTareasDeHR', 
      repeat_interval => 'FREQ=DAILY', 
      enabled => FALSE
   );
END;
/

--------------------------
-- Practica: Jobs externos
--------------------------

BEGIN
   dbms_credential.create_credential (
   CREDENTIAL_NAME => 'AdministradorSO',
   USERNAME => 'Administrador',           -- usuario del S.O.
   PASSWORD => 'abc123.',
   DATABASE_ROLE => NULL,
   WINDOWS_DOMAIN => NULL,
   COMMENTS => 'Oracle OS User',
   ENABLED => true
   );
END;
/

Begin
Dbms_scheduler.create_job (
    job_name => 'BACKUP_FULLDB',
    job_type => 'EXTERNAL_SCRIPT',
     job_action=>'/oracle/app/oracle/product/12.1.0/dbhome_1/bin/expdp parfile=/export/home/oracle/expdp_tab.par',
    start_date => sysdate,
    Repeat_interval =>'FREQ=DAILY;BYHOUR=11; BYMINUTE=25',
    enabled => TRUE,
    credential_name=>'AdministradorSO');
end;
/

