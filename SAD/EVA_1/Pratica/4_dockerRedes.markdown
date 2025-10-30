  
=====================================================  
🌐  Xestión da conectividade de rede con Docker  
=====================================================  
  
1. INTRODUCCIÓN  
  
ℹ️  Docker conecta os diferentes contedores entre si e coas redes externas empregando drivers que definen o xeito de conexión.  
  🞂  As redes ou network indican os modos e parámetros de conexón que poden utilizar os contedores Docker cando se crean.  
  🞂  Para definir as redes se poden usar distintos tipos de plugins (drivers) como bridge, overlay (vxlan) ou macvlan  
  🞂  A instalación de Docker proporciona varias redes preconfiguradas que facilitan a conectividade básica con pouco traballo:  
  
         - bridge: Esta rede emprega o driver bridge, e define un bridge chamado docker0 normalmente coa IP 172.17.0.1/24  
             🞂  Docker asignará automáticamente unha IP as interfaces dos docker que se echufen a docker0  
             🞂  Docker insertará unha regra SNAT para facilitar aos docker conectados a docker0 acceso as redes externas.  
         - host: Esta rede emprega o driver host. Os docker conectados a esta rede utilizarán a IP do host e estarán conectados directamente a súa pila TCP/IP  
         - none: Os docker conectados a none non teñen rede  
  
📝  A rede bridge (Docker conectados a docker0) non permite elixir a IP dos docker que se conectan a ela. As IP as xestiona Docker directamente  
    🞂  Si non se especifica nada, os Docker terán unha tarxeta de rede conectada a rede bridge  
  
✅  Con este comando podemos ver as rede dispoñibles  
root@demo-system:~# docker network list  
NETWORK ID     NAME      DRIVER    SCOPE  
1f64e8ef8656   bridge    bridge    local  
82a5926c9e00   host      host      local  
43dc29d9d003   none      null      local  
  
root@demo-system:~#  
  
  🞂  Os Docker que non especifiquen nada se conectarán a rede bridge. O sistema Docker se encargará de asignarlle unha IP  
  🞂  Si non queremos rede no docker podemos indicar --network none no momento de crear o Docker ou lanzalo con docker run  
  🞂  A rede host e para que o docker teña conexión directa coa rede do host. Non é aconsellable si temos varios Docker ou ofrecemos servizos a rede, xa que todos compartirán IP  
  
  
  
2. A REDE POR DEFECTO: O bridge docker0  
  
  🞂  📝  Imos a inspeccionar características da rede bridge  
  
