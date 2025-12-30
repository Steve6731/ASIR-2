### 关于v$instance
- INSTANCE_NUMBER: identificador numérico de la instancia.
- INSTANCE_NAME: nombre de la instancia.
- HOST_NAME: nombre host de la máquina en la que se lleva a cabo la instancia.
- VERSION: versión de la base de datos.
- STARTUP_TIME: hora en la que se inició la instancia.
- STATUS: muestra el estado de la instancia,abierto o cerrado: STARTED,MOUNTED,OPEN u OPEN MIGRATE para opciones de actualización y de desactualización (ALTER 
- DATABASE UPGRADEIDOWNGRADE).
- PARALLEL: si la instancia se ejecuta en paralelo con otras bases de datos,usa Clusters.
- THREAD#: número del hilo abierto de redo por la instancia.
- ARCHIVER: estado del archivado automático (STOPPED,STARTED o FAILED).
- LOG_SWITCH_WAIT: evento ocurrido en una basculación (ARCHIVE LOG,CLEAR LOG,CHECKPOINT).
- LOGINS: indica si está en modo ALLOWED,o si solo los administradores RESTRICTED.
- SHUTDOWN_PENDING: indica si está en espera de una parada de la base de datos.
- DATABASE_STATUS: indica el estado (ACTIVE,SUSPEND,INSTANCE RECOVERY).
- BLOCKED: indica si todos los servicios están bloqueados.
- INSTANCE_MODE: muestra el modo de la instancia actual : REGULAR si usa o no RAC; READ MOSTLY para RAC con pocas escrituras; o READ ONLY para RAC de solo lectura.
- DATABASE_TYPE: RAC si usa múltiples instancias,RACONENODE para RAC de un solo nodo,SINGLE si es una instancia normal,o UNKNOWN.

```sql
SELECT INSTANCE_NAME,STARTUP_TIME,
   STATUS,ARCHIVER,LOG_SWITCH_WAIT,
   DATABASE_STATUS,LOGINS,INSTANCE_MODE 
   FROM V$INSTANCE;
```

[Back](../LosCommando.markdown)