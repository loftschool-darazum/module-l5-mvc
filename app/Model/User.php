<?php
namespace App\Model;

use Base\Db;

class User
{
    private $id;
    private $name;
    private $password;

    public function __construct(string $name, string $password)
    {
        $this->name = $name;
        $this->password = $password;
    }

    public function save()
    {
        $db = Db::getInstance();
        $res = $db->exec(
            'INSERT INTO users (name, password) VALUES (:name, :password)',
            __FILE__,
            [
                ':name' => $this->name,
                ':password' => self::getPasswordHash($this->password)
            ]
        );

        return $res;
    }

    public static function getById(int $id): ?self
    {
        $db = Db::getInstance();
        $data = $db->fetchOne("SELECT * fROM users WHERE id = :id", __METHOD__, [':id' => $id]);
        if (!$data) {
            return null;
        }

        $user = new self($data['name'], $data['password']);
        $user->id = $id;
        return $user;
    }


    public static function getList(int $limit = 10, int $offset = 0): array
    {
        $db = Db::getInstance();
        $data = $db->fetchAll(
            "SELECT * fROM users LIMIT $limit OFFSET $offset",
            __METHOD__
        );
        if (!$data) {
            return [];
        }

        $users = [];
        foreach ($data as $elem) {
            $user = new self($elem['name'], $elem['password']);
            $user->id = $elem['id'];
            $users[] = $user;
        }

        return $users;
    }

    public static function getPasswordHash(string $password)
    {
        return sha1('.,f.akjsduf' . $password);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


}