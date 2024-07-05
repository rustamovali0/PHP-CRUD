<?php
include_once 'db.php';
include_once 'user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$stmt = $user->read();
?>

<h2>Kullanıcılar</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>İsim</th>
        <th>E-posta</th>
    </tr>
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?php echo htmlspecialchars($row['id']); ?></td>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['email']); ?></td>
    </tr>
    <?php endwhile; ?>
</table>
