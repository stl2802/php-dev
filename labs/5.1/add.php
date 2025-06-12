<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $pdo->prepare("INSERT INTO contacts (last_name, first_name, middle_name, gender, birth_date, phone, address, email, comment) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->execute([
            $_POST['last_name'],
            $_POST['first_name'],
            $_POST['middle_name'],
            $_POST['gender'],
            $_POST['birth_date'],
            $_POST['phone'],
            $_POST['address'],
            $_POST['email'],
            $_POST['comment']
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
        <label>Фамилия: <input type="text" name="last_name" required></label>
    </div>
    
    <div class="form__group">
        <label>Имя: <input type="text" name="first_name" required></label>
    </div>
    
    <div class="form__group">
        <label>Отчество: <input type="text" name="middle_name"></label>
    </div>
    
    <div class="form__group">
        <label>Пол:
            <select name="gender" required>
                <option value="М">Мужской</option>
                <option value="Ж">Женский</option>
            </select>
        </label>
    </div>
    
    <div class="form__group">
        <label>Дата рождения: <input type="date" name="birth_date" required></label>
    </div>
    
    <div class="form__group">
        <label>Телефон: <input type="tel" name="phone" required></label>
    </div>
    
    <div class="form__group">
        <label>Email: <input type="email" name="email"></label>
    </div>
    
    <div class="form__group">
        <label>Адрес: <textarea name="address"></textarea></label>
    </div>
    
    <div class="form__group">
        <label>Комментарий: <textarea name="comment"></textarea></label>
    </div>
    
    <button type="submit">Сохранить</button>
</form>