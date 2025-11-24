  
================================  
📦  Xestión de Imaxes Docker  
================================  
  
📝  As imaxes docker son un molde a partir do que se crean os Docker. Normalmente están aloxadas en DockerHub  
  
ℹ️   Podemos descargar imaxes de DockerHub mediante o comando docker image pull ou docker pull  
  
 🞂  Listamos as imaxes  
  
root@demo-system:~#  docker image list  
REPOSITORY   TAG       IMAGE ID   CREATED   SIZE  
  
root@demo-system:~#  
  
 🞂  Baixamos unha imaxe de nginx  
  
root@demo-system:~#  docker image pull nginx  
Using default tag: latest  
latest: Pulling from library/nginx  
8c7716127147: Pull complete  
250b90fb2b9a: Pull complete  
5d8ea9f4c626: Pull complete  
58d144c4badd: Pull complete  
b459da543435: Pull complete  
8da8ed3552af: Pull complete  
54e822d8ee0c: Pull complete  
Digest: sha256:3b7732505933ca591ce4a6d860cb713ad96a3176b82f7979a8dfa9973486a0d6  
Status: Downloaded newer image for nginx:latest  
docker.io/library/nginx:latest  
  
root@demo-system:~#  ✅  Como vemos, temos descargada a imaxe de nginx  
root@demo-system:~#  docker image list  
REPOSITORY   TAG       IMAGE ID       CREATED       SIZE  
nginx        latest    07ccdb783875   12 days ago   160MB  
  
root@demo-system:~#  
  
⚠️  Si nos fixamos nas columnas, observamos unha columna TAG.  
ℹ️   Detrás do seu nome, as imaxes poden levar unha etiqueta ou tag, como por exemplo debian:latest  
ℹ️   Temén poden levar unha chave ou digest -> debian:latest@sha256:61d0976aceca49cd8c5a3fb6787ddb08bd43a8f998fef45bf3d1050420161be7  
  
⚠️  E posible cambiar o etiquetado das imaxes para facer diferentes versións:  
  
root@demo-system:~#  docker image tag nginx nginx:myversion-v1.0  
  
root@demo-system:~#  ✅  Vemos que aparece a nova versión da imaxe  
root@demo-system:~#  docker image list  
  
root@demo-system:~#  docker image list  
REPOSITORY   TAG       IMAGE ID       CREATED       SIZE  
nginx        latest    07ccdb783875   12 days ago   160MB  
  
root@demo-system:~#  
  
⚠️  Si nos fixamos nas columnas, observamos unha columna TAG.  
ℹ️   Detrás do seu nome, as imaxes poden levar unha etiqueta ou tag, como por exemplo debian:latest  
ℹ️   Temén poden levar unha chave ou digest -> debian:latest@sha256:61d0976aceca49cd8c5a3fb6787ddb08bd43a8f998fef45bf3d1050420161be7  
  
⚠️  E posible cambiar o etiquetado das imaxes para facer diferentes versións:  
  
root@demo-system:~#  docker image tag nginx nginx:myversion-v1.0  
  
root@demo-system:~#  ✅  Vemos que aparece a nova versión da imaxe  
root@demo-system:~#  docker image list  
REPOSITORY   TAG              IMAGE ID       CREATED       SIZE  
nginx        latest           07ccdb783875   12 days ago   160MB  
nginx        myversion-v1.0   07ccdb783875   12 days ago   160MB  
  
root@demo-system:~#  
  
 🞂  Podemos eliminar as imaxes que xa non queremos e non teñen ningún Docker creado  
  
root@demo-system:~#  docker image rm nginx:latest  
Untagged: nginx:latest  
  
root@demo-system:~#  ✅  Vemos que xa non aparece  
root@demo-system:~#  docker image list  
REPOSITORY   TAG              IMAGE ID       CREATED       SIZE  
nginx        myversion-v1.0   07ccdb783875   12 days ago   160MB  
  
root@demo-system:~#  
  
⚠️  Podemos ver a información dunha imaxe con docker image inspect image         
```  
root@demo-system:~#  docker image inspect nginx:myversion-v1.0     

#...
#...
#...
                "PKG_RELEASE=1~trixie",  
                "DYNPKG_RELEASE=1~trixie"  
            ],  
            "Cmd": [  
                "nginx",  
                "-g",  
                "daemon off;"  
            ],  
            "Image": "",  
            "Volumes": null,  
            "WorkingDir": "",  
            "Entrypoint": [  
                "/docker-entrypoint.sh"  
            ],  
            "OnBuild": null,  
            "Labels": {  
                "maintainer": "NGINX Docker Maintainers <docker-maint@nginx.com>"  
            },  
            "StopSignal": "SIGQUIT"  
        },  
        "Architecture": "amd64",  
        "Os": "linux",  
        "Size": 159974475,  
        "GraphDriver": {  
            "Data": {  
                "LowerDir": "/var/lib/docker/overlay2/b6f5954bd2a7e91541104e6370901ebfcb0a3c9e987bf91db9c0b44ee27be0d3/diff:/var/lib/docker/overlay2/f8a7c4c99a8ee63ccea0ecb3f3bde8c653e15674178b3b4f3849f2fa659530
e8/diff:/var/lib/docker/overlay2/7377cf9a06a778032fc74abb4b073954626993fa3c7e08efbb4fcd55c89b07a3/diff:/var/lib/docker/overlay2/fea711d01104eaaadc4b7b5a6ba3e91354f9937eae3eb7ed4bd20e5bce44bb80/diff:/var/lib/dock
er/overlay2/07f7233884c357084801dd3af94689184f22485f007346ab28bb30cf5e03940a/diff:/var/lib/docker/overlay2/64d4dee5cb6566a630d01f52997827a047c8c8fe026836338ac8164c285c0451/diff",  
                "MergedDir": "/var/lib/docker/overlay2/2bfdedefcd28d264b474b97d77a762c46093ade973ffeaf3c676ad4442dacac3/merged",  
                "UpperDir": "/var/lib/docker/overlay2/2bfdedefcd28d264b474b97d77a762c46093ade973ffeaf3c676ad4442dacac3/diff",  
                "WorkDir": "/var/lib/docker/overlay2/2bfdedefcd28d264b474b97d77a762c46093ade973ffeaf3c676ad4442dacac3/work"  
            },  
            "Name": "overlay2"  
        },  
        "RootFS": {  
            "Type": "layers",  
            "Layers": [  
                "sha256:1d46119d249f7719e1820e24a311aa7c453f166f714969cffe89504678eaa447",  
                "sha256:d61356d6b00cb9bb705967ddb13619e9fd8bb54d127a2add41ba1c6b82d1e395",  
                "sha256:96d86bc8de5933945d423bf55c03603b53ece1c8ce23608e2637faf0eeff8051",  
                "sha256:98da25895b8751934521c3566d8b991f21ff8daab88054f2aaf07e0ad11aa889",  
                "sha256:8117ecf0e00cc71d03b1a45997c465ed3081d7d7f4e4c7018464006668e1a59d",  
                "sha256:d009686a1d105a36455f5589a7b50895309422856483c16aa1a835c90b1ae03d",  
                "sha256:d6eb78ef52a22d698e3eba90db4cd16d328b7211db2e8c51aca7dbf50dd38a4c"  
            ]  
        },  
        "Metadata": {  
            "LastTagTime": "2025-10-19T23:30:48.762381982+02:00"  
        }  
    }  
]   
```

root@demo-system:~#  docker image list  
REPOSITORY   TAG              IMAGE ID       CREATED       SIZE  
nginx        myversion-v1.0   07ccdb783875   12 days ago   160MB  
  
root@demo-system:~#  
☢️ Resulta de especial interés fixarnos en Cmd, Env e Entrypoint  
         🞂 Entrypoint: E o comando que executa o Docker sempre que arranca. Neste caso se executa o comando /docker-entrypoint.sh  
         🞂 Cmd: E un parámetro pasado ao entrypoint, neste caso o entrypoint completo sería /docker-entrypoint.sh nginx -g daemon off;  
         🞂 Env: Contén valores de variables de entorno para a configuración do contedor  
  
ℹ️   Podemos observar que esta imaxe se configura cada vez que arranca executando o script /docker-entrypoint.sh  
Examinando este script teremos moita información sobre a súa configuración e o xeito de autoconfigurar as imaxes no seu arranque.  
  
  
=====================================  
🐳  Creando imaxes persoalizadas  
=====================================  
  
📝  Podemos crear imaxes persoalizadas partindo dunha imaxe xa existente de dous xeitos:  
         🞂  De xeito manual  
         🞂  Mediante un Dockerfile  
  
