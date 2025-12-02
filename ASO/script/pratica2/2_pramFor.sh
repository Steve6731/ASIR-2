#!/bin/bash
i=1
count=1
if [ $# != 0 ]; then
	for param in "$@"; do
		echo "$count: $param"
		count=$(($count + 1))
	done

else
	echo "No tiene ningun parametro"
fi