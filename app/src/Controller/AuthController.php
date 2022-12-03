<?php

namespace App\Controller;

use App\Entity\User;
use App\Factory\PDOFactory;
use App\Helpers\Utilitaire;
use App\Manager\UserManager;
use App\Route\Route;

class AuthController extends AbstractController
{
    #[Route('/login', name: "login", methods: ["POST"])]
    public function login()
    {
        if(!empty($_POST)) {
            $formUsername = $_POST['username'];
            $formPwd = $_POST['password'];

            $userManager = (new UserManager(new PDOFactory()))
                ->getByUsername($formUsername);
           // var_dump($userManager->passwordMatch($formPwd));die;
            if ($userManager->passwordMatch($formPwd)) {
                $_SESSION['user'] = serialize($userManager);
                return Utilitaire::redirect('posts');
            }
            return Utilitaire::redirect('login');
        }
    }
    
    #[Route('/login', name: "showlogin", methods: ["GET"])]
    public function showLogin()
    {
        return $this->render("register&login/formLogin.php");

    }

    #[Route('/register', name: "showRegister", methods: ["GET"])]
    public function showRegister(): string
    {
        return $this->render("register&login/formRegister.php");
    }

    #[Route('/register', name: "register", methods: ["POST"])]
    public function register(): void
    {
        /** @var App\Entity\User $user */

        $user = (new User($_POST))->setAccess('User')->passwordHash($_POST['password']);

        if($user->getUsername() && $user->getPassword() && $user->getEmail()){
            $userManager = new UserManager(new PDOFactory());
            $userManager->insertUser($user);
            Utilitaire::redirect('login');
        }
        else{
            Utilitaire::redirect('register');
        }
    }

    #[Route('/register', name: "showRegister", methods: ["GET"])]
    public function shoowRegister(): string
    {
        return $this->render("register&login/formRegister.php", [
            "trucs" => "je suis une ",
            "machin" => 42,
        ]);
    }
}
