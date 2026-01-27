param(
   [string]$saludo,
   [string]$nombre
)

if ( ([string]::isnullorempty($nombre)) -or ([string]::isnullorempty($saludo)) ) {
   write-host 'Tienes que poner $saludo y $nombre'
}else{
   write-host "$saludo $nombre !!!"
}
