
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
//1
echo '№1<br>';
function mul($a, $b) {
    return (float)$a * (float)$b;
}
echo mul(3, 4) . '<br><br>';

//2
echo '№2<br>';
function m_direct($a, $b) {
    return mul($a, $b);
}
function m_use($a, $b) {
    $inner = function() use ($a, $b) {
        return mul($a, $b);
    };
    return $inner();
}
echo m_direct(5, 6) . '<br>';
echo m_use(5, 6) . '<br><br>';

//3
echo '№3<br>';
function operation($m, $n, $o) {
    if (!is_callable($o)) {
        throw new Exception("Третий аргумент должен быть функцией");
    }
    return $o((float)$m, (float)$n);
}
echo operation(10, 5, function($x, $y) { return $x + $y; }) . '<br>';
echo operation(10, 5, function($x, $y) { return $x * $y; }) . '<br>';
$divide = fn($x, $y) => $y != 0 ? $x / $y : 0;
echo operation(20, 4, $divide) . '<br><br>';

//4
echo '№4<br>';
function my_array_map($fn, $array) {
    $result = [];
    foreach ($array as $key => $value) {
        $result[$key] = $fn($value);
    }
    return $result;
}
$arr = [1, 4, 9, 16];
$squared = my_array_map(fn($x) => $x * $x, $arr);
echo implode(', ', $squared) . '<br>';
$roots = my_array_map('sqrt', $arr);
echo implode(', ', $roots) . '<br><br>';

//5
echo '№5<br>';
function checkPassword($password) {
    $len = strlen($password);
    if ($len > 5 && $len < 10) {
        return "Пароль подходит<br>";
    } else {
        return "Нужно придумать другой пароль<br>";
    }
}
echo checkPassword("123456");
echo checkPassword("12345");
echo checkPassword("1234567890");
echo '<br>';

//6
echo '№6<br>';
function startsWithHttp($str) {
    return (strpos($str, 'http://') === 0) || (strpos($str, 'https://') === 0);
}
$urls = ['http://example.com', 'https://secure.com', 'ftp://files.com', 'www.example.com'];
foreach ($urls as $url) {
    echo (startsWithHttp($url) ? 'да' : 'нет') . '<br>';
}
echo '<br>';

//7
echo '№7<br>';
function endsWithImage($str) {
    return (substr($str, -4) === '.png') || (substr($str, -4) === '.jpg');
}
$files = ['photo.png', 'image.jpg', 'document.pdf', 'picture.PNG', 'icon.jpeg'];
foreach ($files as $file) {
    echo (endsWithImage($file) ? 'да' : 'нет') . '<br>';
}
echo '<br>';

//8
echo '№8<br>';
$date = '16.04.2021';
$formatted_date = str_replace('.', '-', $date);
echo $formatted_date . '<br><br>';

//9
echo '№9<br>';
$tech_string = 'html css php';
$tech_array = explode(' ', $tech_string);
print_r($tech_array);
echo '<br><br>';

//10
echo '№10<br>';
$tech_elements = ['html', 'css', 'php'];
$tech_csv = implode(',', $tech_elements);
echo $tech_csv . '<br>';
?>
</body>
</html>




