<?php
include_once 'db.php';
include_once 'user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $user->id = $_POST["id"];

    if ($user->delete()) {
        echo "Kayıt başarıyla silindi!";
    } else {
        echo "Kayıt silinemedi.";
    }
}
?>

<h2>Kullanıcı Sil</h2>
<form method="post" action="delete.php">
    ID: <input type="text" name="id" required>
    <input type="submit" name="delete" value="Sil">
</form>
