
\$_ | \$PSItem 当前正在处理的对象
\$?   上一条命令是否执行成功
\$^   第一个令牌     对于 Get-Process -Name notepad，$^ 的值可能是 "-Name" 或 "Get-Process"
\$$   最后一个令牌   如果你输入 Get-Process -Name notepad 并运行，那么 $$ 的值就是 "notepad"。
```ps1

$nombreDePc = $env:COMPUTERNAME
$usuario = $env:USERNAME

$array = @("1","2","3")
$csv = Import-csv -Path "dato.csv"
Write-output "valor1: $($csv.valor1)" 
$pow = $([Math]::Pow($num1,$num2))

$texto = @"
   linea1
   linea2
   linea3
"@

param(
   [Parameter(Mandatory=$true,helpmessage="parameter1")][string]$param1
   [ValidateSet("Low", "Medium", "High")]
   [ValidatePattern("^\d{3}-\d{3}-\d{4}$")]
   [ValidateScript({Test-Path $_})]
)

if ( () -or () ) -and () {
   null
}elseif(){
   null
}else{
   null
}

foreach ($key in $array) {
   null
}

while () {
   null
}

for ($i=0;$i -lt $num; $i++) {
   null
}

$lenName = $($name.length)
$a -is [int] # 检验类型
$a -isnot $b.GetType() # 反检验类型
($b -as [int]) -is $b.GetType() # 转换类型
test-path -Path $pathDir [-pathType Container | Leaf | Any]
# container: dir  Leaf: document
get-date -Format "dd/MM/yy - HH:mm:ss"
new-Item -Path "." -Name "f1" -ItemType "File" -Value "Hello World" 
new-Item -Path "." -Name "dir1" -ItemType "Directory" [-Force]
$texto | out-file -FilePath "f1.txt" -Encoding utf8



```


| Math | Bash | \|  | Math | Bash | \|  | Math | Bash |
| ---- | ---- | --- | ---- | ---- | --- | ---- | ---- |
| =    | -eq  | \|  | >=   | -ge  | \|  | >    | -lt  |
| !=   | -ne  | \|  | <=   | -le  | \|  | <    | -gt  |

$UserInArray = $($array -contains "User")
-contains	包含在集合中	检查右侧值是否在左侧集合中
-notcontains	不包含在集合中	检查右侧值是否不在左侧集合中
-in	在...中	检查左侧值是否在右侧集合中（与-contains相反）
-notin	不在...中	检查左侧值是否不在右侧集合中