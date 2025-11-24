您想要让容器通过虚拟机的一个独立IP地址（172.20.3.105）来访问，而不是使用虚拟机的主IP（172.20.3.104）。这里有几种解决方案：

## 方案一：为虚拟机添加额外IP并绑定到容器

### 1. 为虚拟机添加额外IP
```bash
# 临时添加（重启失效）
sudo ip addr add 172.20.3.105/24 dev eth0

# 永久添加（根据Linux发行版不同）
# 对于Ubuntu/Debian，编辑 /etc/netplan/ 或 /etc/network/interfaces
# 对于CentOS/RHEL，编辑 /etc/sysconfig/network-scripts/
```

### 2. 重新运行容器绑定到特定IP
```bash
# 停止并删除现有容器
docker stop webpagina
docker rm webpagina

# 重新运行容器，绑定到特定IP
docker run -d --name webpagina -p 172.20.3.105:80:80 httpd
```

## 方案二：使用Docker Macvlan网络（推荐）

### 1. 创建Macvlan网络
```bash
# 创建macvlan网络
docker network create -d macvlan \
  --subnet=172.20.3.0/24 \
  --gateway=172.20.3.1 \
  --ip-range=172.20.3.105/32 \
  -o parent=eth0 \
  my-macvlan-net
```

### 2. 运行容器连接到该网络
```bash
# 停止并删除现有容器
docker stop webpagina
docker rm webpagina

# 使用macvlan网络运行容器
docker run -d --name webpagina \
  --network my-macvlan-net \
  httpd
```

## 方案三：使用Docker桥接网络

### 1. 创建自定义桥接网络
```bash
docker network create \
  --driver bridge \
  --subnet=172.20.3.0/24 \
  --gateway=172.20.3.1 \
  my-custom-network
```

### 2. 运行容器并指定IP
```bash
docker run -d --name webpagina \
  --network my-custom-network \
  --ip 172.20.3.105 \
  -p 172.20.3.105:80:80 \
  httpd
```

## 方案四：使用反向代理（灵活且功能强大）

### 1. 安装并配置Nginx反向代理
```bash
# 安装nginx
sudo apt-get install nginx  # Ubuntu/Debian
# 或
sudo yum install nginx     # CentOS/RHEL
```

### 2. 创建Nginx配置文件
创建 `/etc/nginx/sites-available/webpagina`（或相应路径）：
```nginx
server {
    listen 172.20.3.105:80;
    server_name _;
    
    location / {
        proxy_pass http://172.20.3.104:80;
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;
    }
}
```

### 3. 启用配置并重启Nginx
```bash
sudo ln -s /etc/nginx/sites-available/webpagina /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl reload nginx
```

## 推荐方案

**对于生产环境**，我推荐**方案二（Macvlan）**，因为它：
- 为容器提供独立的IP地址
- 性能最好，几乎没有开销
- 容器直接暴露在网络中

**对于开发环境**，**方案一**最简单直接。

选择哪种方案取决于您的具体需求和网络环境。您更倾向于哪种方案？我可以提供更详细的配置步骤。