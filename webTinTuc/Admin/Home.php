<?php
 $user = new Apps_Libs_UserIdentity();
 $router = new Apps_Libs_Router(__DIR__);
?>

<html>
    <body>
        <div>
            <p>Hi <?php echo $user->getSESSION("username") ?></p>
            <a href="<?php echo $router->createUrl('Logout');?>">Welcome to Demo</a>
            <h1> ADMIN PAGE</h1
        </div>
        <div class="show-data">
            <ul>
                <li><a href="<?php $router->createUrl('Post')?>"></a></li>
            </ul>
        </div>
    </body>
</html>


