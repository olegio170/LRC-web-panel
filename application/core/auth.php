<?php
    session_start();
    if(isset($_SESSION['login']) && isset($_SESSION['password'])){
        $login = $_SESSION['login'];
        $password = $_SESSION['password'];

        $password = hash('sha256',$password);
        $password = SALT.$password;
        $password = hash('sha256',$password);


        $stmt = $GLOBALS['DB']->prepare("SELECT id FROM users WHERE login = :login AND password = :password");
        $stmt->execute(array('login' => $login,'password' => $password));
        $row = $stmt->fetch();

        if(isset($row['id']))
        {
            $GLOBALS['loggedIn'] = true;
        }
        else
        {
            $GLOBALS['loggedIn'] = false;
            $GLOBALS['logInError'] = 'Incorect username or password !';
        }
    }
    else
    {
        $GLOBALS['loggedIn'] = false;
        $GLOBALS['logInError'] = 'No sesion';
    }
?>