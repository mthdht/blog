    <h1>register</h1>

    <form action="/register" method="post">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" value="{{\Blog\Http\Session::getOld('pseudo') }}">
        <span>{{ \Blog\Http\Session::getError('pseudo') }}</span>

        <br>

        <label for="email">email</label>
        <input type="text" name="email" id="email" value="{{ \Blog\Http\Session::getOld('email') }}">
        <span>{{ \Blog\Http\Session::getError('email') }}></span>

        <br>

        <label for="password">password</label>
        <input type="password" name="password" id="password" value="{{ \Blog\Http\Session::getOld('password') }}">

        <br>

        <input type="submit" value="Login">
    </form>