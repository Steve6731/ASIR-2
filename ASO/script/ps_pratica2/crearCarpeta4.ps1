$users =@(
   "user1",
   "user2",
   "user3"
)

foreach ($name in $users){
   if ( !(get-localuser -Name $username -ErrorAction SilentlyContinue)){
      new-localuser -name $name -NoPassword
      write-host "usuario $name creado"
   }else{
      write-host "usuario ya existe"
   }

   $dir = "C:\$name"
   
   if ( !(test-Path -path "name" -pathtype Container) ){
      New-Item -Path "." -Name "$dir" -ItemType "Directory" > $null
      write-host "carpeta personal $dir creado"
   }else{
      write-host "$dir ya existe"
   }
}