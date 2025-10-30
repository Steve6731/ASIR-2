=== 📦 Docker Images ===  
ℹ️  As Docker images son 'plantillas' a partir das que podemos crear containers.  
```sh  
root@demo-system:~# docker image list  
  
REPOSITORY  TAG  IMAGE ID  CREATED  SIZE  
  
root@demo-system:~#  
```
ℹ️  Descargaremos a imaxe hello-world  
```sh
root@demo-system:~# docker pull hello-world  
  
Using default tag: latest  
latest: Pulling from library/hello-world  
17eec7bbc9d7: Pull complete  
Digest: sha256:6dc565aa630927052111f823c303948cf83670a3903ffa3849f1488ab517f891  
Status: Downloaded newer image for hello-world:latest  
docker.io/library/hello-world:latest  
  
root@demo-system:~#  
```  
📝 Estas son agora as imaxes no noso sistema:  
```sh  
root@demo-system:~# docker image list  
  
REPOSITORY  TAG  IMAGE ID  CREATED  SIZE  
hello-world  latest  1b44b5a3e06a  2 months ago  10.1kB  
  
root@demo-system:~#  
```  
ℹ️  A imaxe hello-world se descargou de internet do repositorio dockerhub  
  
ℹ️  Podemos borrar as imaxes que non estemos usando  
```sh  
root@demo-system:~# docker image rm hello-world  
  
Untagged: hello-world:latest  
Untagged: hello-world@sha256:6dc565aa630927052111f823c303948cf83670a3903ffa3849f1488ab517f891  
Deleted: sha256:1b44b5a3e06a9aae883e7bf25e45c100be0bb81a0e01b32de604f3ac44711634  
Deleted: sha256:53d204b3dc5ddbc129df4ce71996b8168711e211274c785de5e0d4eb68ec3851  
  
root@demo-system:~#  
```  
📝 Comprobamos a lista de imaxes:  
```sh  
root@demo-system:~# docker image list  
  
REPOSITORY  TAG  IMAGE ID  CREATED  SIZE  
  
root@demo-system:~#  
```  
root@demo-system:~#  
  
📝 Vexamos cono crear e arrancar un contedor paso a paso:  
  
⚙️  En primeiro lugar descargamos a imaxe  
```sh  
root@demo-system:~# docker pull hello-world  
  
Using default tag: latest  
latest: Pulling from library/hello-world  
17eec7bbc9d7: Pull complete  
Digest: sha256:6dc565aa630927052111f823c303948cf83670a3903ffa3849f1488ab517f891  
Status: Downloaded newer image for hello-world:latest  
docker.io/library/hello-world:latest  
  
root@demo-system:~#  
  
root@demo-system:~# docker image list  
  
REPOSITORY  TAG  IMAGE ID  CREATED  SIZE  
hello-world  latest  1b44b5a3e06a  2 months ago  10.1kB  
  
root@demo-system:~#  
```  
  
ℹ️  Para crear un contedor existen numerosas opcións nas que podemos configurar:  
🞂 A rede onde se conectará o docker (network)  
🞂 Os volumes de datos persistentes que debe usar  
🞂 O valor das variable de entorno que lle queremos pasar ao Docker  
🞂 a IP que queremos poñerlle  
...etc.  
Si non queremos nada diso, bastará cun simple docker create <imaxename>  
  
⚙️  Creamos o contedor a partir da imaxe hello-world.  
Si non poñemos un --name, docker xenera un nome automáticamente  
  
📝 Con este comando creamos un contedor chamado hello-world en estado 'Created'  
Poderemos velo con docker ps -a, xa que con docker ps so se listan os contedores en estado Up} (funcionando)  

