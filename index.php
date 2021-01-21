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
	          <li class="nav-item active"><a href="index.php" class="nav-link">Inicio</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Sobre</a></li>
	          <li class="nav-item"><a href="alugar.php" class="nav-link">Alugar</a></li>
	          <li class="nav-item"><a href="comprar.php" class="nav-link">Comprar</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Fale Conosco</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate mt-5" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Os melhores lugares da região</h1>
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Escolha seu cantinho, reserve sua diária, ou então até mesmo envie sua proposta de aluguel!</p>
          </div>
        </div>
      </div>
    </div>

    

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Confira os Destaques para Alugar</h2>
            <p>Aqui estão apenas algumas das melhores casas, encontre mais na guia "Alugar".</p>
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
		$qnt_result_pg = 4;
		
		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		$result_imovel = "SELECT `id`, `tipo`, `imagem`, `local`, `titulo`, ROUND(valor,2), `descricao`, `criado`, `modificado` FROM `imovel` where tipo = 'aluga' LIMIT $inicio, $qnt_result_pg";
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
	    					<h4 class='price'>R$420,00</h4>
	    					<span>$local_imovel</span>
	    					<h3><a href='project.html'>$tit_imovel</a></h3>
	    					<div class='star d-flex clearfix'>
	    						<div class='mr-auto float-left'>
		    						<span class='ion-ios-star'></span>
		    						<span class='ion-ios-star'></span>
		    						<span class='ion-ios-star'></span>
		    						<span class='ion-ios-star'></span>
		    						<span class='ion-ios-star'></span>
	    						</div>
	    						<div class='float-right'>
	    							<span class='rate'><a href='#'>(4)</a></span>
	    						</div>
	    					</div>
	    				</div>
	    				<a href='$url_imagem' class='icon image-popup d-flex justify-content-center align-items-center'>
	    					<span class='icon-expand'></span>
	    				</a>
    				</div>
				</div>
			"; 
		}
		
		
		?>	
				
    		</div>	    		
    	</div>
    </section>
	

    
   	
    


    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Confira os Destaques para Comprar</h2>
            <p>Aqui estão apenas algumas das melhores casas, encontre mais na guia "Comprar".</p>
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
		$qnt_result_pg = 4;
		
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
	    					<h4 class='price'>R$420,00</h4>
	    					<span>$local_imovel</span>
	    					<h3><a href='project.html'>$tit_imovel</a></h3>
	    					<div class='star d-flex clearfix'>
	    						<div class='mr-auto float-left'>
		    						<span class='ion-ios-star'></span>
		    						<span class='ion-ios-star'></span>
		    						<span class='ion-ios-star'></span>
		    						<span class='ion-ios-star'></span>
		    						<span class='ion-ios-star'></span>
	    						</div>
	    						<div class='float-right'>
	    							<span class='rate'><a href='#'>(4)</a></span>
	    						</div>
	    					</div>
	    				</div>
	    				<a href='$url_imagem' class='icon image-popup d-flex justify-content-center align-items-center'>
	    					<span class='icon-expand'></span>
	    				</a>
    				</div>
    			</div>
			"; 
		}
		?>
    		</div>
    	</div>
    </section>

    <section class="ftco-counter img" id="section-counter">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 order-md-last d-flex">
    				<div class="img d-flex align-self-stretch" style="background-image:url(images/about-1.jpg);"></div>
    			</div>
    			<div class="col-md-6 pr-md-5 py-5">
    				<div class="row justify-content-start pb-3">
		          <div class="col-md-12 heading-section ftco-animate">
		            <h2 class="mb-4">Como Funciona o portal AlugaVale</h2>
		            <p>Se mudar de casa nunca foi tão fácil e prático, o portal foi desenvolvido tanto pra quem tem o imóvel e para quem deseja adquirir um, Alugando ou Comprando.</p>
		          </div>
		        </div>
		        <div class="row">
		        	<div class="col-md-12">
		        		<p class="ftco-animate tips"><span>1.</span> Para Adquirir é simples, escolha a casa que deseja e faça seu pré cadastro, que entraremos em contato.</p>
		        		<p class="ftco-animate tips"><span>2.</span> Para colocar seu imóvel a disposição, é só entrar em contato através do Zap (13) 996487963, que te passamos todas as informações.</p>
		        		<p class="ftco-animate tips"><span>3.</span> Depois é só curtir a casa nova, sem se preocupar em ter que ficar dias andando por diversas ruas procurando..</p>
		        		<p class="ftco-animate mt-4"><a href="contact.html" class="btn btn-primary py-3 px-5">Contato</a></p>
		        	</div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>
		

    
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Ultimas Notícias</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a target="_blank" href="https://www.atribuna.com.br/cidades/valedoribeira/mpf-pede-conclus%C3%A3o-de-medidas-de-seguran%C3%A7a-em-quatro-barragens-de-cajati-1.13952?fbclid=IwAR1ftI5gzbCJGAVbzXVuzX4f_qIKgKUzwTMngk4EiSP_XS6a5LelhHqPiFU" class="block-20" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text mt-3 float-right d-block">
              	<div class="d-flex align-items-center pt-2 mb-4 topp">
              		<div class="one">
              			<span class="day">20</span>
              		</div>
              		<div class="two">
              			<span class="yr">2019</span>
              			<span class="mos">Fevereiro</span>
              		</div>
              	</div>
                <h3 class="heading"><a target="_blank" href="https://www.atribuna.com.br/cidades/valedoribeira/mpf-pede-conclus%C3%A3o-de-medidas-de-seguran%C3%A7a-em-quatro-barragens-de-cajati-1.13952?fbclid=IwAR1ftI5gzbCJGAVbzXVuzX4f_qIKgKUzwTMngk4EiSP_XS6a5LelhHqPiFU">MPF pede conclusão de medidas de segurança em quatro barragens de Cajati</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a target="_blank" href="https://www.atribuna.com.br/cidades/valedoribeira/acidente-entre-cinco-ve%C3%ADculos-bloqueia-a-r%C3%A9gis-e-deixa-dois-feridos-1.14939" class="block-20" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text mt-3 float-right d-block">
              	<div class="d-flex align-items-center pt-2 mb-4 topp">
              		<div class="one">
              			<span class="day">02</span>
              		</div>
              		<div class="two">
              			<span class="yr">2019</span>
              			<span class="mos">Março</span>
              		</div>
              	</div>
                <h3 class="heading"><a target="_blank" href="https://www.atribuna.com.br/cidades/valedoribeira/acidente-entre-cinco-ve%C3%ADculos-bloqueia-a-r%C3%A9gis-e-deixa-dois-feridos-1.14939">Acidente entre cinco veículos bloqueia a Régis e deixa dois feridos</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry">
              <a target="_blank" href="https://rboconcursos.com.br/informacoes.php?c=343" class="block-20" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text mt-3 float-right d-block">
              	<div class="d-flex align-items-center pt-2 mb-4 topp">
              		<div class="one">
              			<span class="day">03</span>
              		</div>
              		<div class="two">
              			<span class="yr">2019</span>
              			<span class="mos">Março</span>
              		</div>
              	</div>
                <h3 class="heading"><a target="_blank" href="https://rboconcursos.com.br/informacoes.php?c=343">Inscrições para o concurso público de Cajati começam no dia 11 de Março</a></h3>
              </div>
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