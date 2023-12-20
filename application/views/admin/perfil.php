<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('includes/header_admin');?>   
<div id="base_url" hidden="hidden" class="urlDiv"><?php echo base_url()?></div>


    <!-- ***** About Us Page ***** -->
    <div class="page-heading-rent-venue">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Gestionar</h2>
                    <span>Mi perfil</span>
                </div>
            </div>
        </div>
    </div>


    <div class="also-like">
        <div class="container">
                <div class="col-lg-3">
                </div>
            <div class="row">
                <div class="col-lg-12">
                    &nbsp;
                </div>
              
                <div class="col-lg-12">
                <b>Usuario:</b> <?php echo $username; ?>
                
                
                </div>
                <div class="col-lg-12">
                    &nbsp;
                </div>
                <div class="col-lg-12">
                <b>Nombre:</b>
                <?php echo $nombre; ?>               
                
                <?php echo $apellidos; ?>
                <br><br><br><br>
                </div>

                <div class="col-lg-5">
                    <h5>Cambiar contraseña</h5>
                    <br>
                    Contraseña actual:&nbsp;<input class="in-vnt esta-v" type="password" id="current-pwd"  name="lastname">
                    <br><br>
                    Contraseña nueva:&nbsp;<input class="in-vnt esta-v" type="password" id="new-pwd"  name="lastname">
                    <br><br>
                    Confirmar Contraseña:&nbsp;<input class="in-vnt esta-v" type="password" id="confirm-new-pwd"  name="lastname">
                    <br><br>
                    <button type="button" id="changepwd"  class="main-dark-button2">Actualizar</button>

                </div>
            </div>
        </div>
    </div>






    <!-- *** Footer *** -->
    <?php $this->load->view('includes/footer');?> 

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/admin/perfil.js"></script>

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