====================================  
Creación de Servizos de xeito manual  
====================================  
  
ℹ️   Para crear un novo servizo simplemente creamos un Docker a partir dunha imaxe e o modificamos como calqueira outro sistema  
🐚 Tamén podemos copiar arquivos dentro da imaxe Docker sen necesidade de que este arrancado.  
  
⚠️  E conveniente elexir unha imaxe do repositorio que se aproxime xa ao que queremos.  
  
📝  EXEMPLO 1:  
 🞂  Imos modificar o que nos ofrece nginx:latest cambiando a súa páxina de inicio  
  
1 -  🞂  Creamos o Docker mywebpage a partir da imaxe nginx  
  
root@demo-system:~#  docker create --name mywebpage --hostname nginx-01 nginx  
Unable to find image 'nginx:latest' locally  
latest: Pulling from library/nginx  
Digest: sha256:3b7732505933ca591ce4a6d860cb713ad96a3176b82f7979a8dfa9973486a0d6  
Status: Downloaded newer image for nginx:latest  
afaa3e1cd34635842ac8ec0bbfc478779a06234e828f58e7e998a20994336369  
  
root@demo-system:~#  ✅  Comprobamos que o Docker está creado  
root@demo-system:~#  docker ps -a  
CONTAINER ID   IMAGE     COMMAND                  CREATED         STATUS    PORTS     NAMES  
afaa3e1cd346   nginx     "/docker-entrypoint.…"   3 seconds ago   Created             mywebpage  
  
root@demo-system:~#  ℹ️   Podemos observar que o Docker está en estado Created, non funcionando (Up) 
  
2 -  🞂  Modificamos a páxina principal de mywebpage  
  
🐚 Copiamos HelloWorld.html da carpeta actual a carpeta raiz das paáxinas web no contedor mywebpage  
  
root@demo-system:~#  docker cp HelloWorld.html  mywebpage:/usr/share/nginx/html/index.html  
Successfully copied 3.07kB to mywebpage:/usr/share/nginx/html/index.html  
  
root@demo-system:~#  
  
3 -  🞂  Consultamos a páxina web con wget  
        a)  🞂  Averiguamos a IP inspeccionando o Docker  
        📝  Necesitamos arrancar o docker para que teña unha IP  
```sh  
root@demo-system:~#  docker start mywebpage  
mywebpage  
  
root@demo-system:~#  ls📝  Usaremos docker inspect para examinar a información do docker e buscar a IP  
  
root@demo-system:~#  docker inspect mywebpage 

#...
#...
#...
            "WorkingDir": "",  
            "Entrypoint": [  
                "/docker-entrypoint.sh"  
            ],  
            "OnBuild": null,  
            "Labels": {  
                "maintainer": "NGINX Docker Maintainers <docker-maint@nginx.com>"  
            },  
            "StopSignal": "SIGQUIT"  
        },  
        "NetworkSettings": {  
            "Bridge": "",  
            "SandboxID": "20d024d003c46e5926aa2c84db60ba8927d11bba73136971552769bcfd81204c",  
            "SandboxKey": "/var/run/docker/netns/20d024d003c4",  
            "Ports": {  
                "80/tcp": null  
            },  
            "HairpinMode": false,  
            "LinkLocalIPv6Address": "",  
            "LinkLocalIPv6PrefixLen": 0,  
            "SecondaryIPAddresses": null,  
            "SecondaryIPv6Addresses": null,  
            "EndpointID": "0cfe7f170fd414f144babeba25937d44fc39a1329d8f9dfec241cdb18f854a4a",  
            "Gateway": "172.17.0.1",  
            "GlobalIPv6Address": "",  
            "GlobalIPv6PrefixLen": 0,  
            "IPAddress": "172.17.0.2",  
            "IPPrefixLen": 16,  
            "IPv6Gateway": "",  
            "MacAddress": "02:42:ac:11:00:02",  
            "Networks": {  
                "bridge": {  
  "IPAMConfig": null,  
  "Links": null,  
  "Aliases": null,  
  "MacAddress": "02:42:ac:11:00:02",  
  "NetworkID": "7f4f450729410e7d5e287156960773d7d55a14d414e1f23c36e25960ab0d0dbc",  
  "EndpointID": "0cfe7f170fd414f144babeba25937d44fc39a1329d8f9dfec241cdb18f854a4a",  
  "Gateway": "172.17.0.1",  
  "IPAddress": "172.17.0.2",  
  "IPPrefixLen": 16,  
  "IPv6Gateway": "",  
  "GlobalIPv6Address": "",  
  "GlobalIPv6PrefixLen": 0,  
  "DriverOpts": null,  
  "DNSNames": null  
                }  
            }  
        }  
    }  
] 
```
root@demo-system:~#  ⚠️  Debemos buscar a liña co texto IPAddress  
  
        b)  🞂  Obtemos o index.html con wget  
  
root@demo-system:~#  wget http://172.17.0.2  
--2025-10-19 23:32:11--  http://172.17.0.2/  
Conectando con 172.17.0.2:80... conectado.  
Petición HTTP enviada, esperando respuesta... 200 OK  
Longitud: 1418 (1,4K) [text/html]  
Grabando a: «index.html»  
  
index.html  100%[=====================================================================================================================>]   1,38K  --.-KB/s    en 0s       
  
2025-10-19 23:32:11 (39,4 MB/s) - «index.html» guardado [1418/1418]  
  
```sh  
root@demo-system:~#  ✅  Como poderemos ver, temos un novo index.html  
root@demo-system:~#  cat index.html  
 <!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Elegant Hello World</title>  
    <style>  
        body {  
            margin: 0;  
            padding: 0;  
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;  
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);  
            display: flex;  
            justify-content: center;  
            align-items: center;  
            min-height: 100vh;  
            color: #333;  
        }  
  
        .hello-container {  
            background: rgba(255, 255, 255, 0.95);  
            padding: 3rem 4rem;  
            border-radius: 15px;  
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);  
            text-align: center;  
            backdrop-filter: blur(10px);  
        }  
  
        h1 {  
            font-size: 3.5rem;  
            margin-bottom: 0.5rem;  
            background: linear-gradient(135deg, #667eea, #764ba2);  
            -webkit-background-clip: text;  
            background-clip: text;  
            color: transparent;  
        }  
  
        .subtitle {  
            font-size: 1.2rem;  
            color: #666;  
            font-weight: 300;  
        }  
    </style>  
</head>  
<body>  
    <div class="hello-container">  
        <h1>Hello, World!</h1>  
        <p class="subtitle">Welcome to my new nginx server.</p>  
    </div>  
</body>  
</html>  
  
```
  
4 -  🞂 Paramos o Docker (opcional) e creamos unha nova imaxe a partir de él  
  
RUN docker stop mywebpage  
  
  
        ℹ️   Mediante commit transformamos o contido do Docker nunha nova imaxe. O seu nome será officialpage:v1  
  
root@demo-system:~#  docker commit mywebpage officialpage:v1  
sha256:97ae293aad061a2bc7626764aaa76330fda5d9811a74fcd5b95a9ffb0e35d97a  
  
root@demo-system:~#  ✅  Podemos observar a nova imaxe  
root@demo-system:~#  docker image list  
REPOSITORY     TAG              IMAGE ID       CREATED         SIZE  
officialpage   v1               97ae293aad06   3 seconds ago   160MB  
nginx          latest           07ccdb783875   12 days ago     160MB  
nginx          myversion-v1.0   07ccdb783875   12 days ago     160MB  
  
root@demo-system:~#  
  
5 - 🞂  Agora poderemos despregar novos Docker a partir de officialpage:v1  
        ☢️  Alternativamente ao ciclo create->start, poderíamos facer docker run -d -t --name firstone --hostname web-02 officialpage:v1.1  
  
        ℹ️   Despregamos un novo docker chamado firstone  
  
root@demo-system:~#  docker create --name firstone --hostname web-02 officialpage:v1  
8e96e081a539206b6ea9c7628055d87a20b592d178bd5120a254dcf388be1fab  
  
root@demo-system:~#  
root@demo-system:~#  docker start firstone  
firstone  
  