root@demo-system:~# docker network inspect bridge  
[  
    {  
        "Name": "bridge",  
        "Id": "1f64e8ef8656dda35eebe9e973147307788680ccb473c6b6bbeab4b36f3c783a",  
        "Created": "2025-10-24T17:05:40.396570344+02:00",  
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
  
root@demo-system:~# ✅  Aquí podemos ver as características desta rede, en particularidad a dirección de rede e o gateway, que será a IP do bridge  
  
  🞂  IPAM e o sistema de asignación de IP interno de Docker. Se poden usar varios drivers (plugins) para alterar esa política.  
           - O sistema proporciona default e none.  
           - Existen drivers de terceiros para diferentes configuracións de rede como dhcp  
           - E posible cambiar o driver IPAM coa opción --ipam-driver= durante a creación da rede.  

  
root@demo-system:~# ip link show type bridge  
4: docker0: <NO-CARRIER,BROADCAST,MULTICAST,UP> mtu 1500 qdisc noqueue state DOWN mode DEFAULT group default  
    link/ether 02:42:ad:fb:c8:97 brd ff:ff:ff:ff:ff:ff  
  
root@demo-system:~# ip addr show  
1: lo: <LOOPBACK,UP,LOWER_UP> mtu 65536 qdisc noqueue state UNKNOWN group default qlen 1000  
    link/loopback 00:00:00:00:00:00 brd 00:00:00:00:00:00  
    inet 127.0.0.1/8 scope host lo  
       valid_lft forever preferred_lft forever  
    inet6 ::1/128 scope host noprefixroute  
       valid_lft forever preferred_lft forever  
2: enp1s0: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc fq_codel state UP group default qlen 1000  
    link/ether 52:54:00:b5:fc:c3 brd ff:ff:ff:ff:ff:ff  
    altname enx525400b5fcc3  
    inet 192.168.122.89/24 brd 192.168.122.255 scope global dynamic enp1s0  
       valid_lft 2647sec preferred_lft 2647sec  
    inet6 fe80::5054:ff:feb5:fcc3/64 scope link proto kernel_ll  
       valid_lft forever preferred_lft forever  
4: docker0: <NO-CARRIER,BROADCAST,MULTICAST,UP> mtu 1500 qdisc noqueue state DOWN group default  
    link/ether 02:42:ad:fb:c8:97 brd ff:ff:ff:ff:ff:ff  
    inet 172.17.0.1/16 brd 172.17.255.255 scope global docker0  
       valid_lft forever preferred_lft forever  
    inet6 fe80::42:adff:fefb:c897/64 scope link proto kernel_ll  
       valid_lft forever preferred_lft forever  
  
root@demo-system:~# ✅  Podemos observar como están configuradas as IP dos sistema e o bridge docker0  
  
🌐  Os Docker creados sin indicar rede, se conectan ao switch virtual docker0 da rede bridge  
          🞂  Non é posible na creación dun Docker conectado a rede bridge asignar unha IP de xeito manual. O sistema Docker a asignará de xeito automático.  
          🞂  Non é posible na creación dun Docker conectado a rede bridge asignar unha porta de enlace de xeito manual. O sistema Docker a asignará de xeito automático.  
  
ℹ️  O seguinte Docker estará conectado a rede bridge mediante o switch virtual docker0  
root@demo-system:~# bridge link show master docker0  
  
root@demo-system:~# ✅  Este e o estado previo do bridge docker0 antes de crear e lanzar o novo docker server_default  
  
root@demo-system:~# docker run -d --name=server_default --hostname defaultHost xavitag/iesrodeira:webserver-v1.0  
db83bc269cb21ea1abbf6a5ad8faeeaf80248e8ab9dc7ec846d0c1597b6da0e2  
  
root@demo-system:~# bridge link show master docker0  
140: vethac72634@if139: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master docker0 state forwarding priority 32 cost 2  
  
root@demo-system:~# ✅  Este e o estado do bridge docker0 unha vez server_default está en funcionamento.  
  
✅  vexamos a IP que recibe o Docker server_default  
  
root@demo-system:~# docker exec server_default ip route show  
default via 172.17.0.1 dev eth0  
172.17.0.0/16 dev eth0 proto kernel scope link src 172.17.0.2  

  
root@demo-system:~# docker exec server_default ip a s  
1: lo: <LOOPBACK,UP,LOWER_UP> mtu 65536 qdisc noqueue state UNKNOWN group default qlen 1000  
    link/loopback 00:00:00:00:00:00 brd 00:00:00:00:00:00  
    inet 127.0.0.1/8 scope host lo  
       valid_lft forever preferred_lft forever  
    inet6 ::1/128 scope host proto kernel_lo  
       valid_lft forever preferred_lft forever  
139: eth0@if140: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP group default  
    link/ether 02:42:ac:11:00:02 brd ff:ff:ff:ff:ff:ff link-netnsid 0  
    inet 172.17.0.2/16 brd 172.17.255.255 scope global eth0  
       valid_lft forever preferred_lft forever  
  
root@demo-system:~#  
  
ℹ️  Examinando o Docker podemos ver información sobre a súa conexión a rede, como as súas IP, direccións MAC e Gateway 

root@demo-system:~# docker inspect server_default         
#...
            "Volumes": null,  
            "WorkingDir": "",  
            "Entrypoint": [  
                "nginx",  
                "-g",  
                "daemon off;"  
            ],  
            "OnBuild": null,  
            "Labels": {}  
        },  
        "NetworkSettings": {  
            "Bridge": "",  
            "SandboxID": "068ef236a3784d0bdb68068ee76698b6c1301327d6a915fbdf60db94b9d6dcd2",  
            "SandboxKey": "/var/run/docker/netns/068ef236a378",  
            "Ports": {  
                "80/tcp": null  
            },  
            "HairpinMode": false,  
            "LinkLocalIPv6Address": "",  
            "LinkLocalIPv6PrefixLen": 0,  
            "SecondaryIPAddresses": null,  
            "SecondaryIPv6Addresses": null,  
            "EndpointID": "129af847762c7568a8d774ac3e0d3178190742479eea929f886a5612d65351ed",  
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
  "NetworkID": "1f64e8ef8656dda35eebe9e973147307788680ccb473c6b6bbeab4b36f3c783a",  
  "EndpointID": "129af847762c7568a8d774ac3e0d3178190742479eea929f886a5612d65351ed",  
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

  
root@demo-system:~#  
  
ℹ️   🞂  Si non necesitamos rede no docker, bastará indicar que queremos usar a rede none.  
  
root@demo-system:~# bridge link show master docker0  
140: vethac72634@if139: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master docker0 state forwarding priority 32 cost 2  
  
root@demo-system:~# docker run -d --name=server_nonet --hostname host_nonet --network none xavitag/iesrodeira:webserver-v1.0  
d79298c5fcceaed67c3ca7c986fd086b83ce28c08ed32d629f0ed26018434392  
  
root@demo-system:~# bridge link show master docker0  
140: vethac72634@if139: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master docker0 state forwarding priority 32 cost 2  
  
root@demo-system:~# ✅  Como vemos, non aparece ningunha interface nova no bridge.  
  
  🞂  Vexamos a configuración do Docker  
root@demo-system:~# docker inspect server_nonet  

#...
            "Cmd": null,  
            "Image": "xavitag/iesrodeira:webserver-v1.0",  
            "Volumes": null,  
            "WorkingDir": "",  
            "Entrypoint": [  
                "nginx",  
                "-g",  
                "daemon off;"  
            ],  
            "OnBuild": null,  
            "Labels": {}  
        },  
        "NetworkSettings": {  
            "Bridge": "",  
            "SandboxID": "b00c0c65313853727c8f874153d9590eaa96b63a3b57577861a2fbdd4383fcb0",  
            "SandboxKey": "/var/run/docker/netns/b00c0c653138",  
            "Ports": {},  
            "HairpinMode": false,  
            "LinkLocalIPv6Address": "",  
            "LinkLocalIPv6PrefixLen": 0,  
            "SecondaryIPAddresses": null,  
            "SecondaryIPv6Addresses": null,  
            "EndpointID": "",  
            "Gateway": "",  
            "GlobalIPv6Address": "",  
            "GlobalIPv6PrefixLen": 0,  
            "IPAddress": "",  
            "IPPrefixLen": 0,  
            "IPv6Gateway": "",  
            "MacAddress": "",  
            "Networks": {  
                "none": {  
  "IPAMConfig": null,  
  "Links": null,  
  "Aliases": null,  
  "MacAddress": "",  
  "NetworkID": "43dc29d9d003345c663e373823063ad968501a7df52dddd71e4ebcb18824ddfa",  
  "EndpointID": "ff8fa6a84c2ef82dbf25048439610b7397cb5a08d49f5be81ad249ceaf73031b",  
  "Gateway": "",  
  "IPAddress": "",  
  "IPPrefixLen": 0,  
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

  
root@demo-system:~# ✅  Comprobamos a ausencia de interfaces e IP no Docker server_nonet, polo tanto, tampouco ten IP:  
  
root@demo-system:~# docker exec server_nonet ip a s  
1: lo: <LOOPBACK,UP,LOWER_UP> mtu 65536 qdisc noqueue state UNKNOWN group default qlen 1000  
    link/loopback 00:00:00:00:00:00 brd 00:00:00:00:00:00  
    inet 127.0.0.1/8 scope host lo  
       valid_lft forever preferred_lft forever  
    inet6 ::1/128 scope host proto kernel_lo  
       valid_lft forever preferred_lft forever  
  
root@demo-system:~# ✅  Esta é a configuración IP dentro do Docker  
  
3. CREACION DE REDES DOCKER  
  
ℹ️  E posible definir novas redes para os servizos Docker co comando docker network create:  
  
root@demo-system:~# docker network create --help  
  
Usage:  docker network create [OPTIONS] NETWORK  
  
Create a network  
  
Options:  
      --attachable           Enable manual container attachment  
      --aux-address map      Auxiliary IPv4 or IPv6 addresses used by Network driver (default map[])  
      --config-from string   The network from which to copy the configuration  
      --config-only          Create a configuration only network  
  -d, --driver string        Driver to manage the Network (default "bridge")  
      --gateway strings      IPv4 or IPv6 Gateway for the master subnet  
      --ingress              Create swarm routing-mesh network  
      --internal             Restrict external access to the network  
      --ip-range strings     Allocate container ip from a sub-range  
      --ipam-driver string   IP Address Management Driver (default "default")  
      --ipam-opt map         Set IPAM driver specific options (default map[])  
      --ipv6                 Enable IPv6 networking  
      --label list           Set metadata on a network  
  -o, --opt map              Set driver specific options (default map[])  
      --scope string         Control the network's scope  
      --subnet strings       Subnet in CIDR format that represents a network segment  
  
  
📝  Imos crear unha nova rede chamada redeA con todos os parámetros por defecto.  
          🞂  Nas redes creadas manualmente e posible elixir a IP (que será o gateway) e nome do bridge.  
  
ℹ️   🞂  Este e o estado previo do noso Host  
  
root@demo-system:~# ip link show type bridge  
4: docker0: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP mode DEFAULT group default  
    link/ether 02:42:ad:fb:c8:97 brd ff:ff:ff:ff:ff:ff  
  
root@demo-system:~# ✅  Como vemos soamente temos o switch virtual docker0 correspondente a rede bridge.  
  
  
  🞂  Procedemos a crear a nova rede redeA e examinamos o resultado  
  
root@demo-system:~# docker network create redeA  
870d55a06598dceb474479107d4be8b11dcaeb571a995b1d571d8984c5fe73ab  
  
root@demo-system:~# ip link show type bridge  
4: docker0: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP mode DEFAULT group default  
    link/ether 02:42:ad:fb:c8:97 brd ff:ff:ff:ff:ff:ff  
141: br-870d55a06598: <NO-CARRIER,BROADCAST,MULTICAST,UP> mtu 1500 qdisc noqueue state DOWN mode DEFAULT group default  
    link/ether 02:42:7a:74:9a:9e brd ff:ff:ff:ff:ff:ff  
  
root@demo-system:~# ip address show  
1: lo: <LOOPBACK,UP,LOWER_UP> mtu 65536 qdisc noqueue state UNKNOWN group default qlen 1000  
    link/loopback 00:00:00:00:00:00 brd 00:00:00:00:00:00  
    inet 127.0.0.1/8 scope host lo  
       valid_lft forever preferred_lft forever  
    inet6 ::1/128 scope host noprefixroute  
       valid_lft forever preferred_lft forever  
2: enp1s0: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc fq_codel state UP group default qlen 1000  
    link/ether 52:54:00:b5:fc:c3 brd ff:ff:ff:ff:ff:ff  
    altname enx525400b5fcc3  
    inet 192.168.122.89/24 brd 192.168.122.255 scope global dynamic enp1s0  
       valid_lft 2547sec preferred_lft 2547sec  
    inet6 fe80::5054:ff:feb5:fcc3/64 scope link proto kernel_ll  
       valid_lft forever preferred_lft forever  
4: docker0: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP group default  
    link/ether 02:42:ad:fb:c8:97 brd ff:ff:ff:ff:ff:ff  
    inet 172.17.0.1/16 brd 172.17.255.255 scope global docker0  
       valid_lft forever preferred_lft forever  
    inet6 fe80::42:adff:fefb:c897/64 scope link proto kernel_ll  
       valid_lft forever preferred_lft forever  
140: vethac72634@if139: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue master docker0 state UP group default  
    link/ether 0e:12:da:02:34:1e brd ff:ff:ff:ff:ff:ff link-netnsid 0  
    inet6 fe80::c12:daff:fe02:341e/64 scope link proto kernel_ll  
       valid_lft forever preferred_lft forever  
141: br-870d55a06598: <NO-CARRIER,BROADCAST,MULTICAST,UP> mtu 1500 qdisc noqueue state DOWN group default  
    link/ether 02:42:7a:74:9a:9e brd ff:ff:ff:ff:ff:ff  
    inet 192.168.0.1/20 brd 192.168.15.255 scope global br-870d55a06598  
       valid_lft forever preferred_lft forever  
  
root@demo-system:~# ✅  Como vemos, aparece un novo bridge. Podemos ver a IP asignada ao novo bridge.    
  
  🞂  Inspeccionameos as características da nova rede.  
  
docker network inspect redeA  
[  
    {  
        "Name": "redeA",  
        "Id": "870d55a06598dceb474479107d4be8b11dcaeb571a995b1d571d8984c5fe73ab",  
        "Created": "2025-10-25T16:03:25.821253732+02:00",  
        "Scope": "local",  
        "Driver": "bridge",  
        "EnableIPv6": false,  
        "IPAM": {  
            "Driver": "default",  
            "Options": {},  
            "Config": [  
                {  
  "Subnet": "192.168.0.0/20",  
  "Gateway": "192.168.0.1"  
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
        "Options": {},  
        "Labels": {}  
    }  
]  
  
root@demo-system:~#  
  
        ✅  Como podemos ver:  
          🞂  Docker crea un novo switch virtual chamado br-<uuid>  
          🞂  Docker asigna unha IP ao bridge, que será o gateway da nova rede.  
          🞂  Todos os Docker que usen redeA terán unha IP do rango e usarán a IP da ponte como porta de enlace (gateway)  
  
  
📝  Imos crear, arrancar e inspeccionar un Docker conectado a redeA chamado server_redeA  
  
root@demo-system:~# docker run -d --name=server_redeA --hostname redAhost --network redeA xavitag/iesrodeira:webserver-v1.0  
d6eb9beb937ea9c1944c64c94c307b1b3a18a106f16019e2b3820c25b8f5df44  
  
root@demo-system:~# bridge link show  
140: vethac72634@if139: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master docker0 state forwarding priority 32 cost 2  
143: vethdaccb5b@if142: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master br-870d55a06598 state forwarding priority 32 cost 2  
  
root@demo-system:~# ✅  Como podemos observar, aparece un novo interface conectado ao bridge da redeA br-xxxxxx  
  
ℹ️   🞂  Examinemos as IP dentro do Docker  
  
docker exec server_redeA ip route show  
default via 192.168.0.1 dev eth0  
192.168.0.0/20 dev eth0 proto kernel scope link src 192.168.0.2  
  
root@demo-system:~# docker exec server_redeA ip a s  
1: lo: <LOOPBACK,UP,LOWER_UP> mtu 65536 qdisc noqueue state UNKNOWN group default qlen 1000  
    link/loopback 00:00:00:00:00:00 brd 00:00:00:00:00:00  
    inet 127.0.0.1/8 scope host lo  
       valid_lft forever preferred_lft forever  
    inet6 ::1/128 scope host proto kernel_lo  
       valid_lft forever preferred_lft forever  
142: eth0@if143: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP group default  
    link/ether 02:42:c0:a8:00:02 brd ff:ff:ff:ff:ff:ff link-netnsid 0  
    inet 192.168.0.2/20 brd 192.168.15.255 scope global eth0  
       valid_lft forever preferred_lft forever  
  
root@demo-system:~# ⚠️  Neste caso, o sistema Docker se ocupa de asignarlle unha IP porque non especificamos ningunha IP en concreto na creación do Docker.  
  
  
ℹ️   🞂  Vexamos a súa información completa:  
  
root@demo-system:~# docker inspect server_redeA    

#...
                "-g",  
                "daemon off;"  
            ],  
            "OnBuild": null,  
            "Labels": {}  
        },  
        "NetworkSettings": {  
            "Bridge": "",  
            "SandboxID": "ac4dd75a1be8b9a8aeea8951d39ffcfe2b3757220a8569b4579db98ea51f9761",  
            "SandboxKey": "/var/run/docker/netns/ac4dd75a1be8",  
            "Ports": {  
                "80/tcp": null  
            },  
            "HairpinMode": false,  
            "LinkLocalIPv6Address": "",  
            "LinkLocalIPv6PrefixLen": 0,  
            "SecondaryIPAddresses": null,  
            "SecondaryIPv6Addresses": null,  
            "EndpointID": "",  
            "Gateway": "",  
            "GlobalIPv6Address": "",  
            "GlobalIPv6PrefixLen": 0,  
            "IPAddress": "",  
            "IPPrefixLen": 0,  
            "IPv6Gateway": "",  
            "MacAddress": "",  
            "Networks": {  
                "redeA": {  
  "IPAMConfig": null,  
  "Links": null,  
  "Aliases": null,  
  "MacAddress": "02:42:c0:a8:00:02",  
  "NetworkID": "870d55a06598dceb474479107d4be8b11dcaeb571a995b1d571d8984c5fe73ab",  
  "EndpointID": "d9067c675b781056dc9300454257637db4b811aee1b39d950190c0fc708c7dcc",  
  "Gateway": "192.168.0.1",  
  "IPAddress": "192.168.0.2",  
  "IPPrefixLen": 20,  
  "IPv6Gateway": "",  
  "GlobalIPv6Address": "",  
  "GlobalIPv6PrefixLen": 0,  
  "DriverOpts": null,  
  "DNSNames": [  
  "server_redeA",  
  "d6eb9beb937e",  
  "redAhost"  
  ]  
                }  
            }  
        }  
    }  
]  

  
📝  Imos crear unha rede cun nome máis humano para o novo switch virtual e imos elixir un rango de IP para a rede.  
          🞂  O switch virtual (bridge) se chamará services-switch e usará o rango de rede 172.100.0.0/16.  
          🞂  Docker asignará ao bridge a IP  172.100.0.1/16 que será o gateway dos Docker conectados.  
          🞂  O sistema Docker asignará aos contedores que se conecten direccións IP do rango 172.100.0.0/16  
  
ℹ️  Creamos a rede rede100 con IP 172.100.0.0/16 que utilizará o switch virtual services-switch  
  
root@demo-system:~# docker network create -o "com.docker.network.bridge.name"="services-switch" --subnet 172.100.0.0/16  rede100  
718e28f416aabdb14fb6442a0c7ccffdf967cb61697cdb22d3df051aadae2a85  
  
root@demo-system:~# ip link show type bridge  
4: docker0: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP mode DEFAULT group default  
    link/ether 02:42:ad:fb:c8:97 brd ff:ff:ff:ff:ff:ff  
141: br-870d55a06598: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP mode DEFAULT group default  
    link/ether 02:42:7a:74:9a:9e brd ff:ff:ff:ff:ff:ff  
144: services-switch: <NO-CARRIER,BROADCAST,MULTICAST,UP> mtu 1500 qdisc noqueue state DOWN mode DEFAULT group default  
    link/ether 02:42:4e:21:51:46 brd ff:ff:ff:ff:ff:ff  
  
root@demo-system:~# ip addr show services-switch  
144: services-switch: <NO-CARRIER,BROADCAST,MULTICAST,UP> mtu 1500 qdisc noqueue state DOWN group default  
    link/ether 02:42:4e:21:51:46 brd ff:ff:ff:ff:ff:ff  
    inet 172.100.0.1/16 brd 172.100.255.255 scope global services-switch  
       valid_lft forever preferred_lft forever  
  
root@demo-system:~# ✅  Como podemos ver, o sistema Docker asignou unha IP a services-switch, que será o gateway dos Docker conectados a esta rede  
  
ℹ️   🞂  Esta e a configuración completa de rede100     
root@demo-system:~# docker network inspect rede100  
[  
    {  
        "Name": "rede100",  
        "Id": "718e28f416aabdb14fb6442a0c7ccffdf967cb61697cdb22d3df051aadae2a85",  
        "Created": "2025-10-25T16:04:24.559693628+02:00",  
        "Scope": "local",  
        "Driver": "bridge",  
        "EnableIPv6": false,  
        "IPAM": {  
            "Driver": "default",  
            "Options": {},  
            "Config": [  
                {  
  "Subnet": "172.100.0.0/16"  
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
            "com.docker.network.bridge.name": "services-switch"  
        },  
        "Labels": {}  
    }  
]  
  
root@demo-system:~#  
  
📝  Imos crear, arrancar e inspeccionar un Docker conectado a rede100 chamado server_rede100  
  
root@demo-system:~# bridge link show master services-switch  
  
root@demo-system:~# root@demo-system:~# docker run -d --name=server_rede100 --hostname red100host --network rede100 xavitag/iesrodeira:webserver-v1.0  
fe5db180ea57c1fa9b25dfde68d24c1d1003ba0d26801ae3777c784f8a385291  
  
root@demo-system:~# bridge link show master services-switch  
146: veth8e47eca@if145: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master services-switch state forwarding priority 32 cost 2  
  
root@demo-system:~# ✅  Como podemos ver, aparece unha nova ethernet conectada ao switch virtual (bridge) services-switch.  
root@demo-system:~# docker exec server_rede100 ip route show  
default via 172.100.0.1 dev eth0  
172.100.0.0/16 dev eth0 proto kernel scope link src 172.100.0.2  
  
root@demo-system:~# docker exec server_rede100 ip a s     
1: lo: <LOOPBACK,UP,LOWER_UP> mtu 65536 qdisc noqueue state UNKNOWN group default qlen 1000  
    link/loopback 00:00:00:00:00:00 brd 00:00:00:00:00:00  
    inet 127.0.0.1/8 scope host lo  
       valid_lft forever preferred_lft forever  
    inet6 ::1/128 scope host proto kernel_lo  
       valid_lft forever preferred_lft forever  
145: eth0@if146: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP group default  
    link/ether 02:42:ac:64:00:02 brd ff:ff:ff:ff:ff:ff link-netnsid 0  
    inet 172.100.0.2/16 brd 172.100.255.255 scope global eth0  
       valid_lft forever preferred_lft forever  
  
root@demo-system:~# ✅  Aquí podemos ver a IP que o sistema Docker asigna a server_rede100.  
  
ℹ️   🞂  Vexamos a información completa do Docker server_rede100:  
  
root@demo-system:~# docker inspect server_rede100            
#...
                "-g",  
                "daemon off;"  
            ],  
            "OnBuild": null,  
            "Labels": {}  
        },  
        "NetworkSettings": {  
            "Bridge": "",  
            "SandboxID": "33cd3051f37bd92e3b06c283019ffd538aa59ed564d1dfe0d4b66c1bfc28dbd2",  
            "SandboxKey": "/var/run/docker/netns/33cd3051f37b",  
            "Ports": {  
                "80/tcp": null  
            },  
            "HairpinMode": false,  
            "LinkLocalIPv6Address": "",  
            "LinkLocalIPv6PrefixLen": 0,  
            "SecondaryIPAddresses": null,  
            "SecondaryIPv6Addresses": null,  
            "EndpointID": "",  
            "Gateway": "",  
            "GlobalIPv6Address": "",  
            "GlobalIPv6PrefixLen": 0,  
            "IPAddress": "",  
            "IPPrefixLen": 0,  
            "IPv6Gateway": "",  
            "MacAddress": "",  
            "Networks": {  
                "rede100": {  
  "IPAMConfig": null,  
  "Links": null,  
  "Aliases": null,  
  "MacAddress": "02:42:ac:64:00:02",  
  "NetworkID": "718e28f416aabdb14fb6442a0c7ccffdf967cb61697cdb22d3df051aadae2a85",  
  "EndpointID": "5d6b06127da3dab9963275db99e6467a690ccedda9ae904caf834b9ade6ac2b4",  
  "Gateway": "172.100.0.1",  
  "IPAddress": "172.100.0.2",  
  "IPPrefixLen": 16,  
  "IPv6Gateway": "",  
  "GlobalIPv6Address": "",  
  "GlobalIPv6PrefixLen": 0,  
  "DriverOpts": null,  
  "DNSNames": [  
  "server_rede100",  
  "fe5db180ea57",  
  "red100host"  
  ]  
                }  
            }  
        }  
    }  
]  

  
📝  No seguinte exemplo veremos como podemos indicar a dirección desexada para o gateway da rede que obrigatoriamente será a IP do switch virtual  
  
ℹ️  Crearemos unha nova rede rede30 de tipo bridge con ip 172.30.0.0/16 e gateway 172.20.3.1. O switch virtual se chamará switch-30  
  🞂  Recordemos que a IP asignada ao switch virtual será sempre o gateway dos Docker conectados a rede  
  
root@demo-system:~# ip link show type bridge  
4: docker0: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP mode DEFAULT group default  
    link/ether 02:42:ad:fb:c8:97 brd ff:ff:ff:ff:ff:ff  
141: br-870d55a06598: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP mode DEFAULT group default  
    link/ether 02:42:7a:74:9a:9e brd ff:ff:ff:ff:ff:ff  
144: services-switch: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP mode DEFAULT group default  
    link/ether 02:42:4e:21:51:46 brd ff:ff:ff:ff:ff:ff  
  
root@demo-system:~# docker network create -o "com.docker.network.bridge.name"="switch-30" --subnet 172.30.0.0/16 --gateway 172.30.3.1 rede30  
072c094fdd547b399022626cfa05d775ff1e0294759361d57f82d62d9db6f172  
  
root@demo-system:~# ip link show type bridge  
4: docker0: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP mode DEFAULT group default  
    link/ether 02:42:ad:fb:c8:97 brd ff:ff:ff:ff:ff:ff  
141: br-870d55a06598: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP mode DEFAULT group default  
    link/ether 02:42:7a:74:9a:9e brd ff:ff:ff:ff:ff:ff  
144: services-switch: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP mode DEFAULT group default  
    link/ether 02:42:4e:21:51:46 brd ff:ff:ff:ff:ff:ff  
147: switch-30: <NO-CARRIER,BROADCAST,MULTICAST,UP> mtu 1500 qdisc noqueue state DOWN mode DEFAULT group default  
    link/ether 02:42:cb:da:95:ee brd ff:ff:ff:ff:ff:ff  
  
root@demo-system:~# ip addr show switch-30  
147: switch-30: <NO-CARRIER,BROADCAST,MULTICAST,UP> mtu 1500 qdisc noqueue state DOWN group default  
    link/ether 02:42:cb:da:95:ee brd ff:ff:ff:ff:ff:ff  
    inet 172.30.3.1/16 brd 172.30.255.255 scope global switch-30  
       valid_lft forever preferred_lft forever  
  
root@demo-system:~# ✅  Vemos como se crea un novo bridge switch-30 e como se lle asigna a IP do Gateway.      
  
root@demo-system:~# docker network inspect rede30  
[  
    {  
        "Name": "rede30",  
        "Id": "072c094fdd547b399022626cfa05d775ff1e0294759361d57f82d62d9db6f172",  
        "Created": "2025-10-25T16:05:23.29931056+02:00",  
        "Scope": "local",  
        "Driver": "bridge",  
        "EnableIPv6": false,  
        "IPAM": {  
            "Driver": "default",  
            "Options": {},  
            "Config": [  
                {  
  "Subnet": "172.30.0.0/16",  
  "Gateway": "172.30.3.1"  
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
            "com.docker.network.bridge.name": "switch-30"  
        },  
        "Labels": {}  
    }  
]  
  
root@demo-system:~# ✅  Na configuración da rede, podemos apreciar como switch-30 ten a IP indicada na súa creación e a dirección de rede asignada.  
  
  
🐚  🞂  Creamos, lanzamos e inspeccionamos un novo docker server_rede30 conectado a rede30  
  
root@demo-system:~# docker run -d --name=server_rede30 --hostname red30host --network rede30 xavitag/iesrodeira:webserver-v1.0  
7d44f7ae67010af17a65e687065a4719082f9b6aa58ffc843f828a371c13e421  
  
root@demo-system:~# bridge link show master switch-30  
149: veth0fbaa5d@if148: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
  
root@demo-system:~# ✅  Como vemos, aparece unha nova ethernet conectada ao switch virtual switch-30  
  
root@demo-system:~# docker exec server_rede30 ip route show  
default via 172.30.3.1 dev eth0  
172.30.0.0/16 dev eth0 proto kernel scope link src 172.30.0.1  
  
root@demo-system:~# docker exec server_rede30 ip a s  
1: lo: <LOOPBACK,UP,LOWER_UP> mtu 65536 qdisc noqueue state UNKNOWN group default qlen 1000  
    link/loopback 00:00:00:00:00:00 brd 00:00:00:00:00:00  
    inet 127.0.0.1/8 scope host lo  
       valid_lft forever preferred_lft forever  
    inet6 ::1/128 scope host proto kernel_lo  
       valid_lft forever preferred_lft forever  
148: eth0@if149: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP group default  
    link/ether 02:42:ac:1e:00:01 brd ff:ff:ff:ff:ff:ff link-netnsid 0  
    inet 172.30.0.1/16 brd 172.30.255.255 scope global eth0  
       valid_lft forever preferred_lft forever  
  
root@demo-system:~# ✅  Como vemos a IP asignada ao Docker a está a xestionar internamente o sistema Docker.  
  
✅  Esta e a configuración completa do Docker server_rede30  
root@demo-system:~# docker inspect server_rede30    
#...
                "-g",  
                "daemon off;"  
            ],  
            "OnBuild": null,  
            "Labels": {}  
        },  
        "NetworkSettings": {  
            "Bridge": "",  
            "SandboxID": "f6667a05ac5191a241b9b84f83415ea27385f4be4279f6abc9b2ab167e87c807",  
            "SandboxKey": "/var/run/docker/netns/f6667a05ac51",  
            "Ports": {  
                "80/tcp": null  
            },  
            "HairpinMode": false,  
            "LinkLocalIPv6Address": "",  
            "LinkLocalIPv6PrefixLen": 0,  
            "SecondaryIPAddresses": null,  
            "SecondaryIPv6Addresses": null,  
            "EndpointID": "",  
            "Gateway": "",  
            "GlobalIPv6Address": "",  
            "GlobalIPv6PrefixLen": 0,  
            "IPAddress": "",  
            "IPPrefixLen": 0,  
            "IPv6Gateway": "",  
            "MacAddress": "",  
            "Networks": {  
                "rede30": {  
  "IPAMConfig": null,  
  "Links": null,  
  "Aliases": null,  
  "MacAddress": "02:42:ac:1e:00:01",  
  "NetworkID": "072c094fdd547b399022626cfa05d775ff1e0294759361d57f82d62d9db6f172",  
  "EndpointID": "32b940ca78295acc11e8590fd02b9e0914d8baa4f61be4740588af7980aa6930",  
  "Gateway": "172.30.3.1",  
  "IPAddress": "172.30.0.1",  
  "IPPrefixLen": 16,  
  "IPv6Gateway": "",  
  "GlobalIPv6Address": "",  
  "GlobalIPv6PrefixLen": 0,  
  "DriverOpts": null,  
  "DNSNames": [  
  "server_rede30",  
  "7d44f7ae6701",  
  "red30host"  
  ]  
                }  
            }  
        }  
    }  
] 

  
root@demo-system:~#  
  
