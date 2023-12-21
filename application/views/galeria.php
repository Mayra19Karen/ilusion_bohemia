<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('includes/header');?>    

    <!-- ***** About Us Page ***** -->
    <div class="page-heading-rent-venue">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Galeria de imagenes</h2>
                    <span>Nuestras presentaciones</span>
                </div>
            </div>
        </div>
    </div>


    <div class="also-like">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    &nbsp;
                </div>
                <?php
                foreach ($imagenes as $key) { 
                    ?>
                <div class="col-lg-4">
                    <div class="like-item">
                        <div class="thumb">
                        <img class="card-img-top" width="190px" height="200px" src="<?php echo base_url()?>/upload/galeria/<?=$key->nombre_img?>" alt="Card image cap">
                            <div class="icons">
                                <ul>
                                    <li><button id="img-<?=$key->id_img?>" type="button" class="btn btn-calendar" data-toggle="modal" data-target=".bd-example-modal-lg" style="background-color: transparent;border-color: transparent;">
                                        <a><i class="fa fa-expand"></i></a>
                                            <label hidden class="name_img"><?=$key->nombre_img?></label>
                                        </button></li>
                                </ul>
                            </div>
                        </div>
                        <div class="down-content">
                            
                        </div>
                    </div>
                </div>
                    <?php
                }
                ?>
                
               
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div id="imagen-modal" style="text-align: center;">

        </div>              
    </div>
  </div>
</div>


    <!-- *** Footer *** -->
    <?php $this->load->view('includes/footer');?> 

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <script src="assets/js/galeria.js"></script>

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