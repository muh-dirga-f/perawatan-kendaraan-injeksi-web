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
      Brand      <small><?= cclang('detail', ['Brand']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/brand'); ?>">Brand</a></li>
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
                     <h3 class="widget-user-username">Brand</h3>
                     <h5 class="widget-user-desc">Detail Brand</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal form-step" name="form_brand" id="form_brand" >
                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Id Brand </label>

                        <div class="col-sm-8">
                        <span class="detail_group-id_brand"><?= _ent($brand->id_brand); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Brand </label>

                        <div class="col-sm-8">
                        <span class="detail_group-brand"><?= _ent($brand->brand); ?></span>
                        </div>
                    </div>
                                        
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Logo </label>
                        <div class="col-sm-8">
                             <?php if (is_image($brand->logo)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/brand/' . $brand->logo; ?>">
                                <img src="<?= BASE_URL . 'uploads/brand/' . $brand->logo; ?>" class="image-responsive" alt="image brand" title="logo brand" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/brand/' . $brand->logo; ?>">
                                 <img src="<?= get_icon_file($brand->logo); ?>" class="image-responsive" alt="image brand" title="logo <?= $brand->logo; ?>" width="40px"> 
                               <?= $brand->logo ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                      
                    <br>
                    <br>


                     
                         
                    <div class="view-nav">
                        <?php is_allowed('brand_update', function() use ($brand){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit brand (Ctrl+e)" href="<?= site_url('administrator/brand/edit/'.$brand->id_brand); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Brand']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/brand/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Brand']); ?></a>
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