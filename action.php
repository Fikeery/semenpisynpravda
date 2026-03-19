<?php
// Устанавливаем кодировку, чтобы корректно отображать русский текст
header('Content-Type: text/html; charset=utf-8');

// Проверяем, был ли запрос отправлен методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Получаем данные из формы и очищаем их от лишних пробелов
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $agreement = isset($_POST['agreement']); // Чекбокс возвращает true, если отмечен

    // Простая валидация данных
    $errors = [];

    if (empty($name)) {
        $errors[] = "Имя не может быть пустым.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Введите корректный email адрес.";
    }

    if (empty($password)) {
        $errors[] = "Пароль не может быть пустым.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Пароли не совпадают.";
    }

    if (empty($gender)) {
        $errors[] = "Выберите пол.";
    }

    if (!$agreement) {
        $errors[] = "Вы должны согласиться с условиями.";
    }

    // Если есть ошибки, выводим их
    if (!empty($errors)) {
        echo "<h1>Ошибка регистрации</h1>";
        echo "<ul style='color: red;'>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
        echo "<a href='index.php'>Вернуться к форме</a>";
    } else {
        // Если ошибок нет, имитируем успешную регистрацию
        // В реальном проекте здесь был бы код для сохранения в базу данных
        
        echo "<h1>Регистрация успешна!</h1>";
        echo "<p>Добро пожаловать, <strong>" . htmlspecialchars($name) . "</strong>!</p>";
        echo "<p>Ваш email: " . htmlspecialchars($email) . "</p>";
        echo "<p>Выбранный пол: " . htmlspecialchars($gender === 'male' ? 'Мужской' : 'Женский') . "</p>";
        echo "<p style='color: green;'>Вы успешно приняли условия соглашения.</p>";
        
        // Здесь можно добавить редирект на страницу профиля или главную
        // header("Location: welcome.php");
        // exit;
    }

} else {
    // Если файл открыт напрямую, а не через отправку формы
    echo "<h1>Доступ запрещен</h1>";
    echo "<p>Эта страница предназначена только для обработки данных формы.</p>";
    echo "<a href='index.php'>Вернуться к форме регистрации</a>";
}
?>
