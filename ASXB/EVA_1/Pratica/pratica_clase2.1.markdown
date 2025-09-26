```sql
SQL> select group#,status from v$log;

    GROUP# STATUS
---------- ----------------
         1 CURRENT
         2 INACTIVE
         3 INACTIVE

SQL> select group#,status,members from v$log;

    GROUP# STATUS              MEMBERS
---------- ---------------- ----------
         1 CURRENT                   1
         2 INACTIVE                  1
         3 INACTIVE                  1

SQL> desc v$log_file
ERROR:
ORA-04043: el objeto v$log_file no existe


SQL> desc v$logfile
 Nombre                                    ┐Nulo?   Tipo
 ----------------------------------------- -------- ----------------------------
 GROUP#                                             NUMBER
 STATUS                                             VARCHAR2(7)
 TYPE                                               VARCHAR2(7)
 MEMBER                                             VARCHAR2(513)
 IS_RECOVERY_DEST_FILE                              VARCHAR2(3)
 CON_ID                                             NUMBER

SQL> col menber forma a80
SQL> select group#,members from v$log; v$logfile;
select group#,members from v$log; v$logfile
                                *
ERROR en lÝnea 1:
ORA-00933: comando SQL no terminado correctamente


SQL> select group#,members from v$logfile;
select group#,members from v$logfile
              *
ERROR en lÝnea 1:
ORA-00904: "MEMBERS": identificador no vßlido


SQL> select group#,member from v$logfile;

    GROUP#
----------
MEMBER
--------------------------------------------------------------------------------
         3
C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\REDO03.LOG

         2
C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\REDO02.LOG

         1
C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\REDO01.LOG


SQL> col member forma a80
SQL> select group#,member from v$logfile;

    GROUP#
----------
MEMBER
--------------------------------------------------------------------------------
         3
C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\REDO03.LOG

         2
C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\REDO02.LOG

         1
C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\REDO01.LOG


SQL> col member forma a50
SQL> select group#,member from v$logfile;

    GROUP# MEMBER
---------- --------------------------------------------------
         3 C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\REDO03
           .LOG

         2 C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\REDO02
           .LOG

         1 C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\REDO01
           .LOG


SQL> select group#,a.member,b.status from v$logfile a join v$log b using (group#);

    GROUP# MEMBER                                             STATUS
---------- -------------------------------------------------- ----------------
         3 C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\REDO03 INACTIVE
           .LOG

         2 C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\REDO02 INACTIVE
           .LOG

         1 C:\APP\ADMINISTRADOR\PRODUCT\21C\ORADATA\XE\REDO01 CURRENT
           .LOG


SQL> alter database add logfile member 'C:\redolog\REDO0301.log' to group 3;

Base de datos modificada.

SQL> alter database add logfile member 'C:\redolog\REDO0201.log' to group 2;

Base de datos modificada.

SQL>
```