```sh  
root@demo-system:~# docker create --name container-saudo hello-world  
  
61416a7b2e62071d65c296e852ff0a7e2a600079159f07c74dadf816d97b7f7a  
  
root@demo-system:~#  
  
root@demo-system:~# docker ps  
  
CONTAINER ID  IMAGE  COMMAND  CREATED  STATUS  PORTS  NAMES  
  
  
root@demo-system:~# docker ps -a  
  
CONTAINER ID  IMAGE  COMMAND  CREATED  STATUS  PORTS  NAMES  
61416a7b2e62  hello-world  "/hello"  2 seconds ago  Created  container-saudo  
  
root@demo-system:~#  
```  
ℹ️  Este docker en particular se limita a visualizar unha mensaxe e rematar  
Si queremos que un Docker poda usar mensaxes cando o arrancamos precisamos que poda usar STDOUT  
Si queremos poder introducir datos por teclado tamén precisará dipoñer dun tty e de STDIN  
as opcións son as seguintes:  
```sh  
root@demo-system:~# docker start --help  
  
  
Usage:  docker start [OPTIONS] CONTAINER [CONTAINER...]  
  
Start one or more stopped containers  
  
Aliases:  
  docker container start, docker start  
  
Options:  
  -a, --attach  Attach STDOUT/STDERR and forward signals  
  --detach-keys string  Override the key sequence for detaching a container  
  -i, --interactive  Attach container's STDIN  
  
root@demo-system:~#  
```

⚙️  Arrancamos o contedor 'container-saudo'. Deste xeito visualizará a mensaxe e rematará  
E necesario o -a para que a saida da execución salga na pantalla{}  
```sh  
root@demo-system:~# docker start -a container-saudo  
  
  
Hello from Docker!  
This message shows that your installation appears to be working correctly.  
  
To generate this message, Docker took the following steps:  
 1. The Docker client contacted the Docker daemon.  
 2. The Docker daemon pulled the "hello-world" image from the Docker Hub.  
  (amd64)  
 3. The Docker daemon created a new container from that image which runs the  
  executable that produces the output you are currently reading.  
 4. The Docker daemon streamed that output to the Docker client, which sent it  
  to your terminal.  
  
To try something more ambitious, you can run an Ubuntu container with:  
 $ docker run -it ubuntu bash  
  
Share images, automate workflows, and more with a free Docker ID:  
 https://hub.docker.com/  
  
For more examples and ideas, visit:  
 https://docs.docker.com/get-started/  
  
  
root@demo-system:~#  
  
Unha vez executado, o docker quedará en estado 'Exited'  
  
root@demo-system:~# docker ps  
  
CONTAINER ID  IMAGE  COMMAND  CREATED  STATUS  PORTS  NAMES  
  
root@demo-system:~#  
  
root@demo-system:~# docker ps -a  
  
CONTAINER ID  IMAGE  COMMAND  CREATED  STATUS  PORTS  NAMES  
61416a7b2e62  hello-world  "/hello"  24 seconds ago  Exited (0) 5 seconds ago  container-saudo  
  
root@demo-system:~#  
```
  
