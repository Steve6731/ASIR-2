#!/bin/bash

num=$(($RANDOM%100+1))
correct=0
resp=""
inicio=$(date +%s)
regla="^[1-9][0-9]*$"
echo "Empieza juego"

while [ $correct -ne 1 ]; do
   read -p 'Numero: ' resp
   if [[ $resp =~ $regla ]] ; then
      if [ $resp -gt $num ] ; then
         echo "El numero es mas menor."
      elif [ $resp -lt $num ] ; then
         echo "El numero es mas mayor."
      elif [ $resp -eq $num ]; then
         correct=1
         echo "El numero es $num, estas correcto.!!!"
      fi
   fi
done

fin=$(date +%s)
duracion=$(( fin - inicio ))
echo "Duración: $duracion segundos"