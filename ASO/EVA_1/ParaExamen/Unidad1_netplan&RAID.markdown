## net configuracion
### /etc/netplan/50-cloud-init.yaml
```yaml
network:
   renderer: networkd  # 使用 systemd-networkd
   ethernets:
      enp0s3.
         addresses.
            - 192.168.1.10/24
         nameservers:
            addresses:
              - 8.8.8.8
         routes:
            - to: default
               via:192.168.1.1 
```
### Command para netplan
```sh
#para restart servicio:  
netplan apply
#para ver configuracion:
ip addr
# para ver estado de RAID
cat /proc/mdstat
mdadm --detail
```
## RAID configuracion
### unos explicacion de ruta que va aparecer
/dev/md127 - 内核识别的RAID设备,这个名字是内核自动分配的  
/dev/md/md_raid1 - 用户定义的RAID设备符号链接, 这是一个符号链接，它指向 /dev/md127。它是为了用户方便而存在的。  
/media/datos - 挂载点 这是一个普通的目录（文件夹）用来挂载（mount）设备  
/proc/mdstat - 内核RAID状态信息文件，这是一个特殊的虚拟文件，它不是存储在硬盘上的，而是由内核在你读取它时动态生成的。它反映了当前所有RAID阵列的实时状态。  
### unos command para check
```bash
lsblk # lista los particiones y sus tamaño y sitio montado
df -Th # lista carpeta de device y sitio montado y % memoria usado.
```
### pasos para configura RAID
```bash
# para ver estado de RAID
cat /proc/mdstat
# crear particion para RAID con fdisk o cfdisk
# no olvida Poner tipo linux raid auto (fd) y guardar
cfdisk /dev/sdb
cfdisk /dev/sdc
# crea RAID
mdadm --create /dev/md/md_raid1 --level=1 --raid-devices=2 /dev/sdb1 /dev/sdc1
# formatearlo
# puede verificar con cat /proc/mdstat
mkfs.ext4  /dev/md/md_raid1
#guardar detalles del RAID en mdadm.conf
mdadm --datail --scan >> /etc/mdadm/mdadm.conf
#hace mount desde RAID hacia un carpeta que quiremos
# puede verificar con cat /proc/mdstat
mount  /dev/md/md_raid1   /media/datos
```
## <font color="red">No olvida añadir RAID a la fstab para que se monte automaticamente.</font>

### Avanzado para configura RAID
```bash
# vamos simular fallar un disco
mdadm --manage --set-faulty /dev/md/md_raid1 /dev/sdb1
# ver estado tambien puede usar cat /proc/mdstat
# para RAID hay dos formas decirlo
mdadm --detail /dev/md127
mdadm --detail /dev/md/md_raid1
# forma1: elimina el device fallo
# dos parametro que puede usar
mdadm /dev/md127 --remove /dev/sdb1
mdadm /dev/md127 --r /dev/sdb1
# 擦除（清零）存储在物理磁盘 /dev/sdb1 分区上的 R（超级块）详解在下面
mdadm –-zero-superblock /dev/sdb1
# añader sdb1 otra vez
# -a = -add significa añadir
# -v = -verbose significa enseña los informacion
mdadm /dev/md0 -av /dev/sdb1

# forma2 parar el Raid
mdadm --stop /dev/md/md_raid1
#limpiar sdb1
mdadm –-zero-superblock /dev/sdb1
#activa Raid
mdadm --assemble /dev/md/md_raid1
```

### 超级块
当您将一块磁盘（如 /dev/sdb1）加入一个RAID阵列时，mdadm 会在该磁盘的特定位置（通常是末尾）写入一小段特殊数据，这就是 “超级块”,又或者可以叫RAID 元数据。

这个超级块包含了关键信息，例如：

- 我属于哪个RAID阵列？（例如：md_raid1 或 md127）
- 我的RAID级别是什么？（RAID1, RAID5, 等）
- 我在这个阵列中扮演什么角色？（例如，在RAID1中是哪个副本）
- 这个阵列的其他成员是谁？