Podemos executar container-saudo usando docker start} as veces que queiramos  
xa que o comando docker start inicia a execución dun container que non está en estado Up  
```sh  
root@demo-system:~# docker start -a container-saudo  
  
  
Hello from Docker!  
This message shows that your installation appears to be working correctly.  
  
To generate this message, Docker took the following steps:  
 1. The Docker client contacted the Docker daemon.  
 2. The Docker daemon pulled the "hello-world" image from the Docker Hub.  
  (amd64)  
 3. The Docker daemon created a new container from that image which runs the  
  executable that produces the output you are currently reading.  
 4. The Docker daemon streamed that output to the Docker client, which sent it  
  to your terminal.  
  
To try something more ambitious, you can run an Ubuntu container with:  
 $ docker run -it ubuntu bash  
  
Share images, automate workflows, and more with a free Docker ID:  
 https://hub.docker.com/  
  
For more examples and ideas, visit:  
 https://docs.docker.com/get-started/  
  
  
root@demo-system:~#
```  
Outra vez ...  
```sh  
root@demo-system:~# docker start -a container-saudo  
  
  
Hello from Docker!  
This message shows that your installation appears to be working correctly.  
  
To generate this message, Docker took the following steps:  
 1. The Docker client contacted the Docker daemon.  
 2. The Docker daemon pulled the "hello-world" image from the Docker Hub.  
  (amd64)  
 3. The Docker daemon created a new container from that image which runs the  
  executable that produces the output you are currently reading.  
 4. The Docker daemon streamed that output to the Docker client, which sent it  
  to your terminal.  
  
To try something more ambitious, you can run an Ubuntu container with:  
 $ docker run -it ubuntu bash  
  
Share images, automate workflows, and more with a free Docker ID:  
 https://hub.docker.com/  
  
For more examples and ideas, visit:  
 https://docs.docker.com/get-started/  
  
  
root@demo-system:~#  
``` 
ℹ️   Si o contedor xa non é necesario, podemos eliminalo con docker rm  
Se perderán todos os datos, salvo os presentes nos volumes externos  
⚠️   Non se poden eliminar contedores en estado Up, e necesario paralos  
```sh  
root@demo-system:~# docker rm container-saudo  
  
container-saudo  
  
root@demo-system:~#  
  
root@demo-system:~# docker ps -a  
  
CONTAINER ID   IMAGE     COMMAND   CREATED   STATUS    PORTS     NAMES  
  
root@demo-system:~#  
```  
ℹ️   Todo este proceso (pull+create+start) se pode facer cun unico comando.  
docker run:  
🞂 Descarga a imaxe si é necesario (pull)  
🞂 Crea o contedor cos parámetros indicados (create)  
🞂 Inicia a execución do docker (start) cos parámetros indicados.  
ℹ️   Os parámetros de docker run son similares aos de docker create  
  
ℹ️   As imaxes de docker veñen cun 'entrypoint'.  
O 'entrypoint' é o comando que o contedor levará a cabo no arranque, asignándulle o PID 1  
 Cando ese comando finalice, finalizará a execución do docker.  
O entrypoint da imaxe hello-world é o comando /hello que simplemente visualiza a mensaxe  
  
Probaremos agora a despregar un sistema Debian.  
  
docker run ademais de descargar a imaxe si é necesario, crea e arranca o contedor.  
As imaxes 'estándar' de debian en DockerHub teñen como entrypoint unha sesión de bash.  
Si o contedor non ten asociado un tty o bash non pode aceptar entradas de teclado e simplemente o contedor finaliza.  
Si o conteder non ten asociado STDIN e se arranca en primeiro plano, se iniciará unha sesión no tty,  
pero non se poderán realizar entradas de datos e será necesario parar o docker dende outro terminal.  
  
Polo tanto, o mellor é crear o Docker con -t si non necesitamos interactividade inmediata e mantemos bash como entrypoint,  
 ou con -t -i si precisamos interactividade. Tamén debemos ter en conta que o tty so se pode asociar durane a creación  
 do docker. docker start, non ten parámetro -t    

  
**** ℹ️   Creación de docker debian paso a paso}: ****  
Neste exemplo, cambiamos o bash de entrypoint a sleep infinity que é literalmente 'non facer nada'  
iso nos permite prescindir do tty na creación do docker  
  
⚠️ Si non queremos que queden procesos 'zombies' debemos arrancar con --init  
Bash pode encargarse de atender a finalización dos procesos, pero si non o temos, precisamos --init  
  
🞂🐚 docker pull debian  
🞂🐚 docker create --init --entrypoint sleep  --hostname server01 --name debian-01 debian infinity  
🞂🐚 docker start debian-01  
  
