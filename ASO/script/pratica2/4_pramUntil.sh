#!/bin/bash
i=1
count=1
if [ $# != 0 ]; then
	until [ $# -le 0 ]; do
		echo "$count: $1"
		count=$(( count + 1 ))
		shift
	done

else
	echo "No tiene ningun parametro"
fi