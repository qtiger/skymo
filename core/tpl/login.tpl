<form action="?adm=login" method="post">
<? if ($t->status == "ok"): ?>
<span class="msg">Please enter your username and password to log in</span>
<? else: ?>
<span class="err"><b>Login failed</b> - please enter a valid username and password</span>
<? endif ?>
<br><br>
<label>Username</label><br>
<input type="text" name="un"><br>
<label>Password</label><br>
<input type="password" name="pw"><br>
<input type="submit" value="Login">
</form>
