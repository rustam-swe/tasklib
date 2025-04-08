<?php 

declare(strict_types = 1);

namespace App\Controllers;

class AuthController{

    public function SendLogin(){
        require_once __DIR__ . '/../../resource/views/login.php';
    }

    public function SendRegister(){
        pass;
    }

    public function CheckLogin(){
        $valid_user = "admin";  // Foydalanuvchi nomi
$valid_pass = "12345";  // Parol

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $valid_user && $password === $valid_pass) {
        $_SESSION["user"] = $username; // Sessionga saqlash
        header("Location: task");  // Home sahifasiga yo‘naltirish
        exit();
    } else {
        echo "Xato: Login yoki parol notogri";
    }
}
    }

}

?>