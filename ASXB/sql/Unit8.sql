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
select * from hr.tareas;
/
BEGIN
    DBMS_SCHEDULER.CREATE_PROGRAM(
        PROGRAM_NAME => 'MY_PROGRAM'
        ,PROGRAM_TYPE => 'STORED_PROCEDURE'
        ,PROGRAM_ACTION => 'insertTareasDeHR'
        ,ENABLED =>  TRUE
        ,COMMENTS => 'PROGRAMA PARA MI PROCEDIMIENTO'
    );
    
    DBMS_SCHEDULER.CREATE_JOB (
        job_name => 'MY_JOB',
        PROGRAM_NAME => 'MY_PROGRAM'
    );
END;
/

Begin
   DBMS_SCHEDULER.drop_JOB(
      job_name => 'MY_JOB'
   );
   DBMS_SCHEDULER.drop_program(
      program_name => 'MY_PROGRAM'
   );
END;
/

select * from hr.tareas;
exec insertTareasDeHR();

BEGIN 
   DBMS_SCHEDULER.RUN_JOB ('MY_JOB'); 
END;
/
--------------------------
-- Practica: Jobs externos
--------------------------
create or replace directory backups as 'C:\backup';
SELECT * FROM dba_directories WHERE directory_name = 'BACKUPS';
/* cat expdp_tab.par
userid=system/oracle@XEPDB1
dumpfile=FULL_DB.dmp
logfile=FULL_DB.log
directory=backups
full=y
*/

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
      job_action=>'C:\app\Administrador\product\21c\dbhomeXE\bin\expdp.exe parfile=C:\parfile\parfile.par',
      start_date => sysdate,
      Repeat_interval =>'FREQ=DAILY;BYHOUR=11; BYMINUTE=25',
      enabled => TRUE,
      credential_name=>'AdministradorSO');
end;
/

Begin
   DBMS_SCHEDULER.drop_JOB(
      job_name => 'BACKUP_FULLDB'
   );
END;
/

BEGIN 
   DBMS_SCHEDULER.RUN_JOB ('BACKUP_FULLDB'); 
END;

/