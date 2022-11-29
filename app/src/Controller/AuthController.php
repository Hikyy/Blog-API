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
<<<<<<< HEAD
                ->getByUsername($formUsername)
                ->setUsername($formUsername) ;
=======
                ->getByUsername($formUsername);
            //$userManager->passwordMatch($formPwd);
>>>>>>> 3b5f4a4a9c5350b6e48dbedece61d344a6349387

            if (!$userManager->passwordMatch($formPwd)) {
                Utilitaire::redirect('?error=notfound"');
                exit;
            }

            if ($userManager->passwordMatch($formPwd)) {
                $_SESSION['user'] = serialize($userManager);

                Utilitaire::redirect('post');
            }
            else{
                Utilitaire::redirect('login');
                exit;
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
<<<<<<< HEAD
        $formPwd = $_POST['password'];
        $user = (new User($_POST))->setAccess('User')->passwordHash($formPwd);
=======
        /** @var App\Entity\User $user */

        $user = (new User($_POST))->setAccess('User')->passwordHash($_POST['password']);

        if($user->getUsername() && $user->getPassword() && $user->getEmail()){
            $userManager = new UserManager(new PDOFactory());
            $userManager->insertUser($user);
            Utilitaire::redirect('post');
        }
        else{
            Utilitaire::redirect('register');
        }
>>>>>>> 3b5f4a4a9c5350b6e48dbedece61d344a6349387

    }
}