⚠️  Tamén podemos usar unha IP específica para un Docker.  
  🞂  Imos crear un Docker conectado a rede30 con IP 172.30.30.30.  O gateway será necesariamente a IP do bridge switch-30 asociado a rede  
  
root@demo-system:~# docker run -d --name=host_rede30 --hostname red30host --network rede30 --ip 172.30.30.30 xavitag/iesrodeira:webserver-v1.0  
6e2d6c843a96d767d053dcb246d1c9765fb4a97901dff509764621e2b6301027  
  
root@demo-system:~# bridge link show master switch-30  
149: veth0fbaa5d@if148: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
151: veth8e445b2@if150: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
  
root@demo-system:~# ✅  Como vemos, aparece unha nova ethernet conectada ao switch virtual (bridge) switch-30  
root@demo-system:~# docker exec host_rede30 ip route show  
default via 172.30.3.1 dev eth0  
172.30.0.0/16 dev eth0 proto kernel scope link src 172.30.30.30  
  
root@demo-system:~# docker exec host_rede30 ip a s  
1: lo: <LOOPBACK,UP,LOWER_UP> mtu 65536 qdisc noqueue state UNKNOWN group default qlen 1000  
    link/loopback 00:00:00:00:00:00 brd 00:00:00:00:00:00  
    inet 127.0.0.1/8 scope host lo  
       valid_lft forever preferred_lft forever  
    inet6 ::1/128 scope host proto kernel_lo  
       valid_lft forever preferred_lft forever  
