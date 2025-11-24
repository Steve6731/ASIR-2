=========================================================  
💾  Introdución a persistencia con Volumes en Docker  
=========================================================  
  
ℹ️  Un volume é un almacén de datos externo ao Docker.  
📝  Polo tanto os seus datos persisten entre borrados, actualizacións ou substitucións dos Docker  
  🞂  Permiten compartir datos entre Docker diferentes  
  🞂  Permiten compartir datos entre o Host e os Docker  
  🞂  Permiten configurar aspectos do Docker dende o Host  
  
ℹ️  Podemos distinguir entre distintos tipos de volumes:  
  🞂  Volumes anónimos: Docker crea un nome ao azar para o volume e o xestiona internamente. O seu uso se reduce a almacenamento temporal como cachés de datos.  
  🞂  Volumes con nome: Podemos elixir o nome, pero o lugar onde se almacenan os datos o xestiona Docker (En Debian e en /var/lib/docker/volumes)  
  🞂  Bind mounts:  Con estos volumes decidimos qué carpeta do host facemos dispoñible no contedor.  
  
ℹ️  Exemplos  
        VOLUMES ANÓNIMOS  
        ----------------  
        📝  Imos crear un docker de nginx a partir dunha imaxe almacenada no noso repositorio privado de Dockerhub  
            🞂  Mapearemos a volumes anónimos no host as carpetas /var/www e /etc/nginx  
  
        ℹ️  Inicialmente non temos volumes no sistema Docker (en /var/lib/docker/volumes)  
  
root@demo-system:~# ls -lhs /var/lib/docker/volumes  
total 24K  
  0 brw------- 1 root root 253, 0 oct 23 18:43 backingFsBlockDev  
24K -rw------- 1 root root    32K oct 23 23:17 metadata.db  
  
root@demo-system:~#  
  
        📝  Inciamos sesión en Dockerhub e lanzamos un docker cos volumes que queremos mapear no host usando a opción -v  
            🞂  O contedor Docker cando inicia copia o contido da carpeta ao volume creado de xeito automático si o volume aínda non existe  
            🞂  O proceso é login en dockerhub 👉 creacion do Docker e definición dos volumes 👉 logout  
  
        ℹ️  Unha vez realizado este proceso, teremos o docker funcionando e os volumes creados  
  
  
root@demo-system:~# docker login  
Log in with your Docker ID or email address to push and pull images from Docker Hub. If you don't have a Docker ID, head over to https://hub.docker.com/ to create one.  
You can log in with your password or a Personal Access Token (PAT). Using a limited-scope PAT grants better security and is required for organizations using SSO. Learn more at https://docs.docker.com/go/access-t
okens/  
  
Username: xavitag  
Password:  
WARNING! Your password will be stored unencrypted in /root/.docker/config.json.  
Configure a credential helper to remove this warning. See  
https://docs.docker.com/engine/reference/commandline/login/#credentials-store  
  
Login Succeeded  
  
root@demo-system:~# docker run -d -v /var/www -v /etc/nginx  --name server-01 --hostname server-01 xavitag/iesrodeira:webserver-v1.0  
Unable to find image 'xavitag/iesrodeira:webserver-v1.0' locally  
webserver-v1.0: Pulling from xavitag/iesrodeira  
cae3b572364a: Already exists  
6488189a911d: Pull complete  
Digest: sha256:508cfaa12bc9cf5565f61f7fb305cf1bbbd1a827e3fb55280a19ad65dc0de0c1  
Status: Downloaded newer image for xavitag/iesrodeira:webserver-v1.0  
14f620a6f60c910546604bfc609c05063590910377ce66a1bf43177bbb4967e3   

  
root@demo-system:~# ✅  Como vemos, xa temos o docker en funcionamento e a imaxe descargada, polo que podemos pechar a sesión en Dockerhub  
root@demo-system:~# docker ps  
CONTAINER ID   IMAGE  COMMAND                  CREATED         STATUS         PORTS     NAMES  
14f620a6f60c   xavitag/iesrodeira:webserver-v1.0   "nginx -g 'daemon of…"   4 seconds ago   Up 3 seconds   80/tcp    server-01  
  
root@demo-system:~# docker logout  
Removing login credentials for https://index.docker.io/v1/  
  
root@demo-system:~# ✅  Podemos ver que temos unha nova imaxe no noso sistema a partir da que podemos despregar novos Docker  
root@demo-system:~# docker image list  
REPOSITORY           TAG              IMAGE ID       CREATED      SIZE  
xavitag/iesrodeira   webserver-v1.0   d4974efc08d8   4 days ago   207MB  
  
root@demo-system:~# ✅  Podemos tamén que existen dous volumes novos no sistema  
root@demo-system:~# docker volume list  
DRIVER    VOLUME NAME  
local     0592ccc77c6e4c7cdab3663db3959d6be5096d1bc26b6dd480289addaef94840  
local     4830eb3c90b5dcb316c61b57132b5707a810dd38af8943e3cf08c4305c9772e1  
  
root@demo-system:~#  
        📝  O Docker creou os novos volumes en /var/lib/docker/volumes con un nome consistente nun UUID xerado ao azar  
            🞂  Tamén copiou ahí o contido inicial da carpeta correspondente do docker.  
            🞂  A partir dese momento o Docker usará a carpeta mapeada no host en lugar da carpeta da imaxe.  
        🐚 Examinemos eses directorios.  
