<?php
include_once 'db.php';
include_once 'user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $user->id = $_POST["id"];
    $user->name = $_POST["name"];
    $user->email = $_POST["email"];

    if ($user->update()) {
        echo "Kayıt başarıyla güncellendi!";
    } else {
        echo "Kayıt güncellenemedi.";
    }
} elseif (isset($_GET['id'])) {
    $user->id = $_GET['id'];
    $stmt = $user->read();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($row['id'] == $user->id) {
            $user->name = $row['name'];
            $user->email = $row['email'];
            break;
        }
    }
} else {
    echo "Güncellenecek kullanıcıyı seçmediniz.";
    exit;
}
?>

<form method="post" action="update.php">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($user->id); ?>">
    İsim: <input type="text" name="name" value="<?php echo htmlspecialchars($user->name); ?>" required>
    E-posta: <input type="email" name="email" value="<?php echo htmlspecialchars($user->email); ?>" required>
    <input type="submit" name="update" value="Güncelle">
</form>
