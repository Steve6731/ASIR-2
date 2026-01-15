# Inicio
Este es un docmento para ayudame entender funcionaridad de linux bash script.

# IMPORTANTE
1. los textos dentro de '' solo va entender como un texto. 
pero los que dentro de "" va entender como un commando se va ejecutar si es ejecutable sino solo entiende como texto.
por eso la resulta de **num=1;echo '\$num'** es $num solo no sale ningun numero.
por otro lado **num=1;echo "\$num"** va sale 1;
Además dentro de `` si o si va entender como commando y ejecutarlo $(\<commad>) tiene funcionalidad igual.
2. Tiene posibilidade que los variables que dentro de un function influen los variables fuera que tiene mismo nombre.
Entonces es comentable que usa **local \<varName>=\<valor>** para limitanse los variables dentro del function.
3. En script puede obtener variable entorno directamente como $LOGNAME
ejemplo: **QUIENSOY="Soy el usuario $LOGNAME"**
4. Cuando ejecuta un script, el script va obtener su directorio de trabajo que es igual que tu directorio actual , por eso si dentro de script hay commando: **cd ..**
Parece no cambia nada. Pero realmente está cambiando el direcotrio de trabajo de script. No es tuyo.
Por eso si añade **pwd** despues de **cd ..** en script, la resulta es el directorio padre de tu direcotrio actual.
5. Para Depureacion pon **#!/bin/bash -x** o **#!/bin/bash -v** en inicio.  
va enseña valor de variable antes de ejecutarlo
nota: escribir en script y ejecuta con sh \<script.sh> o bash \<script.sh> no funciona tiene que poner sh -x \<script.sh> para bash tambien.

# FORMATO
## function
```sh
<functionName>(){
   <accion>
}
```
## usa function
```sh
<functionname> <$1> <$2> ... <${10}> <${11}>...
```
## if
```sh
if <condicion> ; then
   <accion>
elif  <condicion> ; then
   <accion>
else
   <accion>
fi
```
## case
```sh
case $<varName> in
v1) <accion> # if $var=v1
;;
*) <accion> # else
;;
esac
```
## while
```sh
while <condicion> ; do
   <accion>
done
```
## for
```sh
for <variable> in <range> ; do
   <accion>
done;
#<range>:
#1. arrary 
#2. serie palabra ej: 
#   xuan steve jose
#   10 20 30
#3. `seq <numIni> <numSalt> <numFin>` 
```
## select 
```sh
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
```
## leer documento
```sh
# leer documento y hace un loop que tratar con cada linea y signa un nombre <varName>
while read <varName> ; do
   echo "Línea: $i"
done < $fichero

# algun caso puede usar comando xarge está en parte COMMAND
```
## algo de variable
```sh
# indica un variable
<varName>=<valor>
# calculacion
let var=var+1 # los simpolo que puede usar está en SIMPOLO DE CALCULACION
var=$(( $var - 1 ))
var=‘expr $var - 1‘ # no me gusta
# usa variable
${var=thing}: si no está deﬁnida, indica su valor es `thing`
${var-thing}: valor de var si está deﬁnida, si no thing.
${var+thing}: thing si var está deﬁnida, si no nada
${var?message}: valor de var si está deﬁnida, si no imprime el mensaje en el terminal.
```
## array
```sh
# indica array
<arrayName>=( <val1> <val2> <val3>)
<arrayName>[<num>]=valor
# usa array
${<arrayName>[x]} # Para acceder al elemento x
${<arrayName>[*]} # Para consultar todos los elementos
${<arrayName>[@]} # Para consultar todos los elementos
```

# SIMPOLO DE CALCULACION
basico: +  -  *  /  %  **  
con igual: +=  -=  *=  /=  %=  
avanzado: &(AND) |(OR) ^(XOR) ~(NOT) <<(左移)  >>(右移)
con igual: &=  |=  ^=  <<=  >>=