150: eth0@if151: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP group default  
    link/ether 02:42:ac:1e:1e:1e brd ff:ff:ff:ff:ff:ff link-netnsid 0  
    inet 172.30.30.30/16 brd 172.30.255.255 scope global eth0  
       valid_lft forever preferred_lft forever  
  
root@demo-system:~# ✅  Como vemos a IP asignada e a especificada na creación do Docker, e o gateway a IP de switch-30  
  
✅  Esta e a configuración completa do Docker creado.  
  
root@demo-system:~# docker inspect host_rede30           
#...
            ],  
            "OnBuild": null,  
            "Labels": {}  
        },  
        "NetworkSettings": {  
            "Bridge": "",  
            "SandboxID": "8f71b1b09240788f6d240435d7b442a6ec87f105543811530160582a9c0659c4",  
            "SandboxKey": "/var/run/docker/netns/8f71b1b09240",  
            "Ports": {  
                "80/tcp": null  
            },  
            "HairpinMode": false,  
            "LinkLocalIPv6Address": "",  
            "LinkLocalIPv6PrefixLen": 0,  
            "SecondaryIPAddresses": null,  
            "SecondaryIPv6Addresses": null,  
            "EndpointID": "",  
            "Gateway": "",  
            "GlobalIPv6Address": "",  
            "GlobalIPv6PrefixLen": 0,  
            "IPAddress": "",  
            "IPPrefixLen": 0,  
            "IPv6Gateway": "",  
            "MacAddress": "",  
            "Networks": {  
                "rede30": {  
  "IPAMConfig": {  
  "IPv4Address": "172.30.30.30"  
  },  
  "Links": null,  
  "Aliases": null,  
  "MacAddress": "02:42:ac:1e:1e:1e",  
  "NetworkID": "072c094fdd547b399022626cfa05d775ff1e0294759361d57f82d62d9db6f172",  
  "EndpointID": "e13a52ad7f77f9e49bd7a804570aba5717109a161b1428d6e85b3125a66e4fca",  
  "Gateway": "172.30.3.1",  
  "IPAddress": "172.30.30.30",  
  "IPPrefixLen": 16,  
  "IPv6Gateway": "",  
  "GlobalIPv6Address": "",  
  "GlobalIPv6PrefixLen": 0,  
  "DriverOpts": null,  
  "DNSNames": [  
  "host_rede30",  
  "6e2d6c843a96",  
  "red30host"  
  ]  
                }  
            }  
        }  
    }  
]  

