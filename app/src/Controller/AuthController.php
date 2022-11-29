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

            $user = (new User)->setUsername($formUsername);
            $userManager = (new UserManager(new PDOFactory()))
                ->getByUsername($formUsername)
                ->setUsername($formUsername) ;

            if (!$userManager) {
                Utilitaire::redirect('?error=notfound"');
                exit;
            }

            if ($userManager->passwordMatch($formPwd)) {
                $_SESSION['user'] = serialize($userManager);

                Utilitaire::redirect('post');
            }
        }
    }
    
    #[Route('/login', name: "showlogin", methods: ["GET"])]
    public function showLogin()
    {
        return $this->render("register&login/formLogin.php", [
            "Succees" => "je suis un message"
        ]);

    }

    #[Route('/register', name: "showRegister", methods: ["GET"])]
    public function showRegister(): string
    {
        return $this->render("register&login/formRegister.php", [
            "trucs" => "je suis une ",
            "machin" => 42,
        ]);
    }

    #[Route('/register', name: "register", methods: ["POST"])]
    public function register(): void
    {
        $formPwd = $_POST['password'];
        $user = (new User($_POST))->setAccess('User')->passwordHash($formPwd);

        $userManager = new UserManager(new PDOFactory());
        $userManager->insertUser($user);
    }
}