```sh  
root@debian:/var/lib/docker/volumes# ls  
0592ccc77c6e4c7cdab3663db3959d6be5096d1bc26b6dd480289addaef94840  4830eb3c90b5dcb316c61b57132b5707a810dd38af8943e3cf08c4305c9772e1  backingFsBlockDev  metadata.db  
root@debian:/var/lib/docker/volumes# ls 0592ccc77c6e4c7cdab3663db3959d6be5096d1bc26b6dd480289addaef94840/  
_data  
root@debian:/var/lib/docker/volumes# ls 0592ccc77c6e4c7cdab3663db3959d6be5096d1bc26b6dd480289addaef94840/_data/  
conf.d  fastcgi.conf  fastcgi_params  koi-utf  koi-win  mime.types  modules-available  modules-enabled  nginx.conf  proxy_params  scgi_params  sites-available  sites-enabled  snippets  uwsgi_params  win-utf     
root@debian:/var/lib/docker/volumes# ls 4830eb3c90b5dcb316c61b57132b5707a810dd38af8943e3cf08c4305c9772e1/  
_data  
root@debian:/var/lib/docker/volumes# ls 4830eb3c90b5dcb316c61b57132b5707a810dd38af8943e3cf08c4305c9772e1/_data/  
html  
root@debian:/var/lib/docker/volumes# ls 4830eb3c90b5dcb316c61b57132b5707a810dd38af8943e3cf08c4305c9772e1/_data/html/  
index.html  index.nginx-debian.html  
root@debian:/var/lib/docker/volumes# cat 4830eb3c90b5dcb316c61b57132b5707a810dd38af8943e3cf08c4305c9772e1/_data/html/index.html    
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
root@debian:/var/lib/docker/volumes# exit  
exit  
```

  
        ℹ️  Como podemos ver, temos acceso ao contido do docker nestes volumes e podemos modificalo dende o host.  
  
        ℹ️  Cando eliminemos o Docker, podemos eliminar os seus volumes con docker image remove <nome_volume>  
           O problema e que o nome_volume e largo e dificil de recordar xa que está xerado ao azar.  
           🞂  Si queremos eliminar todas os volumes anónimos sen Docker asociado podemos usar docker image prune  
  
           A continuación paramos e eliminamos o docker e os seus volumes asociados.  
  
root@demo-system:~# docker ps  
CONTAINER ID   IMAGE  COMMAND                  CREATED          STATUS          PORTS     NAMES  
14f620a6f60c   xavitag/iesrodeira:webserver-v1.0   "nginx -g 'daemon of…"   53 seconds ago   Up 52 seconds   80/tcp    server-01  
  
root@demo-system:~# docker stop server-01  
server-01  
  
root@demo-system:~# docker ps -a  
CONTAINER ID   IMAGE  COMMAND                  CREATED          STATUS  PORTS     NAMES  
14f620a6f60c   xavitag/iesrodeira:webserver-v1.0   "nginx -g 'daemon of…"   59 seconds ago   Exited (0) 3 seconds ago             server-01  
  
root@demo-system:~# docker remove server-01  
server-01  
  
root@demo-system:~# docker volume prune  
WARNING! This will remove anonymous local volumes not used by at least one container.  
Are you sure you want to continue? [y/N] y  
Deleted Volumes:  
0592ccc77c6e4c7cdab3663db3959d6be5096d1bc26b6dd480289addaef94840  
4830eb3c90b5dcb316c61b57132b5707a810dd38af8943e3cf08c4305c9772e1  
  
Total reclaimed space: 23.98kB  
  
root@demo-system:~# ✅  Como vemos xa está eliminado o docker  
root@demo-system:~# docker ps -a  
CONTAINER ID   IMAGE     COMMAND   CREATED   STATUS    PORTS     NAMES  
  
root@demo-system:~# ✅  Tamén están eliminados os volumes  
root@demo-system:~# docker volume list  
DRIVER    VOLUME NAME  
  
root@demo-system:~#  
  
        ℹ️  O problema principal dos volumes sen nome (Anónimos) e que non son fáciles de reutilizar xa que teñen un nome posto ao azar  
           por esa razón o seu uso e para ocasións puntuais como a creación de cachés ou logs.  
  
        VOLUMES CON NOME  
        ----------------  
        📝  Imos crear un novo docker de nginx a partir da mesma imaxe xa descargada de Dockerhub  
            🞂  Mapearemos a volumes con nome no host as carpetas /var/www e /etc/nginx  
            🞂  Asociaremos /var/www co volumen nginx-webpage e /etc/nginx co volumen nginx-conf  
  
        ℹ️  Inicialmente non temos volumes no sistema Docker (en /var/lib/docker/volumes)  
  
root@demo-system:~# ls -lhs /var/lib/docker/volumes
total 24K  
  0 brw------- 1 root root 253, 0 oct 23 18:43 backingFsBlockDev  
24K -rw------- 1 root root    32K oct 23 23:20 metadata.db  
  
root@demo-system:~#  
  
        📝  Lanzamos un docker cos volumes que queremos mapear no host usando a opción -v  
            🞂  Igual que antes, o contedor Docker cando inicia copia o contido da carpeta ao volume creado de xeito automático si o volume aínda non existe  
  
        ℹ️  Unha vez realizado este proceso, teremos o docker funcionando e os volumes creados  
  
root@demo-system:~# docker run -d -v nginx-webpage:/var/www -v nginx-conf:/etc/nginx  --name server-01 --hostname server-01 xavitag/iesrodeira:webserver-v1.0  
24ae1e79355a8663cfaa0eb05a9a5514c0dab380e553fb24f6487dc527d33cac  
  
root@demo-system:~# ✅  Como vemos, xa temos o docker en funcionamento  
root@demo-system:~# docker ps  
CONTAINER ID   IMAGE  COMMAND                  CREATED         STATUS         PORTS     NAMES  
24ae1e79355a   xavitag/iesrodeira:webserver-v1.0   "nginx -g 'daemon of…"   4 seconds ago   Up 3 seconds   80/tcp    server-01  
  
