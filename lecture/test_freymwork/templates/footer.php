</td>

<td width="300px" class="sidebar">

    <div class="sidebarHeader">Меню</div>
    <?php $route = $_GET['route'] ?? ''; 
    $href = '';
    if (preg_match('~^articles/(\d+|add)(/edit)?$~', $route)) {
        $href = 'http://localhost/polikek/lecture/test_freymwork/www/';
    } else {
        $href = '';
    }
    ?>

    <ul>
        <li><a href="<?=$href?>">Главная страница</a></li>
        <li><a href="/about-me">Обо мне</a></li>
        <li><a href="articles/add">Добавить статью</a></li>
    </ul>

</td>

</tr>

<tr>

<td class="footer" colspan="2">Все права защищены (c) Мой блог</td>

</tr>

</table>



</body>

</html>