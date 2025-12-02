# /bin/bash
mainMenu() {
   echo ''
   echo '(1) Crear cuenta de usuario nueva'
   echo '(2) Cambiar contraseña de usuario'
   echo '(3) Borrar cuenta de usuario'
   echo '(4) Crear grupos de usuario'
   echo '(5) Salir'
   read -p 'Modo: ' modo
   if [ $modo -eq 1 ] ; then
      creaUser
   elif [ $modo -eq 2 ] ; then
      cambiaPassword
   elif [ $modo -eq 3 ] ; then
      borraCuenta
   elif [ $modo -eq 4 ] ; then
      creaGrupo
   elif [ $modo -eq 5 ] ; then
      echo 'Saliendo... '
   else
      erroFueraRango
   fi
}

checkUser() {
   local nombre="$1"
   echo 'checkUser...'
   if cat /etc/passwd|grep "^$nombre" > /dev/null ; then
      echo 'hay este usuario'
      return 0
   else
      echo 'No hay este usuario'
      return 1
   fi
}


creaUser() {
   read -p 'Dime nombre de usuario: ' nombre
   if ! checkUser $nombre ; then
      adduser $nombre
   fi
   mainMenu
}

cambiaPassword() {
   read -p 'Dime nombre de usuario: ' nombre
   if checkUser $nombre ; then
      passwd $nombre
   fi
   mainMenu
}

borraCuenta() {
   read -p 'Dime nombre de usuario: ' nombre
   if checkUser $nombre ; then
      deluser $nombre
   fi
   echo 'User borrado'
   mainMenu
}

checkGroup() {
   local nombre="$1"
   echo 'checkUser...'
   if cat /etc/group|grep "^$nombre" > /dev/null ; then
      echo 'hay este usuario'
      return 0
   else
      echo 'No hay este usuario'
      return 1
   fi
}

creaGrupo() {
   read -p 'Dime nombre de grupo: ' nombre
   if ! checkGroup $nombre ; then
      addgroup $nombre
   fi
   mainMenu
}

mainMenu