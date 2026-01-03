---------------------------------
-- Practica: Creacion de usuarios
---------------------------------

-- (a) El usuario DirectorVentas tiene la contraseña satnev y su tablespace predeterminado es users, con cuota ilimitada.
select * from DBA_TABLESPACES;
create user DirectorVentas IDENTIFIED by satnev
   DEFAULT TABLESPACE users
   QUOTA 10M on users;

-- (b) El usuario DirectorCompras tiene la contraseña sarpmoc,que debe ser modificada en el momento de Ia primera conexión. Su tablespace es TiendaVirtual y tiene una cuota de 300 megabytes
Create user DirectorCompras IDENTIFIED by sarpmoc
   DEFAULT TABLESPACE TiendaVirtual
   QUOTA 300M on TiendaVirtual
   PASSWORD EXPIRE;

-- (c) El usuario VendedorCaja01 tiene la contraseña ajac, que debe ser modificada en el momento de la primera conexión. Su tablespace por defecto es TiendaVirtual y tiene una cuota de 50 megabytes. La cuenta está bloqueada en estos momentos.
Create user VendedorCaja01 IDENTIFIED by ajac
   DEFAULT TABLESPACE TiendaVirtual
   QUOTA 50M on TiendaVirtual
   PASSWORD EXPIRE
   ACCOUNT LOCK;

---------------------------------
-- Pratica: Seleccion de usuarios
---------------------------------

-- (a) Mira la vista CDB_USERS y DBA_USERS, selecciona los usuarios, que diferencia hay?, mira si hay un campo que indique si es un usuario común o no. Seleccionalos de nuevo
Select * from CDB_USERS;
Select * from DBA_USERS;

-- (b)El campo con_id se refiere al contenedor en el que está creado. Haz un join para seleccionar todos los usuarios junto con el nombre del contenedor en el que están creados

select username,con_id from CDB_USERS;
select NAME,con_id from v$containers;

select u.Username,c.name as contenedor from CDB_USERS u, V$CONTAINERS c
   where c.con_id = u.con_id;

-- (c) Cierra una pluggable database, vuelve a hacer el select. Están los usuarios correspondientes a esa pluggable? Que quiere decir eso en cuando a dónde están guardados los metadatos de los usuarios de la pluggable?.
alter PLUGGABLE DATABASE XEPDB1 CLOSE;
desc all_users;
select * from all_users;
alter PLUGGABLE DATABASE XEPDB1 OPEN read write;

----------------------------------
-- Pratica: alteracion de usuarios
----------------------------------

-- (a) Se requiere cambiar la cuenta del usuario DirectorCompras. La nueva contraseña es rotceridaveun y su cuota en USERS debe ser limitada a 5OO megabytes.
alter user DirectorCompras 
   IDENTIFIED by rotceridaveun 
   QUOTA 500M on Users;

-- (b) Se requiere cambiar la contraseña de la cuenta DirectorVentas y que esta sea modificada en la primera conexión. La nueva contraseña es satnevaveun
alter user DirectorVentas
   IDENTIFIED by satnevaveun
   PASSWORD EXPIRE;

-- (c) Se requiere desbloquear la cuenta de usuario VendedorCaja01
alter user VendedorCaja01
   ACCOUNT UNLOCK;

-- (d) Borra todas las cuentas de usuario junto con sus objetos.
Drop user DirectorCompras CASCADE;
Drop user DirectorVentas CASCADE;
Drop user VendedorCaja01 CASCADE;

----------------------------------
-- Pratica: Gestion de privilegios
----------------------------------

-- Crea el usuario jefeCompras en el contenedor XEPDB1 con la contraseña sarpmoc. Tendrá 500 megabytes de limite en su tablespace predeterminado Tienda. Ejecuta el comando CONN jeFecompras/sarpmoc@xepdb1. ¿Qué ocurre?
create user jefeCompras IDENTIFIED by sarpmoc
   DEFAULT TABLESPACE TiendaVirtual
   QUOTA 500M on TiendaVirtual;

conn JEFECOMPRAS/sarpmoc@10.159.9.1:1521/XEPDB1;
-- 用户 JEFECOMPRAS 没有 CREATE SESSION 权限; 登录被拒绝

-- Concédele los roles CONNECT y RESOURCE
GRANT CONNECT,RESOURCE to jefeCompras;

-- Conéctate como el usuario y crea una tabla. Por qué puede crear tablas? Mira la vista cdb_sys_privs para los roles del usuario
-- XEPDB1: jefeCompras:
Create table foo(
   id number,
   nombre varchar2(64)
);
drop table foo;
commit;

desc cdb_sys_privs;
select * from cdb_sys_privs
   where grantee = upper('RESOURCE');

-- jefeCompras se puede crear tabla es porque RESOURCE incluye privilegio "creat table"

-------------------------------------
-- Practica Gestion de privilegios II
-------------------------------------

-- (a) Revoca el privilegio de CREATE TABLE
REVOKE create table from jefeCompras;
REVOKE create table from RESOURCE CONTAINER=ALL;
Grant create table to RESOURCE CONTAINER=ALL;

-- (b) Comprueba si puede crear tablas y explica por qué
-- no se puede porque ya no tiene privilegios

-- (c) Mira todos los privilegios, roles y privilegios sobre tablas concedidos a jefecompras.
-- (d) Haz una lista de todos los privilegios concedidos a jefecompras sea directamente o a través de roles. Concédele el privilegio de create any table y repite la query
desc cdb_sys_privs;
desc cdb_role_privs;
desc cdb_tab_privs;
grant select on foo to jefeCompras;
grant create table to jefeCompras;

select grantee,privilege from cdb_sys_privs
   where grantee = upper('jefeCompras')
union
select 'ROLE de jefeCompras' as grantee,privilege from cdb_sys_privs
   where grantee in(
      select granted_role from cdb_role_privs
         where grantee = upper('jefeCompras'))
union
select grantee,privilege||' '||table_name as pribilege from CDB_TAB_PRIVS
   where grantee = upper('jefeCompras');

-- (e) Revoca el rol RESOURCE
REVOKE RESOURCE from jefeCompras;

-- (f) Concede el privilegio de seleccionar de la tabla regions de HR
grant select on regions to jefeCompras;

-- (g) Verifica en las vistas del catálogo que tiene ese privilegio concedido
select grantee,privilege||' '||table_name as privilege from CDB_TAB_PRIVS
   where table_name = upper('regions');

-- (h) Concede el privilegio de update en la columna region_id
grant update(region_id) on regions to jefeCompras;

-- (i) Verifica en las vistas del catálogo que tiene ese privilegio concedido.
desc cdb_col_privs;

select grantee,privilege||' '||table_name||'.'||column_name from CDB_COL_PRIVS
   where table_name = upper('regions');

