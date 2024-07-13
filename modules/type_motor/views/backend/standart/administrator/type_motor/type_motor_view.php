<script type="text/javascript">
function domo(){
   $('*').bind('keydown', 'Ctrl+e', function() {
      $('#btn_edit').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function() {
      $('#btn_back').trigger('click');
       return false;
   });
}

jQuery(document).ready(domo);
</script>
<section class="content-header">
   <h1>
      Type Motor      <small><?= cclang('detail', ['Type Motor']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/type_motor'); ?>">Type Motor</a></li>
      <li class="active"><?= cclang('detail'); ?></li>
   </ol>
</section>
<section class="content">
   <div class="row" >
     
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">

               <div class="box box-widget widget-user-2">
                  <div class="widget-user-header ">
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <h3 class="widget-user-username">Type Motor</h3>
                     <h5 class="widget-user-desc">Detail Type Motor</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_type_motor" id="form_type_motor" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Type Motor </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id_type_motor"><?= _ent($type_motor->id_type_motor); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Type Motor </label>

                        <div class="col-sm-8">
                        <span class="detail_group-type_motor"><?= _ent($type_motor->type_motor); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Brand Motor </label>

                        <div class="col-sm-8">
                           <?= _ent($type_motor->brand_brand); ?>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Image Motor </label>
                        <div class="col-sm-8">
                             <?php if (is_image($type_motor->image_motor)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->image_motor; ?>">
                                <img src="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->image_motor; ?>" class="image-responsive" alt="image type_motor" title="image_motor type_motor" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/type_motor/' . $type_motor->image_motor; ?>">
                                 <img src="<?= get_icon_file($type_motor->image_motor); ?>" class="image-responsive" alt="image type_motor" title="image_motor <?= $type_motor->image_motor; ?>" width="40px"> 
                               <?= $type_motor->image_motor ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                      
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Informasi Umum </label>
                        <div class="col-sm-8">
                             <?php if (is_image($type_motor->informasi_umum)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->informasi_umum; ?>">
                                <img src="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->informasi_umum; ?>" class="image-responsive" alt="image type_motor" title="informasi_umum type_motor" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/type_motor/' . $type_motor->informasi_umum; ?>">
                                 <img src="<?= get_icon_file($type_motor->informasi_umum); ?>" class="image-responsive" alt="image type_motor" title="informasi_umum <?= $type_motor->informasi_umum; ?>" width="40px"> 
                               <?= $type_motor->informasi_umum ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                      
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Spesifikasi Teknis </label>
                        <div class="col-sm-8">
                             <?php if (is_image($type_motor->spesifikasi_teknis)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->spesifikasi_teknis; ?>">
                                <img src="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->spesifikasi_teknis; ?>" class="image-responsive" alt="image type_motor" title="spesifikasi_teknis type_motor" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/type_motor/' . $type_motor->spesifikasi_teknis; ?>">
                                 <img src="<?= get_icon_file($type_motor->spesifikasi_teknis); ?>" class="image-responsive" alt="image type_motor" title="spesifikasi_teknis <?= $type_motor->spesifikasi_teknis; ?>" width="40px"> 
                               <?= $type_motor->spesifikasi_teknis ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                      
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Pemeliharaan </label>
                        <div class="col-sm-8">
                             <?php if (is_image($type_motor->pemeliharaan)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->pemeliharaan; ?>">
                                <img src="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->pemeliharaan; ?>" class="image-responsive" alt="image type_motor" title="pemeliharaan type_motor" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/type_motor/' . $type_motor->pemeliharaan; ?>">
                                 <img src="<?= get_icon_file($type_motor->pemeliharaan); ?>" class="image-responsive" alt="image type_motor" title="pemeliharaan <?= $type_motor->pemeliharaan; ?>" width="40px"> 
                               <?= $type_motor->pemeliharaan ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                      
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Sistem Kelistrikan </label>
                        <div class="col-sm-8">
                             <?php if (is_image($type_motor->sistem_kelistrikan)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->sistem_kelistrikan; ?>">
                                <img src="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->sistem_kelistrikan; ?>" class="image-responsive" alt="image type_motor" title="sistem_kelistrikan type_motor" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/type_motor/' . $type_motor->sistem_kelistrikan; ?>">
                                 <img src="<?= get_icon_file($type_motor->sistem_kelistrikan); ?>" class="image-responsive" alt="image type_motor" title="sistem_kelistrikan <?= $type_motor->sistem_kelistrikan; ?>" width="40px"> 
                               <?= $type_motor->sistem_kelistrikan ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                      
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Pemecahan Masalah </label>
                        <div class="col-sm-8">
                             <?php if (is_image($type_motor->pemecahan_masalah)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->pemecahan_masalah; ?>">
                                <img src="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->pemecahan_masalah; ?>" class="image-responsive" alt="image type_motor" title="pemecahan_masalah type_motor" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/type_motor/' . $type_motor->pemecahan_masalah; ?>">
                                 <img src="<?= get_icon_file($type_motor->pemecahan_masalah); ?>" class="image-responsive" alt="image type_motor" title="pemecahan_masalah <?= $type_motor->pemecahan_masalah; ?>" width="40px"> 
                               <?= $type_motor->pemecahan_masalah ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                      
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('type_motor_update', function() use ($type_motor){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit type_motor (Ctrl+e)" href="<?= site_url('administrator/type_motor/edit/'.$type_motor->id_type_motor); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Type Motor']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/type_motor/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Type Motor']); ?></a>
                     </div>
                    
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<script>
$(document).ready(function(){

    "use strict";
    
   
   });
</script>