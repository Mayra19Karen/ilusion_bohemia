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
                    <span>Nuestras próximas presentaciones</span>
                </div>
            </div>
        </div>
    </div>


    <div class="also-like">
        <div class="container">
                <div class="col-lg-3">
                     <fieldset>
                        <button type="button" id="btn_newEvent"  class="main-dark-button2">Agregar nuevo</button>
                     </fieldset>
                </div>
            <div class="row">
                <div class="col-lg-12">
                    &nbsp;
                </div>
                <?php
                foreach ($eventos as $key) { 
                    ?>
                <div class="col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="<?php echo base_url()?>/upload/<?=$key->imagen_even?>" alt="Card image cap">
                        <label hidden id="id_even"><?=$key->id_even?></label>

                        <div class="card-body">
                            <h5 class="card-title"><?=$key->nom_even?></h5>
                            <p class="card-text"><?=$key->desc_even?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Lugar: <?=$key->lugar_even?></li>
                            <li class="list-group-item">Fecha: <?=$key->fec_even?></li>
                            <li class="list-group-item">Hora: <?=substr($key->hora_even,0,-3);?></li>
                        </ul>
                        <div class="card-body">
                            <a id="<?=$key->id_even?>"  class="edit-link">Editar</a>
                            <a id="<?=$key->id_even?>"  class="remove-link">Eliminar</a>
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
                      <label id="compraTTux" class="">AGREGAR FECHA</label>
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

                   
                      <input class="in-vnt esta-v" type="text" id="nom-event" placeholder="Nombre del evento" name="name">
                        &nbsp;
                      <input class="in-vnt esta-v" type="text" id="lug-event" placeholder="Lugar del evento" name="lastname">
                        &nbsp;
                        <br><br>
                      <textarea id="desc-event" placeholder="Breve descripción" class="col-sm-12 col-md-12 col-lg-12"></textarea>
                        &nbsp;
                        <br><br>
                        Categoría
                        &nbsp;
                      <select class="cat-event" name="country">
                            <?php foreach ($categorias as $key) { ?>
                                    <option value="<?=$key->id_cat?>"><?=$key->nom_cat?></option>                                 
                            <?php }?>  
                      </select>
                      <br><br>
                        Fecha:
                      <select class="dia-event" name="country">
                            <?php for ($i=0; $i <=31 ; $i++) { 
                                if($i<10){?>
                                    <option value="0<?=$i?>">0<?=$i?></option>
                                 <?php }else{?>
                                    <option value="<?=$i?>"><?=$i?></option><?php
                                }  
                             }?>  
                      </select>
                            /

                      <select class="mes-event" name="country">
                            <?php for ($i=0; $i <=12 ; $i++) { 
                                if($i<10){?>
                                    <option value="0<?=$i?>">0<?=$i?></option>
                                 <?php }else{?>
                                    <option value="<?=$i?>"><?=$i?></option><?php
                                }  
                             }?>                        
                      </select>
                            /
                      <select class="anio-event" name="country">
                        <?php 
                            for ($i=date("Y"); $i <=date("Y")+5 ; $i++) { ?>
                            <option value="<?=$i?>"><?=$i?></option>
                        <?php  }?>
                      </select>
                        
                      <br>
                      <br>
                      Hora:
                      <select class="hora-event" name="country">
                        <?php for ($i=0; $i <=23 ; $i++) { 
                                if($i<10){?>
                                    <option value="0<?=$i?>">0<?=$i?></option>
                                 <?php }else{?>
                                    <option value="<?=$i?>"><?=$i?></option><?php
                                }  
                             }?>                        
                        </select>
                      :
                      <select class="min-event" name="country">
                        <?php for ($i=0; $i <=59 ; $i++) { 
                                if($i<10){?>
                                    <option value="0<?=$i?>">0<?=$i?></option>
                                 <?php }else{?>
                                    <option value="<?=$i?>"><?=$i?></option><?php
                                }  
                             }?>                        
                        </select>
                        <br>
                        <br>
                        Imagen
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

<!-- Modal EDITAR-->
<div class="modal fade bd-example-modal-lg" id="edit-event-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <input type="hidden" id="id-event-edit" name="id-event-edit">
                      <label id="compraTTux" class="">EDITAR FECHA</label>
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
                    <form id="form_img2" method='post' enctype="multipart/form-data">

                   
                      <input class="in-vnt esta-v" type="text" id="nom-event-edit" placeholder="Nombre del evento" name="name">
                        &nbsp;
                      <input class="in-vnt esta-v" type="text" id="lug-event-edit" placeholder="Lugar del evento" name="lastname">
                        &nbsp;
                        <br><br>
                      <textarea id="desc-event-edit" placeholder="Breve descripción" class="col-sm-12 col-md-12 col-lg-12"></textarea>
                        &nbsp;
                        <br><br>
                        Categoría
                        &nbsp;
                      <select class="cat-event-edit" name="cat-event-edit">
                            <?php foreach ($categorias as $key) { ?>
                                    <option value="<?=$key->id_cat?>"><?=$key->nom_cat?></option>                                 
                            <?php }?>  
                      </select>
                      <br><br>
                        Fecha:
                      <select class="dia-event-edit" name="country">
                            <?php for ($i=0; $i <=31 ; $i++) { 
                                if($i<10){?>
                                    <option value="0<?=$i?>">0<?=$i?></option>
                                 <?php }else{?>
                                    <option value="<?=$i?>"><?=$i?></option><?php
                                }  
                             }?>  
                      </select>
                            /

                      <select class="mes-event-edit" name="country">
                            <?php for ($i=0; $i <=12 ; $i++) { 
                                if($i<10){?>
                                    <option value="0<?=$i?>">0<?=$i?></option>
                                 <?php }else{?>
                                    <option value="<?=$i?>"><?=$i?></option><?php
                                }  
                             }?>                        
                      </select>
                            /
                      <select class="anio-event-edit" name="country">
                        <?php 
                            for ($i=date("Y"); $i <=date("Y")+5 ; $i++) { ?>
                            <option value="<?=$i?>"><?=$i?></option>
                        <?php  }?>
                      </select>
                        
                      <br>
                      <br>
                      Hora:
                      <select class="hora-event-edit" name="country">
                        <?php for ($i=0; $i <=23 ; $i++) { 
                                if($i<10){?>
                                    <option value="0<?=$i?>">0<?=$i?></option>
                                 <?php }else{?>
                                    <option value="<?=$i?>"><?=$i?></option><?php
                                }  
                             }?>                        
                        </select>
                      :
                      <select class="min-event-edit" name="country">
                        <?php for ($i=0; $i <=59 ; $i++) { 
                                if($i<10){?>
                                    <option value="0<?=$i?>">0<?=$i?></option>
                                 <?php }else{?>
                                    <option value="<?=$i?>"><?=$i?></option><?php
                                }  
                             }?>                        
                        </select>
                        <br>
                        <br>
                        Imagen:
                        <input type="file" name="file_img2" id="file_img2" class="form-control"> 
                        <label hidden id="imagen_even"></label> <br>
                        <div id="actual-imagen-even"></div>      
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


    <!-- *** Footer *** -->
    <?php $this->load->view('includes/footer');?> 

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/admin/eventos.js"></script>

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
