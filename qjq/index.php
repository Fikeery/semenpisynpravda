<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="registration-container">
        <h2>Регистрация</h2>
        
        <!-- ВОТ ЗДЕСЬ ИЗМЕНЕНИЕ: добавлен method="POST" -->
        <form action="action.php" method="POST">
            
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" placeholder="Введите имя" required>

            <label for="email">Почта:</label>
            <input type="email" id="email" name="email" placeholder="name@example.ru" required>

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" placeholder="Введите пароль" required>

            <label for="confirm-password">Подтвердите пароль:</label>
            <input type="password" id="confirm-password" name="confirm_password" placeholder="Повторите пароль" required>

            <label for="gender">Пол:</label>
            <select id="gender" name="gender">
                <option value="" disabled selected>Выберите пол</option>
                <option value="male">Мужской</option>
                <option value="female">Женский</option>
            </select>

            <button type="submit">Зарегистрироваться</button>

            <p class="agreement">
                <input type="checkbox" id="agreement" name="agreement" required>
                <label for="agreement">Создавая учетную запись, вы соглашаетесь с нашим <a href="#">Условиями и конфиденциальностью</a>.</label>
            </p>

        </form>
    </div>
    
</body>
</html>
