<?php
namespace App\Controller;

use App\Model\User;
use Base\AbstractController;

class Login extends AbstractController
{
    public function index()
    {
        return $this->view->render(
            'login.phtml',
            [
                'title' => 'Регистрация',
            ]
        );
    }

    public function register()
    {
        $name = $_POST['name'];
        $password = $_POST['password'];

        $user = new User($name, $password);
        $user->save();

        return 'Вы успешно зарегистрировались';
    }
}