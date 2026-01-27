param(
   [Parameter(Mandatory=$true,helpmessage="Numeor 1")][int]$num1,
   [Parameter(Mandatory=$true,helpmessage="Numeor 2")][int]$num2
)

write-host "====================="
write-host "num1=$num1 num2=$num2"
write-host "====================="

if ( $num1 -gt $num2 ){
   write-host "num1($num1) > num2($num2)"
}elseif( $num1 -lt $num2 ){
   write-host "num1($num1) < num2($num2)"
}else{
   write-host "num1($num1) = num2($num2)"
}

write-host "====================="