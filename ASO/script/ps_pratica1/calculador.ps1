param(
   [Parameter(Mandatory=$true,helpmessage="Numeor 1")][int]$num1,
   [Parameter(Mandatory=$true,helpmessage="Numeor 2")][int]$num2
)

write-host "====================="
write-host "num1=$num1 num2=$num2"
write-host "====================="

write-host "$num1 + $num2 = $($num1 + $num2)"
write-host "$num1 - $num2 = $($num1 - $num2)"
write-host "$num1 * $num2 = $($num1 * $num2)"

if ($num2 -ne 0){
   write-host "$num1 / $num2 = $($num1 / $num2)"
   write-host "$num1 % $num2 = $($num1 % $num2)"
}else{
   write-host "ERROR: División por cero"
   write-host "ERROR: División por cero"
}

write-host "$num1 / $num2 =" $([Math]::Pow($num1,$num2));

write-host "====================="