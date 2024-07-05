<?php
include_once 'db.php';
include_once 'user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create"])) {
    $user->name = $_POST["name"];
    $user->email = $_POST["email"];

    if ($user->create()) {
        echo "Yeni kayıt başarılı!";
    } else {
        echo "Kayıt eklenemedi.";
    }
}
?>

<h2>Kullanıcı Ekle</h2>
<form method="post" action="create.php">
    İsim: <input type="text" name="name" required>
    E-posta: <input type="email" name="email" required>
    <input type="submit" name="create" value="Kaydet">
</form>
