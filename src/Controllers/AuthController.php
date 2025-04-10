<?php 

declare(strict_types = 1);

namespace App\Controllers;
use App\Models\User;
class AuthController{

    
    public function CheckLogin() {
        session_start();
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];

            
            
            $userModel = new User();
            $user = $userModel->findByEmail($email);
            

            if ($user && isset($user['password']) && $user['password'] === $password) {
                $_SESSION["email"] = $user['email']; 
                $_SESSION["user_id"] = $user['id'];
    
                header("Location: /home");
                exit();
            } else {
                echo "Xato: Login yoki parol noto‘g‘ri";
            }
        }
    }


    public function CreateRegister() {
        session_start(); // Sessiyani boshlash
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $username = $_POST["username"];

            
            
            try {
                $userModel = new User();
                $user = $userModel->addUser($username, $email, $password);
                echo "Successfully created";
            } catch (Exception $e) {
                throw new Exception("Foydalanuvchini qoshishda xatolik yuz berdi: " . $e->getMessage());
            }
        }
    }




    
    

}

?>