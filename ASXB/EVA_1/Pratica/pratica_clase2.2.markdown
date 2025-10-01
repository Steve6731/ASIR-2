Paso para arranca oracle:  
- lee el spfile (crea la instancia) entiende donde esta controfile  
  - lee los controfile entiende donde estan los fichero datos, log...?  
    - abre los fichero datos, log...  

Spfile: es un fichero binario y no puede configurar(dentro hay parametro de oracle y ruta de control file.).  
pfile: puede configurar este para cambiar configuracion de Spfile.  

Para obtener vario controfile  
1. Shutdown immediate --apaga oracle  
2. copiar el archivo a donde quira  
3. pongo la ruta en el spfile  
4. ejecuta: create pfile from spfile
5. startup

no comento: ALTER SYSTEM SET CONTROL_FILES = ’e:\oradata\tienda\contr0102.ctl’ ,’d:\oradata\tienda\controlel.ctl’, SCOPE=SPFILE;(Pero puede hacelo sin apaga oracle.)  
sintaxe de Alter system: ALTER SYSTEM SET parámetro=valor [DEFERRED] [SCOPE=SPFILE | MEMORY | BOTH]; 

forma para arranca:  
startup nomount (para ir abajo: alter database mount )  
startup mount   (para ir abajo: alter database open )  
startup [open]  (para volver: solo puede shutdown)  

## registro de los que hago
```sql
SQL> shutdown immediante
SP2-0717: opci¾n SHUTDOWN no vßlida
SQL> shutdown immediate
Base de datos cerrada.
Base de datos desmontada.
Instancia ORACLE cerrada.
SQL> create pfile form spfile;
create pfile form spfile
             *
ERROR en lÝnea 1:
ORA-00923: FROM keyword not found where expected


SQL> create pfile from spfile;

File created.

SQL> create spfile from pfile;

File created.

SQL> startup
ORACLE instance started.

Total System Global Area 1291844832 bytes
Fixed Size                  9854176 bytes
Variable Size             402653184 bytes
Database Buffers          872415232 bytes
Redo Buffers                6922240 bytes
ORA-00205: error al identificar el archivo de control, compruebe el log de
alertas para obtener mas informacion


SQL> startup nomount
ORA-01081: no se puede iniciar ORACLE cuando ya se esta ejecutando - cierrelo primero
SQL> select name form v$controlfile;
select name form v$controlfile
                 *
ERROR en lÝnea 1:
ORA-00923: palabra clave FROM no encontrada donde se esperaba


SQL> select name from v$controlfile;

ninguna fila seleccionada

SQL> shutdown immediate
ORA-01507: base de datos sin montar


Instancia ORACLE cerrada.
SQL> create spfile from pfile;

File created.

SQL> startup
ORACLE instance started.

Total System Global Area 1291844832 bytes
Fixed Size                  9854176 bytes
Variable Size             402653184 bytes
Database Buffers          872415232 bytes
Redo Buffers                6922240 bytes
Base de datos montada.
Base de datos abierta.
SQL> select name from v$controlfile;

NAME
--------------------------------------------------------------------------------
E:\BACKUP_CONTROLFILE\CONTROL01.CTL
E:\BACKUP_CONTROLFILE\CONTROL02.CTL

SQL>
```