root@demo-system:~#  
  
📝  E tamén posible conectar un Docker a varias redes.  
  
ℹ️  O seguinte exemplo creará, lanzará e inspeccionará o novo Docker docker_router conectado a rede30, rede100 e redeA  
  🞂 ⚠️  So e posible asignar manualmente IP a primeira das redes, que será tamén o gateway  
  🞂  O sistema Docker se encargará de asignar IP ao resto de interfaces.  
  
root@demo-system:~# bridge link show  
140: vethac72634@if139: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master docker0 state forwarding priority 32 cost 2  
143: vethdaccb5b@if142: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master br-870d55a06598 state forwarding priority 32 cost 2  
146: veth8e47eca@if145: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master services-switch state forwarding priority 32 cost 2  
149: veth0fbaa5d@if148: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
151: veth8e445b2@if150: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
  
root@demo-system:~# docker run -d --name=docker_router --hostname router --network rede100 --network rede30 --network redeA --ip 172.100.100.100 xavitag/iesrodeira:webserver-v1.0  
7d3a02ede44322553391688fe446161fb6b799465deb61fdcda74118e572e4cf  
  
root@demo-system:~# bridge link show  
140: vethac72634@if139: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master docker0 state forwarding priority 32 cost 2  
143: vethdaccb5b@if142: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master br-870d55a06598 state forwarding priority 32 cost 2  
146: veth8e47eca@if145: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master services-switch state forwarding priority 32 cost 2  
149: veth0fbaa5d@if148: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
151: veth8e445b2@if150: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
153: veth3b86e4d@if152: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
155: veth84b5cc3@if154: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master br-870d55a06598 state forwarding priority 32 cost 2  
157: vethff0b127@if156: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master services-switch state forwarding priority 32 cost 2  
  
