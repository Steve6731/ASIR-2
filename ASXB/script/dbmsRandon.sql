Declare
   nombre varchar2(59) ;
BEGIN
   nombre := dbms_random.string('a',5);
   dbms_output.put_line(nombre);
END;