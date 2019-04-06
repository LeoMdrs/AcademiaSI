<?php

	if(isset($_SESSION['EditarUsuario'])){
		
		$usuario = $_SESSION['EditarUsuario'];
		unset($_SESSION['EditarUsuario']);
	}

?>

<script type="text/javascript">
	document.getElementById("tituloPagina").innerHTML = "<?php echo ((isset($usuario)) ? 'Editar ' : 'Cadastrar '); ?><?php echo $_GET['tipo']; ?>";
	document.getElementById("title").innerHTML = "<?php echo ((isset($usuario)) ? 'Editar ' : 'Cadastrar '); ?><?php echo $_GET['tipo']; ?>";
</script>


<div class="page-header">
	<h1 class="all-tittles">Sistema Academia <small>Cadastrar usuários</small></h1><hr><hr><br>
</div>

<div class='' style="padding: 0px 100px;">

	<span><?php // Exibição de erros encontrados no processo
				include ('../vendor/SON/Erro/errosCadastro.php'); 
			?>
	</span><br>
	
	<!--Formulário de cadastro -->
	<form name="myForm"	action = "salvarUsuario?acao=<?php echo ((isset($usuario)) ? "atualizar" : "salvar"); ?>&tipo=<?php echo $_GET['tipo'] ?>" method="post" onsubmit="">
		
		<div class="form-row mb-5">
		
			<div class="col-md-7" >
				<div class="form-row" style="align-items: center;" >
					<div class="mr-3" >
						<i class="fa fa-smile-o" style="font-size:36px; color: #243e56"></i>
					</div>	
					<div class="" style="flex-grow: 1;">
						<label for="nome">Nome *</label>
						<input name="nome" style="width: 100%;" type="text" class="form-control campo-texto-arredondado" id="nome" placeholder="nome completo" pattern="[a-zA-Z\s]+$" title="O campo Nome só pode conter letras." required ::-webkit-validation-bubble {background-color:red; background:red; color:red}  ::-webkit-validation-bubble-message {text-color: red} value="<?php echo ((isset($usuario)) ? $usuario['nome'] : ""); ?>">
					</div>
				</div>
			</div>
			
			<div class="col-md-5" >
				<div class="form-row" style="align-items: center;" >
					<div class="mr-3 ml-5" >
						<i class="fa fa-at" style="font-size:36px; color: #243e56"></i>
					</div>	
					<div class="" style="flex-grow: 1;">
						<label for="usuario">Usuário *</label>
						<input name="usuario" type="text" class="form-control a campo-texto-arredondado" id="usuario" placeholder="nome de usuário" aria-describedby="inputGroupPrepend2" required maxlength=10 pattern="[0-9a-zA-Z\s]+$" title="O campo Usuário só pode conter letras e números." value="<?php echo ((isset($usuario)) ? $usuario['usuario'] : ""); ?>">
					</div>
				</div>
			</div>
			
		</div>
		
		
		<div class="form-row mb-5">
		
			<div class="col-md-3" >
				<div class="form-row" style="align-items: center;" >
					<div class="mr-3" >
						<i class="fa fa-id-card" style="font-size:36px; color: #243e56"></i>
					</div>	
					<div class="" style="flex-grow: 1;">
						<label for="cpf">CPF *</label>
						<input name="cpf" type="text" class="form-control campo-texto-arredondado" id="cpf" placeholder="CPF" required maxlength=11 pattern="[0-9]{3}[.][0-9]{3}[.][0-9]{3}[-][0-9]{2}" value="<?php echo ((isset($usuario)) ? $usuario['cpf'] : ""); ?>">
					</div>
				</div>
			</div>
			
			<div class="col-md-3" >
				<div class="form-row" style="align-items: center;" >
					<div class="mr-3 ml-5" >
						<i class="fa fa-id-card-o" style="font-size:36px; color: #243e56"></i>
					</div>
					<div class="" style="flex-grow: 1;">
						<label for="rg">RG</label>
						<input name="rg" type="text" class="form-control campo-texto-arredondado" id="rg" placeholder="RG" pattern="[0-9]+$" title="O campo RG só pode conter números." value="<?php echo ((isset($usuario)) ? $usuario['rg'] : ""); ?>"  maxlength=13>
					</div>
				</div>
			</div>
			
			<div class="col-md-3" >
				<div class="form-row" style="align-items: center;" >
					<div class="mr-3 ml-5" >
						<i class="fa fa-birthday-cake" style="font-size:36px; color: #243e56"></i>
					</div>
					<div class="" style="flex-grow: 1;">
						<label for="nascimento">Data de Nascimento *</label>
						<input name="nascimento" type="text" class="form-control campo-texto-arredondado" id="nascimento" placeholder="data de nascimento" required maxlength=6 pattern="[0-9]{4}[-][0-9]{2}[-][0-9]{2}" value="<?php echo ((isset($usuario)) ? $usuario['nascimento'] : ""); ?>">
					</div>
				</div>
			</div>
			
			<div class="col-md-3" >
				<div class="form-row" style="align-items: center;" >
					<div class="mr-3 ml-5" >
						<i class='fa fa-venus-mars' style='font-size:36px;'></i>
					</div>
					<div class="" style="flex-grow: 1;">
						<label for="sexo">Sexo *</label>
						<select name="sexo" id="inputSexo" class="form-control" required style="border-radius: 20px 0px 0px 20px;">
							<option value="">escolher</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['sexo'] == 'masculino')? 'selected' : "") : ""); ?> >masculino</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['sexo'] == 'feminino')? 'selected' : "") : ""); ?> >feminino</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		
		<div class="form-row mb-5">
		
			<div class="col-md-6" >
				<div class="form-row" style="align-items: center;" >
					<div class="mr-3" >
						<i class="fa fa-home" style="font-size:36px; color: #243e56"></i>
					</div>	
					<div class="" style="flex-grow: 1;">
						<label for="endereco">Endereço *</label>
						<input name="endereco" type="text" class="form-control campo-texto-arredondado" id="endereco" placeholder="rua, nº" required maxlength=249 pattern="[0-9a-zA-Z,;\s]+$" title="O campo Endereço só pode conter letras e números." value="<?php echo ((isset($usuario)) ? $usuario['endereco'] : ""); ?>">
					</div>
				</div>
			</div>
			
			<div class="col-md-6" >
				<div class="form-row" style="align-items: center;" >
					
					<div class="ml-3" style="flex-grow: 1;">
						<label for="bairro">Bairro *</label>
						<input  name="bairro" type="text" class="form-control campo-texto-arredondado" id="bairro" placeholder="bairro" required maxlength=249 pattern="[0-9a-zA-Z\s]+$" title="O campo Bairro só pode conter letras e números." value="<?php echo ((isset($usuario)) ? $usuario['bairro'] : ""); ?>">
					</div>
				</div>
			</div>
	  
		</div>
		
		
		<div class="form-row mb-5">
		
			<div class="col-md-6" >
				<div class="form-row" style="align-items: center;" >
					<div class="mr-3" >
						<i class="fa fa-map-o" style="font-size:36px; color: #243e56"></i>
					</div>	
					<div class="" style="flex-grow: 1;">
						<label for="cidade">Cidade *</label>
						<input name="cidade" type="text" class="form-control campo-texto-arredondado" id="cidade" placeholder="cidade" required maxlength=249 pattern="[0-9a-zA-Z\s]+$" title="O campo Cidade só pode conter letras e números." value="<?php echo ((isset($usuario)) ? $usuario['cidade'] : ""); ?>">
					</div>
				</div>
			</div>
			
			<div class="col-md-3" >
				<div class="form-row" style="align-items: center;" >
					
					<div class="ml-3" style="flex-grow: 1;">
						<label for="estado">Estado *</label>
						<select name="estado" id="inputEstado" class="form-control " required style="border-radius: 20px 0px 0px 20px;">
							<option value="">escolher</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'AC')? 'selected' : "") : ""); ?>>AC</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'AL')? 'selected' : "") : ""); ?>>AL</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'AP')? 'selected' : "") : ""); ?>>AP</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'AM')? 'selected' : "") : ""); ?>>AM</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'BA')? 'selected' : "") : ""); ?>>BA</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'CE')? 'selected' : "") : ""); ?>>CE</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'DF')? 'selected' : "") : ""); ?>>DF</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'ES')? 'selected' : "") : ""); ?>>ES</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'GO')? 'selected' : "") : ""); ?>>GO</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'MA')? 'selected' : "") : ""); ?>>MA</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'MT')? 'selected' : "") : ""); ?>>MT</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'MS')? 'selected' : "") : ""); ?>>MS</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'MG')? 'selected' : "") : ""); ?>>MG</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'PA')? 'selected' : "") : ""); ?>>PA</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'PB')? 'selected' : "") : ""); ?>>PB</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'PR')? 'selected' : "") : ""); ?>>PR</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'PE')? 'selected' : "") : ""); ?>>PE</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'PI')? 'selected' : "") : ""); ?>>PI</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'RJ')? 'selected' : "") : ""); ?>>RJ</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'RN')? 'selected' : "") : ""); ?>>RN</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'RS')? 'selected' : "") : ""); ?>>RS</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'RO')? 'selected' : "") : ""); ?>>RO</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'RR')? 'selected' : "") : ""); ?>>RR</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'SC')? 'selected' : "") : ""); ?>>SC</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'SP')? 'selected' : "") : ""); ?>>SP</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'SE')? 'selected' : "") : ""); ?>>SE</option>
							<option <?php echo ((isset($usuario)) ? (($usuario['estado'] == 'TO')? 'selected' : "") : ""); ?>>TO</option>
						</select>
					</div>
				</div>
			</div>
	  
			<div class="col-md-3" >
				<div class="form-row" style="align-items: center;" >
					<div class="mr-3 ml-5" >
						<i class="fa fa-map-pin" style="font-size:36px;"></i>
					</div>
					<div class="" style="flex-grow: 1;">
						<label for="cep">CEP</label>
						<input name="cep" type="text" class="form-control campo-texto-arredondado" id="cep" placeholder="CEP" maxlength=14 pattern="[0-9]{5}[-][0-9]{3}" value="<?php echo ((isset($usuario)) ? $usuario['cep'] : ""); ?>">
					</div>
				</div>
			</div>
			
		</div>
	  
	  

	<div class="form-row mb-5">
		
		<div class="col-md-6" >
			<div class="form-row" style="align-items: center;" >
				<div class="mr-3" >
					<i class="fa fa-phone" style="font-size:36px; color: #243e56"></i>
				</div>	
				<div class="" style="flex-grow: 1;">
					<label for="telefone">Telefone *</label>
				  	<input name="telefone" type="text" class="form-control campo-texto-arredondado" id="telefone" placeholder="Nº de telefone" required pattern="[(][0-9]{3}[)][0-9]{5}[-][0-9]{4}" value="<?php echo ((isset($usuario)) ? $usuario['telefone'] : ""); ?>">
				</div>
			</div>
		</div>
		
		<div class="col-md-6" >
			<div class="form-row" style="align-items: center;" >
				<div class="mr-3 ml-5" >
					<i class="fa fa-paperclip" style="font-size:36px;"></i>
				</div>
				<div class="" style="flex-grow: 1;">
					<label for="contato">Outro contato</label>
		  			<input name="contato" type="text" class="form-control campo-texto-arredondado" id="contato" placeholder="outra forma de contato" maxlength=299 value="<?php echo ((isset($usuario)) ? $usuario['contato'] : ""); ?>">
				</div>
			</div>
		</div>
  
	</div>
	
	<div class="form-row mb-5">
		
		<div class="col-md-6" >
			<div class="form-row" style="align-items: center;" >
				<div class="mr-3" >
					<i class="fa fa-envelope" style="font-size:36px; color: #243e56"></i>
				</div>	
				<div class="" style="flex-grow: 1;">
					<label for="email">Email *</label>
					<input name="email" type="email" class="form-control campo-texto-arredondado" id="email" placeholder="email@gmail.com" required maxlength=249 pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo ((isset($usuario)) ? $usuario['email'] : ""); ?>">
				</div>
			</div>
		</div>
		
		<div class="col-md-6" >
			<div class="form-row" style="align-items: center;" >
				<div class="mr-3 ml-5" >
					<i class="fa fa-lock" style="font-size:36px"></i>
				</div>
				<div class="ml-3" style="flex-grow: 1;">
					<label for="senha">Senha *</label>
		  			<input name="senha" type="password" class="form-control campo-texto-arredondado" id="senha" placeholder= "<?php echo ((isset($usuario)) ? 'Digite uma nova senha ou a antiga' : 'senha') ?>" required pattern="[0-9a-zA-Z\s]+$"  title="O campo Senha só pode conter letras e números.">
				</div>
			</div>
		</div>
  
	</div>
	

	  <div class="form-row mt-3" style="text-align: right;"> 
	    <div class="form-group col-md-10 mt-3">
		  <h6>* campos requeridos </h6>
		</div>
		<div class="form-group col-md-2" style=" text-align: ; ">
		  <button type="submit" class="btn btn-primary btn-lg"><?php echo ((isset($usuario)) ? 'Salvar' : 'Cadastrar'); ?></button>
	    </div>
	  </div>
	</form>
	<!--Fim Formulário de cadastro -->
	
</div>