root@demo-system:~# ✅  Como vemos, aparecen  novas ethernet conectadas aos diferentes switches virtuais services-switch, switch-30 e br-xxxxx.  
  
root@demo-system:~# docker exec docker_router ip route show   
default via 172.100.0.1 dev eth0  
172.30.0.0/16 dev eth1 proto kernel scope link src 172.30.0.2  
172.100.0.0/16 dev eth0 proto kernel scope link src 172.100.100.100  
192.168.0.0/20 dev eth2 proto kernel scope link src 192.168.0.3  
  
root@demo-system:~# docker exec docker_router ip a s  
1: lo: <LOOPBACK,UP,LOWER_UP> mtu 65536 qdisc noqueue state UNKNOWN group default qlen 1000  
    link/loopback 00:00:00:00:00:00 brd 00:00:00:00:00:00  
    inet 127.0.0.1/8 scope host lo  
       valid_lft forever preferred_lft forever  
    inet6 ::1/128 scope host proto kernel_lo  
       valid_lft forever preferred_lft forever  
152: eth1@if153: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP group default  
    link/ether 02:42:ac:1e:00:02 brd ff:ff:ff:ff:ff:ff link-netnsid 0  
    inet 172.30.0.2/16 brd 172.30.255.255 scope global eth1  
       valid_lft forever preferred_lft forever  
