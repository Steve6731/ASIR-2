select rtrim(lpad(' ',2*level)||
   rtrim(operation)||' '||
   rtrim(options)||' '||
   object_name) query_plan
From plan_table connect by prior id=parent_id
Start with id=0;


--practica indices
--Crea una tabla con 100000 registros
create table test as select level id, 'nombre_'||level nombre from dual connect by level<=100000;
desc test;
select * from test;
--Habilita el autotrace
set autotrace traceonly explain;
--Mira el plan de ejecución y el coste en I/O 
select * from test where id=1000; --sin crea indice: 0.021s y hash value: 1357081020
create index ix_test on test(ID);
select * from test where id=1000; --crea un indice: 0.039s
ANALYZE INDEX ix_test VALIDATE STRUCTURE;
select * from test where id=1000; --un indice añalizado: 0.024s y hash value: 449745006
drop index ix_test;
--crea dos tables
--tabla1(id number, nombre varchar2(128), sexo char(1))
create table tabla1(
   id number, 
   nombre varchar2(128), 
   sexo char(1)
);
desc tabla1;

--tabla2(id number,nombre varchar2(128), t1 number references tabla1(id));
create table tabla2(
   id number,
   nombre varchar2(128), 
   t1 number
);
desc tabla2;
select * from tabla1;

DECLARE
   strSexo char(1);
   numSex number;
BEGIN
   
   for i in 1..1000000 loop
      numSex := DBMS_RANDOM.VALUE(1, 2);
      if numSex != 1 THEN
         strSexo := 'M';
      else
         strSexo := 'F';
      end if;
      update tabla1 set sexo = strSexo where id = i;
   end loop;

END;

/