# SIMPOLO ESPECIAL
```
$#       =>    numero de parametros que recibe.
$?       =>    estado de salir de comando anterio, 0 es verdad, resto valor es falso.
$!       =>    PID de ultimo proceso de segundo plano
($$)     =>    PID de shell actual, no necesita () pongo porque el hará que Markdown active el modo de fórmula matemática.
$-       =>    options de shell acutal, ej: himBH (cada letra significa cada option actualizando)
$*       =>    todo parametro, sin dividir cada parametro
$@       =>    todo parametro, va dividir cada parametro
$0       =>    nombre de fichero script
>        =>    indica donde guarda resulta de commando
>>       =>    igual que > pero no va elemina resulta anterio solo añadir
2>       =>    indica donde guarda mesaje error de commando
2>>      =>    igual que 2> pero no va elemina resulta anterio solo añadir
<        =>    indica que va leer este fichero
\a       =>    alerta (campana)
\b       =>    espacio-atrás
\e       =>    carácter de escape (ESC)
\f       =>    nueva página
\n       =>    nueva línea
\r       =>    retorno de carro
\t       =>    tabulación horizontal
\v       =>    tabulación vertical
\\       =>    barra invertida
\xnnn    =>    carácter cuyo código es el valor hexadecimal nnn
true     =>    devuelven 0, realmente es un commando
false    =>    devuelven 1, realmente es un commando, adémas en script cualquier valor distinto de 0 es false.
```

# variable entorno
commando **export** puede obtener valor de todo variable entorno actual
```sh
PS1: prompt primario. El siguiente ejemplo modiﬁca el prompt, utilizando diferentes para el nombre del
usuario y el host, y el directorio actual:
$ PS1=’\[\033[31m\]\u@\h\[\033[0m\]:\[\033[33m\]\w\[\033[0m\] $ ’
PS2: prompt secundario.
LOGNAME: nombre del usuario.
HOME: directorio de trabajo (home) del usuario actual que la orden cd toma por defecto.
PWD: directorio actual.
PATH: rutas de búsqueda usadas para ejecutar órdenes o programas. Por defecto, el directorio actual no
está incluido en la ruta de búsqueda. Para incluirlo, tendríamos que ejecutar P AT H =PATH:.:
TERM: tipo de terminal actual.
SHELL: shell actual.
```

# CONDICION
Para evitar maximo posibe errores, es comentable que escribir segun seguientes reglas
1. Separa cada objeto con espacio. Ej: if [ $1 -eq $2 ] ; then
2. entiende como usa commando: **test** que está en arriba en parte COMMANDO
3. para revertir el resultado pon un ! ej: [ ! $1 -eq $2 ]
4. numca usa =,!=, <, >, <=, >= cambialo con seguiente tabla.

| Math | Bash | \|  | Math | Bash | \|  | Math | Bash |
| ---- | ---- | --- | ---- | ---- | --- | ---- | ---- |
| =    | -eq  | \|  | >=   | -ge  | \|  | >    | -lt  |
| !=   | -ne  | \|  | <=   | -le  | \|  | <    | -gt  |

# EXPRESIONES REGULARES
```sh
<text> =~ "<pattern>" # comproba si un texto segun un EXPRESIONES REGULARES
```
- \. : Vale por cualquier carácter.
- \* : La expresión anterior se repite 0 o más veces.
- \+ : La expresión anterior se repite 1 o más veces.
- \{n,m} : La expresión anterior se repite entre m y n veces.
- \[...] : Un subconjunto determinado de caracteres (admite rangos, p.e. [a-z]).
- \[^...] : El complemento del subconjunto de caracteres indicado.
- \^ : carácter especial (indica comienzo de línea).
- \$: carácter especial (indica ﬁnal de línea).


# COMMAND
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
```
```sh
echo <text> # sale texto en terminar.
   -e "<text>" # va entender los caracteres de escape
      # ej. de caracteres de escape
      \b # borra un carater anterio abc\b => ab
      \f # cambia pagina pero en terminar enseña como otro linea
      \n # cambia linea
      \t # tab
```
```sh
printf "<text> <%forma1> <text> <%forma2>" <valor1> <valor2> # print dato segun forma;
   <%forma> # cada % va entiende como empieza de un forma si quiere % solo pon \%
   # tipo de forma
      %ns string           printf "%s\n" "Hello" # n es numero de ancho, admás sin - es Alineación derecha sino Alineación izquierda para string tambien
      %nd int              printf "%-010d\n" 42 # igual que string y puede añadir un 0 en delante d n asique va Relleno con ceros 42 => 4200000000
      %.nf float           printf "%.2f\n" 3.14159 # n indica muestra cuando decimales 3.13159 => 3.14
      %x hexadecimal       printf "%x\n" 255 # 255 => FF
      %o Octal             printf "%o\n" 64 # 64 => 100
      %b EscapeCharacter   printf "%b\n" "Line1\nLine2" # \n => enter(cambiar linea)
