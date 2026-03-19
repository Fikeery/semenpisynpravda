<?php
// Устанавливаем кодировку для корректного отображения кириллицы
header('Content-Type: text/html; charset=utf-8');

// Проверяем, что запрос пришел методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Получаем данные из формы. 
    // Оператор ?? '' защищает от ошибки, если поле вообще не было передано.
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    // Получаем имя для приветствия (если нужно), но основную проверку делаем по email и паролю
    $name = trim($_POST['name'] ?? 'Пользователь');

    // Массив для сбора ошибок
    $errors = [];

    // 1. Проверка поля Email
    if (empty($email)) {
        $errors[] = "Поле <strong>Email</strong> обязательно для заполнения.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Дополнительная проверка на формат email
        $errors[] = "Введите корректный адрес электронной почты.";
    }

    // 2. Проверка поля Password
    if (empty($password)) {
        $errors[] = "Поле <strong>Пароль</strong> обязательно для заполнения.";
    }

    // Логика вывода результатов
    if (!empty($errors)) {
        // Если есть ошибки, выводим их красным цветом
        echo "<h1 style='color: #d9534f;'>Ошибка регистрации</h1>";
        echo "<div style='border: 1px solid #d9534f; background: #fdf7f7; padding: 15px; border-radius: 5px;'>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul>";
        echo "</div>";
        echo "<br><a href='index.php' style='text-decoration: none; color: #007bff;'>← Вернуться к форме</a>";
    } else {
        // Если ошибок нет — успешная регистрация
        echo "<h1 style='color: #28a745;'>Успешно!</h1>";
        echo "<p>Добро пожаловать, <strong>" . htmlspecialchars($name) . "</strong>!</p>";
        echo "<p>Ваш аккаунт с email <strong>" . htmlspecialchars($email) . "</strong> зарегистрирован.</p>";
        echo "<p style='color: green;'>Все проверки пройдены.</p>";
        
        // Здесь в будущем будет код сохранения в базу данных
    }

} else {
    // Если файл открыли напрямую без отправки формы
    echo "<h1>Доступ запрещен</h1>";
    echo "<p>Эта страница обрабатывает только данные формы.</p>";
    echo "<a href='index.php'>Вернуться назад</a>";
}
?>
