<?php
$router = new Apps_Libs_Router(__DIR__);
$account = trim($router->getPOST('account'));
$password = trim($router->getPOST('password'));
//var_dump($account,$password);
//die();
$identity = new Apps_Libs_UserIdentity();
if ($identity->isLogin()){
    $router->homePage();
}

if ($router->getPOST("submit") && $account && $password){
    $identity->username = $account;
    $identity->password = $password;
    if ($identity->login()){
        $router->homePage();
    }else{
        echo "Username or Password is incorrect!";
    }
}

?>

<html>
    <body>
        <div>
            <p>Welcome to Demo</p>
        </div>
        <div>
            <form action="<?php $router->createUrl('Login')?>" method="post">
                Acount:
                <br>
                <input type="text" name="account"/><br>
                Password:
                <br>
                <input type="password" name="password"><br>
                <input type="submit" name="submit" value="Login"/>
            </form>
        </div>

    </body>
</html>
