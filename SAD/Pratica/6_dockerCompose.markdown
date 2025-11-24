  
====================================================  
🐳  ORQUESTACIÓN DE SERVIZOS CON DOCKER-COMPOSE  
====================================================  
  
📝  Docker Compose é unha ferramenta oficial de Docker que permite definir e xestionar o despregamento de múltiples contedores de xeito coordinado  
          🞂 O obxectivo de Docker Compose e o despregamento de múltiples microservizos conectados que formarán o servizo final que se ofrece a rede.  
  
ℹ️  En lugar de lanzar manualmente cada Docker por serparado utilizando docker run cos parámetros necesarios, se pode definir o despregue nun ficheiro docker-compose.yaml  
  
ℹ️  Imos definir un servizo composto de 3 Docker chamado helloworld:  
          🞂  Un servidor web baseado en nginx. Os documentos web serán persistentes no volume myservice-html, e se ofrecerá o servicio a rede no porto 80  
          🞂  Un servidor de base de datos mysql. O servicio de BBDD so será accesible dentro da propia rede Docker, e os datos serán persistentes no volume myservice-dbdata  
          🞂  Unha aplicación Node.js. O servidor Node so será accesible dende dentro da rede Docker, e o codigo será accesible no volume myservice-node-code  
  
ℹ️  Esta sería a estrutura da aplicación  
  
  
/opt/nodeapps  
└── helloworld  
    ├── app  
    │   ├── package.json  
    │   └── src  
    │       └── server.js  
    ├── db  
    │   └── init.sql  
    ├── docker-compose.yaml  
    ├── Dockerfile  
    └── nginx  
        ├── default.conf  
        └── public  
            ├── css  
            │   └── style.css  
            └── index.html  
  
8 directories, 8 files  
  
  
ℹ️  A carpeta raíz do proxecto é /opt/nodeapps/helloworld  
  
  🞂  No raíz vemos un Dockerfile que creará a imaxe do servizo Docker node e un docker-compose.yaml que ten a configuración de despregue do servizo completo  
  🞂  Na carpeta nginx están os documentos a servir (en public) e a configuración (default.conf) para o Docker nginx  
  🞂  en app/src está o código do servidor Node server.js e en /app o ficheiro package.json coas dependencias de módulos de Node para o Docker de node  
  🞂  en db/init.sql está o SQL de inicialización de base de datos para o Docker mysql  
 
 🐚  O ficheiro de configuración de nginx /opt/nodeapps/helloworld/nginx/default.conf  
  
  
server {  
  listen 80;  
  server_name _;  
  
  root /usr/share/nginx/html;  
  index index.html;  
  
  location / {  
    try_files $uri $uri/ =404;  
  }  
  
  # Redirixe as peticións a /api/xxx ao Docker node que ofrece os servizos Node.js  
  location /api/ {  
    proxy_pass http://node/api/;        # Docker engade "node" que é o nome do servizo Node.js  ao seu "DNS interno", polo que se resolve a IP axeitada.  
    proxy_set_header Host $host;  
    proxy_http_version 1.1;  
    proxy_set_header X-Real-IP $remote_addr;  
    proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;  
  }  
}  
  
  
  
🐚  O ficheiro índice da aplicación servido por nginx /opt/nodeapps/helloworld/nginx/public/index.html  
  
```html  
<!doctype html>  
<html lang="en">  
<head>  
  <meta charset="utf-8" />  
  <title id="pageTitle">Loading...</title>  
  <meta name="viewport" content="width=device-width,initial-scale=1" />  
  <link rel="stylesheet" href="../css/style.css">  
</head>  
<body>  
  <main class="container">  
    <h1 id="title">⏳ Loading...</h1>  
    <p class="label">Current date & time</p>  
    <div id="clock" class="datetime">— loading —</div>  
  </main>  
  
  <script>  
    /**  
     *  Consulta os endpoints ofrecidos polo Docker node  
     */  
    async function fetchData() {  
      try {  
        const [titleRes, timeRes] = await Promise.all([  
          fetch('api/title'),           // Chamamos ao endpoint Node para que nos retorne o titulo da aplicación  
          fetch('api/time')             // Chamamos ao endpoint Node para que nos retorne a hora e data actual  
        ]);  
  
        const titleData = await titleRes.json();  
        const timeData = await timeRes.json();  
  
        document.getElementById('title').textContent = titleData.title;  
        document.title = titleData.title;  
        document.getElementById('clock').textContent = timeData.formatted;  
      } catch (err) {  
        document.getElementById('title').textContent = 'Error loading data';  
        console.error(err);  
      }  
    }  
  
    fetchData();  
    setInterval(fetchData, 1000);  
  </script>  
</body>  
</html> 
```

