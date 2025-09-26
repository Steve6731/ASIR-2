create or replace procedure listatablas(P_owner varchar2) as
   cursor c_tabla is select table_name from dba_tables where owner = P_owner;
begin
   for v_tabla in c_tabla loop
      DBMS_output.put_line(V_tabla.table_name);
   end loop;
end;
/
execute listatablas('HR');