root@demo-system:~#  
  
        📝  O Docker creou os novos volumes en /var/lib/docker/volumes cos nomes indicados  
            🞂  Tamén copia ahí o contido inicial da carpeta correspondente do docker si os volumes están recen creados ou baleiros.  
            🞂  A partir dese momento o Docker usará a carpeta mapeada no host en lugar da carpeta da imaxe.  
        🐚 Examinemos eses directorios.  
```sh  
root@demo-system:~# ls /var/lib/docker/volumes  
backingFsBlockDev  metadata.db  nginx-conf  nginx-webpage  
  
root@demo-system:~# ls /var/lib/docker/volumes/nginx-conf/_data  
conf.d  fastcgi.conf  fastcgi_params  koi-utf  koi-win  mime.types  modules-available  modules-enabled  nginx.conf  proxy_params  scgi_params  sites-available  sites-enabled  snippets  uwsgi_params  win-utf     
  
root@demo-system:~# ls /var/lib/docker/volumes/nginx-webpage/_data  
html  
  
root@demo-system:~# ls /var/lib/docker/volumes/nginx-webpage/_data/html         
index.html  index.nginx-debian.html  
  
root@demo-system:~# cat /var/lib/docker/volumes/nginx-webpage/_data/html/index.html  
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
  
root@demo-system:~#    
```
        ℹ️  Como podemos ver, temos acceso ao contido do docker nestes volumes e podemos modificalo dende o host.  
  
        ℹ️  Podemos tamén ver a configuración dun volume con docker volume inspect  
  
root@demo-system:~# docker volume inspect nginx-conf  
[  
    {  
        "CreatedAt": "2025-10-23T23:20:56+02:00",  
        "Driver": "local",  
        "Labels": null,  
        "Mountpoint": "/var/lib/docker/volumes/nginx-conf/_data",  
        "Name": "nginx-conf",  
        "Options": null,  
        "Scope": "local"  
    }  
]  
  
root@demo-system:~#  
        ℹ️  Cando eliminemos o Docker, non poderemos eliminar os volumes con docker image prune  e debemos usar docker image remove <nome_volume>  
        📝  A eliminación de volumes con nome é menos común, xa que permiten entre outras cousas:  
            🞂  Conservar o contido si cambiamos o contedor Docker por outro máis actual  
            🞂  Compartir información entre diferentes Docker  
          {DOR} Realizar tarefas de configuración dende o host  
  
root@demo-system:~# docker ps  
CONTAINER ID   IMAGE  COMMAND                  CREATED          STATUS          PORTS     NAMES  
24ae1e79355a   xavitag/iesrodeira:webserver-v1.0   "nginx -g 'daemon of…"   33 seconds ago   Up 32 seconds   80/tcp    server-01  
  
root@demo-system:~# docker stop server-01  
server-01  
  
root@demo-system:~# docker ps -a  
CONTAINER ID   IMAGE  COMMAND                  CREATED          STATUS  PORTS     NAMES  
24ae1e79355a   xavitag/iesrodeira:webserver-v1.0   "nginx -g 'daemon of…"   39 seconds ago   Exited (0) 3 seconds ago             server-01  
  
root@demo-system:~# docker remove server-01  
server-01  
  
root@demo-system:~# docker ps -a  
CONTAINER ID   IMAGE     COMMAND   CREATED   STATUS    PORTS     NAMES  
  
root@demo-system:~# docker volume remove nginx-webpage  
nginx-webpage  
  
root@demo-system:~# docker volume remove nginx-conf  
nginx-conf  
  
root@demo-system:~# docker volume list  
DRIVER    VOLUME NAME  
  
root@demo-system:~# ✅  Como vemos xa está eliminado o docker e os volumes    
  
  
=============================  
Creación explícita de Volumes  
=============================  
  
📝  En lugar de crear os volumes no momento de despregar o Docker, e posible crear os volumes previamente  
  🞂  Cando creamos un Docker podemos indicar co parámetro -v que utilice eses volumes xa creados  
  🞂  Cando arrancamos un Docker se activan os volumes (se montan si é necesario)  
  
ℹ️  Esta aproximación é máis flexible, e permite:  
  🞂  A creación de volumes en sitios diferentes a /var/lib/docker/volumes  
  🞂  Sobrepoñer arquivos e directorios do host a arquivos e directorios no Docker, substituíndo na práctica o seu contido  
  🞂  Uso de distintos sistemas de almacenamento como lvm, nfs, sshfs, glusterfs, ceph, tmpfs... mediante o uso de plugins  
  
⚙️  Simplemente debemos crear os volumes previamente con docker volume create e a continuación indicamos con -v onde os imos a usar dentro do Docker.  
⚠️  O contido do directorio mapeado dentro do Docker se copiará ao volume cando arranque o Docker unicamente si o destino está baleiro  
  
ℹ️  Exemplos  
        VOLUMES CON NOME SIMPLE  
        -----------------------  
        📝  Se crea un volume en /var/lib/docker/volumes co nome indicado.  
            🞂  E o equvalente a -v nome_carpeta_docker no lanzamento do docker  
            🞂  O Docker poderá acceder a esa información na carpeta indicada con -v  
  
ℹ️  Veremos un Exemplo.  
  
✅  Listamos os volumes presentes actualmente  
root@demo-system:~# docker volume list  
DRIVER    VOLUME NAME  
  
root@demo-system:~# ✅  Creamos un novo volume chamado nginx-conf  
root@demo-system:~# docker volume create nginx-conf  
nginx-conf  
  
root@demo-system:~# ✅  Comprobamos que agora temos o volume ningx-conf  
root@demo-system:~# docker volume list  
DRIVER    VOLUME NAME  
local     nginx-conf  
  