⚙️  Descarga da imaxe:  
```sh  
root@demo-system:~# docker pull debian  
  
Using default tag: latest  
latest: Pulling from library/debian  
cae3b572364a: Pull complete  
Digest: sha256:fd8f5a1df07b5195613e4b9a0b6a947d3772a151b81975db27d47f093f60c6e6  
Status: Downloaded newer image for debian:latest  
docker.io/library/debian:latest  
  
root@demo-system:~# docker image list  
  
  
REPOSITORY    TAG       IMAGE ID       CREATED        SIZE  
debian        latest    61d0976aceca   2 weeks ago    120MB  
hello-world   latest    1b44b5a3e06a   2 months ago   10.1kB  
  
root@demo-system:~#  
  
⚙️  Creación do Docker (como sustituimos o bash por sleep infinity, xa non precisamos unha tty):  
A información que poñemos despois do nome da imaxe, son os datos que se lle pasan ao entrypoint (CMD).  
  
root@demo-system:~# docker create --init --entrypoint sleep --hostname server01 --name debian-01 debian infinity  
  
629fcf9703cd69acd0fa1b5bf255eec7d91a7689379a983f5e906ae764122877  
  
root@demo-system:~#  
  
root@demo-system:~# docker ps -a  
  
CONTAINER ID   IMAGE           COMMAND            CREATED                  STATUS    PORTS     NAMES  
629fcf9703cd   debian:latest   "sleep infinity"   Less than a second ago   Created             debian-01  
  
root@demo-system:~#              
```

⚙️  Arranque do Docker:  
```sh  
root@demo-system:~# docker start debian-01  
  
debian-01  
  
root@demo-system:~#  
  
root@demo-system:~# docker ps -a  
  
CONTAINER ID   IMAGE           COMMAND            CREATED          STATUS                  PORTS     NAMES  
629fcf9703cd   debian:latest   "sleep infinity"   11 seconds ago   Up Less than a second             debian-01  
  
root@demo-system:~#  
  
Podemos ver que o docker está en estado Up  
```  
**** ℹ️   Creación mediante o comando docker run ****  
  
O comando 'docker run' ten os mesmos parámetros que docker create e algún máis  
Estes comandos indican características que quedarán rexistradas na imaxe para o futuro  
Algunhas delas son:  
🞂-d : Indica que o docker pasa a segundo plano. Importante si o comando do entrypoint é bloqueante.  
🞂-i : Indica que o docker pode usar STDIN (entrada estándar).  
🞂-t : Indica que o docker dispón dun tty (terminal).  
  
Si non poñemos -t o entrypoint (bash) non obterá tty e o docker se parará de xeito inmediato xa que bash precisa dun tty.  
Si non especificamos -d e non conectamos a entrada de datos (-i) non poderemos facer entradas no contedor  
que quedará en primeiro plano executando o bash e polo tanto deixará bloqueada a terminal  
Si poñemos -t -i sin o -d, teremos unha sesión de bash con PID 1 que rematará cando fagamos exit finalizando entón a execución do dockeri  
  