🐚  O ficheiro CSS asociado servido por nginx /opt/nodeapps/helloworld/nginx/public/css/style.css  
```css
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap');  
  
:root{  
  --bg1: #ffefeb;  
  --bg2: #fff1d6;  
  --card: #ffffff;  
  --accent: #ff6f61;  
  --muted: #555;  
}  
  
*{box-sizing:border-box}  
html,body{height:100%;margin:0}  
body{  
  font-family: 'Poppins', sans-serif;  
  background: linear-gradient(135deg,var(--bg1),var(--bg2));  
  display:flex; align-items:center; justify-content:center;  
}  
  
.container{  
  background: var(--card);  
  border-radius:18px;  
  padding:36px 48px;  
  box-shadow: 0 10px 30px rgba(0,0,0,0.12);  
  text-align:center;  
  width: min(720px, 92%);  
  animation: pop 420ms ease;  
}  
  
h1{  
  margin:0 0 6px;  
  font-size:2.4rem;  
  color: var(--accent);  
  text-shadow: 1px 1px rgba(255,215,205,0.7);  
}  
  
.label{color:var(--muted); margin: 6px 0 16px; font-weight:500}  
  
.datetime{  
  font-size:1.25rem;  
  padding:14px 18px;  
  border-radius:12px;  
  display:inline-block;  
  background: linear-gradient(180deg,#fff,#fff6f2);  
  box-shadow: inset 0 -2px 6px rgba(0,0,0,0.03), 0 6px 18px rgba(0,0,0,0.06);  
  font-weight:600;  
  color:#333;  
}  
  
/* tiny animation */  
@keyframes pop{ from{ transform: translateY(6px) scale(.99); opacity:0 } to{ transform:none; opacity:1 } }  
```

🐚  O código da aplicación Node.js definindo os servizos web ofrecidos polo Docker node: /opt/nodeapps/helloworld/app/src/server.js  
  
```js  
// server.js  
import express from "express";  
import dayjs from "dayjs";  
import mysql from "mysql2/promise";  
  
const app = express();  
const port = process.env.PORT || 80;  
  
// Crear conexión ao MySQL  
const dbConfig = {  
  host: "db",              // nome do servizo docker-compose  
  user: "root",  
  password: "secret",  
  database: "mydb"  
};  
  
app.get("/api/time", (req, res) => {  
  const nowISO = dayjs().toISOString();  
  const formatted = dayjs().format("dddd, D MMMM YYYY HH:mm:ss");  
  res.json({ now: nowISO, formatted });  
});  
  
// Novo endpoint para obter o título  
app.get("/api/title", async (req, res) => {  
  try {  
    const connection = await mysql.createConnection(dbConfig);  
    const [rows] = await connection.query("SELECT title FROM site_info LIMIT 1");  
    await connection.end();  
  
    if (rows.length > 0) {  
      res.json({ title: rows[0].title });  
    } else {  
      res.json({ title: "Untitled App" });  
    }  
  } catch (err) {  
    console.error("Database error:", err);  
    res.status(500).json({ error: "Database connection failed" });  
  }  
});  
  
app.listen(port, () => {  
  console.log(`🚀 Node app running on port ${port}`);  
});  
  
```  
🐚  A lista de dependencias indicando os módulos Node.js necesarios para o Docker node: /opt/nodeapps/helloworld/app/package.json  
  
``` json  
{  
  "name": "helloworld",  
  "version": "1.0.0",  
  "description": "Elegant Hello World app with current date and time",  
  "type":"module",  
  "main": "server.js",  
  "scripts": {  
    "start": "node server.js"  
  },  
  "dependencies": {  
    "express": "^4.18.2",  
    "dayjs": "^1.11.10",  
    "mysql2": "^3.6.0"  
  }  
  
}  
```
  
