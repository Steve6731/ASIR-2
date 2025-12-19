#!/bin/bash
if [ $# -eq 0 ] ; then
   echo 'Tiene que poner parametro'
   exit 1;
fi

pathDoc="$1"
regla="^.*user[0-9]*\.csv$"

if [[ ! $pathDoc =~ $regla ]] ; then
   echo 'Deberia ser documento user.csv, user1.csv, user2.csv...'
   exit 1;
elif ! test -f $pathDoc ; then
   echo 'No existe fichero '$pathDoc
fi

# sed -i '1d' user2.csv

while read -r line || [[ -n "$line" ]]; do

   nombre=$( echo "$line" | awk -F ',' '{gsub(/"/,"",$1);print $1}' )
   passwd=$( echo "$line" | awk -F ',' '{gsub(/"/,"",$2);print $2}' )
   consol=$( echo "$line" | awk -F ',' '{gsub(/"/,"",$3);print $3}' )
   ptHome=$( echo "$line" | awk -F ',' '{gsub(/"/,"",$4);print $4}' )

   if id $nombre > /dev/null ; then
      echo $nombre' ya existe'
   else
      if ! test -d $ptHome ; then
         mkdir $ptHome
      fi
      useradd $nombre -m \
         -d $ptHome \
         -s $consol \
         -p $passwd
   fi


done < $pathDoc