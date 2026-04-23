<?php
function sanitizeInput(string $data): string {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}
function isValidEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}
function processContactForm(array $postData): array {
    $result = [
        'success' => false,
        'message' => '',
        'errors' => []
    ];
    if (!isset($postData['csrf_token']) || $postData['csrf_token'] !== $_SESSION['csrf_token'] ?? '') {
        $result['errors'][] = 'Ошибка безопасности. Попробуйте снова.';
        return $result;
    }
    $name = sanitizeInput($postData['name'] ?? '');
    if (mb_strlen($name) < 2) {
        $result['errors'][] = 'Имя должно содержать минимум 2 символа';
    }
    $email = sanitizeInput($postData['email'] ?? '');
    if (!isValidEmail($email)) {
        $result['errors'][] = 'Некорректный формат email';
    }
    $message = sanitizeInput($postData['message'] ?? '');
    if (mb_strlen($message) < 10) {
        $result['errors'][] = 'Сообщение должно содержать минимум 10 символов';
    }
    if (empty($result['errors'])) {
        $result['success'] = true;
        $result['message'] = 'Спасибо! Ваше сообщение отправлено.';
        unset($_POST);
    }

    return $result;
}
function generateCsrfToken(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}
