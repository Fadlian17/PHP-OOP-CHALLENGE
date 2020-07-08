<?php

//Auth & Verification

class Verification
{

    protected $people, $currentLogin;

    function __construct()
    {
        $this->people = ["username" => "root", "password" => "secret"];
    }

    function data_user()
    {
        return $this->people;
    }
}

class Auth extends Verification
{

    function login($dataVerified)
    {
        $login = $dataVerified;
        $user = parent::data_user();
        if ($login['username'] == $user['username'] and $login['password'] == $user['password']) {
            $this->currentLogin = [
                "id_user" => rand(),
                "username" => $login["username"],
                "password" => $login["password"],
                "timestamp" => date("Y/m/d H:i:s"),
                "status" => "logged in"
            ];
        }
    }

    function validate($dataVerified)
    {
        $login = $dataVerified;
        $user = parent::data_user();
        if ($login['username'] == $user['username'] and $login['password'] == $user['password']) {
            return true;
        }
    }

    function logout()
    {
        $this->currentLogin["status"] = "logout";
        $this->currentLogin["timestamp"] = date("Y/m/d H:i:s");
    }

    function user()
    {
        $user_login = [
            "username" => $this->currentLogin["username"],
            "password" => $this->currentLogin["password"]
        ];
        echo "Username : " . $user_login["username"];
        echo "\n";
        echo "Password : " . $user_login["password"];
    }

    function id()
    {
        echo "User Id : " . $this->currentLogin["id_user"];
    }

    function check()
    {
        if ($this->currentLogin['status'] == "logged in") {
            echo "Login : True";
        } else {
            echo "Login : False";
        }
    }

    function guest()
    {
        if ($this->currentLogin['status'] == "logout") {
            echo "Logout : True";
        } else {
            echo "Logout : False";
        }
    }

    function lastLogin()
    {
        echo "Last Login : " . $this->currentLogin['timestamp'];
    }
}

$auth = new Auth();
$auth->login(["username" => "root", "password" => "secret"]);
$auth->validate(["username" => "root", "password" => "secret"]);
$auth->user();
echo "\n";
$auth->id();
echo "\n";
$auth->check();
echo "\n";
$auth->guest();
echo "\n";
$auth->lastLogin();
$auth->logout();
