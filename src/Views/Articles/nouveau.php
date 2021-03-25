<h1>Creer un article</h1>



<form action="/articles/nouveau" method="post">
    <label for="title">titre</label>
    <input type="text" name="title">

    <br>

    <label for="slug">slug</label>
    <input type="text" name="slug">

    <br>

    <label for="content">content</label>
    <textarea name="content" id="content" cols="30" rows="10"></textarea>

    <br>

    <button type="submit">Envoyer</button>

</form>