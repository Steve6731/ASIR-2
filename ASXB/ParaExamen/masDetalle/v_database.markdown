# Info sobre la base de datos:
- DBID: identificador único de la base de datos.
- NAME: nombre de la base de datos.
- CREATED: fecha de creación de Ia base de datos.
- RESETLOGS_CHANGE#: número de cambios en los reseteos de los registros logs.
- RESET_TIME: fecha de apertura de los resetlogs.
- LOG_MODE:   modo   en   el   que   se   generan   los   registros   logs:   NOARCHIVELOG,
- ARCHIVELOG o MANUAL
- CHECKPOINT_CHANGE# : numero SCN del último checkpoint.
- CONTROLFILE_TYPE:   Tipo   de   fichero   de   control:   STANDBY   para   modo   estándar,
- CLONE para bases de datos clonadas, BUCKUP para ficheros de control copiados o
- CREATED para ficheros creados, y CURRENT para el uso general
- CONTROLFILE_CREATED: fecha de creación del fichero de control.
- CONTROLFILE_TIME: fecha de Ia última copia del fichero de control.
- OPEN_MODE: el modo en el que se abre la base de datos (MOUNTED, READ WrlTE,
- READ ONLY, READ ONLY WITH APPLY).
- PROTECION_MODE:   modo   de   protección   (MAXIMUM   PROTECTION,   MAXlMUM
- AVAILABILITY, RESYNCHRIZATION, MAXIMUM PERFORMANCE, UNPROTECTED).
- DB_UNIOUE_NAME: nombre único de la base de datos.
- CDB: si la base de datos es un contener CDB.
  
[Back](../LosCommando.markdown)