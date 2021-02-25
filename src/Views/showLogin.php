<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Login</title>
</head>
<body>
    <header>
        <h1>Blog</h1>
        <ul>
            <li><a href="">Lien 1</a></li>
            <li><a href="">Lien 2</a></li>
            <li><a href="">Lien 33</a></li>
        </ul>
    </header>
    <h1>Login</h1>

    <form action="/login" method="post">
        <p><?php echo \Blog\Http\Session::getError('fail');?></p>
        <label for="email">email</label>
        <input type="text" name="email" id="email" value="<?php echo \Blog\Http\Session::getOld('email');?>">
        <span><?php echo \Blog\Http\Session::getError('email');?></span>

        <br>

        <label for="password">password</label>
        <input type="password" name="password" id="password" value="<?php echo \Blog\Http\Session::getOld('password');?>">
        <span><?php echo \Blog\Http\Session::getError('password');?></span>

        <br>

        <input type="submit" value="Login">


        
    </form>
</body>
</html>