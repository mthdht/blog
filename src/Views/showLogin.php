<h1>Login</h1>

<form action="/login" method="post">
    <p>{{ \Blog\Http\Session::getError('fail') }}</p>
    <label for="email">email</label>
    <input type="text" name="email" id="email" value="{{ \Blog\Http\Session::getOld('email') }}">
    
    <span>{{ \Blog\Http\Session::getError('email') }}</span>

    <span>{{ \Blog\Http\Session::getError('email') }} </span>

    <br>

    <label for="password">password</label>
    <input type="password" name="password" id="password" value="{{ \Blog\Http\Session::getOld('password') }}">
    <span>{{ \Blog\Http\Session::getError('password') }}</span>

    <br>

    <input type="submit" value="Login">
    ezrtyuio
</form>