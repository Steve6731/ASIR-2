$fechaHora = Get-Date -Format "dd/MM/yy - HH:mm:ss"
$nombrePC = $env:COMPUTERNAME
$usuario = $env:USERNAME

$contenido = @"
Fecha - Hora: $fechaHora
Nombre del pc: $nombrePC
Usuario Actual: $usuario
"@

$contenido | Out-File -FilePath "Info1.txt" -Encoding utf8