root@demo-system:~#  
root@demo-system:~#  docker ps -a  
CONTAINER ID   IMAGE             COMMAND                  CREATED          STATUS          PORTS     NAMES  
8e96e081a539   officialpage:v1   "/docker-entrypoint.…"   6 seconds ago    Up 3 seconds    80/tcp    firstone  
afaa3e1cd346   nginx             "/docker-entrypoint.…"   57 seconds ago   Up 41 seconds   80/tcp    mywebpage  
  
  
root@demo-system:~#  ✅  Como vemos xa temos despregado o Docker firstone. Podemos observar a páxina principal deste novo Docker  
rm: no se puede borrar 'index.html': No existe el fichero o el directorio  
root@demo-system:~#  wget http://172.17.0.3  
--2025-10-19 23:32:42--  http://172.17.0.3/  
Conectando con 172.17.0.3:80... conectado.  
Petición HTTP enviada, esperando respuesta... 200 OK  
Longitud: 1418 (1,4K) [text/html]  
Grabando a: «index.html»  
  
index.html  100%[=====================================================================================================================>]   1,38K  --.-KB/s    en 0s       
  
2025-10-19 23:32:42 (153 MB/s) - «index.html» guardado [1418/1418]  
  
```sh  
root@demo-system:~#  cat index.html      
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Elegant Hello World</title>  
    <style>  
        body {  
            margin: 0;  
            padding: 0;  
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;  
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);  
            display: flex;  
            justify-content: center;  
            align-items: center;  
            min-height: 100vh;  
            color: #333;  
        }  
  
        .hello-container {  
            background: rgba(255, 255, 255, 0.95);  
            padding: 3rem 4rem;  
            border-radius: 15px;  
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);  
            text-align: center;  
            backdrop-filter: blur(10px);  
        }  
  
        h1 {  
            font-size: 3.5rem;  
            margin-bottom: 0.5rem;  
            background: linear-gradient(135deg, #667eea, #764ba2);  
            -webkit-background-clip: text;  
            background-clip: text;  
            color: transparent;  
        }  
  
        .subtitle {  
            font-size: 1.2rem;  
            color: #666;  
            font-weight: 300;  
        }  
    </style>  
</head>  
<body>  
    <div class="hello-container">  
        <h1>Hello, World!</h1>  
        <p class="subtitle">Welcome to my new nginx server.</p>  
    </div>  
</body>  
</html>
```  
root@demo-system:~#  
  
ℹ️   Por suposto, podemos abrir un terminal bash para traballar e configurar o contedor Docker con docker exec -it firstone bash  
         🞂  Por exemplo, podemos examinar o script que fai de entrypoint  
```  
root@demo-system:~#  docker exec -it firstone bash  
lsroot@web-02:/# lsls  
bash: lsls: command not found  
root@web-02:/# ls  
bin  boot  dev  docker-entrypoint.d  docker-entrypoint.sh  etc  home  lib  lib64  media  mnt  opt  proc  root  run  sbin  srv  sys  tmp  usr  var  
root@web-02:/# cat docker-entrypoint.sh
#!/bin/sh  
# vim:sw=4:ts=4:et  
  
set -e  
  
entrypoint_log() {  
    if [ -z "${NGINX_ENTRYPOINT_QUIET_LOGS:-}" ]; then  
        echo "$@"  
    fi  
}  
  
if [ "$1" = "nginx" ] || [ "$1" = "nginx-debug" ]; then  
    if /usr/bin/find "/docker-entrypoint.d/" -mindepth 1 -maxdepth 1 -type f -print -quit 2>/dev/null | read v; then  
        entrypoint_log "$0: /docker-entrypoint.d/ is not empty, will attempt to perform configuration"  
  
        entrypoint_log "$0: Looking for shell scripts in /docker-entrypoint.d/"  
        find "/docker-entrypoint.d/" -follow -type f -print | sort -V | while read -r f; do  
            case "$f" in  
                *.envsh)  
  if [ -x "$f" ]; then  
  entrypoint_log "$0: Sourcing $f";  
  . "$f"  
  else  
  # warn on shell scripts without exec bit  
  entrypoint_log "$0: Ignoring $f, not executable";  
  fi  
  ;;  
                *.sh)  
  if [ -x "$f" ]; then  
  entrypoint_log "$0: Launching $f";  
  "$f"  
  else  
  # warn on shell scripts without exec bit  
  entrypoint_log "$0: Ignoring $f, not executable";  
  fi  
  ;;  
                *) entrypoint_log "$0: Ignoring $f";;  
            esac  
        done  
  
        entrypoint_log "$0: Configuration complete; ready for start up"  
    else  
        entrypoint_log "$0: No files found in /docker-entrypoint.d/, skipping configuration"  
    fi  
fi  
  
exec "$@"     
```
root@web-02:/# ls -lhs /docker-entrypoint.d/  
total 20K  
4.0K -rwxr-xr-x 1 root root 2.1K Oct  8 00:13 10-listen-on-ipv6-by-default.sh  
4.0K -rwxr-xr-x 1 root root  389 Oct  8 00:13 15-local-resolvers.envsh  
4.0K -rwxr-xr-x 1 root root 3.0K Oct  8 00:13 20-envsubst-on-templates.sh  
8.0K -rwxr-xr-x 1 root root 4.6K Oct  8 00:13 30-tune-worker-processes.sh  
root@web-02:/# ps -elf  
bash: ps: command not found  
root@web-02:/# exit  
exit  
  
root@demo-system:~#  
📝  EXEMPLO 2:  
 🞂  Imos transformar unha imaxe de Debian nunha imaxe que ofrece o servizo nginx  
  
ℹ️   Para conseguir iso, imos a:  
         🞂  Actualizar o seu software apt update && apt dist-upgrade  
         🞂  Instalar iproute2, nginx, nano, ssh e inetutils-ping  
         🞂  Modificar a páxina web de inicio  
  
ℹ️   Crearemos un Docker que:  
         🞂  Mapeará (DNAT) o porto 80 para o acceso a páxina web dende a rede local (utilizando a IP do host).  
         🞂  Creará volumes persistentes para /etc/nginx e /var/www de xeito que se manteña entre actualizacións do docker  
  
⚠️  Os volumes quedarán mapeados en /var/lib/docker/volumes e se poderán modificar dende o propio host.  
  
1 -📝  Creación do Docker inicial para a súa persoalización  
         🞂  Creamos o Docker a partir dunha imaxe de Debian oficial en Dockerhub  
  
ℹ️   Podemos observar como se descarga a imaxe de internet ao non estar presente.  
☢️  Alternativamente ao ciclo create->start, poderíamos facer docker run -d -t --name nginx-template --hostname nginx-template debian  
⚠️  E necesario poñer o -t para engadir un tty e que o bash (que e o entrypoing) non finalice inmediatamente.  
  
root@demo-system:~#  docker create -t --name nginx-template --hostname nginx-template debian  
Unable to find image 'debian:latest' locally  
latest: Pulling from library/debian  
cae3b572364a: Already exists  
Digest: sha256:fd8f5a1df07b5195613e4b9a0b6a947d3772a151b81975db27d47f093f60c6e6  
Status: Downloaded newer image for debian:latest  
cc478e0e01f87cb58fe35db644e1329cd4839b8bf6ad042dc320e728bcee5d5a  
  
root@demo-system:~#  ✅  Como vemos o novo contedor Docker está en estado Created  
root@demo-system:~#  docker ps -a  
CONTAINER ID   IMAGE             COMMAND                  CREATED              STATUS              PORTS     NAMES  
cc478e0e01f8   debian            "bash"                   4 seconds ago        Created  nginx-template  
8e96e081a539   officialpage:v1   "/docker-entrypoint.…"   About a minute ago   Up About a minute   80/tcp    firstone  
afaa3e1cd346   nginx             "/docker-entrypoint.…"   2 minutes ago        Up About a minute   80/tcp    mywebpage  
  
root@demo-system:~#  🚀  O arrancamos para poder instalar software. A copia de arquivos pode facerse co contedor parado  
root@demo-system:~#  docker start nginx-template  
nginx-template  
  
root@demo-system:~#  ✅  Agora está Up. Podemos observar o entrypoint. No caso de debian é bash, no caso dos docker coas imaxes nginx e un script /docker-entrypoint.sh  
root@demo-system:~#  docker ps  
CONTAINER ID   IMAGE             COMMAND                  CREATED              STATUS              PORTS     NAMES  
cc478e0e01f8   debian            "bash"                   11 seconds ago       Up 3 seconds                  nginx-template  
8e96e081a539   officialpage:v1   "/docker-entrypoint.…"   About a minute ago   Up About a minute   80/tcp    firstone  
afaa3e1cd346   nginx             "/docker-entrypoint.…"   2 minutes ago        Up About a minute   80/tcp    mywebpage  
  
root@demo-system:~#  
  
