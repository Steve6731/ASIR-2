#/bin/bash
# tambien valido para eje4

cont=0
nombre="X"

while [ ! -z "$nombre" ] && [ $nombre != "exit" ]
do read -p "Introduce nombre de carpeta: " nombre
   if [ ! -z "$nombre" ] && [ $nombre != "exit" ]; then
      if test -d $nombre; then
         echo "Ya existen carpeta que se llama $nombre"
      else
         lista[$cont]=$nombre
         cont=$(($cont+1))
      fi   
   elif [ $nombre != "exit" ]; then
      echo "No puedes quedar vacio."
   fi
done

#Recorre el array y muestra los nombres Introducidos
echo "El número de nombres introducidos son ${#lista[*]}"

for i in $( seq 0 $(($cont-1)) )
do
   echo "$i Creado: ${lista[(i)]}"
   mkdir ${lista[(i)]}
   chmod 700 ${lista[(i)]}
done