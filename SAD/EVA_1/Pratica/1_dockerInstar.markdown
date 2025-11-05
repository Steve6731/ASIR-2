# copia de vidio texto
```sh
root@demo-system:~# apt update  
  
Obj:1 http://deb.debian.org/debian trixie InRelease  
Obj:2 http://security.debian.org/debian-security trixie-security InRelease  
Todos los paquetes están actualizados.  
  
root@demo-system:~# apt install docker.io docker-compose 

root@demo-system:~# systemctl status docker  
  
● docker.service - Docker Application Container Engine  
     Loaded: loaded (/usr/lib/systemd/system/docker.service; enabled; preset: enabled)  
     Active: active (running) since Fri 2025-10-17 20:29:53 CEST; 4s ago  
 Invocation: a05e76a3ffc44b86aff28dd773ae3081  
TriggeredBy: ● docker.socket  
       Docs: https://docs.docker.com  
   Main PID: 28784 (dockerd)  
      Tasks: 9  
     Memory: 29.8M (peak: 31.7M)  
        CPU: 376ms  
     CGroup: /system.slice/docker.service  
             └─28784 /usr/sbin/dockerd -H fd:// --containerd=/run/containerd/containerd.sock   

root@demo-system:~# systemctl status containerd  
  
● containerd.service - containerd container runtime  
     Loaded: loaded (/usr/lib/systemd/system/containerd.service; enabled; preset: enabled)  
     Active: active (running) since Fri 2025-10-17 20:29:50 CEST; 9s ago  
 Invocation: 8db184674df542969952d81e3accdc42  
       Docs: https://containerd.io  
   Main PID: 28662 (containerd)  
      Tasks: 8  
     Memory: 11.1M (peak: 12.8M)  
        CPU: 94ms  
     CGroup: /system.slice/containerd.service  
             └─28662 /usr/bin/containerd 
```

ℹ️     Docker utiliza varios subsistemas:  
🐳 Contedores, 📦  Imaxes, 🌐 Redes e 💾  Volumes  
  
Todas elas se xestionan mediante o comando 'docker'.  
  
🞂 docker [run, exec, start, stop]  
🞂 docker image ...  
🞂 docker network ...  
🞂 docker volume ...     

```sh
root@demo-system:~# docker ps -a  
  
CONTAINER ID   IMAGE     COMMAND   CREATED   STATUS    PORTS     NAMES  
  
```  
  
📝  Podemos ver as columnas CONTAINER ID, IMAGE, COMMAND, CREATED, STATUS, PORTS e NAMES  
  
Estas columnas corresponden con :  
🞂 CONTAINER ID: UUID do Container  
🞂 IMAGE: Nome da imaxe  
🞂 COMMAND: Ultimo comando executado, Data de Creación  
🞂 CREATED: Data de creación do contedor  
🞂 STATUS: Estado do contedor - (Exited, Stopped, Up, Created)  
🞂 PORTS: Portos que usa o contedor  
🞂 NAME: Nome do contedor  
  
⚠️  Como podemos ver, non temos ningún contedor no sistema  
  
ℹ️  Con docker ps -q ou docker ps -aq obteremos so os ID  
  
Iso o fai moi util para operacións en masa como:  
🞂 Parar todos os Docker en execución ao mesmo tempo: (docker stop $(docker ps -q))  
🞂 Eliminar todos os Docker que non estén Up: (docker remove $(docker ps -aq))  

## 📦 Listado de imaxes dispoñibles no sistema  
  
Unha imaxe docker e un ficheiro a partir do que se poden crear contedores docker.  
Podemos obtelas de repositorios públicos como GitHub  
ou crear as nosas propias imaxes, normalmente a partir dunha xa preexistente  
  
### ⚙️  Podemos ver o conxunto de comandos dispoñibles para xestionar imaxes docker:  
  
