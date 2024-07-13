

    <link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
    <script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
    <?php $this->load->view('core_template/fine_upload'); ?>
<script type="text/javascript">
    function domo() {

        $('*').bind('keydown', 'Ctrl+s', function() {
            $('#btn_save').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+x', function() {
            $('#btn_cancel').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+d', function() {
            $('.btn_save_back').trigger('click');
            return false;
        });

    }

    jQuery(document).ready(domo);
</script>
<section class="content-header">
    <h1>
        Type Motor        <small>Edit Type Motor</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/type_motor'); ?>">Type Motor</a></li>
        <li class="active">Edit</li>
    </ol>
</section>

<style>

</style>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <h3 class="widget-user-username">Type Motor</h3>
                            <h5 class="widget-user-desc">Edit Type Motor</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/type_motor/edit_save/'.$this->uri->segment(4)), [
                            'name' => 'form_type_motor',
                            'class' => 'form-horizontal form-step',
                            'id' => 'form_type_motor',
                            'method' => 'POST'
                        ]); ?>

                        <?php
                        $user_groups = $this->model_group->get_user_group_ids();
                        ?>

                                                    
                        
                        <div class="form-group group-type_motor  ">
                                <label for="type_motor" class="col-sm-2 control-label">Type Motor                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="type_motor" id="type_motor" placeholder="" value="<?= set_value('type_motor', $type_motor->type_motor); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-brand_motor">
                                <label for="brand_motor" class="col-sm-2 control-label">Brand Motor                                    </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select-deselect" name="brand_motor" id="brand_motor" data-placeholder="Select Brand Motor">
                                        <option value=""></option>
                                                                                    <?php foreach (db_get_all_data('brand') as $row): ?>
                                            <option <?= $row->id_brand == $type_motor->brand_motor ? 'selected' : ''; ?> value="<?= $row->id_brand ?>"><?= $row->brand; ?></option>
                                            <?php endforeach; ?>
                                                                            </select>
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>

                        
                        
                                                    
                        
                        <div class="form-group group-image_motor  ">
                                <label for="image_motor" class="col-sm-2 control-label">Image Motor                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div id="type_motor_image_motor_galery"></div>
                                    <input class="data_file data_file_uuid" name="type_motor_image_motor_uuid" id="type_motor_image_motor_uuid" type="hidden" value="<?= set_value('type_motor_image_motor_uuid'); ?>">
                                    <input class="data_file" name="type_motor_image_motor_name" id="type_motor_image_motor_name" type="hidden" value="<?= set_value('type_motor_image_motor_name', $type_motor->image_motor); ?>">
                                    <small class="info help-block">
                                        <b>Extension file must</b> JPG,PNG.</small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-informasi_umum  ">
                                <label for="informasi_umum" class="col-sm-2 control-label">Informasi Umum                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div id="type_motor_informasi_umum_galery"></div>
                                    <input class="data_file data_file_uuid" name="type_motor_informasi_umum_uuid" id="type_motor_informasi_umum_uuid" type="hidden" value="<?= set_value('type_motor_informasi_umum_uuid'); ?>">
                                    <input class="data_file" name="type_motor_informasi_umum_name" id="type_motor_informasi_umum_name" type="hidden" value="<?= set_value('type_motor_informasi_umum_name', $type_motor->informasi_umum); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-spesifikasi_teknis  ">
                                <label for="spesifikasi_teknis" class="col-sm-2 control-label">Spesifikasi Teknis                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div id="type_motor_spesifikasi_teknis_galery"></div>
                                    <input class="data_file data_file_uuid" name="type_motor_spesifikasi_teknis_uuid" id="type_motor_spesifikasi_teknis_uuid" type="hidden" value="<?= set_value('type_motor_spesifikasi_teknis_uuid'); ?>">
                                    <input class="data_file" name="type_motor_spesifikasi_teknis_name" id="type_motor_spesifikasi_teknis_name" type="hidden" value="<?= set_value('type_motor_spesifikasi_teknis_name', $type_motor->spesifikasi_teknis); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-pemeliharaan  ">
                                <label for="pemeliharaan" class="col-sm-2 control-label">Pemeliharaan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div id="type_motor_pemeliharaan_galery"></div>
                                    <input class="data_file data_file_uuid" name="type_motor_pemeliharaan_uuid" id="type_motor_pemeliharaan_uuid" type="hidden" value="<?= set_value('type_motor_pemeliharaan_uuid'); ?>">
                                    <input class="data_file" name="type_motor_pemeliharaan_name" id="type_motor_pemeliharaan_name" type="hidden" value="<?= set_value('type_motor_pemeliharaan_name', $type_motor->pemeliharaan); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-sistem_kelistrikan  ">
                                <label for="sistem_kelistrikan" class="col-sm-2 control-label">Sistem Kelistrikan                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div id="type_motor_sistem_kelistrikan_galery"></div>
                                    <input class="data_file data_file_uuid" name="type_motor_sistem_kelistrikan_uuid" id="type_motor_sistem_kelistrikan_uuid" type="hidden" value="<?= set_value('type_motor_sistem_kelistrikan_uuid'); ?>">
                                    <input class="data_file" name="type_motor_sistem_kelistrikan_name" id="type_motor_sistem_kelistrikan_name" type="hidden" value="<?= set_value('type_motor_sistem_kelistrikan_name', $type_motor->sistem_kelistrikan); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                                                    
                        
                        <div class="form-group group-pemecahan_masalah  ">
                                <label for="pemecahan_masalah" class="col-sm-2 control-label">Pemecahan Masalah                                    <i class="required">*</i>
                                    </label>
                                <div class="col-sm-8">
                                    <div id="type_motor_pemecahan_masalah_galery"></div>
                                    <input class="data_file data_file_uuid" name="type_motor_pemecahan_masalah_uuid" id="type_motor_pemecahan_masalah_uuid" type="hidden" value="<?= set_value('type_motor_pemecahan_masalah_uuid'); ?>">
                                    <input class="data_file" name="type_motor_pemecahan_masalah_name" id="type_motor_pemecahan_masalah_name" type="hidden" value="<?= set_value('type_motor_pemecahan_masalah_name', $type_motor->pemecahan_masalah); ?>">
                                    <small class="info help-block">
                                        </small>
                                </div>
                            </div>
                        
                        
                        
                                                    <div class="message"></div>
                                                <div class="row-fluid col-md-7 container-button-bottom">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                                <i class="fa fa-save"></i> <?= cclang('save_button'); ?>
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                                <i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>

                            <div class="custom-button-wrapper">

                                                        </div>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                                <i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
                            </a>
                            <span class="loading loading-hide">
                                <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
                                <i><?= cclang('loading_saving_data'); ?></i>
                            </span>
                        </div>
                                                <?= form_close(); ?>
                        </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>


