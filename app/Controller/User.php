<?php
namespace App\Controller;

use Base\AbstractController;
use App\Model\User as UserModel;
use Base\Db;

class User extends AbstractController
{
    public function profile()
    {
        $id = (int) $_GET['id'];
        /** @var UserModel $user */
        $user = UserModel::getById($id);

        return $this->view->render(
            'user/profile.phtml',
            [
                'title' => 'Профиль пользователя',
                'user' => $user
            ]
        );
    }

    public function list()
    {
        $limit = (int) $_GET['limit'];
        $offset = (int) $_GET['offset'];

        if (!$limit) {
            $limit = 10;
        }

        /** @var UserModel[] $user */
        $users = UserModel::getList($limit, $offset);

        return $this->view->render(
            'user/list.phtml',
            [
                'title' => 'Список пользователей',
                'users' => $users
            ]
        );
    }
}