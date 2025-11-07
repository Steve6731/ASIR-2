```sql

SQL> create role medicos;

Rol creado.

SQL> create role enfermeros;

Rol creado.

SQL> create role administrativos;

Rol creado.

SQL> grant select any table to medicos;

Concesi¾n terminada correctamente.

SQL> grant select pacientes to enfermeros;
grant select pacientes to enfermeros
      *
ERROR en lÝnea 1:
ORA-00990: falta el privilegio o no es vßlido

SQL> grant select on pacientes to enfermeros;

Concesi¾n terminada correctamente.

SQL> grant select on ingresos to enfermeros;

Concesi¾n terminada correctamente.

SQL> grant select on tratamientos_realizados to enfermeros;

Concesi¾n terminada correctamente.

SQL> grant select on pacientes to administrativos;

Concesi¾n terminada correctamente.

SQL> grant select on ingresos to administrativos;

Concesi¾n terminada correctamente.

SQL> grant insert on pacientes to medicos;

Concesi¾n terminada correctamente.

SQL> grant insert on ingresos to medicos;

Concesi¾n terminada correctamente.

SQL> grant insert on tratamientos_realizados to medicos;

Concesi¾n terminada correctamente.

SQL> grant update on pacientes to medicos;

Concesi¾n terminada correctamente.

SQL> grant update on ingresos to medicos;

Concesi¾n terminada correctamente.

SQL> grant update on tratamientos_realizados to medicos;

Concesi¾n terminada correctamente.

SQL> revoke select on tratamientos_realizados from enfermeros;

Revocaci¾n terminada correctamente.

SQL> create view v_tratamientos_realizados as select id_tratamiento_realizado,id_ingreso,id_tratamiento,fecha_tratamiento from tratamientos_realizados;

Vista creada.

SQL> grant select on v_tratamientos_realizados to enfermeros;

Concesi¾n terminada correctamente.

SQL> grant insert,update on v_tratamientos_realizados to enfermeros;

Concesi¾n terminada correctamente.

SQL> grant insert,update on pacientes to enfermeros;

Concesi¾n terminada correctamente.

SQL> grant insert,update on ingresos to enfermeros;

Concesi¾n terminada correctamente.

SQL> grant insert on pacientes,ingresos to administrativos;
grant insert on pacientes,ingresos to administrativos
                         *
ERROR en lÝnea 1:
ORA-00905: falta una palabra clave


SQL> grant insert on pacientes to administrativos;

Concesi¾n terminada correctamente.

SQL> grant insert on ingresos to administrativos;

Concesi¾n terminada correctamente.

SQL> select grantee,privilege from dba_sys_privs where grantee like 'medicos';

ninguna fila seleccionada

SQL> select grantee,privilege from dba_sys_privs where grantee like 'MEDICOS';

GRANTEE        PRIVILEGE
-------------  ----------------------
MEDICOS        SELECT ANY TABLE


SQL> select grantee,privilege from dba_sys_privs where grantee = upper('medicos');

GRANTEE        PRIVILEGE
-------------  ----------------------
MEDICOS        SELECT ANY TABLE

SQL> select grantee,table_name,privilege from dba_tab_privs where grantee = upper('medicos');

GRANTEE      TABLE_NAME              PRIVILEGE
------------ ----------------------- ------------
MEDICOS      PACIENTES               INSERT
MEDICOS      INGRESOS                INSERT
MEDICOS      TRATAMIENTOS_REALIZADOS INSERT
MEDICOS      PACIENTES               UPDATE
MEDICOS      INGRESOS                UPDATE
MEDICOS      TRATAMIENTOS_REALIZADOS UPDATE


6 filas seleccionadas.
```