154: eth2@if155: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP group default  
    link/ether 02:42:c0:a8:00:03 brd ff:ff:ff:ff:ff:ff link-netnsid 0  
    inet 192.168.0.3/20 brd 192.168.15.255 scope global eth2  
       valid_lft forever preferred_lft forever  
156: eth0@if157: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP group default  
    link/ether 02:42:ac:64:64:64 brd ff:ff:ff:ff:ff:ff link-netnsid 0  
    inet 172.100.100.100/16 brd 172.100.255.255 scope global eth0  
       valid_lft forever preferred_lft forever  
  
root@demo-system:~# ✅  Podemos ver que a interface conectada a rede100 ten a ip asignada, e o resto collen unha IP que asigna Docker  
  
✅  Esta e a configuración completa do Docker creado.  
  
root@demo-system:~# docker inspect docker_router 
#...  
  "DriverOpts": null,  
  "DNSNames": [  
  "docker_router",  
  "7d3a02ede443",  
  "router"  
  ]  
                },  
                "rede30": {  
  "IPAMConfig": null,  
  "Links": null,  
  "Aliases": null,  
  "MacAddress": "02:42:ac:1e:00:02",  
  "NetworkID": "072c094fdd547b399022626cfa05d775ff1e0294759361d57f82d62d9db6f172",  
  "EndpointID": "74693a588ce03c5633670dfcb4802eb092dc6b9983b96cf364bfbc6e32409542",  
  "Gateway": "172.30.3.1",  
  "IPAddress": "172.30.0.2",  
  "IPPrefixLen": 16,  
  "IPv6Gateway": "",  
  "GlobalIPv6Address": "",  
  "GlobalIPv6PrefixLen": 0,  
  "DriverOpts": null,  
  "DNSNames": [  
  "docker_router",  
  "7d3a02ede443",  
  "router"  
  ]  
                },  
                "redeA": {  
  "IPAMConfig": null,  
  "Links": null,  
  "Aliases": null,  
  "MacAddress": "02:42:c0:a8:00:03",  
  "NetworkID": "870d55a06598dceb474479107d4be8b11dcaeb571a995b1d571d8984c5fe73ab",  
  "EndpointID": "4cc6ab787a49e2f4c49ef1c38309f51992e9ce6846c08b817f9ef25907202eaf",  
  "Gateway": "192.168.0.1",  
  "IPAddress": "192.168.0.3",  
  "IPPrefixLen": 20,  
  "IPv6Gateway": "",  
  "GlobalIPv6Address": "",  
  "GlobalIPv6PrefixLen": 0,  
  "DriverOpts": null,  
  "DNSNames": [  
  "docker_router",  
  "7d3a02ede443",  
  "router"  
  ]  
                }  
            }  
        }  
    }  
]   
  
  
6. REDES AILLADAS  
  
ℹ️  Unha rede aillada Docker non permite a comunicación do Host nin de ningunha máquina externa a rede cos Docker conectados a rede.  
  🞂  Os Docker conectados a rede, si poderán saír hacia as redes externas.  
  
☢️  O que fai Docker, e simplemente insertar unha regra de firewall que impide o acceso externo cara a rede Docker.  
  
root@demo-system:~# docker network create -o "com.docker.network.bridge.name"="onlynet" --internal  onlynet  
fd4dfba84dc20ae4ce1896e9504f18cab58453854449841e4a8af23820db4abb  
  
root@demo-system:~# iptables -L -v -n |grep onlynet  
    0     0 ACCEPT     all  --  onlynet onlynet  0.0.0.0/0            0.0.0.0/0  
    0     0 DROP       all  --  *      onlynet !192.168.16.0/20      0.0.0.0/0  
    0     0 DROP       all  --  onlynet *       0.0.0.0/0           !192.168.16.0/20  
  
root@demo-system:~# ✅  Podemos ver as regras que convirten a rede en aillada  
           🞂  Se impide o tráfico que salga polo switch virtual que non proveña dun equipo da propia rede  
           🞂  Se impide o tráfico que entre no switch virtual que non proveña dun equipo da propia rede  
  
⚠️ So os equipos da propia rede se poden comunicar entre sí. Nunha rede deste tipo o sistema Docker non creará regras de SNAT nin de DNAT. Non será posible publicar portos  
  
5. CONEXIÓN A VARIAS REDES ASIGNANDO IP FIXAS  
  
ℹ️  Como xa se comentou antes, si conectamos un contedor Docker a varias redes soamente podemos asignar manualmente IP a primeira das redes.  
  
☢️  Sin embargo, e posible asignar IP a todas elas do seguinte xeito:  
  
root@demo-system:~#   🞂 a) Creamos o Docker cunha soa rede e asignamos IP  
root@demo-system:~# bridge link show master switch-30  
149: veth0fbaa5d@if148: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
151: veth8e445b2@if150: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
153: veth3b86e4d@if152: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
  
root@demo-system:~# docker run -d --name=gateway --hostname gateway --network rede30 --ip 172.30.30.130 xavitag/iesrodeira:webserver-v1.0  
313641f0081768da3b565be6547cfea4ad09f8e1562f62ab6d7c789cb7c05a08  
  
root@demo-system:~# root@demo-system:~# bridge link show master switch-30  
149: veth0fbaa5d@if148: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
151: veth8e445b2@if150: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
153: veth3b86e4d@if152: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
160: veth302f385@if159: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
  
root@demo-system:~#   🞂 b) Enchufamos o Docker ao resto de redes unha a unha asignado as IP  
root@demo-system:~# bridge link show master services-switch  
146: veth8e47eca@if145: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master services-switch state forwarding priority 32 cost 2  
157: vethff0b127@if156: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master services-switch state forwarding priority 32 cost 2  
  
root@demo-system:~# docker network connect --ip 172.100.100.110 rede100 gateway      
  
root@demo-system:~# bridge link show master services-switch  
146: veth8e47eca@if145: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master services-switch state forwarding priority 32 cost 2  
157: vethff0b127@if156: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master services-switch state forwarding priority 32 cost 2  
162: veth90ad3cc@if161: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master services-switch state forwarding priority 32 cost 2  
  
