#/bin/bash

cont=0
nombre="X"

while [ ! -z "$nombre" ]
do read -p "Introduce nombre de personas: " nombre
   if [ ! -z "$nombre" ]; then
      lista[$cont]=$nombre
      cont=$(($cont+1))
   fi
done

#Recorre el array y muestra los nombres Introducidos
echo "El número de nombres introducidos son ${#lista[*]}"

echo ${#lista[@]}
for i in $( seq 0 $(($cont-1)) )
do
   echo "El $i es ${lista[(i)]}"
done

#otra forma
for nom in "${lista[@]}";do
   echo " Los nombres son: $nom "
done