root@demo-system:~# ✅  Con docker volume inspect nginx-conf podemos ver os datos do volume  
root@demo-system:~# docker volume inspect nginx-conf  
[  
    {  
        "CreatedAt": "2025-10-23T23:22:16+02:00",  
        "Driver": "local",  
        "Labels": null,  
        "Mountpoint": "/var/lib/docker/volumes/nginx-conf/_data",  
        "Name": "nginx-conf",  
        "Options": null,  
        "Scope": "local"  
    }  
]          

root@demo-system:~# ✅  Comprobamos o contido do volume no host  
root@demo-system:~# ls -lhs /var/lib/docker/volumes/nginx-conf/_data  
total 0  
  
root@demo-system:~# ✅  Creamos e arrancamos un docker que mapea o contido de /etc/nginx dentro do docker ao volume nginx-conf  
root@demo-system:~# docker run -d --name server-01 -v nginx-conf:/etc/nginx xavitag/iesrodeira:webserver-v1.0  
8ef3c1982cffee8585762822e20e80dcaa72ee0fd78da51bbd43fe385a0eceb0  
  
root@demo-system:~# ✅  Podemos observar que o Docker copiou o contido de /etc/nginx ao volume, xa que previamente o volume estaba baleiro  
root@demo-system:~# ls -lhs /var/lib/docker/volumes/nginx-conf/_data  
total 68K  
4,0K drwxr-xr-x 2 root root 4,0K ago 29 16:10 conf.d  
4,0K -rw-r--r-- 1 root root 1,1K ago 29 16:10 fastcgi.conf  
4,0K -rw-r--r-- 1 root root 1,1K ago 29 16:10 fastcgi_params  
4,0K -rw-r--r-- 1 root root 2,8K ago 29 16:10 koi-utf  
4,0K -rw-r--r-- 1 root root 2,2K ago 29 16:10 koi-win  
8,0K -rw-r--r-- 1 root root 5,4K ago 29 16:10 mime.types  
4,0K drwxr-xr-x 2 root root 4,0K ago 29 16:10 modules-available  
4,0K drwxr-xr-x 2 root root 4,0K ago 29 16:10 modules-enabled  
4,0K -rw-r--r-- 1 root root 1,6K ago 29 16:10 nginx.conf  
4,0K -rw-r--r-- 1 root root  180 ago 29 16:10 proxy_params  
4,0K -rw-r--r-- 1 root root  636 ago 29 16:10 scgi_params  
4,0K drwxr-xr-x 2 root root 4,0K oct 23 23:22 sites-available  
4,0K drwxr-xr-x 2 root root 4,0K oct 23 23:22 sites-enabled  
4,0K drwxr-xr-x 2 root root 4,0K oct 23 23:22 snippets  
4,0K -rw-r--r-- 1 root root  664 ago 29 16:10 uwsgi_params  
4,0K -rw-r--r-- 1 root root 3,0K ago 29 16:10 win-utf  
  
root@demo-system:~#  
  
ℹ️  Si xa non queremos o docker ni o volume, podemos borralos. Non se pode borrar un volume si existe un Docker que o usa  
✅  Paramos e eliminamos o Docker  
root@demo-system:~# docker stop server-01  
server-01  
  
root@demo-system:~# docker remove server-01  
server-01  
  
root@demo-system:~# ✅  Eliminamos o volume e comprobamos que xa non existe  
root@demo-system:~# docker volume remove nginx-conf  
nginx-conf  
  
root@demo-system:~# docker volume list  
DRIVER    VOLUME NAME  
  
root@demo-system:~# root@demo-system:~# ls /var/lib/docker/volumes  
backingFsBlockDev  metadata.db  
  
  
  
        MONTAXES BIND  
        -------------  
        📝  Se crea un volume en /var/lib/docker/volumes co nome indicado  
            🞂  Cando o Docker arranque, se montará a carpeta do host indicada mediante bind na carpeta correspondente no Docker.  
            🞂  O Docker poderá acceder a esa información na carpeta indicada con -v  
  
ℹ️  Veremos un exemplo.  
  
ℹ️  Imos usar como volume o directorio /home/xavi/webpages/helloworld, que ten unha páxina web index.html de benvida  
  🞂  Logo crearei un Docker de apache2 que servirá esa páxina web.  
  
✅  Miramos a lista actual de volumes, e creamos o novo volume bind chamado shared-data  
root@demo-system:~# docker volume list  
DRIVER    VOLUME NAME  
  
root@demo-system:~# docker volume create --opt type=none --opt device=/home/xavi/webpages/helloworld --opt o=bind  shared-data  
shared-data  
  
root@demo-system:~# docker volume list  
DRIVER    VOLUME NAME  
local     shared-data  
  
root@demo-system:~# ✅  Como vemos, xa aparece o novo volume.  
root@demo-system:~# docker volume inspect shared-data  
[  
    {  
        "CreatedAt": "2025-10-23T23:23:14+02:00",  
        "Driver": "local",  
        "Labels": null,  
        "Mountpoint": "/var/lib/docker/volumes/shared-data/_data",  
        "Name": "shared-data",  
        "Options": {  
            "device": "/home/xavi/webpages/helloworld",  
            "o": "bind",  
            "type": "none"  
        },  
        "Scope": "local"  
    }  
]  
  
root@demo-system:~# ✅  Cando arranque un Docker que ofreza o servizo Web, basta con poñer este volume como raiz do servidor, e servirá a páxina de benvida.  
✅  Examinemos o contido actual do volume  
root@demo-system:~# ls -lhs /var/lib/docker/volumes/shared-data/_data   
total 0  
  
root@demo-system:~# ⚠️  Como o volume xa ten información (index.html), non se copiará nada de server-01 ao volume  
  
