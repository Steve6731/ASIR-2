#/bin/bash

if [ "$UID" -ne 0 ]; then
    echo "Debe de ser root.Lo siento"
    exit 1
fi

find / -perm -o+rwx -type f > /tmp/fichs_peligrosos.txt
count=`wc -l < /tmp/fichs_peligrosos.txt`
echo "$count fichero peligrosos encontrado."