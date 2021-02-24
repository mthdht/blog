<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Contact</title>
</head>
<body>
    <h1>Contact me</h1>


    <form action="/contact" method="post">
        <label for="nom">Nom: </label>
        <input type="text" name="name" id="nom" value="">

        <br>

        <label for="message">Message</label>
        <textarea name="message" value="" id="message" cols="30" rows="10"></textarea>

        <br>

        <input type="submit" value="Send">
    </form>
</body>
</html>