🐚  O código SQL de inicialización da base de datos do Docker mysql: /opt/nodeapps/helloworld/db/init.sql  
  
```sql  
CREATE TABLE IF NOT EXISTS site_info (  
    id INT AUTO_INCREMENT PRIMARY KEY,  
    title VARCHAR(255) NOT NULL  
);  
  
INSERT INTO site_info (title) VALUES ('Welcome to My Candy-Eye App');  
```  
  
  
🐚  O Dockerfile necesario para a construcción do Docker node: /opt/nodeapps/helloworld/Dockerfile  
  
📜  E un Dockerfile en dúas etapas:  
          🞂  A primeira etapa descarga unha imaxe de node:20-alpine e a chama build: copia a aplicación,  package.json e instala os múdlos npm  
          🞂  A segunda etapa utilizando tamén un node:20-alpine copia a aplicación, axusta os usuario e establece o ENTRYPOINT a server.js  

```sh
# -------------------------  
# Stage 1: Build stage  
# -------------------------  
  
# Usamos unha versión de node baseada en alpine  
FROM node:20-alpine AS build  
  
# Imos traballar nesta carpeta  
WORKDIR /usr/src/app  
  
# Copiamos package.json and package-lock.json for caching dependencies  
COPY app/package.json .  
  
# Instalamos as dependencias  
RUN npm install --package-lock-only && npm install --production  
  
# Copy all application source code  
COPY app/. .  
  
# -------------------------  
# Stage 2: Runtime stage  
# -------------------------  
FROM node:20-alpine AS runtime  
  
WORKDIR /usr/src/app  
  
# Copy node_modules and app code from build stage  
COPY --from=build /usr/src/app /usr/src/app  
  
# Create non-root user  
RUN addgroup -S appgroup && adduser -S appuser -G appgroup  
USER appuser  
  
# Start the Node.js server  
CMD ["node", "src/server.js"]  
```
  
🐚  O docker-compose.yaml que indica a configuración dos 3 servizos necesarios para o despregue da aplicación: /opt/nodeapps/docker-compose.yaml  
⚙️  Se orquestan 3 servizos Docker:  
  - O servizo web:  
        {DPT} O nome do Docker será nginx  
          🞂  Se trata dun nginx:alpine que publica o porto 80 no porto 80 do host  
          🞂  Monta os volumes bind para facer dispoñible ao nginx dentro do docker os documentos html e CSS e a configuración do sitio default.conf  
  
  - O servizo app:  
        {DPT} O nome do Docker será node e ofrecerá os endpoint baseados en Node.js (servizos web)  
          🞂  Esta definición é un guión de construción dunha imaxe Docker que usa o Dockerfile situado en /opt/nodeapps/helloworld  
          🞂  A construción se realiza coa variable de entorno NODE_ENV co valor production  
          🞂  Se montará un volume bind que permite acceder ao código da aplicación en /opt/nodeapps/helloworld/app/src  
          🞂  O seu funcionamento dependerá que se configure de forma axeitada o Docker definido en db  
  
  - O servizo db:  
          🞂  O nome do Docker será mysql e ofrecerá un servizo de Base de Datos mysql.  
          🞂  O Docker está baseado en mysql:8  
          🞂  Define as variables de contorno que usa a imaxe mysql:8 na súa configuración inicial: MYSQL_ROOT_PASSWORD e MYSQL_DATABASE  
          🞂  Os datos se fan dispoñibles no Host mediante o volume dbdata  
          🞂  Se indica nunha montaxe bind o script sql que se debe executar no inicio do Docker (init.sql)  
  
💾  Por último, se indican os volumes utilizados: dbdata  
  
