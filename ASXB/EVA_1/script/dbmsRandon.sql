Declare
   nombre varchar2(59) := dbms_random.string('a',5);
BEGIN
   dbms_output.put_line(nombre);
END;