✅  Creamos e arrancamos un novo Docker que utilizará este volume shared-data na súa carpeta /var/www/html  
root@demo-system:~# docker run -d --name server-01 -p 80:80 -v shared-data:/var/www/html xavitag/iesrodeira:webserver-v1.0  
c4c96721370a7c3ecfd7594c3a33b960063edf006183c05d3a402d131af1ccf1  
  
root@demo-system:~# ✅  Facemos DNAT do porto 80 para que se poda consultar a web dende fora do host. Examinemos o contido do volume como se ve no host  
root@demo-system:~# ls -lhs /var/lib/docker/volumes/shared-data/_data  
total 4,0K  
4,0K -rw-rw-r-- 1 root root 1,6K oct 21 22:40 index.html  
  
root@demo-system:~# ✅  E agora, dende dentro do Docker  
```sh  
root@demo-system:~# docker exec server-01 cat /var/www/html/index.html        
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Elegant Greeting</title>  
    <style>  
        /* CSS for Elegance and Centering */  
        body {  
            font-family: 'Georgia', serif; /* A classic, elegant serif font */  
            background-color: #f4f4f9; /* Light, subtle background color */  
            color: #333; /* Dark text for contrast */  
            display: flex;  
            justify-content: center; /* Center horizontally */  
            align-items: center; /* Center vertically */  
            height: 100vh; /* Full viewport height */  
            margin: 0;  
            text-align: center;  
        }  
        .container {  
            padding: 40px 60px;  
            border: 1px solid #ddd;  
            border-radius: 12px; /* Softly rounded corners */  
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */  
            background-color: #fff;  
        }  
        h1 {  
            font-size: 2.5em; /* Large, noticeable heading */  
            color: #5d5c61; /* A muted, sophisticated color */  
            margin-bottom: 0.5em;  
            letter-spacing: 1px; /* Slight spacing for an open feel */  
        }  
        p {  
            font-size: 1.1em;  
            color: #8c8c8c; /* Slightly lighter text for secondary message */  
        }  
    </style>  
</head>  
<body>  
    <div class="container">  
        <h1>Hello World!! 👋</h1>  
        <p>A simple, yet elegant, beginning to something great.</p>  
    </div>  
</body>  
</html>            
```

root@demo-system:~# ✅  Consultemos a páxina web dende o host  
```sh  
root@demo-system:~# wget http://localhost  
--2025-10-23 23:23:50--  http://localhost/  
Resolviendo localhost (localhost)... ::1, 127.0.0.1  
Conectando con localhost (localhost)[::1]:80... conectado.  
Petición HTTP enviada, esperando respuesta... 200 OK  
Longitud: 1573 (1,5K) [text/html]  
Grabando a: «index.html»  
  
index.html  100%[=====================================================================================================================>]   1,54K  --.-KB/s    en 0s       
  
2025-10-23 23:23:50 (214 MB/s) - «index.html» guardado [1573/1573]  
  
  
root@demo-system:~# cat index.html 
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Elegant Greeting</title>  
    <style>  
        /* CSS for Elegance and Centering */  
        body {  
            font-family: 'Georgia', serif; /* A classic, elegant serif font */  
            background-color: #f4f4f9; /* Light, subtle background color */  
            color: #333; /* Dark text for contrast */  
            display: flex;  
            justify-content: center; /* Center horizontally */  
            align-items: center; /* Center vertically */  
            height: 100vh; /* Full viewport height */  
            margin: 0;  
            text-align: center;  
        }  
        .container {  
            padding: 40px 60px;  
            border: 1px solid #ddd;  
            border-radius: 12px; /* Softly rounded corners */  
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */  
            background-color: #fff;  
        }  
        h1 {  
            font-size: 2.5em; /* Large, noticeable heading */  
            color: #5d5c61; /* A muted, sophisticated color */  
            margin-bottom: 0.5em;  
            letter-spacing: 1px; /* Slight spacing for an open feel */  
        }  
        p {  
            font-size: 1.1em;  
            color: #8c8c8c; /* Slightly lighter text for secondary message */  
        }  
    </style>  
</head>  
<body>  
    <div class="container">  
        <h1>Hello World!! 👋</h1>  
        <p>A simple, yet elegant, beginning to something great.</p>  
    </div>  
</body>  
</html>  
```

root@demo-system:~#  
  
        MONTAXES DE DISPOSITIVOS  
        ------------------------  
        📝  Se crea un volume en /var/lib/docker/volumes co nome indicado.  
            🞂  Cando o docker arranque se monta o dispositivo indicado (partición, volume lóxico, dispositivo loop..) na carpeta correspondente no Docker  
            🞂  O Docker poderá acceder a información presente no dispositivo na carpeta indicada con -v  
  
⚠️  En Linux, cando damos formato a un volume lóxico ou partición adoita crearse unha carpeta chamada lost+found.  
  🞂  A presenza desa carpeta impide a copia inicial do contido da carpeta do Docker. Podemos borrala si o desexamos con *rmdir lost+found  
  
✅  Temos un volume lóxico chamado system/testdocker (podería ser /dev/sda1) con formato ext4  
root@demo-system:~# mount /dev/system/testdocker /mnt  
  
root@demo-system:~# ls /mnt  
  
root@demo-system:~# ✅  Como podemos ver, no dispositivo non temos nada de información. O primeiro Docker que use o volume, copiará aquí a súa información.  
root@demo-system:~# umount /mnt  
  
root@demo-system:~# ✅  Como vemos podemos montalo e mirar o seu contido  
  
root@demo-system:~# docker volume list  
DRIVER    VOLUME NAME  
local     shared-data  
  
