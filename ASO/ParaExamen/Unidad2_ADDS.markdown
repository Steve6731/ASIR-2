# AD DS 2_1
## Introduccion
- **Windows Admin Centes**: basada en navegador, permite administrar sistema local, remoto y sistema sin interfaz de usuario.
- **Administrador del servidor**: consola de administracion incluida en la instalacion completa de windows server.
- **Herramientas de administracion remota del servidor(RSAT)**: se incluye como un conjunto de caracteristicas a peticion(configuracion)
- **PowerShell**: lenguaje de shell comandos y de scrpting para hacer tareas automacito y rapido.
- **Comandos de windows**: herramientas de linea de comandos.

## servicio de directorio

- Un directorio: estrutura jeraquica que almacena informacion.
- Un servicio de directorio: dar metodos para almacenar los datos de directoria.
  - almacena informacion acerca de usuarios, equipos, archivos, impresoras, permisos...
  - conjunto de servicios para nombrar, describir, localizar, acceder, administrar y asegurar informacion acerca de los recurosos almacenados.

- AD DS: servicio gestiona la autenticacion y autorizacion.
  - LDAP
    - en directorio usa para realizar consultas y modificaciones en el directorio
  - DNS
  - DHCP
  - Kerberos
    - Para la autenticación segura de usuarios y equipos
- AD LDS: Directorio ligero para aplicaciones especificas.
- AD CS: Emision y gestion de certificados digitales
- AD FS: Proporciona acceso federado y SSO a aplicacoines externas.
- AD RMS: Prteccion de documentos y correos electronicos.

## Active Directory Domain Services(AD DS)
Tambien se llama Servicios de DOMINIO del Directorio Activo. es el nombre que recibe el conjunto de elementos que constituyen el servicio de directorio en Windows Server.    
Active Directory almacena informa sobre los recursos  
Los recursos almacenados se denominan **objetos**: es diferenciado su nombre y representa un recurso de red  
Un objeto pertenece a una **clase**: es un componente del esquema que define y establce los atributos de un objeto.  

### Active Directory incluye:
- **Esquema**: un conjunto de reglas, define las clases de objetos y atributos.Es el molde que determina qué información puede almacenarse y cómo se estructura
- **Catalogo global**: contiene informacion sobre todos los objetos en el directorio.
- **Un mecanismo de indices y consulta**: las aplicaciones de red puedan publicar y encontrar los objetos y sus propiedades.
- **Servicio de replicacion**: backup de todos paso hecho.

## Estructura logica de active directory
- **Bosque**: conjunto de los dominios
- **Dominio**: conjunto de los Unidades Organizativas, util para almacenar más facil en varios controladores de dominios(Win servers)
  - Usa Dominio puede Replicar la informacion eficientemente.
  - Y aplicar directivas de Grupo: Hace GPO(Objeto de polictica de grupo)
  - Y delegar la administracion: gesciona permisa de Administradores.
- **Unidades Organizativas**: carpeta para guardar los objetos.
  - Puede aplicar directivas de Grupo
  - Delegar la administracion

## Estructura fisica de active directory
- **sitios**: un red LAN
- **Controladores de dominio**: un Windows Server con AD.

## Active directory & DNS
Active directory usa DNS define los dominios. estructura de domain de cada equipo

## FQDN(Fully Qualified Domain Name)
Nombre completo de un dominio, en "host1.dominio.local". "host1" es Dominio hijo y "dominio.local" es Dominio padre

## LDAP
util estandar abierto para inicial sesion en la red y buscar recursos compartidos. Tiene estructura jeraquica.


## DN(Distinquished NAME, nombre completo)
Nombre completo para LDAP por ejemplo: "cn=Juan, ou=promociones,ou=marketin,dc=noam,dc=com"  
RDN(Relative Distinguished Name) por ejemplo: RDN del objeto de usuario es: "cn=Juan"  
- usuario: cn
- unidad organizativa: ou
- Dominio: dc

________________________________________________________
# AD DS 2_2
## para añadir un regla: 
Administrador del servidor →  Administrar → Agregar Roles y Características. 

## tipo de equipos en un dominio
- servidores miembro: servidor connecta al dominio pero no es AD
- controladores de dominio: servidor connecta al dominio y es AD
- Servidores independientes: servidor independientse.

## HERRAMIENTAS
## Administrador de DNS

