<body id="LoginForm">

<div class="fundo">

	<div class="container" style="horizontal-align: center">
	<div class="row">
	<div class="col-md-12">
		<div class="login-form">
		<div class="main-div">
			<div class="login">
				<div class="panel">
					<i class="material-icons" style="font-size:100px; color: rgb(255, 255, 255)">account_circle</i>
					<p>Por favor entre com seu email e senha.</p>
				</div>
				
				<form id="Login" name="myForm" action="validacaoLogin"  method="post">

					<div class="form-group">
						<input type="email" class="form-control" name="email" id="inputEmail" placeholder="Endereço de email">
					</div>

					<div class="form-group">
						<input type="password" class="form-control" name="senha" id="inputPassword" placeholder="Senha">
					</div>
		
					<div class="esqueceu">
						<a href="#">Esqueceu a senha?</a>
					</div>
		
					<button type="submit" class="btn" style="background-color: #ff8000; width: 100%; color: white;">Login</button>
				
				</form>
				
				<span><?php if(isset($_GET['sucess'])){
								if ( $_GET['sucess'] == 'false'){
									echo" <div class='alert alert-danger alert-dismissible'>";
									echo" <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
									echo" <strong>Login inválido.</strong> " . $_GET['erro'] . " está incorreto.";
									echo" </div>";
								}}?>
				</span>
				
			</div>
		</div>
		<div class="container" style="horizontal-align: center">
			<p>© 2018</p>
		</div>
			
		</div>
	</div>
	</div>
	
	</div>
</div>	


</body>