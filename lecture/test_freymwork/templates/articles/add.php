<?php include __DIR__ . '/../header.php'; ?>
<style>
    :root {
  --primary-green: #2E8B57;   
  --light-green: #9ACD32;     
  --dark-green: #006400;     
  --light-gray: #F5F5F5;        
  --border-gray: #E0E0E0;        
  --text-dark: #333333;          
}

form {
  max-width: 800px;
  margin: 40px auto;
  padding: 30px;
  background: white;
  border-radius: 8px;
  box-shadow: 0 2px 15px rgba(0,0,0,0.05);
  box-sizing: border-box;
}

form input[type="text"],
form textarea {
  width: 100%;
  padding: 12px 15px;
  margin-bottom: 20px;
  border: 1px solid var(--border-gray);
  border-radius: 4px;
  font-family: 'Segoe UI', Roboto, sans-serif;
  font-size: 1rem;
  transition: all 0.3s ease;
  box-sizing: border-box;
}

form input[type="text"] {
  height: 48px;
}

form textarea {
  min-height: 300px;
  resize: vertical;
  line-height: 1.6;
}

form input[type="text"]:focus,
form textarea:focus {
  outline: none;
  border-color: var(--primary-green);
  box-shadow: 0 0 0 2px rgba(46, 139, 87, 0.2);
}

form button[type="submit"] {
  background-color: var(--primary-green);
  color: white;
  border: none;
  padding: 12px 30px;
  font-size: 1rem;
  font-weight: 500;
  border-radius: 4px;
  cursor: pointer;
  transition: all 0.3s ease;
  display: block;
  margin: 0 auto;
}

form button[type="submit"]:hover {
  background-color: var(--dark-green);
  transform: translateY(-1px);
}

.add-form {
  border-top: 4px solid var(--light-green);
}

.edit-form {
  border-top: 4px solid var(--primary-green);
}

.form-title {
  color: var(--dark-green);
  text-align: center;
  margin-bottom: 30px;
  font-weight: 500;
}

@media (max-width: 768px) {
  form {
    padding: 20px;
    margin: 20px;
  }
  
  form input[type="text"],
  form textarea {
    padding: 10px 12px;
  }
}
</style>
<form method="POST">
    <input type="text" name="NewArticleName" required><br>
    <textarea name="NewArticleText" required></textarea>
    <button type="submit">Сохранить</button>
</form>
<?php include __DIR__ . '/../footer.php'; ?>