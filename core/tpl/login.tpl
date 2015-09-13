<form action="?adm=login" method="post">
<? if ($t->status == "ok"): ?>
<p class="msg">Please enter your username and password to log in</p>
<? else: ?>
<p class="err">Login failed. Please enter a valid username and password</p>
<? endif ?>
<label>Username</label><br>
<input type="text" name="un"><br>
<label>Password</label><br>
<input type="password" name="pw"><br>
<input type="submit" value="Login">
</form>
