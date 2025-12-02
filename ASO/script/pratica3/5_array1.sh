#/bin/bash

cont=0
nombre="X"
maxNombre=""
maxNum=0
num=0

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
   num=`echo ${lista[(i)]}|wc -m`
   if [ $num -gt $maxNum ]; then
      maxNombre=${lista[(i)]}
      maxNum=$num
   fi
done

maxNum=$(($maxNum-1))

if [ $maxNum != 0 ]; then
   echo "El nombre mas largo es ${lista[(i)]} tiene longitud de $maxNum"
fi
