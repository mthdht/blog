<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Login</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <header class="flex mb-4 bg-blue-500 p-4 justify-between px-8">
        <h1>Blog</h1>
        <ul class="flex">
            <li><a href="" class="p-4">Lien 1</a></li>
            <li><a href="" class="p-4">Lien 2</a></li>
            <li><a href="" class="p-4">Lien 3</a></li>
        </ul>
    </header>

    <main>
    <h1>Login</h1>

<form action="/login" method="post">

    <?php echo $test ;?>
    <p><?php echo \Blog\Http\Session::getError('fail') ;?></p>
    <label for="email">email</label>
    <input type="text" name="email" id="email" value="<?php echo \Blog\Http\Session::getOld('email') ;?>">
    
    <span><?php echo \Blog\Http\Session::getError('email') ;?></span>

    <br>

    ok
    <label for="password">password</label>
    <input type="password" name="password" id="password" value="<?php echo \Blog\Http\Session::getOld('password') ;?>">
    <span><?php echo \Blog\Http\Session::getError('password') ;?></span>

    <br>

    <input type="submit" value="Login">
</form>
    </main>


    <footer class="bg-blue-500 p-4">
        Copyright - @mthdht
    </footer>
</body>
</html>