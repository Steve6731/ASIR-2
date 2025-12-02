#!/bin/bash
i=1
count=0
for valor in `ls -1a`; do
	if test -f $valor; then
		count=$(($count + 1))
	fi
done

echo $count