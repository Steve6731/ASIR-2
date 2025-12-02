#/bin/bash
# tambien valido para eje3
cont=0
nombre="X"

while [ ! -z "$nombre" ] && [ $nombre != "exit" ]
   do read -p "Introduce nombre de fichero: " nombre
   if [ ! -z "$nombre" ] && [ $nombre != "exit" ]; then
      if test -f $nombre; then
         lista[$cont]="$nombre : existen"
      else
         lista[$cont]="$nombre : no existen"
      fi
      cont=$(($cont+1))
   elif [ $nombre != "exit" ]; then
      echo "No puedes quedar vacio."
   fi
done

#Recorre el array y muestra los nombres Introducidos
echo "El número de nombres introducidos son ${#lista[*]}"

for i in $( seq 0 $(($cont-1)) )
do
   echo "Fichero $i ${lista[(i)]}"
done