```sh  
root@demo-system:~# docker image --help  
  
  
Usage:  docker image COMMAND  
  
Manage images  
  
Commands:  
  build       Build an image from a Dockerfile  
  history     Show the history of an image  
  import      Import the contents from a tarball to create a filesystem image  
  inspect     Display detailed information on one or more images  
  load        Load an image from a tar archive or STDIN  
  ls          List images  
  prune       Remove unused images  
  pull        Download an image from a registry  
  push        Upload an image to a registry  
  rm          Remove one or more images  
  save        Save one or more images to a tar archive (streamed to STDOUT by default)  
  tag         Create a tag TARGET_IMAGE that refers to SOURCE_IMAGE  
  
Run 'docker image COMMAND --help' for more information on a command.  
  
```  
⚙️  O seguinte comando lista todas as imaxes que temos no noso sistema  
```sh  
root@demo-system:~# docker image list  
  
REPOSITORY   TAG       IMAGE ID   CREATED   SIZE  
  
root@demo-system:~# 
```  
📝 Aqui podemos ver as columnas REPOSITORY, TAG, IMAGE ID, CREATED e SIZE  
  
Estas columnas corresponden a:  
🞂 REPOSITORY: Nome en dockerhub (ou en outro repositorio)  
🞂 TAG: Etiqueta da imaxe  
🞂 IMAGE ID: UUID da imaxe  
🞂 CREATED: Data de creación  
🞂 SIZE: Tamano do volume  
  
⚠️  Como podemos ver, non temos ningúnha imaxe no sistema  
Nun futuro veremos todas as opcións con máis detalle   

====== 💾 Listado de volumes no sistema ======  
  
Un volume e un área fora do docker onde este pode gardar información de xeito persistente  
Pode ser nomeado ou non nomeado, creado de xeito explícito ou creado localmente con docker run -v.  
pode tamén facerse unha montaxe dunha carpeta xa existente ou dun ficheiro (bind mount)  
  
⚙️  Podemos ver o conxunto de comandos dispoñibles para xestionar volumes docker:  
```sh  
root@demo-system:~# docker volume --help  
  
  
Usage:  docker volume COMMAND  
  
Manage volumes  
  
Commands:  
  create      Create a volume  
  inspect     Disp lay detailed information on one or more volumes  
  ls          List volumes  
  prune       Remove unused local volumes  
  rm          Remove one or more volumes  
  
Run 'docker volume COMMAND --help' for more information on a command.  
  
root@demo-system:~#  
```  
⚙️  O seguinte comando lista todos os volumes que temos no noso sitema  
```sh  
root@demo-system:~# docker volume list  
  
DRIVER    VOLUME NAME  
  
root@demo-system:~#  
```  
📝 Aqui podemos ver as columnas DRIVER e VOLUME NAME  
  
