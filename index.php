<?php
$dir = "test";
if(!file_exists($dir)){
  if(mkdir($dir)){
  	 echo "Directory created successfully."."</br>";
  } else{
     echo "ERROR: Directory could not be created."."</br>";
  }
} else{
echo "ERROR: Directory already exists."."</br>";
}
$dir2 ="www" ;
rename ($dir, $dir2);
rmdir ($dir2);
if(!file_exists($dir)){
  if(mkdir($dir)){
  	 echo "Directory created successfully."."</br>";
  } else{
     echo "ERROR: Directory could not be created."."</br>";
  }
} else{
echo "ERROR: Directory already exists."."</br>";
}
$folders = ['photos', 'gallery', 'images', 'backup', 'temp'];
foreach ($folders as $folderName) {
    $path = $dir . DIRECTORY_SEPARATOR . $folderName;
    if (!is_dir($path)) {
        if (mkdir($path, 0755)) {
            echo "Создана папка: $path<br>";
        } else {
            echo "Ошибка создания: $path<br>";
        }
    } else {
        echo "Папка уже существует: $path<br>";
    }
}
$images = ['photos.jpg', 'gallery.jpg', 'images.jpg', 'backup.jpg', 'temp.jpg'];
foreach($images as $massiv){
    $file = fopen("test/images/".$massiv,"w") or die("не удалось создать файл"."</br>");
    fclose($file);
  }
foreach(glob("test/images/*.jpg") as $file){
  	    echo basename($file) ."<br>";
  }
?>