EXEMPLOS  
ℹ️  Como esta sesión non especifica un 'entrypoint' se usa o entrypoint por defecto da imaxe (bash)  
Cando fagamos 'exit' finaliza a execución do entrypoint e o docker finaliza  
```sh  
root@demo-system:~# docker run -t  -i  --hostname server02 --name debian-02 debian  
  
root@server02:/# ls  
bin  boot  dev  etc  home  lib  lib64  media  mnt  opt  proc  root  run  sbin  srv  sys  tmp  usr  var  
root@server02:/# ps  
bash: ps: command not found  
root@server02:/# apt update  
Get:1 http://deb.debian.org/debian trixie InRelease [140 kB]  
Get:2 http://deb.debian.org/debian trixie-updates InRelease [47.3 kB]  
Get:3 http://deb.debian.org/debian-security trixie-security InRelease [43.4 kB]  
Get:4 http://deb.debian.org/debian trixie/main amd64 Packages [9669 kB]  
Get:5 http://deb.debian.org/debian trixie-updates/main amd64 Packages [5412 B]  
Get:6 http://deb.debian.org/debian-security trixie-security/main amd64 Packages [57.7 kB]  
Fetched 9963 kB in 1s (6771 kB/s)  
2 packages can be upgraded. Run 'apt list --upgradable' to see them.      
root@server02:/# apt install procps  

#...
#...
#...

root@server02:/# ps -a  
    PID TTY          TIME CMD  
    132 pts/0    00:00:00 ps  
root@server02:/# ps  
    PID TTY          TIME CMD  
      1 pts/0    00:00:00 bash  
    133 pts/0    00:00:00 ps  
root@server02:/# top    

root@server02:/# exit  
exit  
  
root@demo-system:~#  
  
root@demo-system:~# docker ps -a  
  
CONTAINER ID   IMAGE           COMMAND            CREATED              STATUS  PORTS     NAMES  
c3e916a0a9fe   debian          "bash"             28 seconds ago       Exited (0) 1 second ago             debian-02  
629fcf9703cd   debian:latest   "sleep infinity"   About a minute ago   Up 49 seconds  debian-01  
  
root@demo-system:~#  
  
Como se pode ver, o docker xa non está Up  
Será necesario inicialo de novo si se quere con docker start debian-02  
root@demo-system:~# docker start debian-02  
  
  
debian-02  
  
root@demo-system:~#  
  
root@demo-system:~# docker ps -a  
  
CONTAINER ID   IMAGE           COMMAND            CREATED              STATUS          PORTS     NAMES  
c3e916a0a9fe   debian          "bash"             32 seconds ago       Up 1 second               debian-02  
629fcf9703cd   debian:latest   "sleep infinity"   About a minute ago   Up 52 seconds             debian-01  
  
root@demo-system:~#    
```  
ℹ️   Este outro comando pasa o docker a segundo plano mantendo bash en execución.  
Polo tanto, poderemos executar no docker outros comandos mediante docker exec  
É necesario manter o -t xa que si non o bash falla e o docker non inicia, porque bash require un tty  
```sh  
root@demo-system:~# docker run -t -d --hostname server03 --name debian-03 debian  
  
30f87d024b9b845160e632775cb572f2b539df1a4033e62e40a9df2202bec219  
  
root@demo-system:~#  
  
  
root@demo-system:~# docker ps -a  
  
CONTAINER ID   IMAGE           COMMAND            CREATED              STATUS              PORTS     NAMES  
30f87d024b9b   debian          "bash"             1 second ago         Up 1 second                   debian-03  
c3e916a0a9fe   debian          "bash"             42 seconds ago       Up 11 seconds                 debian-02  
629fcf9703cd   debian:latest   "sleep infinity"   About a minute ago   Up About a minute             debian-01  
  
root@demo-system:~#  
```  
Como se pode ver, o docker está Up  
  
  
ℹ️   Este outro comando cambia o entrypoint a sleep co parámetro infinity  
Polo tanto non precisamos dun tty e poderemos executar no docker outros comandos mediante docker exec  
É necesario pasalo obrigatoriamente a segundo plano, porque o entrypoint e un 'sleep' infinito  
  
⚠️  Recordemos poñer --init   
```sh  
root@demo-system:~# docker run -d --init --hostname server04 --name debian-04 --entrypoint sleep debian infinity  
  
3c35787cee9469f629c214c58c1398dc0e9f369431994c53b671210a6ccbda02  
  
root@demo-system:~#  
  
  
root@demo-system:~# docker ps -a  
  
CONTAINER ID   IMAGE           COMMAND            CREATED              STATUS              PORTS     NAMES  
3c35787cee94   debian          "sleep infinity"   1 second ago         Up 1 second                   debian-04  
30f87d024b9b   debian          "bash"             13 seconds ago       Up 13 seconds                 debian-03  
c3e916a0a9fe   debian          "bash"             54 seconds ago       Up 23 seconds                 debian-02  
629fcf9703cd   debian:latest   "sleep infinity"   About a minute ago   Up About a minute             debian-01  
  
root@demo-system:~#  
  
```  
ℹ️   Imos facer un ps -a dentro dun container para ver os procesos en execución  
Para executar un comando, se utiliza docker exec <opcion> imaxe <comando>  
Para executar mais de un comando encadeado con && precisamos facelo dentro dunha nova shell  
de modo que o comando terá a forma: bash -c "..."  
Dependendo do comando, precisaremos pasar -i e/ou -t  
```sh  
root@demo-system:~# docker exec debian-03 ps -elf  
  
OCI runtime exec failed: exec failed: unable to start container process: exec: "ps": executable file not found in $PATH: unknown  
  
root@demo-system:~#  
```  
⚠️  O proceso falla porque o docker non ten instalado procps, que proporciona o comando ps  
  
