<form id="login" method="POST" action="<?= \Phro\Web\Config\Env::BaseRoute() ?>/admin/login">
    <section>
        <h1>Logga in</h1>
        <p>Du behöver vara inloggad för att hantera portfolio innehållet.</p>
    </section>
    <fieldset>
        <label>
            <span>Email</span>
            <input type="email" name="email" />
        </label>
        <label>
            <span>Password</span>
            <input type="password" name="password" />
        </label>
    </fieldset>
    <input type="submit" name="submit" value="Logga in" />
</form>