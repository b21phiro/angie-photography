<form method="POST" action="<?= \Phro\Web\Config\Env::BaseRoute() ?>/login/authenticate">

    <h1>Log in</h1>

    <fieldset>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" />
        <label for="password">Password</label>
        <input id="password" type="password" name="password" />
    </fieldset>

    <input type="submit" name="submit" value="Log in" />

</form>