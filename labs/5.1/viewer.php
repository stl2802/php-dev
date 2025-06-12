<?php
function getContactsTable($pdo, $page, $sort) {
    $limit = 10;
    $offset = ($page - 1) * $limit;

    switch ($sort) {
        case 'last_name':
            $orderBy = 'last_name ASC';
            break;
        case 'birth_date':
            $orderBy = 'birth_date ASC';
            break;
        case 'id':
            $orderBy = 'id ASC';
            break;
        default:
            $orderBy = 'created_at DESC';
            break;
    }

    $stmt = $pdo->prepare("SELECT * FROM contacts ORDER BY $orderBy LIMIT ? OFFSET ?");
    $stmt->execute([$limit, $offset]);
    $contacts = $stmt->fetchAll();

    $total = $pdo->query("SELECT COUNT(*) FROM contacts")->fetchColumn();
    $pages = ceil($total / $limit);
    
    $html = '
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>ФИО</th>
                <th>Пол</th>
                <th>Дата рождения</th>
                <th>Телефон</th>
                <th>Email</th>
                <th>Адрес</th>
            </tr>
        </thead>';
    
    foreach ($contacts as $contact) {
        $html .= sprintf('
        <tr>
            <td>%s</td>
            <td>%s %s.%s.</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
        </tr>',
            $contact['id'],
            $contact['last_name'],
            mb_substr($contact['first_name'], 0, 1),
            mb_substr($contact['middle_name'], 0, 1),
            $contact['gender'],
            $contact['birth_date'],
            $contact['phone'],
            $contact['email'],
            $contact['address']
        );
    }
    
    $html .= '</table></table>';
    

    if ($pages > 1) {
        $html .= '<div class="pagination">';
        for ($i = 1; $i <= $pages; $i++) {
            $active = ($i == $page) ? 'active' : '';
            $html .= "<a href='?action=view&sort=$sort&page=$i' class='$active'>$i</a>";
        }
        $html .= '</div>';
    }
    return $html;
}

echo getContactsTable($pdo, $page, $sort);
?>