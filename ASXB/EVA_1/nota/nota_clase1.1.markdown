
contenedor: xe <= pluggable(xepdb1)

command cmd: 
> sqlplus
> SQL*Plus: Release 21.0.0.0.0 - Production on Jue Sep 11 10:02:48 2025
> Version 21.3.0.0.0
>
> Copyright (c) 1982, 2021, Oracle.  All rights reserved.

```cmd
Microsoft Windows [Versión 10.0.22000.434]
(c) Microsoft Corporation. Todos los derechos reservados.

C:\Users\Administrador>sqlplus sys as sysdba

SQL*Plus: Release 21.0.0.0.0 - Production on Jue Sep 11 10:06:04 2025
Version 21.3.0.0.0

Copyright (c) 1982, 2021, Oracle.  All rights reserved.

Introduzca la contrase±a:

Conectado a:
Oracle Database 21c Express Edition Release 21.0.0.0.0 - Production
Version 21.3.0.0.0

```cmd
SQL> show
SQL> show con_name

CON_NAME
------------------------------
CDB$ROOT
SQL> exit
```

```cmd
Microsoft Windows [Versión 10.0.22000.434]
(c) Microsoft Corporation. Todos los derechos reservados.

C:\Users\Administrador>sqlplus system @xepdb1

SQL*Plus: Release 21.0.0.0.0 - Production on Jue Sep 11 10:09:57 2025
Version 21.3.0.0.0
Copyright (c) 1982, 2021, Oracle.  All rights reserved.

Introduzca la contrase±a:
Hora de ┌ltima Conexi¾n Correcta: Jue Sep 11 2025 09:58:04 +02:00

Conectado a:
Oracle Database 21c Express Edition Release 21.0.0.0.0 - Production
Version 21.3.0.0.0

SP2-0310: no se ha podido abrir el archivo "xepdb1.sql"
SQL>
```