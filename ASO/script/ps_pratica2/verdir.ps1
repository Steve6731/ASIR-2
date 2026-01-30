param(
   [Parameter(Mandatory=$true,helpmessage="Numeor 1")][string]$pathDir 
)

if (test-path -Path $pathDir -pathType Container){
   ls $pathDir
}else{
   write-host "Erro1, directorio no existen "
   exit 1
}