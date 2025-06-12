<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $pdo->prepare("DELETE FROM contacts
                                    WHERE id=?;");
        
        $stmt->execute([
            $_POST['Id'],
        ]);
        
    } catch (PDOException $e) {
        $message = '<p class="error">Ошибка: ' . $e->getMessage() . '</p>';
    }
}
?>

<form method="post" class="contact-form">
    <h2>Добавить контакт</h2>
    <?= $message ?? '' ?>
    
    <div class="form__group">
        <label>ID Записи: <input type="text" name="Id" required></label>
    </div>
    <button type="submit">Сохранить</button>
</form>