ℹ️   O instalamos:  
```sh  
root@demo-system:~# docker exec -it debian-03 bash -c "apt update && apt install procps"
#...
#...
#...
root@demo-system:~# docker exec -it debian-04 bash -c "apt update && apt install procps" 
#...
#...
#...  
```  
ℹ️   O intentamos de novo  
```sh  
root@demo-system:~# docker exec debian-03 ps -elf  
  
F S UID          PID    PPID  C PRI  NI ADDR SZ WCHAN  STIME TTY          TIME CMD  
4 S root           1       0  0  80   0 -  1083 do_sel 18:46 pts/0    00:00:00 bash  
4 R root         140       0 50  80   0 -  1611 -      18:47 ?        00:00:00 ps -elf  
  
root@demo-system:~#  
  
root@demo-system:~# docker exec debian-04 ps -elf  
  
F S UID          PID    PPID  C PRI  NI ADDR SZ WCHAN  STIME TTY          TIME CMD  
4 S root           1       0  0  80   0 -   260 do_sig 18:46 pts/0    00:00:00 /sbin/docker-init -- sleep infinity  
4 S root           7       1  0  80   0 -   647 do_sys 18:46 pts/0    00:00:00 sleep infinity  
4 R root         135       0 50  80   0 -  1611 -      18:47 ?        00:00:00 ps -elf  
  
root@demo-system:~#  
  
```  
Podemos comprobar que os docker seguen en execución  
```sh  
root@demo-system:~# docker ps -a  
  
CONTAINER ID   IMAGE           COMMAND            CREATED              STATUS              PORTS     NAMES  
3c35787cee94   debian          "sleep infinity"   About a minute ago   Up 59 seconds                 debian-04  
30f87d024b9b   debian          "bash"             About a minute ago   Up About a minute             debian-03  
c3e916a0a9fe   debian          "bash"             About a minute ago   Up About a minute             debian-02  
629fcf9703cd   debian:latest   "sleep infinity"   2 minutes ago        Up 2 minutes                  debian-01  
  
root@demo-system:~#  
```  
ℹ️   Por suposto podemos lanzar fácilmente todos os docker que queiramos.  
Estarán todos conectados a docker0 e o sistema lles asignará unha IP  
```sh  
root@demo-system:~# docker run -t  -d  --hostname server05 --name debian-04 debian  
391d7a26f12e46b35f58696e76559254953b0807a68866aa4d94a204960aaa1d  
root@demo-system:~# docker run -t  -d  --hostname server06 --name debian-05 debian  
27508cc016f083e8e46cff1e1b87236a5eccab0c33cdeef361a853c2648a85d9  
root@demo-system:~# docker run -t  -d  --hostname server07 --name debian-06 debian  
f19a7f6c7e9aeebe85d670d05e1e3a3a891d03d39fd864a00bcd4de03953647c  
root@demo-system:~# docker run -t  -d  --hostname server08 --name debian-07 debian  
bde8b6fe9667a755211af98d9c4835a54c19f93e4af956f6a26be1708f245dc3  
root@demo-system:~# docker run -t  -d  --hostname server09 --name debian-08 debian  
a987bc63938e9734fefe6a4edfa149e4e04e36f464040e859f3356a6e29e14fe  
root@demo-system:~# docker run -t  -d  --hostname server10 --name debian-08 debian  
a470ddec99f5f351fc4ac511ea6028c84b7c334af0465615007cb8472c553dbe  
root@demo-system:~#
root@demo-system:~# docker ps -a  
  
CONTAINER ID   IMAGE           COMMAND            CREATED              STATUS              PORTS     NAMES  
a470ddec99f5   debian          "bash"             3 seconds ago        Up 3 seconds                  debian-10  
a987bc63938e   debian          "bash"             3 seconds ago        Up 3 seconds                  debian-09  
bde8b6fe9667   debian          "bash"             4 seconds ago        Up 3 seconds                  debian-08  
f19a7f6c7e9a   debian          "bash"             4 seconds ago        Up 3 seconds                  debian-07  
27508cc016f0   debian          "bash"             4 seconds ago        Up 4 seconds                  debian-06  
391d7a26f12e   debian          "bash"             4 seconds ago        Up 4 seconds                  debian-05  
3c35787cee94   debian          "sleep infinity"   About a minute ago   Up About a minute             debian-04  
30f87d024b9b   debian          "bash"             About a minute ago   Up About a minute             debian-03  
c3e916a0a9fe   debian          "bash"             2 minutes ago        Up About a minute             debian-02  
629fcf9703cd   debian:latest   "sleep infinity"   2 minutes ago        Up 2 minutes                  debian-01  
  
root@demo-system:~#     
```                 
  
