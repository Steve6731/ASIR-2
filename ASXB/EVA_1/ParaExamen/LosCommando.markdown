## conectar al sqlplus
```sql
sqlplus [user]/[passwd][@contenedor] [as (sysdba | sysper)]
-- para conectar al pluggable tiene que añadir en TNSNAMES.ORA
```
## ejemplo de un pluggable para TNSNAMES.ORA
```
XE =
  (DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-RO2VM93)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = XE)
    )
  )
```

## unos Commando para comprobar
```sql
sql> show con_name -- nombre de contenedor
```
prueba los comandos de PowerShell indicados a continuacion. Con cada tarea haz una captura de pantalla y añade una breve explicacion de su funcionalidad 