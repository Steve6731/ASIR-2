#!/bin/bash
max_uid=0
while IFS= read -r line || [[ -n "$line" ]]; do

      if uid=$(echo $line | awk -F',' '{print $3}') ; then
         name=$(echo $line | awk -F',' '{print $1}')
         echo "$name tiene uid: $uid"
      else
         echo "Los datos está formato falso para .csv"
      fi

      if [ $max_uid -lt $uid ] ; then
         max_uid=$uid
      fi

done < usuario.csv

echo "Identificador mayor es $max_uid"