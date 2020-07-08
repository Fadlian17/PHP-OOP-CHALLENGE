<?php
class Auth
{
    protected $username;
    protected $status;
    protected $guest;
    protected $time_login;
    protected $credentials;
    function __construct()
    {
        $this->username = "";
        $this->status = False;
        $this->guest = False;
        $this->time_login = "";
        $this->credentials = '{"username":"root", "password":"secret"}';
    }
    function login($username, $password)
    {
        self::validate($username, $password);
    }
    function decodeJson()
    {
        $data = json_decode($this->credentials);
        return $data;
    }
    function id()
    {
        return rand(100, true);
    }
    function lastLogin()
    {
        if ($this->time_login == "") {
            $this->time_login = "Mohon login dulu!\n";
        }
        echo $this->time_login . "\n";
    }
    function validate($username = "", $password = "")
    {
        $data = self::decodeJson();
        // echo "$data->username";
        if ($username == $data->username && $password == $data->password) {
            $this->username = $data->username;
            $this->status = True;
            $this->guest = False;
            $this->time_login = date(strftime("%d-%m-%Y %H:%M"));
        } else {
            echo "username dan password Anda salah!";
        }
    }
    function user()
    {
        echo "Nama : " . $this->username . "\n";
        echo "Status Login : " . $this->status . "\n";
        echo "Status Guest : " . $this->guest . " \n";
        echo "Login id : " . self::id() . "\n";
        echo "Terakhir login : $this->time_login \n";
    }
    function guest()
    {
        echo $this->guest ? "TRUE" : "FALSE";
    }
    function check()
    {
        if ($this->status == True) {
            echo "TRUE\n";
        }
        echo "FALSE\n";
    }
    function logout()
    {
        $this->username = "";
        $this->status = False;
        $this->guest = True;
    }
}
$auth = new Auth();
$auth->login('root', 'secret');      // If valid, user will log in.
$auth->validate('root', 'secret');   // Just verify username and password without log in.
$auth->user();            // Get information about current logged in user.
$auth->id();              // Get the User ID.
$auth->check();           // Will returns True if user already logged in.
$auth->guest();           // Will returns True if user not logged in.
$auth->lastLogin();       // Get information when the user last logged in.
$auth->logout();          // Log out the current logged in user.