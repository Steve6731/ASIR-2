 #/bin/bash
HOLA=Hola
hola(){
	local HOLA=Mundo
	echo $HOLA
}
echo $HOLA
hola
echo $HOLA