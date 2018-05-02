<?php 

	include 'header.php';

 ?>
 	<div class="admin_panel">
	 	<h3>Unesi korisničko ime i lozinku da bi pristupio admin strani:</h3>
		<form method="post">
			Username:<input type="text" name="username" ><br>
			Password:<input type="password" name="password"><br>
			<input type="submit" name="login_check" value="Potvrdi">	
		</form>
		<?php 
			if (isset($this->data['msg'])) {echo $this->data['msg'];};
		 ?>
	</div>

 </div>
</body>
</html>