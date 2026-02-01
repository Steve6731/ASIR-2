param(
   [Parameter(Mandatory=$true,helpmessage="Numeor 1")]
   [int]$num
)

while ( $num -le 0) {
   $num = read-host "lo siendo, parametro no puede ser ni 0 ni negativo"
}

for ($i=0; $i -lt $num; $i++){
   write-host "FAP"
}