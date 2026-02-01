$users = Import-csv -Path "usuario.csv"

foreach ($user in $users){
   Write-Output "Nombre completo: $($user.Nombre) $($user.Apellido)"
   Write-Output "Correo electrónico: $($user.CorreoElectronico)"
   Write-Output "ID de user: $($user.IDuser)"
   Write-Output ""
}