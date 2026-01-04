
/*
AUDIT <acction>|<consulta>|NETWORK ON <object> | BY <username>
     BY SESSION | ACCESS
     WHENEVER [NOT] SUCCESSFUL;
otro ejemplo:
- Audit all on matricula by session;
- Audit insert update on profesor by access;
*/


--------------------------------
-- Practica: Auditoria de sesion
--------------------------------
-- Habilita la auditoría y consulta la tabla AUD$ y la vista 
-- DBA_AUDIT_TRAIL y DBA_AUDIT_SESSION

-- user: XEPDB1 SYS
-- para ver si funciona auditoria
SHOW PARAMETER audit_trail;
SELECT name, value FROM v$parameter 
   WHERE name = 'audit_trail';
/* 
si es 'DB' significa está funcionando
admás puedeser:
   NONE：no funciona
   OS: escribe con SYSTEMA OPERATIVO
   DB,EXTENDED：DB pero con todo informacion
   XML：escribe con SYSTEMA OPERATIVA en formato XML
   XML,EXTENDED：xml con todo informacion
*/

-- commando para activa auditoria:
ALTER SYSTEM SET audit_trail = DB SCOPE = SPFILE;
-- tambien necesita reinicia base de dato;
shutdown IMMEDIATE;
startup;

-- 'audit session' solo va registra los conneccion y logging
Audit session; -- asi solo va registra accion de contenerdor donde ejecuta ese commando como CDB:ROOT o XEPDB1
audit session by access CONTAINER=ALL; -- para registra todo contenedor pero a mi no funciona
noaudit session;
audit session whenever not SUCCESSFUL;
audit session whenever SUCCESSFUL;

-- para ver registro
select * from DBA_AUDIT_SESSION; -- solo registro de session
-- de todo
SELECT * FROM sys.aud$;
select * from DBA_AUDIT_TRAIL;

-- ver auditoria activo
SELECT * FROM dba_stmt_audit_opts; -- de session
SELECT * FROM dba_priv_audit_opts; -- de previleges
SELECT * FROM dba_obj_audit_opts; -- de objeto

-- Mira en la vista V$session y mata la sesión del usuario con
-- SQL> ALTER SYSTEM KILL SESSION 'sid,serial#' IMMEDIATE;

select username,sid,serial# from v$session;
ALTER system kill session '192,31804' IMMEDIATE;


--------------------------------
-- Practica: Auditoria Extendida
--------------------------------
/*
Supón este escenario: Una aplicación está funcionando mal, se ejecuta con el usuario de la base de datos tienda.
No sabemos que sentencias están fallando, así que vamos a auditarla
Habilita la auditoria para los fallos
*/
-- hay error si audit conjunto por eso audit vario
audit select table by access;
audit insert table, delete table by access;
audit execute procedure by access;

select username,action_name,owner||'.'||obj_name as objeto,sql_text from dba_audit_trail;

-- ver auditoria activo
SELECT * FROM dba_stmt_audit_opts; -- de session
SELECT * FROM dba_priv_audit_opts; -- de previleges
SELECT * FROM dba_obj_audit_opts; -- de objeto


grant all PRIVILEGES to hr;

-- user: XEPDB1 HR
create table foo( 
   foo number, 
   name varchar2(64)
);
drop table foo;
commit;

-------------------------------------
-- Practica: deshabilita la auditoria
-------------------------------------

-- ver auditoria activo
SELECT * FROM dba_stmt_audit_opts; -- de session
SELECT * FROM dba_priv_audit_opts; -- de previleges
SELECT * FROM dba_obj_audit_opts; -- de objeto

noaudit select table,insert table;
noaudit delete table;
noaudit execute procedure;
noaudit session;
-- si aun no desactivo, pueba si puede descacitva otro en cdb$root

select * from sys.aud$;

----------------
-- Practica: FGA
----------------



----------------
-- Practiva: FVQ
----------------



----------------
-- Practica: FTQ
----------------
