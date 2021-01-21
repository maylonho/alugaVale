<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>AlugaVale - Portal do Aluguel de Casas </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html"><span>AlugaVale</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Inicio</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Sobre</a></li>
	          <li class="nav-item"><a href="alugar.php" class="nav-link">Alugar</a></li>
	          <li class="nav-item active"><a href="comprar.php" class="nav-link">Comprar</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Fale Conosco</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
            <h1 class="mb-3 bread">Imóveis a Venda</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Comprar<i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    

    <section class="ftco-section">
    	<div class="container">
		<div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Confira todos os imóveis disponíveis à venda:</h2>
            <p id="itens">Escolha, compare, e decida qual o melhor e barato!</p>
          </div>
        </div>
    		<div class="row">
    			<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		//Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qnt_result_pg = 12;
		
		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		$result_imovel = "SELECT `id`, `tipo`, `imagem`, `local`, `titulo`, ROUND(valor,2), `descricao`, `criado`, `modificado` FROM `imovel` where tipo = 'venda' LIMIT $inicio, $qnt_result_pg";
		$resultado_imovel = mysqli_query($conn, $result_imovel);
		while($row_imovel = mysqli_fetch_assoc($resultado_imovel)){
		
			$id_imovel = $row_imovel['id'];
			$url_imagem = $row_imovel['imagem'];
			$local_imovel = $row_imovel['local'];
			$tit_imovel = $row_imovel['titulo'];
			$desc_imovel = $row_imovel['descricao'];
			$data_imovel = $row_imovel['criado'];
			$valor_imovel = $row_imovel['ROUND(valor,2)'];
			
			echo "
			
			
    			<div class='col-md-6 col-lg-3 ftco-animate'>
    				<div class='project'>
    					<div class='img'>
		    				<img src='$url_imagem' class='img-fluid' alt='Colorlib Template'>
	    				</div>
	    				<div class='text'>
	    					<h4 class='price'>R$$valor_imovel</h4>
	    					<span>$local_imovel</span>
	    					<h3><a href='project.html?id=$id_imovel'>$tit_imovel</a></h3>
	    					<div class='star d-flex clearfix'>
	    						<div class='mr-auto float-left'>
		    						<span class='ion-ios-star'></span>
		    						<span class='ion-ios-star'></span>
		    						<span class='ion-ios-star'></span>
		    						<span class='ion-ios-star'></span>
		    						<span class='ion-ios-star'></span>
	    						</div>
	    						<div class='float-right'>
	    							<span class='rate'><a >(4)</a></span>
	    						</div>
	    					</div>
	    				</div>
	    				<a href='$url_imagem' class='icon image-popup d-flex justify-content-center align-items-center'>
	    					<span class='icon-expand'></span>
	    				</a>
    				</div>
					
					
					<!--
					<a href='edit_imovel.php?id=$id_imovel'>Editar</a>
					<a href='proc_apagar_imovel.php?id=$id_imovel'>Apagar</a><br><br>-->
					
    			</div>
				
			
			
			"; 
		
		}
		
		?>
    			
    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul><?php
		
		//Paginção - Somar a quantidade de usuários
		$result_pg = "SELECT COUNT(id) AS num_result FROM imovel where tipo = 'aluga'";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de pagina 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
		//Limitar os link antes depois
		$max_links = 2;
		echo "<li><a href='comprar.php?pagina=1#itens'>&lt;</a></li> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<li><a href='comprar.php?pagina=$pag_ant#itens'>$pag_ant</a></li> ";
			}
		}
			
		echo "<li class='active'><span>$pagina</span></li> ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<li><a href='comprar.php?pagina=$pag_dep#itens'>$pag_dep</a></li> ";
			}
		}
		
		echo "<li><a href='comprar.php?pagina=$quantidade_pg#itens'>&gt;</a></li>";
		
		?>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>
<section class="ftco-section services-section bg-light">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-yatch"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Comodidade</h3>
                <p>	Encontre sua casa sem sair de "casa".</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-around"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Vale do Ribeira</h3>
                <p>atendemos todo o vale do ribeira.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-compass"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Acessibilidade</h3>
                <p>Acesso prático e confiável com os melhores vendedores.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-map-of-roads"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Locais</h3>
                <p>Economize pesquisando em todos os lugares.</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>
		
		


    <footer class="ftco-footer ftco-footer-2 ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">AlugaVale</h2>
              <p>Portal de anuncios de venda e aluguel de imóveis.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="https://fb.me/alugavale"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="https://fb.me/alugavale"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://fb.me/alugavale"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Informações</h2>
              <ul class="list-unstyled">
                <li><a class="py-2 d-block">Online Enquiry</a></li>
                <li><a class="py-2 d-block">General Enquiries</a></li>
                <li><a class="py-2 d-block">Booking Conditions</a></li>
                <li><a class="py-2 d-block">Privacy and Policy</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Experiência</h2>
              <ul class="list-unstyled">
                <li><a class="py-2 d-block">Adventure</a></li>
                <li><a class="py-2 d-block">Hotel and Restaurant</a></li>
                <li><a class="py-2 d-block">Beach</a></li>
                <li><a class="py-2 d-block">Nature</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Alguma Dúvida?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Estrada da Mineração, Vila Paraíso, Cajati-SP</span></li>
	                <li><span class="icon icon-phone"></span><span class="text">(13) 99648796</span></li>
	                <li><span class="icon icon-envelope"></span><span class="text">&nbsp&nbsp&nbsp&nbsp&nbspoliveira_maylon@hotmail.com</span></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados | Template by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>