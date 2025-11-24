# Etapa de arranque
- arranque del hardware
- gestor de arranque(BIOS/UEFI)
- kernel linux y unos no importante:
  - inittramfs: accede directorio raiz /
  - mount
- proceso de inicialización:
  - /sbin/init
  - servicios
- login en modo texto.
- sistamas de ventanas x(GUI)

# systemV y systemd
- systemV: command: /etc/init.d/[nombreServicio] [acction]
  - [acction] => [start|restart|reload|stop|status]
  - command: update-rc.d [-n] [-f(remove)] [basename] [dafaults|disable|[enable[S|2|3|4|5]]]
  - command: runlevel: informa del nivel de ejecución anterior y acutal.
  - command: init[numNivel]: cambiar el nivel de ejecución de un sistema en funcionamiento.
  - command: shutdown [-p(opcionDefect)|-r|-H|-c|-k]
  - command: halt => shutdown -h now
  - command: reboot => shutdown -r now
- systemd
  - Units: incluye service,socket,device,mount,automount,target,path,timer,snapshot,slice,scope
  - Sintaxe de Unit File:
    - [Unit] => informacion sobre la unit
    - [Install] => gestion de units
    - [Service] => especifica de un servicio
    - [Sockert] => sockert asociados a servicios
    - [Mount] => puntos de montaje
    - [Swap] => espacios de intercambio
    - [Timer] => gestion de eventos temporales
    - [Path] => monitorización del sistema de archivos
    - [Slice] => Gestion de asignación de recursos a los procesos.
  - command **systemctl**:
    - systemctl list-units
    - systemctl list-unit-files
    - systemctl start|stop|restart|reload|status|enable|disable|is-enabled [nameService]
    - systemctl default|get-default
    - systemctl isolate|set-default [nameService]
    - systemctl poweroff|reboot|suspend
  - command para show archivo registro de system md:
    - journalctl -b => show entradas del diario desde el ultimo reinicio
    - journalctl -u [nameUnit] => show entradas por esa unit
    - journalctl -k => solo mensaje del kernel
  
# automatizacion de tareas
- at [optiones] [tiempo]
  - [time]: [hora:minuto[AM|PM] | midnight(00:00) | noon(12:00) | teatime(16:00)] [MMDDYY|today|tomorrow] | now + [numeroDeTiempo][minutes|hours|days|weeks]
- cron
  - archivo: /etc/crontab
  - [minuto] [hora] [dia] [mes] [semana] [comando]
  - [0-59] [0-23] [1-31] [1-31] [1-12] [cualquier]
  - (*) indica cualquier valor
  - (,) indica varios valores
  - (-) indica rango
  - (/) ej: [hora]: */7 indica function cuando tiempo = 7:00,14:00
  - command: crontab [-u [usuario]] [-l|-e|-r]|[fichero]
  - -l: leer -e: edit -r: remove
- anacron
   - archivo: /etc/anacron
   - [periodo(unit:day)] [retardo(duracion)] [id_del_trabajo] [comando]

# command
```
# ps aux|-elf
# top
# htop
# pstree [proceso]
# pgrep / pidof [nombre de procesos]
# kill [proceso]
# jobs
# bg /fg [id_de_jobs]
# wait [proceso]
# time [opcion] ["command"] [command]
# nice [-n numNice|-numNice] [command]
# renice [ [+|-] numNice ] [-p pid] [-u user] [-g grp]
# nohup / &
```
### ps
#### sintaxe
- system V
   - -e: show todo procesos
   - -A: show todo precosos (igual que -e)
   - -l: lista forma largo
   - -f: lista forma completo
   - -u [usuario]: muestra procesos de un ususario
- BSD
   - a: muestra procesos de otro usuario
   - x: muestra tambien los procesos no sociado al terminal.
   - i: formata largo
   - u: formata orientado al ususario
   - m: muestra informacion relacionada con memoria
   - U [usuario]:  muestra procesos de un ususario
- GNU
   - --help: help
   - forest: igual que "treeps"
   - user [usuario]: procesoso de un usuario
