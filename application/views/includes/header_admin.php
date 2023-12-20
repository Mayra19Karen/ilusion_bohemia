

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="Tooplate">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

<title>Rondalla ilusion bohemia</title>


<!-- Additional CSS Files -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/font-awesome.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/owl-carousel.css">

<link rel="stylesheet" href="<?php echo base_url()?>assets/css/tooplate-artxibition.css">




<body>

<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
  <div class="preloader-inner">
    <span class="dot"></span>
    <div class="dots">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</div>
<!-- ***** Preloader End ***** -->


<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a  class="logo">
                        <img src="<?php echo base_url()?>assets/img/logo.PNG" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        
                        <?php 
                            if ($opcionMenu=="Eventos") {
                               ?>
                               <li><a href="<?php echo base_url()?>gestion-eventos" class="active" style="text-align:center;padding: 5px;">Eventos</a></li>
                               <?php
                            }else{?>
                                <li><a href="<?php echo base_url()?>gestion-eventos" style="text-align:center;padding: 5px;">Eventos</a></li>
                        <?php
                            }
                        ?>

                        <?php 
                            if ($opcionMenu=="Galeria") {
                               ?>
                                <li><a href="<?php echo base_url()?>gestion-galeria" class="active">Galería</a></li>
                               <?php
                            }else{?>
                                <li><a href="<?php echo base_url()?>gestion-galeria">Galería</a></li>
                        <?php  
                            }
                        ?>                            
                        
                        <?php 
                            if ($opcionMenu=="Info") {
                               ?>
                                <li><a href="<?php echo base_url()?>gestion-info" class="active">Información</a></li>
                               <?php
                            }else{?>
                                <li><a href="<?php echo base_url()?>gestion-info">Información</a></li>
                        <?php
                            }
                        ?>

                        <?php 
                            if ($opcionMenu=="MiCuenta") {
                               ?>
                                <li><a href="<?php echo base_url()?>mi-perfil" class="active">Perfil</a></li> 
                               <?php
                            }else{?>
                                <li><a href="<?php echo base_url()?>mi-perfil">Perfil</a></li> 
                        <?php
                            }
                        ?>
                              <li><a href="<?php echo base_url()?>logout">Cerrar sesión</a></li> 
                    </ul>        
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
</head>