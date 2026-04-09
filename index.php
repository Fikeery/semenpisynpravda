<?php
try{
    $file = fopen("test.txt","r") or throw new RuntimeException("Не удалось открыть файл"."<br>");;
}catch(Exception $ex){ 
    echo 'Исключение: ' . $ex->getMessage();
}
$a = 10;
$b = 0;    

try {
    $result = $a / $b;
} catch (DivisionByZeroError $e) {
    $logEntry = date('Y-m-d H:i:s') . " - ОШИБКА: " . $e->getMessage();
    
    file_put_contents('log.txt', $logEntry, FILE_APPEND);
    
    echo "Произошла ошибка деления на ноль. Запись сохранена в log.txt.";
}
$countries = ['Spain' => 'Madrid', 'Russia' => 'Moscow'];
$searchKey = 'Germany';
    echo "<br>";
try {
    if (!array_key_exists($searchKey, $countries)) {
        throw new OutOfBoundsException("Элемент с ключом '{$searchKey}' отсутствует в массиве.");
    }
    echo "Столица: " . $countries[$searchKey] ;
} catch (OutOfBoundsException $e) {
    echo "Ошибка доступа к массиву: " . $e->getMessage() ;
}
    echo "<br>";
    echo date('H:i:s d.m.Y', mktime(10, 25, 0, 3, 15, 25))."<br>"; 
    echo time()."<br>";
    echo date('Y.m.d H:i:s',strtotime('now'))."<br>";
    echo date('Y.m.d', strtotime('1 September 2026'))."<br>";
    $c=date('w', strtotime('2 February 2000'));      
    if ($c=0) echo "Воскресение"."<br>";
    else if ($c=1) echo "Понедельник"."<br>"; 
    else if ($c=2) echo "Вторник"."<br>";
    else if ($c=3) echo "Среда"."<br>";
    else if ($c=4) echo "Четверг"."<br>";
    else if ($c=5) echo "Пятница"."<br>";
    else if ($c=6) echo "Суббота"."<br>";
    
    $week = [
    0 => 'Воскресенье',
    1 => 'Понедельник',
    2 => 'Вторник',
    3 => 'Среда',
    4 => 'Четверг',
    5 => 'Пятница',
    6 => 'Суббота'];

    echo "Сегодня: " . $week[date('w',strtotime('now'))] ."<br>";

    echo "12.06.2016 было: " . $week[date('w', strtotime("12.06.2016"))] . "<br>";

    $g = strtotime('11.07.2007'); 
    echo "Ваш день рождения выпал на:" . $week[date('w', $myBirthday)] . "<br>";



?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Сравнение дат</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        form { margin-bottom: 20px; }
        label { display: block; margin: 5px 0; }
        input[type="date"] { padding: 5px; }
        button { margin-top: 10px; padding: 6px 12px; cursor: pointer; }
        .result { font-weight: bold; color: #2c7a2c; }
    </style>
</head>
<body>

<form method="POST">
    <label>Первая дата (YYYY-MM-DD):
        <input type="date" name="date1" required>
    </label>
    <label>Вторая дата (YYYY-MM-DD):
        <input type="date" name="date2" required>
    </label>
    <button type="submit">Сравнить даты</button>
</form>

<?php
// Обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];


    $time1 = strtotime($date1);
    $time2 = strtotime($date2);

    echo '<div class="result">';
    if ($time1 > $time2) {
        echo "Большая (более поздняя) дата: $date1";
    } elseif ($time2 > $time1) {
        echo "Большая (более поздняя) дата: $date2";
    } else {
        echo "Даты равны: $date1";
    }
    echo '</div>';
}
?>
</body>
</html> 
<?php
    $d=date('Y-m-d', strtotime('2 February 2000'));
    $e=date('d-m-Y', strtotime($d));
    echo $e."<br>";
    $date = date_create('2000-02-03');
    date_modify($date, '2 days 1 month 3 days 1 year -3 days');
    echo date_format($date, 'd.m.Y')."<br>";
    $l = date('z',strtotime('now'))."<br>";
    $j = 364;
    $lq = $j-$l;
    echo $lq."<br>";        
?>    