2 -📝  Executaremos varios comandos dende fora do docker (tamén e posible facelos nunha sesión bash dentro do docker):  
         🞂 🐚 Intentaremos amosar as rutas de rede  
         🞂 🐚 Actualizaremos o sistema e instalaremos iproute2 (comando ip), nginx (servidor web), ssh (acceso remoto), inetutils-ping (comando ping)  
         🞂 🐚 Cambiaremos a páxina web de inicio  
  
ℹ️   Tamén iniciaremos unha sesion bash que nos permitiría executar os comandos dende a consola do Docker  
  
        a)  🞂  Amosamos as rutas actuais  
  
root@demo-system:~#  docker exec nginx-template ip route show    
OCI runtime exec failed: exec failed: unable to start container process: exec: "ip": executable file not found in $PATH: unknown  
  
root@demo-system:~#  ❌  Vemos que falla, porque o Docker non dispón do comando ip proporcionado no paquete iproute2  
  
  
        b)  🞂  Actualizamos o sistema e instalamos iproute2, nano, nginx, ssh e inetutils-ping  
            ⚠️  E importante executar os comandos neste caso con -it xa que e posible que precisemos entrada de datos  
  
root@demo-system:~#  docker exec -it nginx-template apt update  
Get:1 http://deb.debian.org/debian trixie InRelease [140 kB]  
Get:2 http://deb.debian.org/debian trixie-updates InRelease [47.3 kB]  
Get:3 http://deb.debian.org/debian-security trixie-security InRelease [43.4 kB]  
Get:4 http://deb.debian.org/debian trixie/main amd64 Packages [9669 kB]  
Get:5 http://deb.debian.org/debian trixie-updates/main amd64 Packages [5412 B]  
Get:6 http://deb.debian.org/debian-security trixie-security/main amd64 Packages [57.7 kB]  
Fetched 9963 kB in 1s (6882 kB/s)  
2 packages can be upgraded. Run 'apt list --upgradable' to see them.  
  
root@demo-system:~#  
root@demo-system:~#  docker exec -it nginx-template apt dist-upgrade  
Upgrading:  
  libssl3t64  openssl-provider-legacy  
  
Summary:  
  Upgrading: 2, Installing: 0, Removing: 0, Not Upgrading: 0  
  Download size: 2744 kB  
  Space needed: 0 B / 62.1 GB available  
  
Continue? [Y/n]  
Get:1 http://deb.debian.org/debian-security trixie-security/main amd64 openssl-provider-legacy amd64 3.5.1-1+deb13u1 [307 kB]  
Get:2 http://deb.debian.org/debian-security trixie-security/main amd64 libssl3t64 amd64 3.5.1-1+deb13u1 [2437 kB]  
Fetched 2744 kB in 0s (11.5 MB/s)  
debconf: unable to initialize frontend: Dialog  
debconf: (No usable dialog-like program is installed, so the dialog based frontend cannot be used. at /usr/share/perl5/Debconf/FrontEnd/Dialog.pm line 79, <STDIN> line 2.)  
debconf: falling back to frontend: Readline  
debconf: unable to initialize frontend: Readline  
debconf: (Can't locate Term/ReadLine.pm in @INC (you may need to install the Term::ReadLine module) (@INC entries checked: /etc/perl /usr/local/lib/x86_64-linux-gnu/perl/5.40.1 /usr/local/share/perl/5.40.1 /usr/
lib/x86_64-linux-gnu/perl5/5.40 /usr/share/perl5 /usr/lib/x86_64-linux-gnu/perl-base /usr/lib/x86_64-linux-gnu/perl/5.40 /usr/share/perl/5.40 /usr/local/lib/site_perl) at /usr/share/perl5/Debconf/FrontEnd/Readli
ne.pm line 8, <STDIN> line 2.)  
debconf: falling back to frontend: Teletype  
(Reading database ... 4935 files and directories currently installed.)  
Preparing to unpack .../openssl-provider-legacy_3.5.1-1+deb13u1_amd64.deb ...  
Unpacking openssl-provider-legacy (3.5.1-1+deb13u1) over (3.5.1-1) ...  
Setting up openssl-provider-legacy (3.5.1-1+deb13u1) ...  
(Reading database ... 4935 files and directories currently installed.)  
Preparing to unpack .../libssl3t64_3.5.1-1+deb13u1_amd64.deb ...  
Unpacking libssl3t64:amd64 (3.5.1-1+deb13u1) over (3.5.1-1) ...  
Setting up libssl3t64:amd64 (3.5.1-1+deb13u1) ...  
Processing triggers for libc-bin (2.41-12) ...  
  
root@demo-system:~#  
root@demo-system:~#  docker exec -it nginx-template apt install iproute2 nano nginx ssh inetutils-ping                  
#Reading package lists... 0%

  
root@demo-system:~#  ✅  Como poderemos ver, xa funciona o comando ip route  
root@demo-system:~#  docker exec nginx-template ip route show  
default via 172.17.0.1 dev eth0  
172.17.0.0/16 dev eth0 proto kernel scope link src 172.17.0.4  
  
root@demo-system:~#        
root@demo-system:~#  docker exec nginx-template ip route show  
default via 172.17.0.1 dev eth0  
172.17.0.0/16 dev eth0 proto kernel scope link src 172.17.0.4  
  
root@demo-system:~#  
        c)  🞂  Cambiamos a páxina web de inicio  
  
root@demo-system:~#  docker cp HelloWorld.html  nginx-template:/var/www/html/index.html  
Successfully copied 3.07kB to nginx-template:/var/www/html/index.html  
  
root@demo-system:~#  
  
📝  Tamén podemos iniciar unha sesión interactiva con bash e facer cambios de xeito manual.  
root@demo-system:~#  docker exec -it nginx-template bash  
root@nginx-template:/# ls  
bin  boot  dev  etc  home  lib  lib64  media  mnt  opt  proc  root  run  sbin  srv  sys  tmp  usr  var  
root@nginx-template:/# ps -elf  
F S UID          PID    PPID  C PRI  NI ADDR SZ WCHAN  STIME TTY          TIME CMD  
4 S root           1       0  0  80   0 -  1083 do_sel 21:33 pts/0    00:00:00 bash  
4 S root        1362       0  0  80   0 -  1083 do_wai 21:35 pts/1    00:00:00 bash  
0 R root        1369    1362  0  80   0 -  1611 -      21:35 pts/1    00:00:00 ps -elf  
root@nginx-template:/# ls /var/www/html -l  
total 8  
-rw-rw-r-- 1 root root 1418 Oct 18 07:08 index.html  
-rw-r--r-- 1 root root  615 Oct 19 21:34 index.nginx-debian.html  
root@nginx-template:/# ip route show  
default via 172.17.0.1 dev eth0  
172.17.0.0/16 dev eth0 proto kernel scope link src 172.17.0.4  
root@nginx-template:/# exit  
exit  
  
root@demo-system:~#  
3 - 📝  Finalmente creamos a imaxe para despregar servidores nginx baseados en debian.  
         Indicamos o autor, unha mensaxe de commit e que o servizo deberá facer DNAT o porto 80 do docker  
  
⚠️  A indicación do porto de servizo con --expose e meramente informativa para propósitos de documentación.  
  
        a)  🞂  Conxelamos os cambios no Docker creando unha instantánea (snapshot) para producir unha imaxe chamada webserver co tag v1.0.  
        ℹ️  Na nova imaxe, indicamos que o servizo usará o porto 80 e cambiamos o ENTRYPOINT a nginx -q daemon off; sustituindo o bash orixinal  
  
  
root@demo-system:~#  docker commit -a "Titorial de Docker" -m "Updated and installed iproute2 and nano" -c "EXPOSE 80" -c "ENTRYPOINT [\"nginx\",\"-g\",\"daemon off;\"]" nginx-template webserver:v1.0 
sha256:d4974efc08d8ec16555c3f278bdf120b6354e8808f222edb377d51744108b4c9  
  
root@demo-system:~#  ✅  Xa temos a imaxe. Na seguinte lista podemos observar a imaxe webserver co TAG v1.0.  
root@demo-system:~#  docker image list  
REPOSITORY     TAG              IMAGE ID       CREATED         SIZE  
webserver      v1.0             d4974efc08d8   4 seconds ago   207MB  
officialpage   v1               97ae293aad06   3 minutes ago   160MB  
nginx          latest           07ccdb783875   12 days ago     160MB  
nginx          myversion-v1.0   07ccdb783875   12 days ago     160MB  
debian         latest           61d0976aceca   2 weeks ago     120MB  
  
