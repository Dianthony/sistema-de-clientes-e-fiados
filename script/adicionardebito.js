function adicionar() {
	let debitoinput = document.querySelector('section#debito');
	debitoinput.innerHTML = "<div id='formdebito'><form name='login' method='post' action='acessar.php'>	<button type='button'><a href='fiado.php'>╳</a></button><br>	<h2>LOGIN</h2>	<input type='text' name='login' placeholder='Usuário' required>	<br><br><input type='password' name='senha' placeholder='Senha' required>	<br><br><input type='submit' name='enviar' value='Acessar Sistema'>	<br><br></form></div>"
}