#/bin/bash

lsCincoFichero() {
   if test -d $1; then
      find $1 -type f -print0 | du -h --files0-from=- | sort -rh | head -5
   else
      echo "Directory no existe"
   fi
}

if [ $# -gt 0 ]; then 

   while [ $# -gt 0 ]; do
      lsCincoFichero $1
      shift
   done

else

   echo "tiene que poner un parametro."
   read -p "Directory: " dir
   lsCincoFichero $dir

fi