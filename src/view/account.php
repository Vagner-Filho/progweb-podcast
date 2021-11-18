<?php 
if (!$data) {
	header('location: /login?mensagem=Você precisa se identificar primeiro');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="src/utils/css/bootstrap.css">
    <script src="src/utils/js/bootstrap.bundle.js" async></script>
	<script src="src/jscript/components/sideMenu.js"></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;600&display=swap" rel="stylesheet">

	<title>Conta</title>
</head>
<body>	
	<div class="container-fluid mt-5">
        <div class="row">
			<side-menu class="mt-5"></side-menu>
			<section class="mb-3">
				<div class="col-10 offset-1">
					
						<div class="profile-picture mt-3">
							<?php echo "<img src='" . BASEPATH . "uploads/" . $data->__get('fotoPerfil') . "' class='icon-conteudo'/>" ?>
						</div>

						<div class="ms-4">
							<h2 class="head mt-4">Perfil</h2>
							
							<div class="info">
								<p>Nome de usuário</p>
								<div class="line"></div>
								<p><?= $data->nomeUsuario ?></p>
							</div>
							
							<div class="info">
								<p>Email</p>
								<div class="line"></div>
								<p><?= $data->email ?></p>
							</div>
							
							<div class="info">
								<p>Data de nascimento</p>
								<div class="line"></div>
								<p><?= $data->dataNasc->format('d/m/Y') ?></p>
							</div>
							
							<div class="info">
								<p>Data de inscrição</p>
								<div class="line"></div>
								<p><?= $data->dataInscricao->format('d/m/Y') ?></p>
							</div>
							
							<button class="btn-edit">Editar informações</button>
							<a href="#" class="change-password">Alterar senha</a>
						</div>
				</div>
			</section>

			<section class='seção2'>
				<div class="col-10 offset-1">
					<div class="ms-4">
						<h2 class="head mt-4">Canal</h2>

						<div class="channel-info">
							<div class="side ">
								<a href="/mainChannel">
									<?php echo "<img src='" . BASEPATH . "uploads/" . $data->__get('fotoCanal') . "' class='icon-conteudo canal'/>" ?>
								</a>
		
								<div class="channel-description">
								<p><?= $data->descricao ?></p>
								</div>
		
							</div>
		
							<div class="side lado2">
								<div class="channel-title">
								<?= $data->nomeCanal ?>
								</div>

								<div class="info">
									<p>Gênero</p>
									<div class="line"></div>
									<p><?= $data->genero ?></p>
								</div>

								<div class="info">
									<p>Classificação</p>
									<div class="line"></div>
									<p><?= $data->classificacao ?></p>
								</div>

								<div class="info">
									<p>Criador</p>
									<div class="line"></div>
									<p><?= $data->nomeUsuario ?></p>
								</div>
								<button class="btn-edit">Editar informações</button>
							</div>
						</div>
					</div>
					
					
				</div>
			</section>
		</div>
	</div>
</body>
</html>

<style>
	body{
		font-family: 'Inter', sans-serif;
		font-weight: bolder;
	}	

	.head{
		font-family: 'Inter', sans-serif;
		font-weight: bolder;
		font-size: 35px;
		margin-bottom: 30px;
	}

	.profile-picture img{
		width: 200px;
        height: 200px;
        background-color: #616161;
        border-radius: 250px;
        flex: 0 0 auto;
        margin: auto 10px;	
	}

	.canal {
		width: 250px;
        height: 250px;
		border-radius: 25px;
	}

	.info{
		display: flex;
		flex-direction: row;
		align-items: center;
		margin-bottom: 16px;
	}

	.info p{
		margin-bottom: 0;
		font-size: 20px;
		font-family: 'Inter', sans-serif;
		font-weight: 600;	
		color: rgba(0, 0, 0, 0.5);
		
	}

	.line{
		margin-left: 10px;
		margin-right: 10px;
		height: 1px;
		width: 25%;
		border: 1px solid rgba(0, 0, 0, 0.5);
	}

	.btn-edit{
		height: 50px;
		width: 180px;
		padding: 10px;
		margin-top: 15px;
		background: #BEBEBE;
		border: 1px solid #BEBEBE;
		border-radius: 15px;
		color: #fff;
		font-weight: bolder;
	}

	.btn-edit:hover{
		background: #a5a4a4;
		border: 1px solid #a5a4a4;
	}

	.change-password{
		font-size: 18px;
		color: #3BB4B4;
		font-weight: bolder;
		margin-left: 10px;
	}

	.change-password:hover{
		color: #2b8585;
	}

	.lado2 {
		margin-left: 12%;
		width: 28%;
		min-width: 220px;
	}
	
	.side{
		margin-bottom: 20px;
	}

	.channel-info{
		display: flex;
		flex-direction: row;
	}

	.channel-picture{
		width: 250px;
        height: 250px;
        background-color: #C4C4C4;
        border-radius: 25px;
	}

	.channel-description{
		margin-top: 10px;
		width: 200px;
	}

	.channel-title{
		font-size: 40px;
		margin-top: 15px;
		margin-bottom: 120px;
	}

	@media (max-width: 675px) {

		.channel-info {
			flex-direction: column;
		}

		.lado2 {
			margin-left:0;
		}
	
</style>