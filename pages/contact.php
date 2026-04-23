<?php
session_start();
require_once '../includes/functions.php';

$pageTitle = 'Контакты';
$formResult = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formResult = processContactForm($_POST);
}

$csrfToken = generateCsrfToken();
include '../includes/header.php';
?>

<main class="contact-page">
    <h1>Контакты</h1>
    
    <?php if ($formResult): ?>
        <div class="alert alert-<?= $formResult['success'] ? 'success' : 'error' ?>">
            <?= htmlspecialchars($formResult['message']) ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($formResult['errors'])): ?>
        <ul class="errors">
            <?php foreach ($formResult['errors'] as $error): ?>
                <li> <?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="post" action="/pages/contact.php" class="contact-form">
        <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
        
        <div class="form-group">
            <label for="name">Имя *</label>
            <input type="text" id="name" name="name" 
                   value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" 
                   required placeholder="Ваше имя">
        </div>
        
        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" id="email" name="email" 
                   value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" 
                   required placeholder="example@mail.ru">
        </div>
        
        <div class="form-group">
            <label for="message">Сообщение *</label>
            <textarea id="message" name="message" rows="5" 
                      required placeholder="Ваше сообщение..."><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
        </div>
        
        <button type="submit" class="btn-submit">Отправить</button>
    </form>
</main>

<?php include '../includes/footer.php'; ?>