```
```sh
od <docName> # sale texto en binario
   -A # forma de direccion
      -A d     # base 10
      -A o     # base 8（defaut）
      -A x     # base 16
      -A n     # sin direccion
   -t # forma de texto
      -t a     # sale los simpolos en forma UCC(Unicode control characters) ej: enter => nl
      -t c     # sale los simpolos en forma de liguaje C ej: enter => \n
      -t o1|o2|o4|o8    # base 8（1|2|4|8 caracter）
      -t d1|d2|d4|d8    # base 10 con simpolo
      -t u1|u2|u4|u8    # base 10 sin simpolo
      -t x1|x2|x4|x8    # base 16
      -t f4|f8|f16      # flort（4|8|16 caracter）
```
```sh
ls <ruta> # lista nombre de documento
   -1 # dividir cada nombre por liña
   -l # enseña más informacion
   -a # enseña todo
```
```sh
grep <docName> # busca linea que incluye texto que queremos
   -i # ignorar mayusculas/munusculas
   -n # numerar las lienas
   -c # count(resulta)
   -h # no muestra nombre de fichero
   -l # solo muestra nombre de fichero que contiene texto
   -v # los linea que no incluye texto
   -q # solo check ¡¡¡Utíl en algun caso!!!
```
```sh
wc <docName> # puede contar algo de resulta.
   -c # total de byte
   -m # total de caracteres
   -l # total de lineas
   -L # ancho maxima de linea
   -w # total de palabras
```
```sh
sort <docName> # oradena resulta por linea
   -n # orden numerico
   -d # orden alfabetico(defaut)
   -f # ignorar mayuscula/minuscula
   -r # orden inversa
   -c # check si está ordenado ¡¡¡Utíl en algun caso!!!
```
```sh
uniq <docName> # elimina lineas repetidas, mejor combina con SORT
```
```sh
tr <text1> <text2> # cambiar <text1> a <text2> pero solo va usar primer caracter de text2
   -d # borra <text1> 
   -s # borra caracteres repetido de <text1> ej: addddddda => ada
   -c # borra los que fuera <text1> 
```
```sh
awk '<pattern> {<action>}' <file> # awk es un herramento util para texto
   -F # indica simpolo de separar ej: 
      awk -F ',' '{print $2}' data.csv # , va entender como simpolo de separar
      awk -F '[,;]' '{print $1}' data.csv # , y ; van entender como simpolo de separar 
   <pattern> # pon los condiciones o exprecion regulares para filtra texto ej:
      '$2 > 100 {print}' # va muestra linea que columna 2 es mayor que 100
      '/erro/ {print}' # va muestra linea que contiene 'erro'
      '$1 ~ /^x/ {print $0}' # va muestra la linea que su columna 1 empieza por x

   # unos variable interna
   NR：numero de linea actual
   NF: numero de caracter acutal
   $0：todo texto de la linea
   $1, $2... : contenido de cada columna

   # algo más avanzado sobre <acction>
   'BEGIN {print "start"} {print $1} END {print "end"}' # BEGIN y END puede indica unos commando que solo ejecuta una vez en empieza y fin
   '{sum += $1; count++} END {print sum/count}' # puede indica variable
   '{print "user:", $1, "nota:", $2}' # puede usar , combina texto
   '{if ($2 >= 5) print $1,"apro"; else print $1,"susp"}' # puede usar if else
   '{sum1 += $1; sum2 += $2} END {printf "total: %.2f, %.2f\n", sum1, sum2}' # tambien puede usar "printf"
   '{ip[$1]++} END {for(i in ip) print i, ip[i]}' # un ejemplo de count cada IP aparece cuando veces
