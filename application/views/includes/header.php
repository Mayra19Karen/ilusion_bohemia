

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

  
<!--
    

Tooplate 2125 ArtXibition

https://www.tooplate.com/view/2125-artxibition

-->

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
    
    <!-- ***** Pre HEader ***** -->
   <!-- <div class="pre-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <span>Hey! The Show is Starting in 15 Days.</span>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="text-button">
                        <a href="rent-venue.html">Contact Us Now! <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    
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
                                if ($opcionMenu=="Inicio") {
                                   ?>
                                   <li><a href="<?php echo base_url()?>" class="active" style="text-align:center;padding: 5px;">Inicio</a></li>
                                   <?php
                                }else{?>
                                    <li><a href="<?php echo base_url()?>" style="text-align:center;padding: 5px;">Inicio</a></li>
                            <?php
                                }
                            ?>

                            <?php 
                                if ($opcionMenu=="Sobre") {
                                   ?>
                                    <li><a href="<?php echo base_url()?>sobre-nosotros" class="active">Sobre nosotros</a></li>
                                   <?php
                                }else{?>
                                    <li><a href="<?php echo base_url()?>sobre-nosotros">Sobre nosotros</a></li>
                            <?php
                                }
                            ?>                            
                            
                            <?php 
                                if ($opcionMenu=="Galeria") {
                                   ?>
                                    <li><a href="<?php echo base_url()?>galeria" class="active">Galería</a></li>
                                   <?php
                                }else{?>
                                    <li><a href="<?php echo base_url()?>galeria">Galería</a></li>
                            <?php
                                }
                            ?>

                            <?php 
                                if ($opcionMenu=="Calendario") {
                                   ?>
                                    <li><a href="<?php echo base_url()?>calendario-eventos" class="active">Calendario de eventos</a></li> 
                                   <?php
                                }else{?>
                                    <li><a href="<?php echo base_url()?>calendario-eventos">Calendario de eventos</a></li> 
                            <?php
                                }
                            ?>
                            <li><a href="#contacto1">Contáctanos</a></li> 
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