root@demo-system:~# ✅  Imos crear o volume lvm-volume que cando o use un Docker fará a montaxe de /dev/system/testdocker en /var/lib/docker/volumes/lvm-volume/_data  
root@demo-system:~# docker volume create --opt type=ext4 --opt device=/dev/system/testdocker lvm-volume  
lvm-volume  
  
root@demo-system:~# docker volume list  
DRIVER    VOLUME NAME  
local     lvm-volume  
local     shared-data  
  
root@demo-system:~# ✅  Como vemos, xa aparece o novo volume. Imos inspeccionalo.  
root@demo-system:~# docker volume inspect lvm-volume  
[  
    {  
        "CreatedAt": "2025-10-23T23:24:13+02:00",  
        "Driver": "local",  
        "Labels": null,  
        "Mountpoint": "/var/lib/docker/volumes/lvm-volume/_data",  
        "Name": "lvm-volume",  
        "Options": {  
            "device": "/dev/system/testdocker",  
            "type": "ext4"  
        },  
        "Scope": "local"  
    }  
]  
  
root@demo-system:~#  
  
✅  Creamos e arrancamos un docker chamado server-02 que mapea o contido de /etc/nginx dentro do docker no volume lvm-volume  
root@demo-system:~# docker run -d --name server-02 -v lvm-volume:/etc/nginx xavitag/iesrodeira:webserver-v1.0  
0dc1ac3e72571bc9c71701a1da47ad79287af63d41c6b1a45534d8c0aeec31ef  
  
root@demo-system:~# ✅  Cando arranca o docker, se monta o dispositivo  
root@demo-system:~# mount |grep volumes  
/dev/mapper/system-home on /var/lib/docker/volumes/shared-data/_data type ext4 (rw,relatime)  
/dev/mapper/system-testdocker on /var/lib/docker/volumes/lvm-volume/_data type ext4 (rw,relatime)  
  
root@demo-system:~# ✅  Podemos observar que o Docker copiou o contido de /etc/nginx ao volume, xa que previamente o volume estaba baleiro  
root@demo-system:~# ls -lhs /var/lib/docker/volumes/lvm-volume/_data  
total 68K  
4,0K drwxr-xr-x 2 root root 4,0K ago 29 16:10 conf.d  
4,0K -rw-r--r-- 1 root root 1,1K ago 29 16:10 fastcgi.conf  
4,0K -rw-r--r-- 1 root root 1,1K ago 29 16:10 fastcgi_params  
4,0K -rw-r--r-- 1 root root 2,8K ago 29 16:10 koi-utf  
4,0K -rw-r--r-- 1 root root 2,2K ago 29 16:10 koi-win  
8,0K -rw-r--r-- 1 root root 5,4K ago 29 16:10 mime.types  
4,0K drwxr-xr-x 2 root root 4,0K ago 29 16:10 modules-available  
4,0K drwxr-xr-x 2 root root 4,0K ago 29 16:10 modules-enabled  
4,0K -rw-r--r-- 1 root root 1,6K ago 29 16:10 nginx.conf  
4,0K -rw-r--r-- 1 root root  180 ago 29 16:10 proxy_params  
4,0K -rw-r--r-- 1 root root  636 ago 29 16:10 scgi_params  
4,0K drwxr-xr-x 2 root root 4,0K oct 23 23:24 sites-available  
4,0K drwxr-xr-x 2 root root 4,0K oct 23 23:24 sites-enabled  
4,0K drwxr-xr-x 2 root root 4,0K oct 23 23:24 snippets  
4,0K -rw-r--r-- 1 root root  664 ago 29 16:10 uwsgi_params  
4,0K -rw-r--r-- 1 root root 3,0K ago 29 16:10 win-utf  
  
root@demo-system:~#  
        MONTAXES NFS  
        ------------  
        📝  Os volumes NFS permiten almacenar información nun servidor remoto mediante o protocolo NFS  
            🞂  Se crea un volume en /var/lib/docker/volumes co nome indicado e se monta ahí unha carpeta remota mediante nfs cando arrancamos o Docker  
            🞂  O Docker poderá acceder a información presente no dispositivo na carpeta indicada con -v  
  
root@demo-system:~# docker volume list  
DRIVER    VOLUME NAME  
local     lvm-volume  
local     shared-data  
  
root@demo-system:~# ✅  Imos crear un volume que cando o use un Docker montará o share remoto /volumes/helloworld do servidor 192.168.122.133 en /var/lib/docker/volumes/nfs-volume/_data  
root@demo-system:~# docker volume create --opt type=nfs --opt o=addr=192.168.122.123,nfsvers=4,sec=sys,nolock --opt device=:/volumes/helloworld nfs-volume  
nfs-volume  
  
root@demo-system:~# docker volume list  
DRIVER    VOLUME NAME  
local     lvm-volume  
local     nfs-volume  
local     shared-data  
  
root@demo-system:~# ✅  Como vemos, temos o volume creado. Miremos como é:  
root@demo-system:~# docker volume inspect nfs-volume  
[  
    {  
        "CreatedAt": "2025-10-23T23:24:47+02:00",  
        "Driver": "local",  
        "Labels": null,  
        "Mountpoint": "/var/lib/docker/volumes/nfs-volume/_data",  
        "Name": "nfs-volume",  
        "Options": {  
            "device": ":/volumes/helloworld",  
            "o": "addr=192.168.122.123,nfsvers=4,sec=sys,nolock",  
            "type": "nfs"  
        },  
        "Scope": "local"  
    }  
]  
  
root@demo-system:~#  
✅  Antes do seu uso o seu contido e este:  
root@demo-system:~# ls -lhs /var/lib/docker/volumes/nfs-volume/_data  
total 0  
  
