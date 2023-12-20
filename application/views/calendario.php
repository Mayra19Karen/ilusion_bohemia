<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('includes/header');?>    

    <!-- ***** About Us Page ***** -->
    <div class="page-heading-rent-venue">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Calendario de eventos</h2>
                    <span>Nuestras próximas presentaciones</span>
                </div>
            </div>
        </div>
    </div>

    <div class="shows-events-tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="tabs">
                        <div class="col-lg-12">
                            
                        </div>
                        <div class="col-lg-12">
                            <section class='tabs-content'>
                                <article id='tabs-1'>
                                    <div class="row">
                                       
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <?php
                                            foreach ($eventos as $key) { 
                                                ?>
                                                <div class="col-lg-12">
                                                    <div class="event-item">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="left-content">
                                                                    <h4><?=$key->nom_even?> <?=$key->id_even?></h4>
                                                                    <p><?=$key->desc_even?></p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="thumb">
                                                                    <img src="<?php echo base_url()?>/upload/<?=$key->imagen_even?>" alt="">
                                                                    <!--UN MEDIA QUERY PARA CENTRAR LA IMAGEN O DESDE EL CSS NRMAL TOTAL ES CENTRADO EN LOS DOS -->
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="right-content">
                                                                    <ul>
                                                                        <li>
                                                                            <i class="fa fa-clock-o"></i>
                                                                            <h6><?=$key->fec_even?><br><?=substr($key->hora_even,0,-3);?></h6>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-map-marker"></i>
                                                                            <span><?=$key->lugar_even?></span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </article>                            
                                
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- *** Footer *** -->
    <?php $this->load->view('includes/footer');?> 
    
    

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

  </body>

</html>
