$dirs =@(
   'dir1',
   'dir2',
   'dir3'
)

foreach ($dir in $dirs){
   New-Item -Path "." -Name "$dir" -ItemType "Directory"
}