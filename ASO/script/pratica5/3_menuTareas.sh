#!/bin/bash

checkUser() {
   local nombre="$1"
   echo 'checkUser...'
   if cat /etc/passwd|grep "^$nombre:" > /dev/null ; then
      return 1
   else
      return 0
   fi
}


creaUser() {
   local nombre="$1"
   adduser $nombre
}

localizaArchivoHome(){
   local nombre="$1"
   dirHome="~$nombre"
   dirHome=$(eval echo "$dirHome")
   echo "El home de usuario es $dirHome"
   find $dirHome -maxdepth 1 ! -type f > ./bustr.log
}

copiarArchivoHome(){
   local nombre="$1"
   dirHome="~$nombre"
   dirHome=$(eval echo "$dirHome")
   if ! test -d micopia; then
      mkdir micopia
   fi

   if find $dirHome -maxdepth 1 -type f -exec cp -a {} ./micopia/; then
      echo "Los archivos de home ($dirHome) están copiados a micopia"
   else
      echo "Hay algo raro - no se pudo copiar los archivos"
   fi
}

muestrarInformacionSistema(){
   df -h
}

erroFueraRango() {
   echo 'Solo puedes introduce numero dentro de 1-5'
}

if [ $# -eq 0 ] ; then
   echo "Error, debe introducir un parámetro"
   exit 1
fi

run=1
nombre="$1"
checkUser "$nombre"
userCreado=$?

if [ $userCreado -eq 1 ] ; then
   echo 'Usuario creado'
   lslogins $nombre
else
   echo 'Usuario no creado'
fi

while [ $run -eq 1 ] ; do
   echo "====== Usuario → $nombre ======"
   echo '1. Crear usuario'
   echo '2. Localizar archivos en tu home'
   echo '3. Copiar archivos de home'
   echo '4. Mostrar información sistema archivos.'
   echo '5. Salir'
   read -p 'Modo: ' modo

   echo '=============================='
   
   if [ $modo -eq 1 ] ; then
      if [ $userCreado -eq 0 ] ; then
         creaUser $nombre
         userCreado=1
      else
         echo 'Usuario ya existe'
      fi

   elif [ $modo -eq 2 ] ; then

      if [ $userCreado -eq 0 ] ; then
         echo 'Usuario no existe, crealo primero'
      else
         localizaArchivoHome $nombre
      fi

   elif [ $modo -eq 3 ] ; then

      if [ $userCreado -eq 0 ] ; then
         echo 'Usuario no existe, crealo primero'
      else
         copiarArchivoHome $nombre
      fi

   elif [ $modo -eq 4 ] ; then
      muestrarInformacionSistema
   elif [ $modo -eq 5 ] ; then
      echo 'Saliendo... '
      run=0
   else
      erroFueraRango
   fi

done