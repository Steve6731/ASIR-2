#!/bin/bash
num=1
div=1
while [ $num != 0 ] && [ $div != 0 ]; do
	echo "Puede tecla 0 para terminar"
	echo "Introduce valor dividendo"
	read num
	if [ $num != 0 ]; then
		echo "Introduce valor divisor"
		read div
		if [ $div != 0 ]; then
			resto=$num
			count=0
			while [ $div -le $resto ]; do
				resto=$(( $resto - $div ))
				count=$(( $count + 1 ))
			done
			echo "$num / $div = $count resto: $resto"
		fi
	fi
done