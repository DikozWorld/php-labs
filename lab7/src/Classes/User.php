<?php
namespace MyProject\Classes;

class User
{

    public $name;
    public $login;
    private $password;

    public function __construct($name, $login, $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }

    public function showInfo(): string   {
        return "<div class=\"user-info\">
                    <h3>User Info</h3>
                    <p><strong>Name:</strong> {$this->name}</p>
                    <p><strong>Login:</strong> {$this->login}</p>
                </div>";
    }   

    public function __destruct()
    {
        echo "<p>Пользователь {$this->login} удален.</p>";
    }
}