root@demo-system:~# docker exec gateway ip route show  
default via 172.100.0.1 dev eth1  
172.30.0.0/16 dev eth0 proto kernel scope link src 172.30.30.130  
172.100.0.0/16 dev eth1 proto kernel scope link src 172.100.100.110  
  
root@demo-system:~# docker exec gateway ip a s  
1: lo: <LOOPBACK,UP,LOWER_UP> mtu 65536 qdisc noqueue state UNKNOWN group default qlen 1000  
    link/loopback 00:00:00:00:00:00 brd 00:00:00:00:00:00  
    inet 127.0.0.1/8 scope host lo  
       valid_lft forever preferred_lft forever  
    inet6 ::1/128 scope host proto kernel_lo  
       valid_lft forever preferred_lft forever  
159: eth0@if160: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP group default  
    link/ether 02:42:ac:1e:1e:82 brd ff:ff:ff:ff:ff:ff link-netnsid 0  
    inet 172.30.30.130/16 brd 172.30.255.255 scope global eth0  
       valid_lft forever preferred_lft forever  
161: eth1@if162: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP group default  
    link/ether 02:42:ac:64:64:6e brd ff:ff:ff:ff:ff:ff link-netnsid 0  
    inet 172.100.100.110/16 brd 172.100.255.255 scope global eth1  
       valid_lft forever preferred_lft forever  
  
root@demo-system:~# ✅  Como vemos, aparece a nova ethernet conectada a rede100 (services-switch) e coa IP indicada ademais da orixinal conectada a rede30 (switch-30) .  
  
  
📝  Do mesmo xeito que podemos enchufar un Docker a unha rede, podemos desenchufalo  
  
root@demo-system:~# bridge link show master switch-30  
149: veth0fbaa5d@if148: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
151: veth8e445b2@if150: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
153: veth3b86e4d@if152: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
160: veth302f385@if159: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
  
root@demo-system:~# docker network disconnect rede30 gateway  
  
root@demo-system:~# bridge link show master switch-30  
149: veth0fbaa5d@if148: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
151: veth8e445b2@if150: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
153: veth3b86e4d@if152: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 master switch-30 state forwarding priority 32 cost 2  
  
root@demo-system:~# ✅  Como vemos, temos unha conexión menos ao  switch virtual switch-30. 
root@demo-system:~# docker exec gateway ip route show    
default via 172.100.0.1 dev eth1  
172.100.0.0/16 dev eth1 proto kernel scope link src 172.100.100.110  
  
root@demo-system:~# docker exec gateway ip a s  
1: lo: <LOOPBACK,UP,LOWER_UP> mtu 65536 qdisc noqueue state UNKNOWN group default qlen 1000  
    link/loopback 00:00:00:00:00:00 brd 00:00:00:00:00:00  
    inet 127.0.0.1/8 scope host lo  
       valid_lft forever preferred_lft forever  
    inet6 ::1/128 scope host proto kernel_lo  
       valid_lft forever preferred_lft forever  
161: eth1@if162: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue state UP group default  
    link/ether 02:42:ac:64:64:6e brd ff:ff:ff:ff:ff:ff link-netnsid 0  
    inet 172.100.100.110/16 brd 172.100.255.255 scope global eth1  
       valid_lft forever preferred_lft forever  
  
root@demo-system:~# ✅  Esta e a configuración IP do Docker gateway que queda.  
  
ℹ️  Moitas veces necesitaremos saber a qué interface no host corresponde cada docker.  
  🞂  Necesitaremos saber o nome do interface entro do Docker (eth0, eth1...)  
  
ℹ️  O seguinte comando indica a qué interface no host corresponde a interface eth1 no Docker gateway  
root@demo-system:~# ip link show|grep -e "^\$(docker exec gateway cat /sys/class/net/eth1/iflink)"  
162: veth90ad3cc@if161: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc noqueue master services-switch state UP mode DEFAULT group default  
  
root@demo-system:~#  
  
  
6. BORRADO DE REDES  
  
📝  Podemos eliminar unha rede con docker network rm sempre que ningún Docker estea conectado a ela.  
          🞂  docker network list -q nos da unha lista dos ID de todas as redes creadas.  
          🞂  docker network rm pode usar o nome da rede ou o seu ID, igual que docker rm, docker volume rm ou docker image rm  
          🞂  O parámetro -q de docker ps -aq, docker image list -q, docker volume list -q e docker network list -q retornan os ID dos Docker, Imaxes, Volumes e Redes  
  
ℹ️  En primeiro lugar paramos e eliminamos todos os Docker do sistema  
  
root@demo-system:~# docker stop $(docker ps -q)  
313641f00817  
7d3a02ede443  
6e2d6c843a96  
7d44f7ae6701  
fe5db180ea57  
d6eb9beb937e  
d79298c5fcce  
db83bc269cb2  
  
  
root@demo-system:~# root@demo-system:~# docker rm $(docker ps -aq)  
313641f00817  
7d3a02ede443  
6e2d6c843a96  
7d44f7ae6701  
fe5db180ea57  
d6eb9beb937e  
d79298c5fcce  
db83bc269cb2  
  
root@demo-system:~# root@demo-system:~# docker ps -aq  
  
root@demo-system:~# ✅  Como vemos se borraron todos os Docker  
  
  
ℹ️  Eliminamos as networks. Primeiro probamos a eliminar unha sola, logo as eliminamos todas.  
  
root@demo-system:~# docker network list  
NETWORK ID     NAME      DRIVER    SCOPE  
1f64e8ef8656   bridge    bridge    local  
82a5926c9e00   host      host      local  
43dc29d9d003   none      null      local  
fd4dfba84dc2   onlynet   bridge    local  
072c094fdd54   rede30    bridge    local  
718e28f416aa   rede100   bridge    local  
870d55a06598   redeA     bridge    local  
  
root@demo-system:~# docker network rm redeA  
redeA  
  
root@demo-system:~# root@demo-system:~# docker network list  
NETWORK ID     NAME      DRIVER    SCOPE  
1f64e8ef8656   bridge    bridge    local  
82a5926c9e00   host      host      local  
43dc29d9d003   none      null      local  
fd4dfba84dc2   onlynet   bridge    local  
072c094fdd54   rede30    bridge    local  
718e28f416aa   rede100   bridge    local  
  
root@demo-system:~# ✅  Como vemos, xa non existe a redeA  
  
root@demo-system:~# docker network rm $(docker network list -q)  
Error response from daemon: bridge is a pre-defined network and cannot be removed  
Error response from daemon: host is a pre-defined network and cannot be removed  
Error response from daemon: none is a pre-defined network and cannot be removed  
fd4dfba84dc2  
072c094fdd54  
718e28f416aa  
  
root@demo-system:~# docker network list  
NETWORK ID     NAME      DRIVER    SCOPE  
1f64e8ef8656   bridge    bridge    local  
82a5926c9e00   host      host      local  
43dc29d9d003   none      null      local  
  
root@demo-system:~# ✅  Como vemos, xa non existen mais redes que as definidas polo sistema Docker (bridge, host e none)    