```yaml  
services:  
  web:  
    image: nginx:alpine  
    container_name: nginx  
    ports:  
      - "80:80"  
    volumes:  
      - /opt/nodeapps/helloworld/nginx/public:/usr/share/nginx/html:ro              # DIRECTORY bind mount  
      - /opt/nodeapps/helloworld/nginx/default.conf:/etc/nginx/conf.d/default.conf  # FILE bind mount  
    depends_on:  
      - app  
  
  app:  
    # Builds the image Docker from /opt/nodeapps/helloworld/Dockerfile  
    #  
    build: /opt/nodeapps/helloworld  
    container_name: node  
    environment:  
      - NODE_ENV=production  
    volumes:  
      - /opt/nodeapps/helloworld/app/src:/usr/src/app/src  
    depends_on:  
      - db  
  
  db:  
    image: mysql:8  
    container_name: mysql  
    environment:  
      - MYSQL_ROOT_PASSWORD=secret  
      - MYSQL_DATABASE=mydb  
    volumes:  
      - dbdata:/var/lib/mysql  
      - /opt/nodeapps/helloworld/db/init.sql:/docker-entrypoint-initdb.d/init.sql:ro  
  
volumes:  
  dbdata:  
```

  
📝  O despregue dos servizos unha vez dispoñemos do docker-compose.yaml e moi simple.  
ℹ️  O comando docker-compose up -d encargarase de:  
  🞂  Crear a imaxes segundo as instrución do docker-compose e no seu caso do Dockefile que corresponda  
  🞂  Crear e arrancar os Docker necesarios a partir das imaxes  
  
⚠️  Todos os comandos de docker-compose se deben realizar dende o directorio onde se atopa o ficheiro docker-compose.yaml  
  🞂  Se debe ter en conta as rutas presentes no arquivo, que sempre deben ser rutas válidas  
  
  
root@demo-system:~# docker-compose up -d  
[+] Running 20/20  
 ✔ db Pulled  92.7s 
   ✔ 023a182c62a0 Pull complete  6.8s 
   ✔ f5f78fcd9ccb Pull complete  5.3s 
   ✔ 494c372d15c3 Pull complete  5.4s 
   ✔ 0d0f66273639 Pull complete  11.6s 
   ✔ 6d7d6105636e Pull complete  10.9s 
   ✔ 3763684269ad Pull complete  11.8s 
   ✔ f7c524da3882 Pull complete  17.4s 
   ✔ 824d865d5643 Pull complete  16.1s 
   ✔ 270bbb610640 Pull complete  79.7s 
   ✔ fe8b60e8a15a Pull complete  16.9s 
 ✔ web Pulled  40.1s 
   ✔ 2d35ebdb57d9 Pull complete  20.7s 
   ✔ f80aba050ead Pull complete  21.1s 
   ✔ 621a51978ed7 Pull complete  25.3s 
   ✔ 03e63548f209 Pull complete  25.6s 
   ✔ 83ce83cd9960 Pull complete  29.8s 
   ✔ e2d0ea5d3690 Pull complete  30.3s 
   ✔ 7fb80c2f28bc Pull complete  34.3s 
   ✔ 76c9bcaa4163 Pull complete  35.6s 
[+] Building 9.1s (5/12)  docker:default 
 => [app internal] load build definition from Dockerfile  0.0s 
 => => transferring dockerfile: 875B  0.0s 
 => [app internal] load metadata for docker.io/library/node:20-alpine  7.2s 
 => [app auth] library/node:pull token for registry-1.docker.io  0.0s 
 => [app internal] load .dockerignore  0.0s 
 => => transferring context: 2B  0.0s 
 => [app runtime 1/4] FROM docker.io/library/node:20-alpine@sha256:6178e78b972f79c335df281f4b7674a2d85071aae2af020ffa39f0a770265435  1.7s 
 => => resolve docker.io/library/node:20-alpine@sha256:6178e78b972f79c335df281f4b7674a2d85071aae2af020ffa39f0a770265435  0.0s 
 => => sha256:e74e4ed823e9560b3fe51c0cab47dbfdfc4b12453604319408ec58708fb9e720 0B / 1.26MB  1.7s 
 => => sha256:da04d522c98fe12816b2bcddf8413fca73645f8fa60f287c672f58bcc7f0fa38 0B / 444B  1.7s 
 => => sha256:6178e78b972f79c335df281f4b7674a2d85071aae2af020ffa39f0a770265435 7.67kB / 7.67kB  0.0s 
 => => sha256:be8d32d651b3e0c9c2b28fdc1d3888408125d703232013cff955344d052027e5 1.72kB / 1.72kB  0.0s 
 => => sha256:2b56f2779663b9e1a77bdb5235dc31f1a81e534ccab1c1b35c716a8db79eeab9 6.42kB / 6.42kB  0.0s 
 => => sha256:60e45a9660cfaebbbac9bba98180aa28b3966b7f2462d132c46f51a1f5b25a64 32.51MB / 42.75MB  1.7s 
 => [app internal] load build context  0.0s 
 => => transferring context: 1.61kB  0.0s 
 => [app runtime 2/4] WORKDIR /usr/src/app  0.4s 
 => [app build 3/5] COPY app/package.json .  0.0s 
 => [app build 4/5] RUN npm install --package-lock-only && npm install --production  19.1s 
 => [app build 5/5] COPY app/. .  0.1s 
 => [app runtime 3/4] COPY --from=build /usr/src/app /usr/src/app  0.3s 
 => [app runtime 4/4] RUN addgroup -S appgroup && adduser -S appuser -G appgroup  0.3s 
 => [app] exporting to image  0.2s 
 => => exporting layers  0.2s 
 => => writing image sha256:1241b7517252e5931450521e945fb567738ea0f0795addffa9fd42197718ef5d  0.0s 
 => => naming to docker.io/library/helloworld-app  0.0s 