## Dominios y confianza de Active Directory

## sitios y servicios de Active Directory

## Administracion de directiva de grupo

## Esquema de Active Directory
________________________________________________________
# AD DS 2_3
## OUs(Unidades organizativas)
carpeta para guardar los objetos.
## GPO
objeto que contiene unos configuracion de directivas puede aplicar centralizadamenta a equipos.
Es el conjunto de políticas de grupo aplicadas en el dominio
## Usuarios
  - usuario local(Juan)
  - usuario dominio(juan.empresa.es)
  - usuario predeterminadas(administrador,usuario)
  - usuarios integradas(system)
## Grupo
  - Grupo local
  - Grupo dominio
    - Grupos de distribucion(solo guarda correo electronico)
    - Grupos de seguridad(con SID para gesciona)
      - Grupos de dominio local(un grupo de un dominio)
      - Grupos globales(grupo que incluyen todo mienbro de un dominio)
      - Grupos universales(grupo de vario dominio de un bosque)
  - Grupo predeterminados
  - Identidades especiales: 
    - todos
    - Creator owner
    - System
## IGUDLA
 - I => Identidades(usuarios o equipos)
 - G => Grupos Globales
 - U => Grupos Universales
 - DL => Domain Local (grupo local de dominio)
 - a => Access(Permisos asignados a recuross)
## Nombre de inicio de sesion
  - UPN(user principal name) eje: pepito@empresa.com
  - Nombre NetBios del dominio eje:EMPRESA\pepito
## SID(Identificador de Seguidad)
   ID unico para cada usuario. AD usa SID gesciona los permisos de cada usuario
## Perfil
  - Perfil local: perfil guarda en local.
  - Perfil movil: perfil guarda en servidor.
    - Ruta de acceso al perfil: \\nb_servidor\nb_compartido_carpeta_perfiles\%username%
  - Perfil obligatorio: perfil movil, pero todo modificacion de usuario son debil.
  - Perfil super-obligatorios: perfil obligario, cuando usuario no usa ese perfil no puede iniciar sesion.

## Derecho vs Permisos
Derecho es dar permiso a usuario puede usar objeto  
Permisos es acuerda que un usuario puede usar un obejto concreto

________________________________________________________
# AD DS 2_4

## Editor ADSI
Una herramienta que nos permiten ver y configurar todos los objetos y atributos de la base de datos de active directory.
## ADAC(Centro de Administracion de Activce Directory)
Igual que anterio pero más bonito y unos caracteres avanzado.
## usuarios y equipos de AD:
Igual que Editor ADSI
exiten por defecto una serie de contenedores y OUs:
- Builtin(integrados): unos grupos predeterminados(administradores, operadores de cuentas)
- Computers: equipos de los quiops mienbros del dominio
- Domain Controllers: Unica OU por defecto de los equipos que con controladores de dominio.
- ForeignSecurityPrincipals: Contenedor para los identificadores de seguridad(SIDs), asociados con los objetos de dominios externos en los que se confia.
- Managed Service Accounts: contenedor para ejecutar varios servicios para nuestro dominio
- Users: contenedor para usuarios perdeterminado.
- LostAndFound: Papelera de reciclaje de windows pero Active Directory version.
- ProgramData: datos para aplicacoines de Microsoft.
- System: congifuraciones integradas del sistema.
- NTDS Quotas: los datos del servicio de cuotas de AD
- TPM Devices: informacion de recuperacion de dispositvos Trusted Platform Module.
## Administración de directivas de grupo
Usa para configura GPOs.  
Tree:  
- Directivas:
  - Configuracion de software
  - Configuracion de Windows
  - Plantillas Administrativas
- Preferencias:
  - Configuracion de Windows
  - Configuracion del Panel de Control

## Permisos
permisos se configura con ACLs sobre cada recurso or objecto de AD

## Comparticion dentro de un dominio
- letraDeUnidad$: 对于Windows Server系统中存在的每一个分区（如C:、D:等），系统会默认创建名为C$、D$等共享资源。
- ADMIN$ 这是Windows Server在远程管理计算机时系统自身使用的资源
- IPC$: 该资源汇集了程序间相互通信所使用的命名管道（消息队列）
- NETLOGON: 用于通过网络为域成员计算机提供全局账户验证服务（Net Logon service）
- SYSVOL: 这是域中每个域控制器（DC）都会提供的共享资源
