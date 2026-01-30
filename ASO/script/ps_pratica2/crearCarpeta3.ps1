$dirs =@('dir1','dir2','dir3')

foreach ($dir in $dirs){
   if ( !(test-Path -path "$dir" -pathtype Container) ){
      New-Item -Path "." -Name "$dir" -ItemType "Directory" > $null
      write-host "$dir creado"
   }else{
      write-host "$dir ya existe"
   }
}