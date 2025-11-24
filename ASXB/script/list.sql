SPOOL c:\oradata\salida.txt

Select object_name from dba_objects
      where OWNER='&1';

SPOOL OFF

quit
-- este es un script
-- sqlplus system/abc123.@xepdb1 @C:\Users\Administrador\Desktop\list.sql HR