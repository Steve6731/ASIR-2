#!/bin/bash

if [ $# -ne 1 ]; then
	echo "Erro1: solo y necesita que pasar unico parametro"
	exit 1
fi

if [[ $1 =~ "^existe$" ]]; then
	echo "Erro2: Diciendo que existe"
	exit 2
fi

fichName=$1

run=1
reglaNombre="^.+$"
reglaNivel="^ciclo|bach$"
reglaCurso="^[12]{1}$"
reglaFin1="^continuar|fin$"

while [ $run -eq 1 ]; do

	echo "==== Fichero → $fichName ======"
	echo "1. Crear fichero lista alumnos"
	echo "2. Crear carpetas alumnos"
	echo "3. Salir"
	read -p "Opcion: " opt
	
	case $opt in
	1)
		run1=1
		while [ $run1 -eq 1 ]; do		
			echo "=============================="
			read -p "Nombre: " nombre
			until [[ $nombre =~ $reglaNombre ]] ; do
				echo "Erro: No puede ser vacio"
				read -p "Nivel: " nivel
			done
			
			read -p "Apellido: " apellido

			until [[ $apellido =~ $reglaNombre ]] ; do
				echo "Erro: No puede ser vacio"
				read -p "Nivel: " nivel
			done
			
			read -p "Nivel: " nivel
			
			until [[ $nivel =~ $reglaNivel ]] ; do
				echo "Erro: solo puede ser \"ciclo\" o \"bach\""
				read -p "Nivel: " nivel
			done
			
			read -p "Curso: " curso
			until [[ $curso =~ $reglaCurso ]] ; do
				echo "Erro: solo puede ser \"1\" o \"2\""
				read -p "curso: " curso
			done
			
			echo "$nivel:$curso:$apellido:$nombre" >> $fichName
			
			read -p "continuar/fin: " fin1
			until [[ $fin1 =~ $reglaFin1 ]] ; do
				echo "Erro: solo puede ser \"continuar\" o \"fin\""
				read -p "continuar/fin: " fin1
			done
			
			if [[ $fin1 =~ "fin" ]]; then
				run1=0
			fi
		done
	;;
	2)
		echo "=============================="
		while read -r line || [[ ! -z $line ]]; do
			
			dirName=$(echo $line | awk -F ':' '{print $1$2}')
			if test -d $dirName; then
				echo "dir \"$dirName\" ya existe"
			else
				mkdir $dirName
			fi
			docName=$(echo $line | awk -F ':' '{print $3"_"$4}')
			if test -e $dirName/$docName; then
				echo "Fichero \"$dirName/$docName\" ya existe"
			else
				echo "$dirName/$docName creado"
				touch $dirName/$docName
			fi
		done < $fichName
	;;
	3)
		echo "Saliendo..."
		exit 0
	;;
	*)
		echo "Error Option Invalido"
	;;
	esac
done
