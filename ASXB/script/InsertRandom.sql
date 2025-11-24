Declare
   V_nombre varchar2(59);
BEGIN
   for i in 2..102 loop
      V_nombre := dbms_random.string('a',8);
      insert into pruebainstorage(id,nombre)
         values(i,V_nombre);
   end loop;
END;
/
exit

select count(*) from pruebainstorage;

desc dba_data_files;

select extent_id,dba_extents.blocks*2048 as tamanho,file_name,dba_extents.tablespace_name
   from dba_extents join dba_data_files using(file_id)
   where dba_extents.TABLESPACE_NAME != 'SYSTEM'
   ;

Select * from cdb_free_space;