####resulta
- S: estado R(run),T(stop),S(sleep),Z(zombie),D(dead)
- UID: ID de usuario
- PID: ID de proceso
- PPID: ID de proceso padre
- C: %CPU
- PRI: prioridad
- NI: prioridad pero - indica más + indica menos
- ADDR: direccion del proceso en memoria
- SZ: tamaño en bloques del proceso
- WCHAN: eventa esperando
- TTY: terminal asociada
- TIME: cantidad total de tiempo de procesador consumido
- CMD: comand que se ejecuta
- USER: nombre de usuario
- %CPU: % de CPU
- %MEM: % de memoria
- STIME/START: tiempo para empieza proceso
- VSZ/VIRT: cuando memoria virtual usado.
- RSS/RSZ: memoria residente
- STAT: estado

### top
- h ?: help
- q: salir
- k: kill un proceso(pro defecto)
- r: cambia prioridad de proceso
- f: seleciona informacion que quiere musetra
- u: proceso de usuario
- M: ordena por uso de memoria
- P: oraena por uso de CPU

### htop
igual que top pero más util

### pstree
-p muestra PID
-a Muestra los commandos
-u enseña su usuario

### pgrep/pidof [nombre de procesos]
enseña pid de un proceso

### kill
kill -l: lista de señal  
SIGHUP  / HUP / 1: Cuelgue de terminal o muerte del proceso controlador  
SIGINT / INT / 2 : Interrupción de teclado  (Ctrl-C) 
SIGKILL / KILL / 9 : Matar inmediatamente  
SIGTERM  / TERM / 15: Terminar (de forma controlada)  
SIGCONT / CONT / 18: Continuar.  
SIGSTOP  / STOP / 19: Parar (pero preparado para continuar ) 
SIGTSTP  / TSTP / 20 : Stop de teclado (Ctrl-Z)  

ejemplo  
kill -9 [proceso]: matar un proceso  
kill -KILL [proceso]: igual  
kill -sigkill [proceso]: igual  
kill -19 [proceso]: stop un proceso  

### jobs
muestra todo trabajo activos  
- -l: enseña PID
- -r: enseña los que esta ejecutando
- -s: enseña los que esta parado

El signo + indica el último trabajo que se ha parado. 
El signo - indica el penúltimo trabajo que se ha parado.

### bg / fg
cambiar un proceso(cond ID de "jobs") al segundo plano o primer plano.

### sleep
parar y no hcae nada

### wait
termina un proceso en segundo plano cuando acaba su proceso

### time 
time [option] command [commando]  
devuelve tiempos relativos a la ejecución   del   proceso   en   segundo  
real :tiempo transcurrido en la ejecución   
user:  tiempo que consume el proceso ejecutando su propiocódigo  
sys :   tiempo que se ha empleado Unix al servicio de la orden  

### nice 
nice [-n -[numero nice]] [command]  
cambia prioridad de proceso

### renice
renice [nuermo nice] [PID]  
cambia prioridad de porcoso sin parar  

### nohup y &
ambos funciona en segundo plano
nohup funcionado aunque salir usuario
& terminar cuando slir usuario

### los permiso especial de linux
**SUID(4)**: primer va ejecutar como su owner  
x(executa) va enseña como s(owner tiene permiso) o S(owner no tiene permiso, va probar con permiso de grubo o cliente)  
- sintax: chmod u+s [fichero] | chmod 4700 [fichero]
  
**SGID(2)**: primer va ejecutar como su owner grupo  
x(executa) va enseña como s(owner tiene permiso) o S(owner no tiene permiso, va probar con permiso de grubo o cliente)  
- sintax: chmod g+s [fichero] | chmod 2070 [fichero]

**Sticky(1)**: todo puede ejecutar, leer, escribir pero no puede eliminar.  
x(executa) va enseña como t(owner tiene permiso) o T(owner no tiene permiso, va probar con permiso de grubo o cliente)  
- sintax: chmod +t [fichero] | chmod 1007 [fichero]

### other command:
- uptime: muestra
  - Muestra la hora actual
  - el tiempo que el sistema lleva encendido
  - el número de usuarios conectados 
  - la carga media del sistema para los últimos 1, 5, y  15 minutos 
- w: muestra 
  - igual que uptime pero de cada usuario
- free: muestra
  - memoria libro
  - usada en sitema
  - usada de sawp
- sysstat: incluido
  - iostat: 
  - vmstat: estado de memoria y memoria virtual
  - mpstat: estado de cada procesador
  - pidstat: estado de procesos
  - sar: repolida,informa y guarda la informacion de actividad del sitema