```
```sh
sed '<accion>' <docName> # herramente util para editar texto
   -i # modifica documento(sino pone solo modifica el texto que muestra en terminar)
   # sustituye texto
   sed 's/<text>/<textChanged>/<rango>' # en rango puede poner 2(2º texto coincidente), g(todo texto coinc.), 2g(2º a final texto coinc.)
   # borra texto
   sed '<pattern>d' # ej: '3d'(3ª linea solo), '2,4d'(2-4 linea), '$d'(ultimo linea), '/erro/d'(linea que tiene texto erro), '/^$/d'(linea vacio)
   # print texto
   sed '<pattern>p' # igual que borrar
   # inserta
   sed '<pattern>i' # va borrar anterior
   # añadir 
   sed '<pattern>a' # no borra solo añadir
   # para vario accion hay dos forma, primer forma puede indica línea especificada unas vez solo
   sed '3,5{s/foo/bar/; s/baz/qux/}'
   sed -e 's/foo/bar/' -e 's/baz/qux/'
   # puede añadir ! depues de <pattern> ej: '5!s/foo/bar/g' y '!5p'
```
```sh
eval <command> <varName> # transforma variable a parametro
```
```sh
set -- <arg1> <arg2> <arg3> # usa para indica parametro
set -- # para borra todo parametro
set # mira todo parametro
set -euo pipefail
   -e # exit si hay erro (usa set +e puede desactivo)
   -u # dice erro si hay option indefinido (usa set +u puede desactivo)
   -o pipefail # -o significa option, pipefail significa estado de terminar va ser igual que ultimo commando. es decir cual quier fallo, falla todo.
   -x # modo debug
   -v # muestra commando
   -n # solo leer no ejecuta
```
```sh
cut <docName> # corta secciones de cada linea
   -c # por columnas de caracteres ej: cut -c 1-10 que va cojer 10 caracteres primeros.
   -d # combinar con -f, define caracter de separacion de campo,
   -f # cortar por campo ej: cut -d ',' -f 1,3 que va cojer campo 1 y campo 3
```
```sh
head <docName> # obtiene primeras lineas
   -n # numero de lineas
```
```sh
tail <docName> # obtiene ultimas lineas
   -n # numero de lineas
```
```sh
less # mostra resultado paginada
more # igual pero no funciona en script
```
```sh
tac <docName> # sale texto de documento pero desde ultimo hasta inicio.
```
```sh
<command> | xargs <command> # puede transforma la resulta anterior como parametro de otro commando 
   -L # lee cuando linea para usa como parametro cada vez 
   -n # usa cuando parametro cada vez
   -i # indica un nombre a la resulta anterior para situacion conplejo. ej: <command> | xargs -I resulta mv resulta resulta.bak
   -P # Ejecución paralela, ¡¡¡util!!!
   -0 # usa para evitar problema de simpolo especial como espacio
   -null # igual que -0

```
```sh
<command> | tee <docName> # lee resulta antrior y escribir en ficheros
   -a # añadir
   -i # ignore interrupts
```
```sh
cd <rutaAbsoluta|rutaEstatica> # cambiar ruta, ¡¡¡Lee, punto 4 de IMPORTAMTE!!!
pwd # echo $PWD, ruta actual. no olvida punto 4 de IMPORTAMTE
```
```sh
dirs # muestra contenido de array, orden de array: [0=><dir1>,1=><dir2>,2=><dir3>,]
pushd <dir> # añadir un directori a array de directorios 
popd <(+|-)NumeroDeArray> # "+" va ir aquel direcorio y eliminarlo "-" solo va eliminarlo
```
```sh
let "<formulario>" # igual que $(( )) usa para calcular valor.
```
```sh
exit # terminar script
break # a terminar loop actual immediate
continue # usa dentro de un bucleo, puede ir seguiente loop directamente
true # devuelven 0
false # devuelven 1
```
```sh
fg # mover proceso a primer plano
bg # mover proceso a segundo plano
wait # espera hasta todo proceso de segundo plano termina
```
```sh
env # muestra todo variable entorno y su valor
export \[-p] # muestra todo variable entorno y su valor
export <nameVar>=<valor> # asigna variable entorno
export <nameVar> # otro forma com variable ya tiene valor
```

# GETOPTS
El comando **getopts** es un poco especial, porque se permitenos dar option a nuestro script. 
Para el caso que no sabe que es option de un commando, estos son ejemplo: los optiones son **-l** de **ls -l**, **-aux** de **ps -aux**, **--help** de **grep --help**.  

Admás hay un commando parecido que se llama **getopt** se funciona más avanzado pero tiene que instarlo. Pero está preinstalado en mayoria systema de linux.
Tambien voy poner su sintaxis.
### SINTAXE DE COMANDO SOLO
```sh
# los option que tiene : significa necesita un parametro.
getopts <optiones> <varName> # option ej: ab:c
   # getopts tiene algun variable especial
   $OPTARG # valor de parametro actual
   $OPTIND # indice de parametro