<script>
    $(document).ready(function() {

        "use strict";
        
    window.event_submit_and_action = '';
            
    
      
      
      
        
        
    
    $('#btn_cancel').click(function() {
        swal({
                title: "Are you sure?",
                text: "the data that you have created will be in the exhaust!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes!",
                cancelButtonText: "No!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location.href = BASE_URL + 'administrator/type_motor';
                }
            });

        return false;
    }); /*end btn cancel*/

    $('.btn_save').click(function() {
        $('.message').fadeOut();
        
    var form_type_motor = $('#form_type_motor');
    var data_post = form_type_motor.serializeArray();
    var save_type = $(this).attr('data-stype');
    data_post.push({
        name: 'save_type',
        value: save_type
    });

    
      
    data_post.push({
        name: 'event_submit_and_action',
        value: window.event_submit_and_action
    });

    $('.loading').show();

    $.ajax({
            url: form_type_motor.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data_post,
        })
        .done(function(res) {
            $('form').find('.form-group').removeClass('has-error');
            $('form').find('.error-input').remove();
            $('.steps li').removeClass('error');
            if (res.success) {
                var id = $('#type_motor_image_galery').find('li').attr('qq-file-id');
                if (save_type == 'back') {
                    window.location.href = res.redirect;
                    return;
                }

                $('.message').printMessage({
                    message: res.message
                });
                $('.message').fadeIn();
                $('.data_file_uuid').val('');

            } else {
                if (res.errors) {
                    parseErrorField(res.errors);
                }
                $('.message').printMessage({
                    message: res.message,
                    type: 'warning'
                });
            }

        })
        .fail(function() {
            $('.message').printMessage({
                message: 'Error save data',
                type: 'warning'
            });
        })
        .always(function() {
            $('.loading').hide();
            $('html, body').animate({
                scrollTop: $(document).height()
            }, 2000);
        });

    return false;
    }); /*end btn save*/

                        var params = {};
            params[csrf] = token;

            $('#type_motor_image_motor_galery').fineUploader({
                template: 'qq-template-gallery',
                request: {
                    endpoint: BASE_URL + '/administrator/type_motor/upload_image_motor_file',
                    params: params
                },
                deleteFile: {
                    enabled: true, // defaults to false
                    endpoint: BASE_URL + '/administrator/type_motor/delete_image_motor_file'
                },
                thumbnails: {
                    placeholders: {
                        waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                        notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                    }
                },
                session: {
                    endpoint: BASE_URL + 'administrator/type_motor/get_image_motor_file/<?= $type_motor->id_type_motor; ?>',
                    refreshOnRequest: true
                },
                multiple: false,
                validation: {
                    allowedExtensions: ["jpg","png"],
                    sizeLimit: 0,
                                    },
                showMessage: function(msg) {
                    toastr['error'](msg);
                },
                callbacks: {
                    onComplete: function(id, name, xhr) {
                        if (xhr.success) {
                            var uuid = $('#type_motor_image_motor_galery').fineUploader('getUuid', id);
                            $('#type_motor_image_motor_uuid').val(uuid);
                            $('#type_motor_image_motor_name').val(xhr.uploadName);
                        } else {
                            toastr['error'](xhr.error);
                        }
                    },
                    onSubmit: function(id, name) {
                        var uuid = $('#type_motor_image_motor_uuid').val();
                        $.get(BASE_URL + '/administrator/type_motor/delete_image_motor_file/' + uuid);
                    },
                    onDeleteComplete: function(id, xhr, isError) {
                        if (isError == false) {
                            $('#type_motor_image_motor_uuid').val('');
                            $('#type_motor_image_motor_name').val('');
                        }
                    }
                }
            }); /*end image_motor galey*/
                                var params = {};
            params[csrf] = token;

            $('#type_motor_informasi_umum_galery').fineUploader({
                template: 'qq-template-gallery',
                request: {
                    endpoint: BASE_URL + '/administrator/type_motor/upload_informasi_umum_file',
                    params: params
                },
                deleteFile: {
                    enabled: true, // defaults to false
                    endpoint: BASE_URL + '/administrator/type_motor/delete_informasi_umum_file'
                },
                thumbnails: {
                    placeholders: {
                        waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                        notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                    }
                },
                session: {
                    endpoint: BASE_URL + 'administrator/type_motor/get_informasi_umum_file/<?= $type_motor->id_type_motor; ?>',
                    refreshOnRequest: true
                },
                multiple: false,
                validation: {
                    allowedExtensions: ["pdf"],
                    sizeLimit: 0,
                                    },
                showMessage: function(msg) {
                    toastr['error'](msg);
                },
                callbacks: {
                    onComplete: function(id, name, xhr) {
                        if (xhr.success) {
                            var uuid = $('#type_motor_informasi_umum_galery').fineUploader('getUuid', id);
                            $('#type_motor_informasi_umum_uuid').val(uuid);
                            $('#type_motor_informasi_umum_name').val(xhr.uploadName);
                        } else {
                            toastr['error'](xhr.error);
                        }
                    },
                    onSubmit: function(id, name) {
                        var uuid = $('#type_motor_informasi_umum_uuid').val();
                        $.get(BASE_URL + '/administrator/type_motor/delete_informasi_umum_file/' + uuid);
                    },
                    onDeleteComplete: function(id, xhr, isError) {
                        if (isError == false) {
                            $('#type_motor_informasi_umum_uuid').val('');
                            $('#type_motor_informasi_umum_name').val('');
                        }
                    }
                }
            }); /*end informasi_umum galey*/
                                var params = {};
            params[csrf] = token;

            $('#type_motor_spesifikasi_teknis_galery').fineUploader({
                template: 'qq-template-gallery',
                request: {
                    endpoint: BASE_URL + '/administrator/type_motor/upload_spesifikasi_teknis_file',
                    params: params
                },
                deleteFile: {
                    enabled: true, // defaults to false
                    endpoint: BASE_URL + '/administrator/type_motor/delete_spesifikasi_teknis_file'
                },
                thumbnails: {
                    placeholders: {
                        waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                        notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                    }
                },
                session: {
                    endpoint: BASE_URL + 'administrator/type_motor/get_spesifikasi_teknis_file/<?= $type_motor->id_type_motor; ?>',
                    refreshOnRequest: true
                },
                multiple: false,
                validation: {
                    allowedExtensions: ["pdf"],
                    sizeLimit: 0,
                                    },
                showMessage: function(msg) {
                    toastr['error'](msg);
                },
                callbacks: {
                    onComplete: function(id, name, xhr) {
                        if (xhr.success) {
                            var uuid = $('#type_motor_spesifikasi_teknis_galery').fineUploader('getUuid', id);
                            $('#type_motor_spesifikasi_teknis_uuid').val(uuid);
                            $('#type_motor_spesifikasi_teknis_name').val(xhr.uploadName);
                        } else {
                            toastr['error'](xhr.error);
                        }
                    },
                    onSubmit: function(id, name) {
                        var uuid = $('#type_motor_spesifikasi_teknis_uuid').val();
                        $.get(BASE_URL + '/administrator/type_motor/delete_spesifikasi_teknis_file/' + uuid);
                    },
                    onDeleteComplete: function(id, xhr, isError) {
                        if (isError == false) {
                            $('#type_motor_spesifikasi_teknis_uuid').val('');
                            $('#type_motor_spesifikasi_teknis_name').val('');
                        }
                    }
                }
            }); /*end spesifikasi_teknis galey*/
                                var params = {};
            params[csrf] = token;

            $('#type_motor_pemeliharaan_galery').fineUploader({
                template: 'qq-template-gallery',
                request: {
                    endpoint: BASE_URL + '/administrator/type_motor/upload_pemeliharaan_file',
                    params: params
                },
                deleteFile: {
                    enabled: true, // defaults to false
                    endpoint: BASE_URL + '/administrator/type_motor/delete_pemeliharaan_file'
                },
                thumbnails: {
                    placeholders: {
                        waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                        notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                    }
                },
                session: {
                    endpoint: BASE_URL + 'administrator/type_motor/get_pemeliharaan_file/<?= $type_motor->id_type_motor; ?>',
                    refreshOnRequest: true
                },
                multiple: false,
                validation: {
                    allowedExtensions: ["pdf"],
                    sizeLimit: 0,
                                    },
                showMessage: function(msg) {
                    toastr['error'](msg);
                },
                callbacks: {
                    onComplete: function(id, name, xhr) {
                        if (xhr.success) {
                            var uuid = $('#type_motor_pemeliharaan_galery').fineUploader('getUuid', id);
                            $('#type_motor_pemeliharaan_uuid').val(uuid);
                            $('#type_motor_pemeliharaan_name').val(xhr.uploadName);
                        } else {
                            toastr['error'](xhr.error);
                        }
                    },
                    onSubmit: function(id, name) {
                        var uuid = $('#type_motor_pemeliharaan_uuid').val();
                        $.get(BASE_URL + '/administrator/type_motor/delete_pemeliharaan_file/' + uuid);
                    },
                    onDeleteComplete: function(id, xhr, isError) {
                        if (isError == false) {
                            $('#type_motor_pemeliharaan_uuid').val('');
                            $('#type_motor_pemeliharaan_name').val('');
                        }
                    }
                }
            }); /*end pemeliharaan galey*/
                                var params = {};
            params[csrf] = token;

            $('#type_motor_sistem_kelistrikan_galery').fineUploader({
                template: 'qq-template-gallery',
                request: {
                    endpoint: BASE_URL + '/administrator/type_motor/upload_sistem_kelistrikan_file',
                    params: params
                },
                deleteFile: {
                    enabled: true, // defaults to false
                    endpoint: BASE_URL + '/administrator/type_motor/delete_sistem_kelistrikan_file'
                },
                thumbnails: {
                    placeholders: {
                        waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                        notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                    }
                },
                session: {
                    endpoint: BASE_URL + 'administrator/type_motor/get_sistem_kelistrikan_file/<?= $type_motor->id_type_motor; ?>',
                    refreshOnRequest: true
                },
                multiple: false,
                validation: {
                    allowedExtensions: ["pdf"],
                    sizeLimit: 0,
                                    },
                showMessage: function(msg) {
                    toastr['error'](msg);
                },
                callbacks: {
                    onComplete: function(id, name, xhr) {
                        if (xhr.success) {
                            var uuid = $('#type_motor_sistem_kelistrikan_galery').fineUploader('getUuid', id);
                            $('#type_motor_sistem_kelistrikan_uuid').val(uuid);
                            $('#type_motor_sistem_kelistrikan_name').val(xhr.uploadName);
                        } else {
                            toastr['error'](xhr.error);
                        }
                    },
                    onSubmit: function(id, name) {
                        var uuid = $('#type_motor_sistem_kelistrikan_uuid').val();
                        $.get(BASE_URL + '/administrator/type_motor/delete_sistem_kelistrikan_file/' + uuid);
                    },
                    onDeleteComplete: function(id, xhr, isError) {
                        if (isError == false) {
                            $('#type_motor_sistem_kelistrikan_uuid').val('');
                            $('#type_motor_sistem_kelistrikan_name').val('');
                        }
                    }
                }
            }); /*end sistem_kelistrikan galey*/
                                var params = {};
            params[csrf] = token;

            $('#type_motor_pemecahan_masalah_galery').fineUploader({
                template: 'qq-template-gallery',
                request: {
                    endpoint: BASE_URL + '/administrator/type_motor/upload_pemecahan_masalah_file',
                    params: params
                },
                deleteFile: {
                    enabled: true, // defaults to false
                    endpoint: BASE_URL + '/administrator/type_motor/delete_pemecahan_masalah_file'
                },
                thumbnails: {
                    placeholders: {
                        waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                        notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
                    }
                },
                session: {
                    endpoint: BASE_URL + 'administrator/type_motor/get_pemecahan_masalah_file/<?= $type_motor->id_type_motor; ?>',
                    refreshOnRequest: true
                },
                multiple: false,
                validation: {
                    allowedExtensions: ["pdf"],
                    sizeLimit: 0,
                                    },
                showMessage: function(msg) {
                    toastr['error'](msg);
                },
                callbacks: {
                    onComplete: function(id, name, xhr) {
                        if (xhr.success) {
                            var uuid = $('#type_motor_pemecahan_masalah_galery').fineUploader('getUuid', id);
                            $('#type_motor_pemecahan_masalah_uuid').val(uuid);
                            $('#type_motor_pemecahan_masalah_name').val(xhr.uploadName);
                        } else {
                            toastr['error'](xhr.error);
                        }
                    },
                    onSubmit: function(id, name) {
                        var uuid = $('#type_motor_pemecahan_masalah_uuid').val();
                        $.get(BASE_URL + '/administrator/type_motor/delete_pemecahan_masalah_file/' + uuid);
                    },
                    onDeleteComplete: function(id, xhr, isError) {
                        if (isError == false) {
                            $('#type_motor_pemecahan_masalah_uuid').val('');
                            $('#type_motor_pemecahan_masalah_name').val('');
                        }
                    }
                }
            }); /*end pemecahan_masalah galey*/
            

    

    async function chain() {
            }

    chain();




    }); /*end doc ready*/
</script>