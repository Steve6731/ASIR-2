## IMPORTANTE
1. los textos dentro de '' solo va entender como un texto. 
pero los que dentro de "" va entender como un commando se va ejecutar si es ejecutable sino solo entiende como texto.
por eso la resulta de **num=1;echo '\$num'** es $num solo no sale ningun numero.
por otro lado **num=1;echo "\$num"** va sale 1;
Además dentro de `` si o si va entender como commando y ejecutarlo.
2. Tiene posibilidade que los variables que dentro de un function influen los variables fuera que tiene mismo nombre.
Entonces es comentable que usa **local \<varName>=\<valor>** para limitanse los variables dentro del function.
3. En script puede obtener valor entorno directamente como $LOGNAME
ejemplo: **QUIENSOY="Soy el usuario $LOGNAME"**
## FORMATO
```sh
# function
<functionName>(){
   <accion>
}

# usa function

# variable
<varName>=<valor>

# if
if <condicion> ; then
   <accion>
elif  <condicion> ; then
   <accion>
else
   <accion>
fi

# case
case $<varName> in
v1) <accion> # if $var=v1
;;
*) <accion> # else
;;
esac

# while
while <condicion> ; do
   <accion>
done

# for
for <variable> in <range> ; do
   <accion>
done;

# select 
# select es un herramiento util para hace un menu simple. es mezcla de case y while
select <varName> in "accion1" "accion2" "salir"
do
    case $<varName> in
        "accion1")
            echo "hace accion1"
            ;;
        "accion2")
            echo "hace accion2"
            ;;
        "sale")
            echo "Adios！"
            break
            ;;
        *)
            echo "input invalido"
            ;;
    esac
done
# calculacion
resulta=$(( <formulario> ))

```

## COMMAND
los commando para documento que tiene seguiente formato:
> grep \<docName>
tambien puede usar para resultado de otro commando:
> \<otroCommando> | grep
```sh
test # check fichero
   -r # fichero se puede leer.
   -w # fichero se puede escribir
   -x # fichero se puede ejecutar
   -f # !!! fichero es un fichero normal (no es un directorio) 
   -d # !!! fichero es un directorio 
   -c # fichero es un fichero especial de tipo carácter
   -b # fichero es un fichero especial de tipo bloque
   -s # !!! fichero tiene un tamaño mayor que cero
echo <text> # sale texto en terminar.
ls <ruta> # lista nombre de documento
   -1 # dividir cada nombre por liña
   -l # enseña más informacion
   -a # enseña todo
grep <docName> # busca linea que incluye texto que queremos
   -i # ignorar mayusculas/munusculas
   -n # numerar las lienas
   -c # count(resulta)
   -h # no muestra nombre de fichero
   -l # solo muestra nombre de fichero que contiene texto
   -v # los linea que no incluye texto
   -q # solo check ¡¡¡Utíl en algun caso!!!
wc <docName> # puede contar algo de resulta.
   -c # total de byte
   -m # total de caracteres
   -l # total de lineas
   -L # ancho maxima de linea
   -w # total de palabras
sort <docName> # oradena resulta por linea
   -n # orden numerico
   -d # orden alfabetico(defaut)
   -f # ignorar mayuscula/minuscula
   -r # orden inversa
   -c # check si está ordenado ¡¡¡Utíl en algun caso!!!
cut <docName> # corta secciones de cada linea
   -c # por columnas de caracteres ej: cut -c 1-10 que va cojer 10 caracteres primeros.
   -d # combinar con -f, define caracter de separacion de campo,
   -f # cortar por campo ej: cut -d ',' -f 1,3 que va cojer campo 1 y campo 3
head <docName> # obtiene primeras lineas
   -n # numero de lineas
tail <docName> # obtiene ultimas lineas
   -n # numero de lineas
```

## SIMPOLO ESPECIAL
```
$#       =>    numero de parametros que recibe.
break    =>    va terminar script immediate
continue =>    usa dentro de un bucleo, puede ir seguiente loop directamente
>        =>    indica donde guarda resulta de commando
>>       =>    igual que > pero no va elemina resulta anterio solo añadir
2>       =>    indica donde guarda mesaje error de commando
2>>      =>    igual que 2> pero no va elemina resulta anterio solo añadir
<        =>    indica que va leer este fichero
```

## CONDICION
Para evitar maximo posibe errores, es comentable que escribir segun seguientes reglas
1. Separa cada objeto con espacio. Ej: if [ ! $1 -eq $2 ] ; then
2. entiende como usa commando: **test** que está en arriba en parte COMMANDO
3. para revertir el resultado pon un ! ej: [ ! $1 -eq $2 ]
4. numca usa =,!=, <, >, <=, >= cambialo con seguiente tabla.

| Math | Bash | \| | Math | Bash | \| | Math | Bash | 
| ---- | ---- | -- | ---- | ---- | -- | ---- | ---- |
| =    | -eq  | \| | >=   | -ge  | \| |  >   | -lt  |
| !=   | -ne  | \| | <=   | -le  | \| |  <   | -gt  |
## RANGE
los range más comun:
1. arrary 
2. serie palabra ej: 
   - xuan steve jose
   - 10 20 30
3. `seq <numIni> <numSalt> <numFin>` 

## EXPRESIONES REGULARES 
- \. : Vale por cualquier carácter.
- \* : La expresión anterior se repite 0 o más veces.
- \+ : La expresión anterior se repite 1 o más veces.
- \{n,m} : La expresión anterior se repite entre m y n veces.
- \[...] : Un subconjunto determinado de caracteres (admite rangos, p.e. [a-z]).
- \[^...] : El complemento del subconjunto de caracteres indicado.
- \^ : carácter especial (indica comienzo de línea).
- \$: carácter especial (indica ﬁnal de línea).