getopt -o <optiones> -l <optiones>
   -o # indica option corto
   -l # indica option largo ej: user:,password:,debug,help
   -n # va dar nombre de script(se usa para enseña mensaje de erro)
   -q # no sale mesaje de erro
```
### SINTAXE TOTAL
```sh
# getopts
while getopts t:r:m <varName>
do
   case $<varName> in
      t) echo "El argumento para la opción -t es $OPTARG"
      ;;
      r) echo "El índice siguiente al argumento de -r es $OPTIND"
      ;;
      m) echo "El flag -m ha sido activado"
      ;;
      ?) echo "Lo siento, se ha intentado una opción no existente";
      exit 1;
      ;;
   esac
done

# getopt
# para getopt funciona necesita unos pasos más 
<varName>=$(getopt -o "u:p:d:h" -l "user:,password:,debug,help" -n "$0" -- "$@")
eval set -- "$<varName>"

while true; do
    case "$1" in
        -u|--user)
            USER="$2"
            shift 2
            ;;
        -p|--password)
            PASSWORD="$2"
            shift 2
            ;;
        -d|--debug)
            DEBUG=true
            shift
            ;;
        -h|--help)
            echo "help: $0 [-u USER] [-p PASSWORD] [--debug]"
            exit 0
            ;;
        --)
            shift
            break
            ;;
    esac
done
```

# COLOR DE ANSI
Este parte solo explica como cambiar color de texto en termina  
No es nada importante pero intelesante.
```sh
\033[<code>m # "033" y "e" significa ESC caracter, <code> es numero de color
\e[<code>m # [ significa empieza, m significa terminar
\033[0m # si no quiere cambiar todo de un linea pon este en medio
\e[1;30;47m # un texto dafaut, con background negro, color blanco
```
### 文本颜色（前景色）
| 代码  | 颜色 | 示例              |
| ----- | ---- | ----------------- |
| 30    | 黑色 | `\e[30m黑字\e[0m` |
| 31    | 红色 | `\e[31m红字\e[0m` |
| 32    | 绿色 | `\e[32m绿字\e[0m` |
| 33    | 黄色 | `\e[33m黄字\e[0m` |
| 34    | 蓝色 | `\e[34m蓝字\e[0m` |
| 35    | 洋红 | `\e[35m紫字\e[0m` |
| 36    | 青色 | `\e[36m青字\e[0m` |
| 37    | 白色 | `\e[37m白字\e[0m` |
| 90-97 | 亮色 | `\e[91m亮红\e[0m` |

### 背景颜色
| 代码 | 颜色     | 示例                        |
| ---- | -------- | --------------------------- |
| 40   | 黑色背景 | `\e[40m\e[37m白字黑底\e[0m` |
| 41   | 红色背景 | `\e[41m红底\e[0m`           |
| 42   | 绿色背景 | `\e[42m绿底\e[0m`           |
| 43   | 黄色背景 | `\e[43m黄底\e[0m`           |
| 44   | 蓝色背景 | `\e[44m蓝底\e[0m`           |
| 45   | 洋红背景 | `\e[45m紫底\e[0m`           |
| 46   | 青色背景 | `\e[46m青底\e[0m`           |
| 47   | 白色背景 | `\e[47m白底\e[0m`           |

### 文本样式
| 代码 | 样式                 | 示例                 |
| ---- | -------------------- | -------------------- |
| 0    | 重置所有属性         | `\e[0m`              |
| 1    | 加粗/高亮            | `\e[1m粗体\e[0m`     |
| 2    | 暗淡（通常不明显）   |                      |
| 3    | 斜体                 | `\e[3m斜体\e[0m`     |
| 4    | 下划线               | `\e[4m下划线\e[0m`   |
| 5    | 闪烁                 | `\e[5m闪烁\e[0m`     |
| 7    | 反色（前景背景互换） | `\e[7m反色\e[0m`     |
| 8    | 隐藏                 | `\e[8m隐藏文字\e[0m` |
| 9    | 删除线               | `\e[9m删除线\e[0m`   |
