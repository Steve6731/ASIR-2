1.  ¿Cómo hago para listar los ficheros del directorio padre?     
   > ls ..

2.  ¿Cómo borro el fichero preg2 (en el directorio actual)?   
   > rm preg2

3.  ¿Cómo puedo crear el fichero  vacio  nada en Linux ?   
   > touch [nombre de fichero]

4.  ¿Cómo puedo crear los directorios  dir1 dir2 dir3  (un sólo comando)?   
   > mkdir dir{1..3}

5.  ¿Cómo denomina Linux al segundo disco duro  SATA de un equipo?  
   > /dev/sdb

6.  ¿Y a la primera partición del segundo disco SATA?  
   > /dev/sdb1

7.  ¿Cómo hago para listar los archivos del directorio actual que empiecen por la letra  a ?  
   > ls a*

8.  ¿Y como almaceno la salida del comando anterior en el fichero preg8 ?  
   > la a* > preg8

9.  ¿Cómo puedo ver el contenido del  archivo preg9 sin abrirlo?   
   > cat preg9

10.  ¿Cómo veo las primeras 5 líneas del fichero preg10?   
   > head prep10 -n 5 

11. ¿Cómo accedo a la consola 3 desde el modo gráfico?   
   > control+alt+f3

12. ¿Cómo borro la pantalla?   
   > control+l o comando:clear

13. ¿Cómo le cambio de nombre al fichero fich-err ?  :Nuevo nombre → fich-13 .
   > mv "Nuevo nombre" fich-13

14. ¿Cómo puedo obtener información/explicación detallada de un comando?   
   > man [commando] o [commando] --help

15. ¿Cómo creo el enlace fuerte  preg15  al fichero  /tmp/prueba ?  
   > ln /tmp/prueba preg15

16. ¿Cómo borrar el directorio dir16  con todos sus archivos dentro?   
   > rm dir16 -r 

17. En consola, ¿cómo puedo autocompletar?   
   > tab o ↑

18. ¿Cómo puedo  cambiar los permisos al archivo fich para que el propietario tenga todos los permisos, el grupo lectura+ejecución y el resto de usuarios sólo permiso de lectura?   
   > chmod 754 

19. Si soy un usuario administrador.¿Como veo el contenido del directorio /var (necesito permisos de superusuario ) ?   
   > si tiene "sudo" usa "sudo ls /var"
20. ¿Cómo puedo crear el fichero fich20 cuyo contenido sea la palabra veinte (sin utilizar un editor)?   
   > echo veinte > fich20

21. ¿Cómo se le llama el intérprete de comandos por defecto en muchas distribuciones?  
   > bash

22. ¿Dónde se guardan los archivos de configuración del sistema?   
   > /etc

23. ¿Cómo diferencio entre ruta absoluta y ruta relativa?   
   > ruta absoluta: Siempre tiene que poner total ruta del archivo o directorio que quiere  
   > ruta relativa: se pone denpente la ruta depente donde estás

24. ¿Dónde se guardan los archivos del usuario alumno?   
   > /home/alumno

25.  ¿Cómo puedo ver las propiedades  (permisos, tamaño, fecha..)  del fichero fich25?   
   > ls -lh fich25

26. ¿Como visualizo el archivo preg26  de gran tamaño página a página?  
   > less preg26

27.  ¿Cómo borro un directorio vacio?  
   > rm [dir]

28. ¿Como muevo el fichero preg28 del directorio actual al directorio preguntas  (directorio hijo del directorio actual)?  
   > mv preg28 ./preguntas/preg28

29.  ¿Cómo visualizo la fecha y hora del sistema?  
   > date

30. ¿ Como empaquetar el directorio /pruebas en el fichero  comprimido datos-pru.tar.gz ?  
   > Tar czf datos-pru.tar.gz/pruebas

31. ¿A que se refiere cuando se dice que los entornos Unix son CASE SENSITIVE?  
   > Significa que “Cat” es diferente que “cat”.

32. ¿Qué significa ./ ?  
   > directorio actual

33. ¿Cómo crearías al usuario exam (con las opciones por defecto) ?  
   > Adduser exam

34. ¿Cómo consulto el historial de comandos?  
   > history

35. ¿Cómo se los grupos a los que pertenezco?  
   > groups

36. ¿Cómo copio todos los ficheros de extensión .odt en el directorio lo-writer ?  
   > Cp lo_writer/*.odt ./

37.  ¿Cómo se crea el  enlace simbólico enlaces-37 al archivo preg37 que está en el directorio /exam?  
   > ln -s /exam/preg37 enlaces_37

38. ¿Cómo hago para visualizar el final del fichero de configuración preg38?  
   > tail

39. ¿Cómo sé cual es el nombre de la máquina en la que estoy conectado
   > hostname

40. ¿Cómo salir de la sesiónr actual en la que estas trabajando?  
   > exit

41.  ¿Cómo hago para copiar  el fichero fich41 al  directorio ejercicios?  
   > cp fich41 ejericios/

42. ¿Cómo sé cuantas líneas tiene el archivo preg42?  
   > grep -c preg42

43.  ¿Como puedo ver los permisos del directorio  ejercicios ?  
   > ls -l ejercicios

44.  ¿Cómo hago para encontrar si hay dado de alta un usuario que se llame pepe?  
   > cat /etc/passwd | grep pepe

45.  ¿Cómo mostrar todas las líneas del archivo preg45 que contengan la palabra hola?  
   > cat preg45 | grep hola

46. ¿Como encuentro todos los archivos terminados en .txt en mi sistema?  
   > Find *txt /

47.  Y ahora ¿Como hago que los mensajes de error del comando anterior no salgan por pantalla ( los elimino)?  
   > [comando] 2> /dev/zero

48.  Estoy perdido en el árbol de directorios, ¿cómo vuelvo a mi HOME?  
   > cd ~

49. Como le doy al fichero fich49 el permiso de ejecución para el grupo?  
   > Chmod g+x fich49

50. ¿Puedo ejecutar un comando que no esté en mi directorio actual ?  explicalo
   > si, porque cuando ejecuto un comando primero va buscar si es comando que está 
   > guardado en las rutas que escribe en “$PATH” de cada usuarios. Por eso podemos  
   > ejecutar los comando que no está en la directorios actual