📝 Por suposto si queremos podemos levar a cabo unha sesión interactiva  
Basta con executar un bash e indicar que queremos unha sesión interactiva con tty  
```sh  
root@demo-system:~# docker exec -t  -i debian-04 /bin/bash  
  
root@server04:/# ls  
bin  boot  dev  etc  home  lib  lib64  media  mnt  opt  proc  root  run  sbin  srv  sys  tmp  usr  var  
root@server04:/# apt update  
Hit:1 http://deb.debian.org/debian trixie InRelease  
Hit:2 http://deb.debian.org/debian trixie-updates InRelease  
Hit:3 http://deb.debian.org/debian-security trixie-security InRelease  
2 packages can be upgraded. Run 'apt list --upgradable' to see them.  
root@server04:/# ip route  show  
bash: ip: command not found  
root@server04:/# apt instal iproute2   
#...
#...
#... 
root@server04:/# ip route show  
default via 172.17.0.1 dev eth0  
172.17.0.0/16 dev eth0 proto kernel scope link src 172.17.0.5  
root@server04:/# exit  
exit  
```
ℹ️   Con docker ps -q ou docker ps -aq obteremos soamente os ID dos Docker  
Iso nos permite:  
  
Parar todos os Docker en execución:  
```sh  
root@demo-system:~# docker ps -a  
  
CONTAINER ID   IMAGE           COMMAND            CREATED              STATUS              PORTS     NAMES  
a470ddec99f5   debian          "bash"             40 seconds ago       Up 39 seconds                 debian-10  
a987bc63938e   debian          "bash"             40 seconds ago       Up 39 seconds                 debian-09  
bde8b6fe9667   debian          "bash"             41 seconds ago       Up 40 seconds                 debian-08  
f19a7f6c7e9a   debian          "bash"             41 seconds ago       Up 40 seconds                 debian-07  
27508cc016f0   debian          "bash"             41 seconds ago       Up 40 seconds                 debian-06  
391d7a26f12e   debian          "bash"             41 seconds ago       Up 41 seconds                 debian-05  
3c35787cee94   debian          "sleep infinity"   About a minute ago   Up About a minute             debian-04  
30f87d024b9b   debian          "bash"             About a minute ago   Up About a minute             debian-03  
c3e916a0a9fe   debian          "bash"             2 minutes ago        Up 2 minutes                  debian-02  
629fcf9703cd   debian:latest   "sleep infinity"   3 minutes ago        Up 2 minutes                  debian-01  
  
root@demo-system:~#  
  
root@demo-system:~# docker stop $(docker ps -q) 
a470ddec99f5  
a987bc63938e  
bde8b6fe9667  
f19a7f6c7e9a  
27508cc016f0  
391d7a26f12e  
3c35787cee94  
30f87d024b9b  
c3e916a0a9fe  
629fcf9703cd  
  
root@demo-system:~#  
  
root@demo-system:~# docker ps -a  
  
CONTAINER ID   IMAGE           COMMAND            CREATED              STATUS  PORTS     NAMES  
a470ddec99f5   debian          "bash"             54 seconds ago       Exited (137) 2 seconds ago              debian-10  
a987bc63938e   debian          "bash"             54 seconds ago       Exited (137) 2 seconds ago              debian-09  
bde8b6fe9667   debian          "bash"             55 seconds ago       Exited (137) 2 seconds ago              debian-08  
f19a7f6c7e9a   debian          "bash"             55 seconds ago       Exited (137) 2 seconds ago              debian-07  
27508cc016f0   debian          "bash"             55 seconds ago       Exited (137) 2 seconds ago              debian-06  
391d7a26f12e   debian          "bash"             55 seconds ago       Exited (137) 2 seconds ago              debian-05  
3c35787cee94   debian          "sleep infinity"   About a minute ago   Exited (143) 12 seconds ago             debian-04  
30f87d024b9b   debian          "bash"             2 minutes ago        Exited (137) 2 seconds ago              debian-03  
c3e916a0a9fe   debian          "bash"             2 minutes ago        Exited (137) 2 seconds ago              debian-02  
629fcf9703cd   debian:latest   "sleep infinity"   3 minutes ago        Exited (143) 12 seconds ago             debian-01  
  
root@demo-system:~#  
  
Eliminar todos os docker que non estan en execución:  
root@demo-system:~# docker remove $(docker ps -aq)  
  
a470ddec99f5  
a987bc63938e  
bde8b6fe9667  
f19a7f6c7e9a  
27508cc016f0  
391d7a26f12e  
3c35787cee94  
30f87d024b9b  
c3e916a0a9fe  
629fcf9703cd    
  
root@demo-system:~# docker ps -a  
  
CONTAINER ID   IMAGE     COMMAND   CREATED   STATUS    PORTS     NAMES  
  
root@demo-system:~#  
📝 De xeito similar podemos eliminar todas as imaxes:  
  
root@demo-system:~# docker image list  
  
REPOSITORY    TAG       IMAGE ID       CREATED        SIZE  
debian        latest    61d0976aceca   2 weeks ago    120MB  
hello-world   latest    1b44b5a3e06a   2 months ago   10.1kB  
  
root@demo-system:~#  
  
root@demo-system:~# docker image remove $(docker image list -q)  
  
Untagged: debian:latest  
Untagged: debian@sha256:fd8f5a1df07b5195613e4b9a0b6a947d3772a151b81975db27d47f093f60c6e6  
Deleted: sha256:61d0976aceca49cd8c5a3fb6787ddb08bd43a8f998fef45bf3d1050420161be7  
Deleted: sha256:a5ec5ec9d16c5551ce8889cbc03af0609b92cf8a8d60b32e72a7eabb8378eaec  
Untagged: hello-world:latest  
Untagged: hello-world@sha256:6dc565aa630927052111f823c303948cf83670a3903ffa3849f1488ab517f891  
Deleted: sha256:1b44b5a3e06a9aae883e7bf25e45c100be0bb81a0e01b32de604f3ac44711634  
Deleted: sha256:53d204b3dc5ddbc129df4ce71996b8168711e211274c785de5e0d4eb68ec3851  
  
root@demo-system:~#  
  
root@demo-system:~# docker image list  
  
REPOSITORY   TAG       IMAGE ID   CREATED   SIZE  
  
root@demo-system:~#  
```  
