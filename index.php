<?php

$file = fopen("test.txt","w") or die("не удалось создать файл"."</br>");
$filename = "test.txt";
$str = "Привет мир";
fwrite($file, $str);
fclose($file);
$str = htmlentities(file_get_contents($filename));
echo $str."</br>";

rename ("test.txt", "mir.txt") or die;
$dir = "folder";

if(!file_exists($dir)){
  if(mkdir($dir)){
  	 echo "Directory created successfully."."</br>";
    rename ("mir.txt", "folder/mir.txt") or die;
  } else{
     echo "ERROR: Directory could not be created."."</br>";
  }
} else{
echo "ERROR: Directory already exists."."</br>";
}
$newfile="folder/mir.txt";
if (copy("folder/mir.txt", "world.txt"))
    echo "Копия файла создана"."</br>";
else echo "Ошибка копирования файла"."</br>";
$copyfile = "world.txt";
echo "Байты:";
echo filesize($copyfile)."</br>";
echo "Мегабайты:";
echo (filesize($copyfile)/1024)."</br>";
echo "Гигабайты:";
echo (filesize($copyfile)/1048576)."</br>";
if (unlink("world.txt"))
    echo "Файл удален"."</br>";
else echo "Ошибка при удалении файла"."</br>";
echo "mir.txt -";
if(file_exists($newfile)==true){
    echo"Файл существует"."</br>";
}
else
{
echo "Такого файла не существует"."</br>";
}
echo "world.txt -";
if(file_exists($copyfile)==true){
    echo"Файл существует"."</br>";
}
else
{
echo "Такого файла не существует"."</br>";
}
?>