root@demo-system:~# ✅  Arrancamos o docker. Usaremos o volume en /var/www/html e facemos dispoñible o servizo no porto 81 o 80 está ocupado  
root@demo-system:~# docker run -d --name server-03 -v nfs-volume:/var/www/html -p 81:80 xavitag/iesrodeira:webserver-v1.0  
e75fb85fcd80337018cc47bf6c354897feaa0f7155c0c4933456a9b876a58d58  
  
root@demo-system:~# ✅  Podemos ver o volume montado  
root@demo-system:~# mount |grep volumes  
/dev/mapper/system-home on /var/lib/docker/volumes/shared-data/_data type ext4 (rw,relatime)  
/dev/mapper/system-testdocker on /var/lib/docker/volumes/lvm-volume/_data type ext4 (rw,relatime)  
:/volumes/helloworld on /var/lib/docker/volumes/nfs-volume/_data type nfs4 (rw,relatime,vers=4.0,rsize=262144,wsize=262144,namlen=255,hard,proto=tcp,timeo=600,retrans=2,sec=sys,clientaddr=192.168.122.89,local_lo
ck=none,addr=192.168.122.123)  
  
root@demo-system:~# ✅  Vexamos o contido mirando dende o host, e dende o Docker  
root@demo-system:~# ls -lhs /var/lib/docker/volumes/nfs-volume/_data  
total 4,0K  
4,0K -rw-rw-r-- 1 root root 1,6K oct 21 22:43 index.html  
  
root@demo-system:~# root@demo-system:~# docker exec server-03 ls /var/www/html  
index.html  
  
root@demo-system:~# ✅  Consultemos a páxina web dende o host  
```sh
root@demo-system:~# wget http://localhost:81       
--2025-10-23 23:25:26--  http://localhost:81/  
Resolviendo localhost (localhost)... ::1, 127.0.0.1  
Conectando con localhost (localhost)[::1]:81... conectado.  
Petición HTTP enviada, esperando respuesta... 200 OK  
Longitud: 1573 (1,5K) [text/html]  
Grabando a: «index.html»  
  
index.html  100%[=====================================================================================================================>]   1,54K  --.-KB/s    en 0s       
  
2025-10-23 23:25:26 (200 MB/s) - «index.html» guardado [1573/1573]  

  
root@demo-system:~# cat index.html  
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Elegant Greeting</title>  
    <style>  
        /* CSS for Elegance and Centering */  
        body {  
            font-family: 'Georgia', serif; /* A classic, elegant serif font */  
            background-color: #f4f4f9; /* Light, subtle background color */  
            color: #333; /* Dark text for contrast */  
            display: flex;  
            justify-content: center; /* Center horizontally */  
            align-items: center; /* Center vertically */  
            height: 100vh; /* Full viewport height */  
            margin: 0;  
            text-align: center;  
        }  
        .container {  
            padding: 40px 60px;  
            border: 1px solid #ddd;  
            border-radius: 12px; /* Softly rounded corners */  
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */  
            background-color: #fff;  
        }  
        h1 {  
            font-size: 2.5em; /* Large, noticeable heading */  
            color: #5d5c61; /* A muted, sophisticated color */  
            margin-bottom: 0.5em;  
            letter-spacing: 1px; /* Slight spacing for an open feel */  
        }  
        p {  
            font-size: 1.1em;  
            color: #8c8c8c; /* Slightly lighter text for secondary message */  
        }  
    </style>  
</head>  
<body>  
    <div class="container">  
        <h1>Hello World!! 👋</h1>  
        <p>A simple, yet elegant, beginning to something great.</p>  
    </div>  
</body>  
</html>  
```
  
root@demo-system:~#  
        MONTAXES MEDIANTE PLUGINS  
        -------------------------  
        📝  Mediante o uso de plugins e posible crear volumes de moitos máis tipos  
            🞂  Sistemas distribuidos de clustering como glusterfs ou ceph  
            🞂  Sistemas baseados na nube como amazon, azure, google .. etc  
            🞂  Neste exemplo utilizaremos un plugin que nos permite utilizar sshfs para montar directorios remotos a traǘes do protocolo SSH*  
            🞂  O punto de montaxe no host depende do plugin.  
               ℹ️  Neste caso particular este plugin monta a a carpeta remota mediante sshfs en /var/lib/docker/plugins/<UUID> cando arrancamos o Docker  
            🞂  O Docker poderá acceder a información presente no dispositivo na carpeta indicada con -v  
  
ℹ️  Imos instalar o plugin vieux/sshfs que permite crear volumes remotos sshfs. O plugin se obten de Dockerhub  
root@demo-system:~# docker plugin install vieux/sshfs  
Plugin "vieux/sshfs" is requesting the following privileges:  
 - network: [host]  
 - mount: [/var/lib/docker/plugins/]  
 - mount: []  
 - device: [/dev/fuse]  
 - capabilities: [CAP_SYS_ADMIN]  
Do you grant the above permissions? [y/N] y  
latest: Pulling from vieux/sshfs  
Digest: sha256:1d3c3e42c12138da5ef7873b97f7f32cf99fb6edde75fa4f0bcf9ed277855811  
52d435ada6a4: Complete  
Installed plugin vieux/sshfs  
  
root@demo-system:~# docker plugin enable vieux/sshfs  
Error response from daemon: plugin already enabled: plugin vieux/sshfs:latest is enabled  
  
root@demo-system:~# docker plugin ls  
ID             NAME                 DESCRIPTION               ENABLED  
987239960bd1   vieux/sshfs:latest   sshFS plugin for Docker   true  
  
root@demo-system:~# ✅  Como vemos, ademáis de instalar o plugin, é necesario activalo.  
  
root@demo-system:~# docker volume list  
DRIVER    VOLUME NAME  
local     lvm-volume  
local     nfs-volume  
local     shared-data  
  
