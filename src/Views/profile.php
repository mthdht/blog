<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG - Profile</title>
</head>
<body>
    <h1>Bienvenue sur votre profile: <?php echo \BLog\Http\Session::get('user')->getPseudo();?></h1>
</body>
</html>