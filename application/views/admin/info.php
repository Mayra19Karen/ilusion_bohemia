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
                    <span>Informacion</span>
                </div>
            </div>
        </div>
    </div>


    <div class="also-like">
        <div class="container">
                </div>
            <div class="row">
                <div class="col-lg-12">
                    &nbsp;
                </div>
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($textos as $key) { ?>
                            <tr>
                            <th scope="row"><?=$key->id_info?></th>
                            <td><?=$key->titulo_info?></td>
                            <td><?=$key->desc_info?></td>
                            <td>
                                <center><a>
                                  <i id="<?=$key->id_info?>" class="fa fa-pencil"></i>
                                </a></center>
                            </td>
                            </tr>
                            <?php 
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


     


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="edit-text-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <label id="compraTTux" class="">Editar información</label>
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
                  <textarea id="titulo-info" placeholder="" class="col-sm-12 col-md-12 col-lg-12"></textarea>
                  <br><br>
                  <textarea id="desc-info"  rows="14" cols="150" placeholder="" class="col-sm-12 col-md-12 col-lg-12"></textarea>
                  <input type="hidden" id="id-info" name="id-event-edit">
                  
                </div>

              </div>
            </div>
          </div>
          <div class="modal-footer">

               <button type="button" id="btn_EditText"  class="main-dark-button2">Actualizar</button>
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
    <script src="<?php echo base_url()?>assets/js/admin/info.js"></script>

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