root@demo-system:~# ✅  Imos crear o volume sshfs. Neste caso o directorio /home/user/webpages do servidor ssh 192.168.122.123, accedendo coas credenciais e permisos do usuario useri  
root@demo-system:~# docker volume create --driver vieux/sshfs -o sshcmd=user@192.168.122.123:./webpages -o password=abc123. -o allow_other -o uid=0   -o gid=0 sshfs-volume  
sshfs-volume  
  
root@demo-system:~# docker volume list  
DRIVER               VOLUME NAME  
local                lvm-volume  
local                nfs-volume  
local                shared-data  
vieux/sshfs:latest   sshfs-volume  
  
root@demo-system:~# ✅  Como vemos xa aparece sshfs-volume  
root@demo-system:~# docker volume inspect sshfs-volume  
  
[  
    {  
        "CreatedAt": "0001-01-01T00:00:00Z",  
        "Driver": "vieux/sshfs:latest",  
        "Labels": null,  
        "Mountpoint": "/mnt/volumes/39c746c0f175c849a94234e5c84c6a09",  
        "Name": "sshfs-volume",  
        "Options": {  
            "allow_other": "",  
            "gid": "0",  
            "password": "abc123.",  
            "sshcmd": "user@192.168.122.123:./webpages",  
            "uid": "0"  
        },  
        "Scope": "local"  
    }  
]  
  
root@demo-system:~# ✅  Aqui vemos a información do volume  
ℹ️  Creamos e lanzamos un docker usando este volume para o raiz de html. Facilitamos o servizo web no porto 82  
docker run -d -p 82:80 --name server-04 -v sshfs-volume:/var/www/html xavitag/iesrodeira:webserver-v1.0  
26d83483cb7d0062c1ea28f171dddaca6ab67ef959af9d0134aef1df0ff76595  
  
root@demo-system:~# df -h  
S.ficheros  Tamaño Usados  Disp Uso% Montado en  
udev  966M      0  966M   0% /dev  
tmpfs  198M   1,1M  197M   1% /run  
/dev/mapper/system-root            64G   2,5G   58G   5% /  
tmpfs  987M    24K  987M   1% /dev/shm  
tmpfs  5,0M      0  5,0M   0% /run/lock  
tmpfs  1,0M      0  1,0M   0% /run/credentials/systemd-journald.service  
tmpfs  987M      0  987M   0% /tmp  
/dev/mapper/system-home           9,8G    90M  9,2G   1% /home  
tmpfs  1,0M      0  1,0M   0% /run/credentials/getty@tty1.service  
tmpfs  198M   8,0K  198M   1% /run/user/1000  
overlay  64G   2,5G   58G   5% /var/lib/docker/overlay2/76db5a094604c63fd3b608b807622cf367783333c0574f8eb5fdc84bc97f4fbf/merged  
overlay  64G   2,5G   58G   5% /var/lib/docker/overlay2/64aff7a5d22ec3ad78969c5b9c40c204340fec798bb7434c28c2746c435d7d59/merged  
/dev/system/testdocker            974M   344K  906M   1% /var/lib/docker/volumes/lvm-volume/_data  
overlay  64G   2,5G   58G   5% /var/lib/docker/overlay2/1b227607f4b33b1c11727261a77654db02aa54503a4e2de635f0ccb8b3b99dfe/merged  
:/volumes/helloworld               64G   4,1G   57G   7% /var/lib/docker/volumes/nfs-volume/_data  
overlay  64G   2,5G   58G   5% /var/lib/docker/overlay2/9f8c90b48e4326a9e0ea9c5d983b74408482313cd1785ddd30460a1b05bfd314/merged  
user@192.168.122.123:./webpages    15G   144K   14G   1% /var/lib/docker/plugins/987239960bd1210cd0f6b04d82d193d744494f6128adf7df4a51a2ff63f90b1e/propagated-mount/39c746c0f175c849a94234e5c84c6a09                
  
root@demo-system:~# ℹ️  Aqui podemos ver a montaxe no host  
root@demo-system:~# docker exec server-04 df -h  
Filesystem  Size  Used Avail Use% Mounted on  
overlay  64G  2.5G   58G   5% /  
tmpfs  64M     0   64M   0% /dev  
shm  64M     0   64M   0% /dev/shm  
/dev/mapper/system-root           64G  2.5G   58G   5% /etc/hosts  
user@192.168.122.123:./webpages   15G  144K   14G   1% /var/www/html  
tmpfs  987M     0  987M   0% /proc/asound  
tmpfs  987M     0  987M   0% /proc/acpi  
tmpfs  987M     0  987M   0% /sys/firmware  
  
root@demo-system:~# ℹ️  E aquí vemos a montaxe dentro do Docker  
docker exec server-04 ls /var/www/html  
index.html  
index.nginx-debian.html  
```sh  
root@demo-system:~# root@demo-system:~# wget http://localhost:82    
--2025-10-23 23:26:36--  http://localhost:82/  
Resolviendo localhost (localhost)... ::1, 127.0.0.1  
Conectando con localhost (localhost)[::1]:82... conectado.  
Petición HTTP enviada, esperando respuesta... 200 OK  
Longitud: 1418 (1,4K) [text/html]  
Grabando a: «index.html»  
  
index.html  100%[=====================================================================================================================>]   1,38K  --.-KB/s    en 0s       
  
2025-10-23 23:26:36 (61,2 MB/s) - «index.html» guardado [1418/1418]        
  
root@demo-system:~# cat index.html     
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
📝  con docker plugin disable vieux/sshfs:latest e docker plugin remove vieux/sshfs:latest podemos eliminar o plugin cando ningún volume o utilice  
  
  