[+] Running 5/5  
 ✔ Network helloworld_default  Created  0.1s 
 ✔ Volume "helloworld_dbdata"  Created  0.0s 
 ✔ Container mysql             Started  0.0s 
 ✔ Container node              Started  0.0s 
 ✔ Container nginx             Started  0.0s 
  
root@demo-system:~# docker image list  
REPOSITORY       TAG       IMAGE ID       CREATED         SIZE  
helloworld-app   latest    1241b7517252   4 seconds ago   139MB  
mysql            8         67471052edd5   4 days ago      788MB  
nginx            alpine    5e7abcdd2021   2 weeks ago     52.8MB  
  
root@demo-system:~# docker ps -a  
CONTAINER ID   IMAGE            COMMAND                  CREATED         STATUS         PORTS  NAMES  
762c8834ec9a   nginx:alpine     "/docker-entrypoint.…"   7 seconds ago   Up 6 seconds   0.0.0.0:80->80/tcp, :::80->80/tcp   nginx  
4b7ed80f8ad4   helloworld-app   "docker-entrypoint.s…"   7 seconds ago   Up 6 seconds  node  
bdf0751031e6   mysql:8          "docker-entrypoint.s…"   7 seconds ago   Up 6 seconds   3306/tcp, 33060/tcp                 mysql  
  
root@demo-system:~#  
  
📝  Parar o servizo aínda e máis sinxelo:  
  
root@demo-system:~# docker-compose stop  
[+] Stopping 1/2  
 ✔ Container nginx  Stopped  0.3s 
 ✔ Container node   Stopped  10.1s 
 ✔ Container mysql  Stopped  1.7s 
  
root@demo-system:~# docker ps -a  
CONTAINER ID   IMAGE            COMMAND                  CREATED          STATUS  PORTS     NAMES  
762c8834ec9a   nginx:alpine     "/docker-entrypoint.…"   30 seconds ago   Exited (0) 15 seconds ago              nginx  
4b7ed80f8ad4   helloworld-app   "docker-entrypoint.s…"   30 seconds ago   Exited (137) 4 seconds ago             node  
bdf0751031e6   mysql:8          "docker-entrypoint.s…"   30 seconds ago   Exited (0) 3 seconds ago               mysql  
  
root@demo-system:~#  
📝  Podemos reanudalos fácilmente:  
  
root@demo-system:~# docker-compose start  
[+] Running 3/3  
 ✔ Container mysql  Started  0.2s 
 ✔ Container node   Started  0.3s 
 ✔ Container nginx  Started  0.4s 
  
root@demo-system:~# docker ps -a  
CONTAINER ID   IMAGE            COMMAND                  CREATED          STATUS         PORTS  NAMES  
762c8834ec9a   nginx:alpine     "/docker-entrypoint.…"   39 seconds ago   Up 3 seconds   0.0.0.0:80->80/tcp, :::80->80/tcp   nginx  
4b7ed80f8ad4   helloworld-app   "docker-entrypoint.s…"   39 seconds ago   Up 3 seconds  node  
bdf0751031e6   mysql:8          "docker-entrypoint.s…"   39 seconds ago   Up 3 seconds   3306/tcp, 33060/tcp                 mysql  
  