root@demo-system:~#  
  
        b)  🞂  Creamos un novo Docker a partir da nova imaxe chamado webserver-01 que fai accesible o porto 80 a toda a rede local mediante DNAT  
        ℹ️  Tamén crearemos os volumes para /etc/nginx e /var/www dispoñibles no host en /var/lib/docker/volumes/r-nginx-etc e /var/lib/docker/volumes/r-nginx-sites  
  
root@demo-system:~#  docker create --name webserver-01 --hostname webserver-01 -p 80:80  -v r-nginx-etc:/etc/nginx -v r-nginx-sites:/var/www webserver:v1.0  
99ffc10b992415a88a539c6156591e4cc618e36ee75ac0312bc3c54a0955144e  
  
root@demo-system:~#  ✅  Podemos ver o Docker creado en estado Created  
root@demo-system:~#  docker ps -a  
CONTAINER ID   IMAGE             COMMAND                  CREATED         STATUS              PORTS     NAMES  
99ffc10b9924   webserver:v1.0    "nginx -g 'daemon of…"   3 seconds ago   Created  webserver-01  
cc478e0e01f8   debian            "bash"                   2 minutes ago   Up About a minute             nginx-template  
8e96e081a539   officialpage:v1   "/docker-entrypoint.…"   3 minutes ago   Up 3 minutes        80/tcp    firstone  
afaa3e1cd346   nginx             "/docker-entrypoint.…"   4 minutes ago   Up 3 minutes        80/tcp    mywebpage  
  
root@demo-system:~#  
  
ℹ️   Tamen podemos observar os volumes mapeados  
  
root@demo-system:~#  ls -R /var/lib/docker/volumes/r-nginx-etc/_data  
/var/lib/docker/volumes/r-nginx-etc/_data:  
conf.d  fastcgi.conf  fastcgi_params  koi-utf  koi-win  mime.types  modules-available  modules-enabled  nginx.conf  proxy_params  scgi_params  sites-available  sites-enabled  snippets  uwsgi_params  win-utf     
  
/var/lib/docker/volumes/r-nginx-etc/_data/conf.d:  
  
/var/lib/docker/volumes/r-nginx-etc/_data/modules-available:  
  
/var/lib/docker/volumes/r-nginx-etc/_data/modules-enabled:  
  
/var/lib/docker/volumes/r-nginx-etc/_data/sites-available:  
default  
  
/var/lib/docker/volumes/r-nginx-etc/_data/sites-enabled:  
default  
  
/var/lib/docker/volumes/r-nginx-etc/_data/snippets:  
fastcgi-php.conf  snakeoil.conf  
  
  
root@demo-system:~#  
 ls -R /var/lib/docker/volumes/r-nginx-sites/_data  
/var/lib/docker/volumes/r-nginx-sites/_data:  
html  
  
/var/lib/docker/volumes/r-nginx-sites/_data/html:  
index.html  index.nginx-debian.html  
  
root@demo-system:~#  
  
🚀  Imos arrancar o Docker e consultar a páxina de inicio  
 A partir deste momento podemos crear varias instancias a partir da imaxe webserver:v1.0  
  
root@demo-system:~#  docker start webserver-01  
webserver-01  
  
root@demo-system:~#  
  
✅  Podemos ver o SNAT para a conexión coas redes externas e o DNAT para o acceso dende a rede externa ao servizo web no porto 80  
  
root@demo-system:~#  nft list table nat  
# Warning: table ip nat is managed by iptables-nft, do not touch!  
table ip nat {  
        chain POSTROUTING {  
                type nat hook postrouting priority srcnat; policy accept;  
                ip saddr 172.17.0.0/16 oifname != "docker0" counter packets 176 bytes 10605 masquerade  
                ip saddr 172.17.0.5 ip daddr 172.17.0.5 tcp dport 80 counter packets 0 bytes 0 masquerade  
        }  
  
        chain PREROUTING {  
                type nat hook prerouting priority dstnat; policy accept;  
                fib daddr type local counter packets 1 bytes 60 jump DOCKER  
        }  
  
        chain OUTPUT {  
                type nat hook output priority dstnat; policy accept;  
                ip daddr != 127.0.0.0/8 fib daddr type local counter packets 2 bytes 120 jump DOCKER  
        }  
  
        chain DOCKER {  
                iifname "docker0" counter packets 0 bytes 0 return  
                iifname != "docker0" tcp dport 80 counter packets 0 bytes 0 dnat to 172.17.0.5:80  
        }  
}  
  
root@demo-system:~#  
⚠️  Podemos apreciar o SNAT en POSTOUTING na liña que indica masquerade e o DNAT en PREROUTING  
{RED}Docker envia os paquetes en PREROUTING a chain DOCKER onde podemos observar o DNAT ao porto 80  
  
  
ℹ️   Como poderemos ver, o index.html e o noso indice persoalizado.  
  
root@demo-system:~#  wget http://localhost  
--2025-10-19 23:36:22--  http://localhost/  
Resolviendo localhost (localhost)... ::1, 127.0.0.1  
Conectando con localhost (localhost)[::1]:80... conectado.  
Petición HTTP enviada, esperando respuesta... 200 OK  
Longitud: 1418 (1,4K) [text/html]  
Grabando a: «index.html»  
  
index.html  100%[=====================================================================================================================>]   1,38K  --.-KB/s    en 0s       
  
2025-10-19 23:36:22 (182 MB/s) - «index.html» guardado [1418/1418]  
  
  
root@demo-system:~#  
  
ℹ️   Vexamos a páxina..  
  
```sh  
root@demo-system:~#  cat index.html     
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Elegant Hello World</title>  
    <style>  
        body {  
            margin: 0;  
            padding: 0;  
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;  
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);  
            display: flex;  
            justify-content: center;  
            align-items: center;  
            min-height: 100vh;  
            color: #333;  
        }  
  
        .hello-container {  
            background: rgba(255, 255, 255, 0.95);  
            padding: 3rem 4rem;  
            border-radius: 15px;  
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);  
            text-align: center;  
            backdrop-filter: blur(10px);  
        }  
  
        h1 {  
            font-size: 3.5rem;  
            margin-bottom: 0.5rem;  
            background: linear-gradient(135deg, #667eea, #764ba2);  
            -webkit-background-clip: text;  
            background-clip: text;  
            color: transparent;  
        }  
  
        .subtitle {  
            font-size: 1.2rem;  
            color: #666;  
            font-weight: 300;  
        }  
    </style>  
</head>  
<body>  
    <div class="hello-container">  
        <h1>Hello, World!</h1>  
        <p class="subtitle">Welcome to my new nginx server.</p>  
    </div>  
</body>  
</html>  
  
```  
root@demo-system:~#  
ℹ️   Tamén podemos apreciar que o software instalado anteriormente (ps, iproute2), está neste novo Docker  
  
root@demo-system:~#  docker exec webserver-01 ip route show  
default via 172.17.0.1 dev eth0  
172.17.0.0/16 dev eth0 proto kernel scope link src 172.17.0.5  
  
root@demo-system:~#   docker exec webserver-01 ps -elf  
F S UID          PID    PPID  C PRI  NI ADDR SZ WCHAN  STIME TTY          TIME CMD  
4 S root           1       0  0  80   0 -  3652 sigsus 21:36 ?        00:00:00 nginx: master process nginx -g daemon off;  
5 S www-data       7       1  0  80   0 -  4097 -      21:36 ?        00:00:00 nginx: worker process  
5 S www-data       8       1  0  80   0 -  4097 -      21:36 ?        00:00:00 nginx: worker process  
4 R root          15       0 40  80   0 -  1611 -      21:36 ?        00:00:00 ps -elf  
  
root@demo-system:~#  
  
==========================================================================  
📜  Creación de Servizos mediante un Dockerfile  
==========================================================================  
  
📝  Un Dockerfile é un guión para a construción de imaxes Docker.  
ℹ️   En lugar de ir modificando a imaxe comando a comando, como nos exemplos anteriores se crea un Dockerfile con:  
         🞂  Os comandos a levar a cabo  
         🞂  As variables de entorno para facer a configuración  
         🞂  O entrypoint desexado  
📜  A partir dese guión se crea a imaxe.  
  
ℹ️   Vexamos o contido dun Dockerfile que fai o mesmo que o exemplo manual anterior  
root@demo-system:~#  cat Dockerfile  
# Use the official Debian image as the base  
FROM debian:latest  
  
LABEL org.opencontainers.image.authors="Titorial de Docker"  
  
  
# Set environment variable to suppress some non-interactive prompts during installation  
ENV DEBIAN_FRONTEND=noninteractive  
  
