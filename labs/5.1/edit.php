<?php
$contacts = $pdo->query("SELECT id, last_name, first_name FROM contacts ORDER BY last_name, first_name")->fetchAll();

$selectedId = $_GET['id'] ?? ($contacts[0]['id'] ?? null);
$selectedContact = null;

if ($selectedId) {
    $stmt = $pdo->prepare("SELECT * FROM contacts WHERE id = ?");
    $stmt->execute([$selectedId]);
    $selectedContact = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    try {
        $stmt = $pdo->prepare("UPDATE contacts SET
            last_name = ?,
            first_name = ?,
            middle_name = ?,
            gender = ?,
            birth_date = ?,
            phone = ?,
            address = ?,
            email = ?,
            comment = ?
            WHERE id = ?");
        
        $stmt->execute([
            $_POST['last_name'],
            $_POST['first_name'],
            $_POST['middle_name'],
            $_POST['gender'],
            $_POST['birth_date'],
            $_POST['phone'],
            $_POST['address'],
            $_POST['email'],
            $_POST['comment'],
            $_POST['id']
        ]);
        
        $message = '<p class="success">Запись обновлена</p>';
        $stmt = $pdo->prepare("SELECT * FROM contacts WHERE id = ?");
        $stmt->execute([$_POST['id']]);
        $selectedContact = $stmt->fetch();
    } catch (PDOException $e) {
        $message = '<p class="error">Ошибка при обновлении: ' . $e->getMessage() . '</p>';
    }
}
?>
<style>
    .contact-list{
        display: flex;
        flex-direction: column;
        max-width: 10rem;
        flex-wrap: wrap;
    }
</style>
<div class="edit-page">
    <h2>Редактирование контакта</h2>
    <div class="contact-list">
        <?php foreach ($contacts as $contact): ?>
            <a href="?action=edit&id=<?= $contact['id'] ?>" 
                class="<?= $contact['id'] == $selectedId ? 'active' : '' ?>">
                <?= $contact['last_name'] ?> 
                <?= mb_substr($contact['first_name'], 0, 1) ?>.
            </a>
        <?php endforeach; ?>
    </div>
    
    <?php if ($selectedContact): ?>
        <form method="post" class="contact-form">
            <?= $message ?? '' ?>
            <input type="hidden" name="id" value="<?= $selectedContact['id'] ?>">
            
            <div class="form-group">
                <label>Фамилия: <input type="text" name="last_name" value="<?= htmlspecialchars($selectedContact['last_name']) ?>" required></label>
            </div>
            
            <div class="form-group">
                <label>Имя: <input type="text" name="first_name" value="<?= htmlspecialchars($selectedContact['first_name']) ?>" required></label>
            </div>
            
            <div class="form-group">
                <label>Отчество: <input type="text" name="middle_name" value="<?= htmlspecialchars($selectedContact['middle_name']) ?>"></label>
            </div>
            
            <div class="form-group">
                <label>Пол:
                    <select name="gender" required>
                        <option value="М" <?= $selectedContact['gender'] === 'М' ? 'selected' : '' ?>>Мужской</option>
                        <option value="Ж" <?= $selectedContact['gender'] === 'Ж' ? 'selected' : '' ?>>Женский</option>
                    </select>
                </label>
            </div>
            
            <div class="form-group">
                <label>Дата рождения: <input type="date" name="birth_date" value="<?= htmlspecialchars($selectedContact['birth_date']) ?>" required></label>
            </div>
            
            <div class="form-group">
                <label>Телефон: <input type="tel" name="phone" value="<?= htmlspecialchars($selectedContact['phone']) ?>" required></label>
            </div>
            
            <div class="form-group">
                <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($selectedContact['email']) ?>"></label>
            </div>
            
            <div class="form-group">
                <label>Адрес: <textarea name="address"><?= htmlspecialchars($selectedContact['address']) ?></textarea></label>
            </div>
            
            <div class="form-group">
                <label>Комментарий: <textarea name="comment"><?= htmlspecialchars($selectedContact['comment']) ?></textarea></label>
            </div>
            
            <button type="submit">Сохранить изменения</button>
        </form>
    <?php else: ?>
        <p>Нет контактов для редактирования</p>
    <?php endif; ?>
</div>