Estas columnas corresponden a:  
🞂 DRIVER: Indica como será a conexión do volume (sistema local ou remoto (nfs, sshfs, ceph..)  
🞂 NAME: Nome do volume  
  
⚠️  Como podemos ver, non temos ningún volume no sistema  
Nun futuro veremos todas as opcións con máis detalle

===== 🌐 Listado de redes do sistema ======  
  
Unha 'rede' en Docker indica un xeito de conexión dos Docker definido polo driver empregado  
Por defecto dispoñemos dos driver 'bridge', host' e none.  
  
  
🞂  bridge: Se crea un bridge ao que se conectarán os docker, polo que se verán entre eles.  
                Tamén se insertan regras NAT para que teñan saida a internet.  
🞂  host: Os docker utilizan o stack de rede do host e comparten a IP do host  
🞂  none: Os docker que utiizan esta rede non terán conexión  
  
⚙️  Podemos ver o conxunto de comandos dispoñibles para xestionar as redes docker:  
```sh  
root@demo-system:~# docker network --help  
  
  
Usage:  docker network COMMAND  
  
Manage networks  
  
Commands:  
  connect     Connect a container to a network  
  create      Create a network  
  disconnect  Disconnect a container from a network  
  inspect     Display detailed information on one or more networks  
  ls          List networks  
  prune       Remove all unused networks  
  rm          Remove one or more networks  
  
Run 'docker network COMMAND --help' for more information on a command.      
```
⚙️  O seguinte comando lista todas as redes para docker que temos no noso sistema  
```sh  
root@demo-system:~# docker network list  
  
NETWORK ID     NAME      DRIVER    SCOPE  
7f4f45072941   bridge    bridge    local  
82a5926c9e00   host      host      local  
43dc29d9d003   none      null      local  
  
root@demo-system:~#  
```  
📝 Aqui podemos ver as columnas NETWORK ID, NAME e BRIDGE  
  
Estas columnas corresponden a:  
🞂 NETWORK ID: UUID que identifica a rede  
🞂 NAME: Nome da rede  
🞂 DRIVER: Driver empregado pola rede  
  
Podemos observar a existencia de tres redes de tipo bridge, host e none chamadas bridge, host e none  
🔌  A rede 'bridge' crea unha ponte docker0 a que se conectarán os Docker si non se indca  
outra rede.  
🖥️  O sistema Docker se encarga de ir asignando IP as máquinas 

⚙️  Podemos examinar a rede bridge (que e a rede por defecto) con detalle:  
📝 Como podemos ver, esta rede crea unha ponte chamada docker0  

```sh  
root@demo-system:~# docker network inspect bridge  
  
[  
    {  
        "Name": "bridge",  
        "Id": "7f4f450729410e7d5e287156960773d7d55a14d414e1f23c36e25960ab0d0dbc",  
        "Created": "2025-10-17T20:29:52.975896804+02:00",  
        "Scope": "local",  
        "Driver": "bridge",  
        "EnableIPv6": false,  
        "IPAM": {  
            "Driver": "default",  
            "Options": null,  
            "Config": [  
                {  
  "Subnet": "172.17.0.0/16",  
  "Gateway": "172.17.0.1"  
                }  
            ]  
        },  
        "Internal": false,  
        "Attachable": false,  
        "Ingress": false,  
        "ConfigFrom": {  
            "Network": ""  
        },  
        "ConfigOnly": false,  
        "Containers": {},  
        "Options": {  
            "com.docker.network.bridge.default_bridge": "true",  
            "com.docker.network.bridge.enable_icc": "true",  
            "com.docker.network.bridge.enable_ip_masquerade": "true",  
            "com.docker.network.bridge.host_binding_ipv4": "0.0.0.0",  
            "com.docker.network.bridge.name": "docker0",  
            "com.docker.network.driver.mtu": "1500"  
        },  
        "Labels": {}  
    }  
]             
```  

ℹ️   A rede bridge crea unha ponte docker0 e lle asigna unha IP que será o gateway para os Docker conectados a esa rede  
  
📝 Esta ponte bridge ten habitualmente a IP 172.17.0.1/16  
Docker se encargará de asignar unha IP a cada docker  
```sh  
root@demo-system:~# ip link list type bridge  
  
3: docker0: <NO-CARRIER,BROADCAST,MULTICAST,UP> mtu 1500 qdisc noqueue state DOWN mode DEFAULT group default  
    link/ether 02:42:dd:26:9f:9d brd ff:ff:ff:ff:ff:ff  
  
root@demo-system:~#  
  
root@demo-system:~# ip addr show docker0  
  
3: docker0: <NO-CARRIER,BROADCAST,MULTICAST,UP> mtu 1500 qdisc noqueue state DOWN group default  
    link/ether 02:42:dd:26:9f:9d brd ff:ff:ff:ff:ff:ff  
    inet 172.17.0.1/16 brd 172.17.255.255 scope global docker0  
       valid_lft forever preferred_lft forever  
    inet6 fe80::42:ddff:fe26:9f9d/64 scope link proto kernel_ll  
       valid_lft forever preferred_lft forever  
  
root@demo-system:~#  
  
root@demo-system:~# ip route show  
  
default via 192.168.122.1 dev enp1s0  
172.17.0.0/16 dev docker0 proto kernel scope link src 172.17.0.1 linkdown  
192.168.122.0/24 dev enp1s0 proto kernel scope link src 192.168.122.89    
```
  
⚙️  Tamén podemos observar que ten NAT habilitado  
```s  
root@demo-system:~# nft list table nat  
  
# Warning: table ip nat is managed by iptables-nft, do not touch!    
  
table ip nat {  
        chain POSTROUTING {  
                type nat hook postrouting priority srcnat; policy accept;  
                ip saddr 172.17.0.0/16 oifname != "docker0" counter packets 59 bytes 3561 masquerade  
        }  
  
        chain PREROUTING {  
                type nat hook prerouting priority dstnat; policy accept;  
                fib daddr type local counter packets 0 bytes 0 jump DOCKER  
        }  
  
        chain OUTPUT {  
                type nat hook output priority dstnat; policy accept;  
                ip daddr != 127.0.0.0/8 fib daddr type local counter packets 0 bytes 0 jump DOCKER  
        }  
  
        chain DOCKER {  
                iifname "docker0" counter packets 0 bytes 0 return  
        }  
}  
  
root@demo-system:~#  
```  
⚠️   A liña relevante é o MASQUERADE no chain POSTROUTING  
  
         