# 1. Update the system and install the required packages (in a single layer for efficiency)  
# 2. Install procps, nginx, iproute2  
RUN apt-get update && \  
    apt-get install -y \  
    procps \  
    nano \  
    ssh \  
    inetutils-ping \  
    nginx \  
    iproute2 && \  
    # Clean up APT cache to reduce image size  
    rm -rf /var/lib/apt/lists/*  
  
# 3. Copy the file HelloWorld.html into /var/www/html inside the container  
#    NOTE: You must place your 'HelloWorld.html' file in the same directory as this Dockerfile  
COPY HelloWorld.html /var/www/html/index.html  
  
# Expose the default port for Nginx  
EXPOSE 80  
  
# Define the command to run when the container starts  
# The '-g daemon off;' keeps Nginx running in the foreground so Docker can monitor it  
CMD ["nginx", "-g", "daemon off;"]  
  
root@demo-system:~#         
📜  Aqui podemos ver un exemplo de Dockerfile que crea unha imaxe igual que a desenvolvida a partir de Debian no exemplo anterior  
📜  Tamén podemos observar algúns dos comandos que se poden indicar nun Dockerfile.  
         🞂 ℹ️  Con FROM indicamos a imaxe de partida  
         🞂 ℹ️  Con LABEL podemos etiquetar a imaxe  
         🞂 ℹ️  Con RUN podemos executar comandos dentro da imaxe (realmente nun Docker temporal) . E moi conveniente agrupar os comandos todo o posible.  
         🞂 ℹ️  Con COPY podemos copiar arquivos da carpeta de instalación dentro da nova imaxe  
         🞂 ℹ️  Con EXPOSE documentamos en qué portos ofrecerán servizos os Docker  
         🞂 ℹ️  Con ENTRYPOINT podemos specificar un entrypoint para os Docker  
         🞂 ℹ️  Con CMD podemos especificar os parámetros do entrypoint (no noso caso serían os parámetros do entrypoint da imaxe orixinal, ou sexa, bash)  
  
📝  Construimos a imaxe chamdada web-standard  
         🞂 O punto final fai referencia ao directorio raíz de instalación. Todos os arquivos deben estar dentro de esa carpeta ou subcarpetas  
  
root@demo-system:~#  docker build -t web-standard .  
[+] Building 0.1s (8/8) FINISHED  docker:default 
 => [internal] load build definition from Dockerfile  0.0s 
 => => transferring dockerfile: 1.07kB  0.0s 
 => [internal] load metadata for docker.io/library/debian:latest  0.0s 
 => [internal] load .dockerignore  0.0s 
 => => transferring context: 2B  0.0s 
 => [1/3] FROM docker.io/library/debian:latest  0.0s 
 => [internal] load build context  0.0s 
 => => transferring context: 37B  0.0s 
 => CACHED [2/3] RUN apt-get update &&     apt-get install -y     procps     nano     ssh     inetutils-ping     nginx     iproute2 &&     rm -rf /var/lib/apt/lists/*  0.0s 
 => CACHED [3/3] COPY HelloWorld.html /var/www/html/index.html  0.0s 
 => exporting to image  0.0s 
 => => exporting layers  0.0s 
 => => writing image sha256:75937c1f7b3e83a4897561b787b478eb4469945dbc158139b512cf056c3d4e17  0.0s 
 => => naming to docker.io/library/web-standard  0.0s 
  
root@demo-system:~#  ✅  Xa temos a imaxe creada, como podemos ver  
root@demo-system:~#  docker image list  
REPOSITORY     TAG              IMAGE ID       CREATED              SIZE  
webserver      v1.0             d4974efc08d8   About a minute ago   207MB  
officialpage   v1               97ae293aad06   4 minutes ago        160MB  
web-standard   latest           75937c1f7b3e   5 hours ago          178MB  
nginx          latest           07ccdb783875   12 days ago          160MB  
nginx          myversion-v1.0   07ccdb783875   12 days ago          160MB  
debian         latest           61d0976aceca   2 weeks ago          120MB  
  
  
root@demo-system:~#  ✅  Podemos crear e executar dockers a partir da nova imaxe web-standard  
root@demo-system:~#  docker run -d --name web-from-dockerfile --hostname server-A web-standard  
1e0e0916832f463dfd682cf02d621979bea194ab3d4147105aeffa226b1d439a  
  
root@demo-system:~#  ✅  Como vemos o novo Docker está funcionando  
root@demo-system:~#  docker ps  
CONTAINER ID   IMAGE             COMMAND                  CREATED              STATUS              PORTS  NAMES  
1e0e0916832f   web-standard      "nginx -g 'daemon of…"   4 seconds ago        Up 3 seconds        80/tcp  web-from-dockerfile  
99ffc10b9924   webserver:v1.0    "nginx -g 'daemon of…"   About a minute ago   Up About a minute   0.0.0.0:80->80/tcp, :::80->80/tcp   webserver-01  
cc478e0e01f8   debian            "bash"                   3 minutes ago        Up 3 minutes  nginx-template  
8e96e081a539   officialpage:v1   "/docker-entrypoint.…"   4 minutes ago        Up 4 minutes        80/tcp  firstone  
afaa3e1cd346   nginx             "/docker-entrypoint.…"   5 minutes ago        Up 5 minutes        80/tcp  mywebpage  
  
root@demo-system:~#  
📝 Imos a averiguar a IP e a consultar a páxina índice con wget  
root@demo-system:~#  docker exec web-from-dockerfile ip addr show  
1: lo: <LOOPBACK,UP,LOWER_UP> mtu 65536 qdisc noqueue state UNKNOWN group default qlen 1000  
    link/loopback 00:00:00:00:00:00 brd 00:00:00:00:00:00  
    inet 127.0.0.1/8 scope host lo  
       valid_lft forever preferred_lft forever  
    inet6 ::1/128 scope host proto kernel_lo  
       valid_lft forever preferred_lft forever  
314: eth0@if315: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP group default  
    link/ether 02:42:ac:11:00:06 brd ff:ff:ff:ff:ff:ff link-netnsid 0  
    inet 172.17.0.6/16 brd 172.17.255.255 scope global eth0  
       valid_lft forever preferred_lft forever  
  
root@demo-system:~#  wget http://172.17.0.6  
--2025-10-19 23:37:31--  http://172.17.0.6/  
Conectando con 172.17.0.6:80... conectado.  
Petición HTTP enviada, esperando respuesta... 200 OK  
Longitud: 1418 (1,4K) [text/html]  
Grabando a: «index.html»  
  
index.html  100%[=====================================================================================================================>]   1,38K  --.-KB/s    en 0s       
  
2025-10-19 23:37:31 (118 MB/s) - «index.html» guardado [1418/1418]  
  
  
root@demo-system:~#  
✅  Visualizamos a páxina   
```sh  
root@demo-system:~#  cat index.html   
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Elegant Hello World</title>  
    <style>  
        body {  
            margin: 0;  
            padding: 0;  
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;  
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);  
            display: flex;  
            justify-content: center;  
            align-items: center;  
            min-height: 100vh;  
            color: #333;  
        }  
  
        .hello-container {  
            background: rgba(255, 255, 255, 0.95);  
            padding: 3rem 4rem;  
            border-radius: 15px;  
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);  
            text-align: center;  
            backdrop-filter: blur(10px);  
        }  
  
        h1 {  
            font-size: 3.5rem;  
            margin-bottom: 0.5rem;  
            background: linear-gradient(135deg, #667eea, #764ba2);  
            -webkit-background-clip: text;  
            background-clip: text;  
            color: transparent;  
        }  
  
        .subtitle {  
            font-size: 1.2rem;  
            color: #666;  
            font-weight: 300;  
        }  
    </style>  
</head>  
<body>  
    <div class="hello-container">  
        <h1>Hello, World!</h1>  
        <p class="subtitle">Welcome to my new nginx server.</p>  
    </div>  
</body>  
</html>   
```
  
==========================================  
💾  Realización de Backups das Imaxes  
==========================================  
  
ℹ️   Podemos obter un backup en formato .tar.gz co comando docker image save  
  
root@demo-system:~#  docker image save webserver:v1.0| gzip > webserver-v1.0.tar.gz  
  
root@demo-system:~#  ✅  Como vemos, temos o backup en webserver-v1.0.tar.gz  
root@demo-system:~#  ls -lhs webserver-v1.0.tar.gz  
89M -rw-rw-r-- 1 root root 89M oct 19 23:37 webserver-v1.0.tar.gz  
  
root@demo-system:~#  
ℹ️   Imos facer un test de restauración con docker image load  
 🞂  Paramos o container e eliminamos o Docker e a imaxe  
  
root@demo-system:~#  docker stop webserver-01  
webserver-01  
  
root@demo-system:~#   docker remove webserver-01  
webserver-01  
  
root@demo-system:~#   docker ps -a  
CONTAINER ID   IMAGE             COMMAND                  CREATED          STATUS          PORTS     NAMES  
1e0e0916832f   web-standard      "nginx -g 'daemon of…"   54 seconds ago   Up 53 seconds   80/tcp    web-from-dockerfile  
cc478e0e01f8   debian            "bash"                   4 minutes ago    Up 4 minutes              nginx-template  
8e96e081a539   officialpage:v1   "/docker-entrypoint.…"   5 minutes ago    Up 5 minutes    80/tcp    firstone  
afaa3e1cd346   nginx             "/docker-entrypoint.…"   6 minutes ago    Up 6 minutes    80/tcp    mywebpage  
  
root@demo-system:~#  ✅  Podemos ver que xa non temos o Docker webserver-01  
root@demo-system:~#  docker image list  
REPOSITORY     TAG              IMAGE ID       CREATED         SIZE  
webserver      v1.0             d4974efc08d8   2 minutes ago   207MB  
officialpage   v1               97ae293aad06   5 minutes ago   160MB  
web-standard   latest           75937c1f7b3e   5 hours ago     178MB  
nginx          latest           07ccdb783875   12 days ago     160MB  
nginx          myversion-v1.0   07ccdb783875   12 days ago     160MB  
debian         latest           61d0976aceca   2 weeks ago     120MB  
  
root@demo-system:~#   docker image remove webserver:v1.0             
Untagged: webserver:v1.0  
Deleted: sha256:d4974efc08d8ec16555c3f278bdf120b6354e8808f222edb377d51744108b4c9  
Deleted: sha256:6d99b2e2d1b3a5e4b1aa275292cbb3f29703668d0f37749b4105c30a1311daf8  
  
root@demo-system:~#  ✅  Podemos ver que a imaxe webserver:v1.0 xa non existe  
root@demo-system:~#  docker image list  
REPOSITORY     TAG              IMAGE ID       CREATED         SIZE  
officialpage   v1               97ae293aad06   6 minutes ago   160MB  
web-standard   latest           75937c1f7b3e   5 hours ago     178MB  
nginx          latest           07ccdb783875   12 days ago     160MB  
nginx          myversion-v1.0   07ccdb783875   12 days ago     160MB  
debian         latest           61d0976aceca   2 weeks ago     120MB  
  
root@demo-system:~#  
 🞂  A recuperamos do backup webserver-v1.0.tar.gz  
root@demo-system:~#  docker image load < webserver-v1.0.tar.gz  
7dd1d5c20e38: Loading layer [==================================================>]  91.94MB/91.94MB  
Loaded image: webserver:v1.0  
  
root@demo-system:~#  
✅  Vemos que xa temos recuperada a imaxe webserver:v1.0  
root@demo-system:~#  docker image list  
REPOSITORY     TAG              IMAGE ID       CREATED         SIZE  
webserver      v1.0             d4974efc08d8   3 minutes ago   207MB  
officialpage   v1               97ae293aad06   6 minutes ago   160MB  
web-standard   latest           75937c1f7b3e   5 hours ago     178MB  
nginx          latest           07ccdb783875   12 days ago     160MB  
nginx          myversion-v1.0   07ccdb783875   12 days ago     160MB  
debian         latest           61d0976aceca   2 weeks ago     120MB  
  
root@demo-system:~#  
 🞂  Creamos e lanzamos un docker igual a o que eliminamos (usaremos docker run para aforrar un paso)  
⚠️  E importante o -d para que o nginx non se quede en execución en primeiro plano na consola  
  
root@demo-system:~#  docker run -d --name webserver-01 --hostname webserver-01 -p 80:80 -v r-nginx-etc:/etc/nginx -v r-nginx-sites:/var/www webserver:v1.0  
edaa59f35daedad0585ff364058c9477acb8591a2d9377ba03936cadf219eac1  
  
root@demo-system:~#  ✅  Consultamos a páxina web de webserver-01  
root@demo-system:~#  wget http://localhost  
--2025-10-19 23:38:49--  http://localhost/  
Resolviendo localhost (localhost)... ::1, 127.0.0.1  
Conectando con localhost (localhost)[::1]:80... conectado.  
Petición HTTP enviada, esperando respuesta... 200 OK  
Longitud: 1418 (1,4K) [text/html]  
Grabando a: «index.html»  
  
index.html  100%[=====================================================================================================================>]   1,38K  --.-KB/s    en 0s       
  
2025-10-19 23:38:49 (214 MB/s) - «index.html» guardado [1418/1418]  
  
  
ℹ️   Vexamos a páxina..  
```sh
root@demo-system:~#  cat index.html 
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Elegant Hello World</title>  
    <style>  
        body {  
            margin: 0;  
            padding: 0;  
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;  
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);  
            display: flex;  
            justify-content: center;  
            align-items: center;  
            min-height: 100vh;  
            color: #333;  
        }  
  
        .hello-container {  
            background: rgba(255, 255, 255, 0.95);  
            padding: 3rem 4rem;  
            border-radius: 15px;  
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);  
            text-align: center;  
            backdrop-filter: blur(10px);  
        }  
  
        h1 {  
            font-size: 3.5rem;  
            margin-bottom: 0.5rem;  
            background: linear-gradient(135deg, #667eea, #764ba2);  
            -webkit-background-clip: text;  
            background-clip: text;  
            color: transparent;  
        }  
  
        .subtitle {  
            font-size: 1.2rem;  
            color: #666;  
            font-weight: 300;  
        }  
    </style>  
</head>  
<body>  
    <div class="hello-container">  
        <h1>Hello, World!</h1>  
        <p class="subtitle">Welcome to my new nginx server.</p>  
    </div>  
</body>  
</html>   
```

  
=========================================  
🌐  Xestión de Imaxes con Dockerhub  
=========================================  
  
📝  Sempre podemos facer un backup de unha imaxe e transmitila pola rede ou transportala nun dispositivo de almacenamento.  
ℹ️   Pero o máis cómodo e o uso dun repositorio en internet.  
  
📦 Dockerhub proporciona un espazo gratuito onde poder subir e distribuir os nosos docker. Dispón dun área pública e un área privada  
 🞂 Area Pública: Todos poden descargar e despregar Docker a partir das nosas imaxes, ou crear novas imaxes a partir delas  
 🞂 Area Privada: Soamente nos ou os autorizados poden descargar, despregar Docker ou crear novas imaxes a partir das nosas imaxes.  
  
Para facer este uso de Dockerhub debemos rexistrarnos na páxina https://hub.docker.com/ e crear un repositorio.  
⚠️  A conta gratuita en Dockerhub da dereito a un unico repositorio privado, e os públicos que queiramos  
  
 -☢️  A idea de Dockerhub e que usemos un so repositorio por proxecto, de modo que so diferencia as imaxes por nome de repositorio e tag  
A solución e usar o tag para indicar o nome da imaxe (nginx-v1.0 como tag, por exemplo)  
  
Así poderemos poñer no repositorio privado imaxes de nginx, ssh, apache, servizo LAMP ... etc.  
  
📝  A continuación veremos como:  
 🞂  Iniciar sesión con docker login  
 🞂  Etiquetar a imaxe do xeito apropiado para Dockerhub  
 🞂  Subir a nosa imaxe (conven que teña un tag axeitado) con docker push  
 🞂  Pechar sesión con docker logout  
  
ℹ️   Supoñemos que xa temos unha conta en Dockerhub co username xavitag e temos creado un repositorio privado chamado iesrodeira  
  
🚀  Iniciamos sesión  
root@demo-system:~#  docker login  
Log in with your Docker ID or email address to push and pull images from Docker Hub. If you don't have a Docker ID, head over to https://hub.docker.com/ to create one.  
You can log in with your password or a Personal Access Token (PAT). Using a limited-scope PAT grants better security and is required for organizations using SSO. Learn more at https://docs.docker.com/go/access-t
okens/  
  
Username: xavitag  
Password:  
WARNING! Your password will be stored unencrypted in /root/.docker/config.json.  
Configure a credential helper to remove this warning. See  
https://docs.docker.com/engine/reference/commandline/login/#credentials-store  
  
Login Succeeded  
  
root@demo-system:~#  
🚀  Etiquetamos a imaxe (como e o noso unico repositorio privado, aproveitamos o tag para nomear a imaxe, e non so indicar a versión)  
root@demo-system:~#  docker image tag webserver:v1.0 xavitag/iesrodeira:webserver-v1.0  
 
  
root@demo-system:~#  
🚀  Subimos a imaxe recién etiquetada a Dockerhub  
root@demo-system:~#  docker image push xavitag/iesrodeira:webserver-v1.0  
The push refers to repository [docker.io/xavitag/iesrodeira]  
7dd1d5c20e38: Pushed  
a5ec5ec9d16c: Layer already exists  
webserver-v1.0: digest: sha256:508cfaa12bc9cf5565f61f7fb305cf1bbbd1a827e3fb55280a19ad65dc0de0c1 size: 741  
  
root@demo-system:~#  
🚀  Pechamos a sesión  
root@demo-system:~#  docker logout  
Removing login credentials for https://index.docker.io/v1/  
  
root@demo-system:~#  
📝  Imos instanciar un novo docker a partir da imaxe subida a Dockerhub, de modo que a eliminamos do almacen local  
 🞂 A imaxe subida a Dockerhub ten un TAG diferente que a imaxe de webserver-01 que está funcionando, de modo que a podemos eliminar sen mais.  
  
root@demo-system:~#  docker image list  
REPOSITORY           TAG              IMAGE ID       CREATED         SIZE  
xavitag/iesrodeira   webserver-v1.0   d4974efc08d8   4 minutes ago   207MB  
webserver            v1.0             d4974efc08d8   4 minutes ago   207MB  
officialpage         v1               97ae293aad06   8 minutes ago   160MB  
web-standard         latest           75937c1f7b3e   5 hours ago     178MB  
nginx                latest           07ccdb783875   12 days ago     160MB  
nginx                myversion-v1.0   07ccdb783875   12 days ago     160MB  
debian               latest           61d0976aceca   2 weeks ago     120MB  
  
root@demo-system:~#   docker image remove xavitag/iesrodeira:webserver-v1.0  
Untagged: xavitag/iesrodeira:webserver-v1.0  
Untagged: xavitag/iesrodeira@sha256:508cfaa12bc9cf5565f61f7fb305cf1bbbd1a827e3fb55280a19ad65dc0de0c1  
  
root@demo-system:~#  ✅  Podemos ver que a imaxe xa non existe  
root@demo-system:~#  docker image list  
REPOSITORY     TAG              IMAGE ID       CREATED         SIZE  
webserver      v1.0             d4974efc08d8   4 minutes ago   207MB  
officialpage   v1               97ae293aad06   8 minutes ago   160MB  
web-standard   latest           75937c1f7b3e   5 hours ago     178MB  
nginx          latest           07ccdb783875   12 days ago     160MB  
nginx          myversion-v1.0   07ccdb783875   12 days ago     160MB  
debian         latest           61d0976aceca   2 weeks ago     120MB  
  
root@demo-system:~#  
  
📝  Instanciamos o novo Docker a partir da nosa imaxe en Dockerhub.  
 🞂 ☢️ Necesitamos facer un login de novo en Dockerhub xa que antes fixemos un logout  
 🞂 ⚠️ Non podemos mapear o porto 80 porque xa está ocupado por webserver-01. Tamén mapeamos outros volumes para evitar conflictos  
root@demo-system:~#  docker login              
  
Username: xavitag  
Password:  
WARNING! Your password will be stored unencrypted in /root/.docker/config.json.  
Configure a credential helper to remove this warning. See  
https://docs.docker.com/engine/reference/commandline/login/#credentials-store  
  
Login Succeeded  
  
root@demo-system:~#  
  
root@demo-system:~#  docker run -d --name webserver-02 --hostname webserver-02 -p 81:80 -v r-nginx02-etc:/etc/nginx -v r-nginx02-sites:/var/www xavitag/iesrodeira:webserver-v1.0  
Unable to find image 'xavitag/iesrodeira:webserver-v1.0' locally  
webserver-v1.0: Pulling from xavitag/iesrodeira  
Digest: sha256:508cfaa12bc9cf5565f61f7fb305cf1bbbd1a827e3fb55280a19ad65dc0de0c1  
Status: Downloaded newer image for xavitag/iesrodeira:webserver-v1.0  
def716dc65b83b075deae17e9ad2b503ad09191a6106679ccbeb4ce9f12a9e1a  
  
root@demo-system:~#  ✅  Podemos ver o novo Docker webserver-02 funcionando  
root@demo-system:~#  docker ps  
CONTAINER ID   IMAGE  COMMAND                  CREATED         STATUS         PORTS  NAMES  
def716dc65b8   xavitag/iesrodeira:webserver-v1.0   "nginx -g 'daemon of…"   3 seconds ago   Up 3 seconds   0.0.0.0:81->80/tcp, :::81->80/tcp   webserver-02  
edaa59f35dae   webserver:v1.0  "nginx -g 'daemon of…"   2 minutes ago   Up 2 minutes   0.0.0.0:80->80/tcp, :::80->80/tcp   webserver-01  
1e0e0916832f   web-standard  "nginx -g 'daemon of…"   3 minutes ago   Up 3 minutes   80/tcp  web-from-dockerfile  
cc478e0e01f8   debian  "bash"                   7 minutes ago   Up 7 minutes  nginx-template  
8e96e081a539   officialpage:v1  "/docker-entrypoint.…"   8 minutes ago   Up 8 minutes   80/tcp  firstone  
afaa3e1cd346   nginx  "/docker-entrypoint.…"   9 minutes ago   Up 9 minutes   80/tcp  mywebpage  
  
root@demo-system:~#  ✅  Tamén podemos ver que a imaxe eliminada esta de novo no noso sistema  
root@demo-system:~#  docker image list  
REPOSITORY           TAG              IMAGE ID       CREATED         SIZE  
xavitag/iesrodeira   webserver-v1.0   d4974efc08d8   5 minutes ago   207MB  
webserver            v1.0             d4974efc08d8   5 minutes ago   207MB  
officialpage         v1               97ae293aad06   8 minutes ago   160MB  
web-standard         latest           75937c1f7b3e   5 hours ago     178MB  
nginx                latest           07ccdb783875   12 days ago     160MB  
nginx                myversion-v1.0   07ccdb783875   12 days ago     160MB  
debian               latest           61d0976aceca   2 weeks ago     120MB  
  
root@demo-system:~#  
 🞂 Pechamos a nosa sesión en Dockerhub  
  
root@demo-system:~#  docker logout  
Removing login credentials for https://index.docker.io/v1/  
  
root@demo-system:~#  
📝  Consultamos a páxina web de webserver-02 no porto 81  
root@demo-system:~#  wget http://localhost:81  
--2025-10-19 23:41:08--  http://localhost:81/  
Resolviendo localhost (localhost)... ::1, 127.0.0.1  
Conectando con localhost (localhost)[::1]:81... conectado.  
Petición HTTP enviada, esperando respuesta... 200 OK  
Longitud: 1418 (1,4K) [text/html]  
Grabando a: «index.html»  
  
index.html  100%[=====================================================================================================================>]   1,38K  --.-KB/s    en 0s       
  
2025-10-19 23:41:08 (59,6 MB/s) - «index.html» guardado [1418/1418]  
  
  
ℹ️   Vexamos a páxina.. 
```sh
root@demo-system:~#  cat index.html   
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Elegant Hello World</title>  
    <style>  
        body {  
            margin: 0;  
            padding: 0;  
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;  
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);  
            display: flex;  
            justify-content: center;  
            align-items: center;  
            min-height: 100vh;  
            color: #333;  
        }  
  
        .hello-container {  
            background: rgba(255, 255, 255, 0.95);  
            padding: 3rem 4rem;  
            border-radius: 15px;  
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);  
            text-align: center;  
            backdrop-filter: blur(10px);  
        }  
  
        h1 {  
            font-size: 3.5rem;  
            margin-bottom: 0.5rem;  
            background: linear-gradient(135deg, #667eea, #764ba2);  
            -webkit-background-clip: text;  
            background-clip: text;  
            color: transparent;  
        }  
  
        .subtitle {  
            font-size: 1.2rem;  
            color: #666;  
            font-weight: 300;  
        }  
    </style>  
</head>  
<body>  
    <div class="hello-container">  
        <h1>Hello, World!</h1>  
        <p class="subtitle">Welcome to my new nginx server.</p>  
    </div>  
</body>  
</html>  
```            