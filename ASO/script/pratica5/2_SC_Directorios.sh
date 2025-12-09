#/bin/bash

catListaDir() {

   while IFS= read -r line || [[ -n "$line" ]]; do

         echo "$line"

   done < lista_dir.txt

}

if ! test -f lista_dir.txt ; then
   echo "Error 1: No existe el fichero lista_dir.txt"
   exit 1
fi

if ! test -s lista_dir.txt ; then
   echo "Error 2: El fichero lista_dir.txt esta vacio"
   exit 1
fi

catListaDir
read -p "Pon c(rear) o e(liminar) sino va salir: " accion

catListaDir | while IFS= read -r directory; do
    
	if [ "$accion" = 'c' ]; then

		mkdir $directory;	

	elif [ "$accion" = 'e' ]; then

		rm -d $directory;

	fi
    
done

echo 'Saliendo....'