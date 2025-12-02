#/bin/bash
if [ $# -eq 0 ]; then
	echo "fallo"
else
	dir="$1"
	ls -lha $dir
fi