root@demo-system:~#  
☢️  docker-compose down para os Docker que compoñen o servizo e os elimina  
  🞂  Si logo facemos docker-compose up -d se crearán novos Docker a partir das imaxes para ofrecer o servizo.  
  
root@demo-system:~# docker-compose down  
[+] Running 4/4  
 ✔ Container nginx             Removed  0.2s 
 ✔ Container node              Removed  10.2s 
 ✔ Container mysql             Removed  1.5s 
 ✔ Network helloworld_default  Removed  0.2s 
  
root@demo-system:~# docker ps -a  
CONTAINER ID   IMAGE     COMMAND   CREATED   STATUS    PORTS     NAMES  
  
root@demo-system:~# docker image list  
REPOSITORY       TAG       IMAGE ID       CREATED              SIZE  
helloworld-app   latest    1241b7517252   About a minute ago   139MB  
mysql            8         67471052edd5   4 days ago           788MB  
nginx            alpine    5e7abcdd2021   2 weeks ago          52.8MB  
  
root@demo-system:~# docker-compose up -d  
[+] Running 4/4  
 ✔ Network helloworld_default  Created  0.1s 
 ✔ Container mysql             Started  0.1s 
 ✔ Container node              Started  0.0s 
 ✔ Container nginx             Started  0.0s 
  
root@demo-system:~# docker ps -a  
CONTAINER ID   IMAGE            COMMAND                  CREATED         STATUS         PORTS  NAMES  
7310b6dc738f   nginx:alpine     "/docker-entrypoint.…"   4 seconds ago   Up 3 seconds   0.0.0.0:80->80/tcp, :::80->80/tcp   nginx  
14e40aa94761   helloworld-app   "docker-entrypoint.s…"   4 seconds ago   Up 3 seconds  node  
795f4c6573cb   mysql:8          "docker-entrypoint.s…"   4 seconds ago   Up 3 seconds   3306/tcp, 33060/tcp                 mysql  
  
root@demo-system:~#  
✅  Podemos visitar co navegador a aplicación en http://<IP do host> xa que temos publicado o porto 80 do nginx no 80 do host  
```sh  
root@demo-system:~# wget http://localhost  
--2025-10-26 02:20:42--  http://localhost/  
Resolviendo localhost (localhost)... ::1, 127.0.0.1  
Conectando con localhost (localhost)[::1]:80... conectado.  
Petición HTTP enviada, esperando respuesta... 200 OK  
Longitud: 1339 (1,3K) [text/html]  
Grabando a: «index.html»  
  
index.html  100%[=====================================================================================================================>]   1,31K  --.-KB/s    en 0s       
  
2025-10-26 02:20:42 (58,6 MB/s) - «index.html» guardado [1339/1339]  
  
  
root@demo-system:~# cat index.html      
<!doctype html>  
<html lang="en">  
<head>  
  <meta charset="utf-8" />  
  <title id="pageTitle">Loading...</title>  
  <meta name="viewport" content="width=device-width,initial-scale=1" />  
  <link rel="stylesheet" href="../css/style.css">  
</head>  
<body>  
  <main class="container">  
    <h1 id="title">⏳ Loading...</h1>  
    <p class="label">Current date & time</p>  
    <div id="clock" class="datetime">— loading —</div>  
  </main>  
  
  <script>  
    /**  
     *  Consulta os endpoints ofrecidos polo Docker node  
     */  
    async function fetchData() {  
      try {  
        const [titleRes, timeRes] = await Promise.all([  
          fetch('api/title'),           // Chamamos ao endpoint Node para que nos retorne o titulo da aplicación  
          fetch('api/time')             // Chamamos ao endpoint Node para que nos retorne a hora e data actual  
        ]);  
  
        const titleData = await titleRes.json();  
        const timeData = await timeRes.json();  
  
        document.getElementById('title').textContent = titleData.title;  
        document.title = titleData.title;  
        document.getElementById('clock').textContent = timeData.formatted;  
      } catch (err) {  
        document.getElementById('title').textContent = 'Error loading data';  
        console.error(err);  
      }  
    }  
  
    fetchData();  
    setInterval(fetchData, 1000);  
  </script>  
</body>  
</html>  
```