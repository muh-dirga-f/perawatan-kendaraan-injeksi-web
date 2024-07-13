<script type="text/javascript">
   function domo() {

      $('*').bind('keydown', 'Ctrl+a', function() {
         window.location.href = BASE_URL + '/administrator/Type_motor/add';
         return false;
      });

      $('*').bind('keydown', 'Ctrl+f', function() {
         $('#sbtn').trigger('click');
         return false;
      });

      $('*').bind('keydown', 'Ctrl+x', function() {
         $('#reset').trigger('click');
         return false;
      });

      $('*').bind('keydown', 'Ctrl+b', function() {

         $('#reset').trigger('click');
         return false;
      });
   }

   jQuery(document).ready(domo);
</script>
<section class="content-header">
   <h1>
      <?= cclang('type_motor') ?></h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= cclang('type_motor') ?></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">

      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
               <div class="box box-widget widget-user-2">
                  <div class="widget-user-header ">
                     <div class="row pull-right">
                        <?php is_allowed('type_motor_add', function () { ?>
                           <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('type_motor')]); ?>  (Ctrl+a)" href="<?= site_url('administrator/type_motor/add'); ?>"><i class="fa fa-plus-square-o"></i> <?= cclang('add_new_button', [cclang('type_motor')]); ?></a>
                        <?php }) ?>
                        <!-- <?php is_allowed('type_motor_export', function () { ?>
                           <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('type_motor') ?> " href="<?= site_url('administrator/type_motor/export?q=' . $this->input->get('q') . '&f=' . $this->input->get('f')); ?>"><i class="fa fa-file-excel-o"></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                        <?php is_allowed('type_motor_export', function () { ?>
                           <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf <?= cclang('type_motor') ?> " href="<?= site_url('administrator/type_motor/export_pdf?q=' . $this->input->get('q') . '&f=' . $this->input->get('f')); ?>"><i class="fa fa-file-pdf-o"></i> <?= cclang('export'); ?> PDF</a>
                        <?php }) ?> -->
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= cclang('type_motor') ?></h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('type_motor')]); ?> <i class="label bg-yellow"><?= $type_motor_counts; ?> <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_type_motor" id="form_type_motor" action="<?= base_url('administrator/type_motor/index'); ?>">



                     <!-- /.widget-user -->
                     <!-- <div class="row">
                        <div class="col-md-8">
                           <div class="col-sm-2 padd-left-0 ">
                              <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email">
                                 <option value="delete">Delete</option>
                              </select>
                           </div>
                           <div class="col-sm-2 padd-left-0 ">
                              <button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
                           </div>
                           <div class="col-sm-3 padd-left-0  ">
                              <input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
                           </div>
                           <div class="col-sm-3 padd-left-0 ">
                              <select type="text" class="form-control chosen chosen-select" name="f" id="field">
                                 <option value=""><?= cclang('all'); ?></option>
                                 <option <?= $this->input->get('f') == 'type_motor' ? 'selected' : ''; ?> value="type_motor">Type Motor</option>
                                 <option <?= $this->input->get('f') == 'brand_motor' ? 'selected' : ''; ?> value="brand_motor">Brand Motor</option>
                                 <option <?= $this->input->get('f') == 'image_motor' ? 'selected' : ''; ?> value="image_motor">Image Motor</option>
                                 <option <?= $this->input->get('f') == 'informasi_umum' ? 'selected' : ''; ?> value="informasi_umum">Informasi Umum</option>
                                 <option <?= $this->input->get('f') == 'spesifikasi_teknis' ? 'selected' : ''; ?> value="spesifikasi_teknis">Spesifikasi Teknis</option>
                                 <option <?= $this->input->get('f') == 'pemeliharaan' ? 'selected' : ''; ?> value="pemeliharaan">Pemeliharaan</option>
                                 <option <?= $this->input->get('f') == 'sistem_kelistrikan' ? 'selected' : ''; ?> value="sistem_kelistrikan">Sistem Kelistrikan</option>
                                 <option <?= $this->input->get('f') == 'pemecahan_masalah' ? 'selected' : ''; ?> value="pemecahan_masalah">Pemecahan Masalah</option>
                              </select>
                           </div>
                           <div class="col-sm-1 padd-left-0 ">
                              <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                                 Filter
                              </button>
                           </div>
                           <div class="col-sm-1 padd-left-0 ">
                              <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/type_motor'); ?>" title="<?= cclang('reset_filter'); ?>">
                                 <i class="fa fa-undo"></i>
                              </a>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate">
                              <?= $pagination; ?>
                           </div>
                        </div>
                     </div> -->
                     <div class="table-responsive">

                        <br>
                        <table class="table table-bordered table-striped dataTable">
                           <thead>
                              <tr class="">
                                 <th>
                                    <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                                 </th>
                                 <th data-field="type_motor" data-sort="1" data-primary-key="0"> <?= cclang('type_motor') ?></th>
                                 <th data-field="brand_motor" data-sort="1" data-primary-key="0"> <?= cclang('brand_motor') ?></th>
                                 <th data-field="image_motor" data-sort="0" data-primary-key="0"> <?= cclang('image_motor') ?></th>
                                 <th data-field="informasi_umum" data-sort="0" data-primary-key="0"> <?= cclang('informasi_umum') ?></th>
                                 <th data-field="spesifikasi_teknis" data-sort="0" data-primary-key="0"> <?= cclang('spesifikasi_teknis') ?></th>
                                 <th data-field="pemeliharaan" data-sort="0" data-primary-key="0"> <?= cclang('pemeliharaan') ?></th>
                                 <th data-field="sistem_kelistrikan" data-sort="0" data-primary-key="0"> <?= cclang('sistem_kelistrikan') ?></th>
                                 <th data-field="pemecahan_masalah" data-sort="0" data-primary-key="0"> <?= cclang('pemecahan_masalah') ?></th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody id="tbody_type_motor">
                              <?php foreach ($type_motors as $type_motor) : ?>
                                 <tr>
                                    <td width="5">
                                       <input type="checkbox" class="flat-red check" name="id[]" value="<?= $type_motor->id_type_motor; ?>">
                                    </td>

                                    <td><span class="list_group-type_motor"><?= _ent($type_motor->type_motor); ?></span></td>
                                    <td><?php if ($type_motor->brand_motor) {

                                             echo anchor('administrator/brand/view/' . $type_motor->brand_motor . '?popup=show', $type_motor->brand_brand, ['class' => 'popup-view']);
                                          } ?> </td>

                                    <td>
                                       <?php if (!empty($type_motor->image_motor)) : ?>
                                          <?php if (is_image($type_motor->image_motor)) : ?>
                                             <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->image_motor; ?>">
                                                <img src="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->image_motor; ?>" class="image-responsive" alt="image type_motor" title="image_motor type_motor" width="40px">
                                             </a>
                                          <?php else : ?>
                                             <a href="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->image_motor; ?>" target="blank">
                                                <img src="<?= get_icon_file($type_motor->image_motor); ?>" class="image-responsive image-icon" alt="image type_motor" title="image_motor <?= $type_motor->image_motor; ?>" width="40px">
                                             </a>
                                          <?php endif; ?>
                                       <?php endif; ?>
                                    </td>

                                    <td>
                                       <?php if (!empty($type_motor->informasi_umum)) : ?>
                                          <?php if (is_image($type_motor->informasi_umum)) : ?>
                                             <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->informasi_umum; ?>">
                                                <img src="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->informasi_umum; ?>" class="image-responsive" alt="image type_motor" title="informasi_umum type_motor" width="40px">
                                             </a>
                                          <?php else : ?>
                                             <a href="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->informasi_umum; ?>" target="blank">
                                                <img src="<?= get_icon_file($type_motor->informasi_umum); ?>" class="image-responsive image-icon" alt="image type_motor" title="informasi_umum <?= $type_motor->informasi_umum; ?>" width="40px">
                                             </a>
                                          <?php endif; ?>
                                       <?php endif; ?>
                                    </td>

                                    <td>
                                       <?php if (!empty($type_motor->spesifikasi_teknis)) : ?>
                                          <?php if (is_image($type_motor->spesifikasi_teknis)) : ?>
                                             <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->spesifikasi_teknis; ?>">
                                                <img src="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->spesifikasi_teknis; ?>" class="image-responsive" alt="image type_motor" title="spesifikasi_teknis type_motor" width="40px">
                                             </a>
                                          <?php else : ?>
                                             <a href="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->spesifikasi_teknis; ?>" target="blank">
                                                <img src="<?= get_icon_file($type_motor->spesifikasi_teknis); ?>" class="image-responsive image-icon" alt="image type_motor" title="spesifikasi_teknis <?= $type_motor->spesifikasi_teknis; ?>" width="40px">
                                             </a>
                                          <?php endif; ?>
                                       <?php endif; ?>
                                    </td>

                                    <td>
                                       <?php if (!empty($type_motor->pemeliharaan)) : ?>
                                          <?php if (is_image($type_motor->pemeliharaan)) : ?>
                                             <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->pemeliharaan; ?>">
                                                <img src="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->pemeliharaan; ?>" class="image-responsive" alt="image type_motor" title="pemeliharaan type_motor" width="40px">
                                             </a>
                                          <?php else : ?>
                                             <a href="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->pemeliharaan; ?>" target="blank">
                                                <img src="<?= get_icon_file($type_motor->pemeliharaan); ?>" class="image-responsive image-icon" alt="image type_motor" title="pemeliharaan <?= $type_motor->pemeliharaan; ?>" width="40px">
                                             </a>
                                          <?php endif; ?>
                                       <?php endif; ?>
                                    </td>

                                    <td>
                                       <?php if (!empty($type_motor->sistem_kelistrikan)) : ?>
                                          <?php if (is_image($type_motor->sistem_kelistrikan)) : ?>
                                             <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->sistem_kelistrikan; ?>">
                                                <img src="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->sistem_kelistrikan; ?>" class="image-responsive" alt="image type_motor" title="sistem_kelistrikan type_motor" width="40px">
                                             </a>
                                          <?php else : ?>
                                             <a href="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->sistem_kelistrikan; ?>" target="blank">
                                                <img src="<?= get_icon_file($type_motor->sistem_kelistrikan); ?>" class="image-responsive image-icon" alt="image type_motor" title="sistem_kelistrikan <?= $type_motor->sistem_kelistrikan; ?>" width="40px">
                                             </a>
                                          <?php endif; ?>
                                       <?php endif; ?>
                                    </td>

                                    <td>
                                       <?php if (!empty($type_motor->pemecahan_masalah)) : ?>
                                          <?php if (is_image($type_motor->pemecahan_masalah)) : ?>
                                             <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->pemecahan_masalah; ?>">
                                                <img src="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->pemecahan_masalah; ?>" class="image-responsive" alt="image type_motor" title="pemecahan_masalah type_motor" width="40px">
                                             </a>
                                          <?php else : ?>
                                             <a href="<?= BASE_URL . 'uploads/type_motor/' . $type_motor->pemecahan_masalah; ?>" target="blank">
                                                <img src="<?= get_icon_file($type_motor->pemecahan_masalah); ?>" class="image-responsive image-icon" alt="image type_motor" title="pemecahan_masalah <?= $type_motor->pemecahan_masalah; ?>" width="40px">
                                             </a>
                                          <?php endif; ?>
                                       <?php endif; ?>
                                    </td>

                                    <td width="200">

                                       <?php is_allowed('type_motor_view', function () use ($type_motor) { ?>
                                          <a href="<?= site_url('administrator/type_motor/view/' . $type_motor->id_type_motor); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                                          <?php }) ?>
                                          <?php is_allowed('type_motor_update', function () use ($type_motor) { ?>
                                             <a href="<?= site_url('administrator/type_motor/edit/' . $type_motor->id_type_motor); ?>" class="label-default"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                                          <?php }) ?>
                                          <?php is_allowed('type_motor_delete', function () use ($type_motor) { ?>
                                             <a href="javascript:void(0);" data-href="<?= site_url('administrator/type_motor/delete/' . $type_motor->id_type_motor); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                                          <?php }) ?>

                                    </td>
                                 </tr>
                              <?php endforeach; ?>
                              <?php if ($type_motor_counts == 0) : ?>
                                 <tr>
                                    <td colspan="100">
                                       Type Motor data is not available
                                    </td>
                                 </tr>
                              <?php endif; ?>

                           </tbody>
                        </table>
                     </div>
               </div>
               <hr>

            </div>
            </form>
         </div>
      </div>
   </div>
</section>


<script>
   $(document).ready(function() {

      "use strict";



      $('.remove-data').click(function() {

         var url = $(this).attr('data-href');

         swal({
               title: "<?= cclang('are_you_sure'); ?>",
               text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
               cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
               closeOnConfirm: true,
               closeOnCancel: true
            },
            function(isConfirm) {
               if (isConfirm) {
                  document.location.href = url;
               }
            });

         return false;
      });


      $('#apply').click(function() {

         var bulk = $('#bulk');
         var serialize_bulk = $('#form_type_motor').serialize();

         if (bulk.val() == 'delete') {
            swal({
                  title: "<?= cclang('are_you_sure'); ?>",
                  text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
                  cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
                  closeOnConfirm: true,
                  closeOnCancel: true
               },
               function(isConfirm) {
                  if (isConfirm) {
                     document.location.href = BASE_URL + '/administrator/type_motor/delete?' + serialize_bulk;
                  }
               });

            return false;

         } else if (bulk.val() == '') {
            swal({
               title: "Upss",
               text: "<?= cclang('please_choose_bulk_action_first'); ?>",
               type: "warning",
               showCancelButton: false,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Okay!",
               closeOnConfirm: true,
               closeOnCancel: true
            });

            return false;
         }

         return false;

      }); /*end appliy click*/


      //check all
      var checkAll = $('#check_all');
      var checkboxes = $('input.check');

      checkAll.on('ifChecked ifUnchecked', function(event) {
         if (event.type == 'ifChecked') {
            checkboxes.iCheck('check');
         } else {
            checkboxes.iCheck('uncheck');
         }
      });

      checkboxes.on('ifChanged', function(event) {
         if (checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
         } else {
            checkAll.removeProp('checked');
         }
         checkAll.iCheck('update');
      });
      initSortable('type_motor', $('table.dataTable'));
   }); /*end doc ready*/
</script>