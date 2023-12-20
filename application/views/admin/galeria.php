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
                    <span>Galería</span>
                </div>
            </div>
        </div>
    </div>


    <div class="also-like">
        <div class="container">
                <div class="col-lg-3">
                     <fieldset>
                        <button type="button" id="btn_newEvent"  class="main-dark-button2">Agregar imagen</button>
                     </fieldset>
                </div>
            <div class="row">
                <div class="col-lg-12">
                    &nbsp;
                </div>
                <?php
                foreach ($imagenes as $key) { 
                    ?>
                <div class="col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="<?php echo base_url()?>/upload/galeria/<?=$key->nombre_img?>" alt="Card image cap">
                        <label hidden id="id_img"><?=$key->id_img?></label>

                        <div class="card-body">
                            <!--<p class="card-text"><?=$key->nombre_img?></p>-->
                        </div>
                        <div class="card-body">
                            <a id="<?=$key->id_img?>"  class="remove-link">Eliminar</a>
                        </div>
                    </div>
                    <br>
                </div>
                    <?php
                }
                ?>
                
               
            </div>
        </div>
    </div>


     


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="new-event-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body">

            <div class="col">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12 titulo-vnt">

                    <button type="button" class="close" id="cerrar-compra" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>

                    <label class="text-mayuscula">
                      <label hidden id="imgbook"></label>
                      <label id="compraTTux" class="">AGREGAR IMAGEN</label>
                      <h4 id="timerBook"></h4>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-8">
                    <form id="form_img" method='post' enctype="multipart/form-data">
                                         
                        Subir Archivo
                        <input type="file" name="file_img" id="file_img" class="form-control"> 
                                  
                </div>

              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" name="upload" id="upload" class="btn btn-success">

                <!--<button type="button" id="btn_FormNewEvent"  class="main-dark-button2">Agregar</button>-->
            <div class="clearfix"></div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>




    <!-- *** Footer *** -->
    <?php $this->load->view('includes/footer');?> 

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/admin/galeria.js"></script>

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
