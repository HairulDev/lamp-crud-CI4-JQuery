<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JQuery App</title>
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/datatables/css/jquery.dataTables.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/animate.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/fontawesome-free/css/all.css') ?>" rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/img/jquery.jpg'); ?>">
</head>

<style>
    body {
        background-color: #4babff;
    }

    input {
        border: 1px solid #a1a1a1;
        outline: none;
    }
</style>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div id="error-message" class="messages"></div>
            <div id="success-message" class="messages"></div>
            <div class="col-md-12">
                <div class="card formData d-none">
                    <div class="card-body">
                        <form action="#" id="form">
                            <div class="row">
                                <div class="form-group col-md-12 mb-2">
                                    <input type="hidden" value="" name="id" />
                                    <h5 class="modal-title">Modal title</h5>
                                </div>
                                <div class="form-group col-md-12 mb-3 text-center" id="photo-preview">
                                    <label class="control-label">Photo</label>
                                    (No photo)
                                    <span class="help-block"></span>
                                </div>
                                <div class="form-group col-md-6 mb-2">
                                    <input type="text" class="form-control" placeholder="Firstname" name="firstName" autocomplete="off">
                                </div>
                                <div class="form-group col-md-6 mb-2">
                                    <select name="hobi" class="form-control" required>
                                        <option value="" disabled selected>--Select Hobby--</option>
                                        <option value="Ngoding">Ngoding</option>
                                        <option value="Adventure">Adventure</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 mb-2">
                                    <input name="dob" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" autocomplete="off">
                                </div>
                                <!-- <div class="form-group col-md-6 mb-2">
                                    <input type="radio" value="Male" name="gender">Male
                                    <input type="radio" value="Female" name="gender">Female
                                </div> -->
                                <!-- <div class="form-group col-md-5">
                                    <input name="photo" type="file" id="fileSelect" class="form-control">
                                </div>
                                <div class="input-group col-md-4">
                                    <div class="removefoto"></div>
                                </div> -->
                                <div class="form-group col-md-1 mr-3">
                                    <button data-name="kembali" class="btn-act btn btn-warning">Back</button>
                                </div>
                                <div class="form-group col-md-1 text-right">
                                    <button type="submit" class="simpanBtn btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 text-center mt-n5">
                <div class="card mt-5" style="font-size: 14px;">
                    <div class="tableShow">
                        <div class="card-body">
                            <h3 class="text-center"><img src="<?= base_url('assets/img/ci.ico') ?>" width="60px" />
                              Codeigniter 4 + jQuery  <img src="<?= base_url('assets/img/jquery.jpg') ?>" width="100px" />
                            </h3>
                            <div class="card shadow animated fadeIn p-2">
                                <div class="float-left">
                                    <button data-name="tambah" class="float-left btn btn-act btn-outline-success btn-sm"><i class="fa fa-plus"></i> Add</button>
                                    <div class="float-right">
                                        <h6 class="text-right m-2 ">Data <i class="fa fa-align-left"></i></h6>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="mydata" class="table table-striped table-hover" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th style="width:10%"></th>
                                                <th>First Name</th>
                                                <!-- <th>Gender</th> -->
                                                <th>Hobby</th>
                                                <th>Date of Birth</th>
                                                <th>Photo</th>
                                                <th style="width:10%"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="show_data">
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end table show -->
                    <svg class="decoration-frame" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 192.275">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: #138ffc;
                                }
                            </style>
                        </defs>
                        <path class="cls-1" d="M0,158.755s63.9,52.163,179.472,50.736c121.494-1.5,185.839-49.738,305.984-49.733,109.21,0,181.491,51.733,300.537,50.233,123.941-1.562,225.214-50.126,390.43-50.374,123.821-.185,353.982,58.374,458.976,56.373,217.907-4.153,284.6-57.236,284.6-57.236V351.03H0V158.755Z" transform="translate(0 -158.755)" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {

        function table_list() {
            $.ajax({
                type: 'ajax',
                url: 'http://localhost/fullstackCI4jQuery/public/orang/show',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    data.map(element => {
                        html += `<tr class='infoSuccess-${element.id}'>`;
                        html += `<td class='center'><button data-name='hapus' data-id="${element.id}"" class='btn-act btn btn-outline-danger btn-sm' title='Hapus'><i class='fa fa-trash'></i> </button></td>`;
                        // html += `<td class='center'><button data-id="${element.id}"" class='hapusBtn btn  btn-outline-danger btn-sm' title='Hapus'><i class='fa fa-trash'></i> </button></td>`;
                        html += `<td>${element.firstName}</td>`;
                        // html += `<td>${element.gender}</td>`;
                        html += `<td>${element.hobi}</td>`;
                        html += `<td>${element.dob}</td>`;
                        html += `<td><img src="<?= base_url('upload/'); ?>${element.photo}" width="50px"></td>`;
                        html += `<td class='center'><button data-name='ubah' data-id="${element.id}"" class='btn btn-act btn-outline-info btn-sm' title='Ubah'><i class='fa fa-edit'></i> </a></td>`;
                        html += `</tr>`;
                    });
                    $("#show_data").html(html);
                }
            });
        }

        table_list();
        $('#mydata').dataTable();

        function reload_table() {
            table_list();
        }

        $(document).on("click", ".btn-act", function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');

            $('#form')[0].reset();
            $('#form').show();
            $('.formData').addClass("animated fadeInUp");
            $('.formData').removeClass("d-none");
            $('.tableShow').addClass("d-none");
            $('#photo-preview').show();
            $('#fileSelect').addClass("d-none");
            $('.removefoto').hide();
            $('.form-group').removeClass('has-error');
            $('.help-block').empty();

            if (name == 'tambah') {
                mode = 'add';
                $('.modal-title').text('Create Data');
                $('.simpanBtn').text('Save');
                $('#photo-preview').hide();
                $('#fileSelect').removeClass("d-none");
            }
            if (name == 'ubah') {
                mode = 'update';
                $('.modal-title').text('Update Data');
                $('.simpanBtn').text('Update');
                $('.removefoto').show();
            }
            if (name == 'hapus') {
                mode = 'delete';
                $('.modal-title').text('Delete Data');
                $('.simpanBtn').text('Delete');
                $('.removefoto').show();
            }
            if (name == 'kembali') {
                $('.formData').addClass("d-none");
                $('.tableShow').removeClass("d-none");
            }
            $.ajax({
                url: "http://localhost/fullstackCI4jQuery/public/orang/show/" + id,
                type: "GET",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(data) {
                    $('[name="id"]').val(data.id);
                    $('[name="firstName"]').val(data.firstName);
                    if (data.gender === "Male") {
                        $('[value="Male"]').attr('checked', true);
                        $('[value="Female"]').attr('checked', false);
                    } else if (data.gender === "Female") {
                        $('[value="Male"]').attr('checked', false);
                        $('[value="Female"]').attr('checked', true);
                    };
                    $('[name="hobi"]').val(data.hobi);
                    $('[name="dob"]').datepicker('update', data.dob);
                    if (data.photo) {
                        $('#label-photo').text('Change Photo');
                        $('#photo-preview').html(`<a href="#" class="changeProfile"><img src="upload/${data.photo}" class="img-responsive img-thumbnail" width="90px"></a>`); // show photo
                        $('.removefoto').html(`<input type="checkbox" name="remove_photo" value="${data.photo}"/> Remove photo`); // remove photo
                        $('#label-photo').hide();
                    } else {
                        $('#label-photo').text('Upload Photo');
                        $('#photo-preview').html('<a href="#" class="changeProfile">(No Image)</a>');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        });

        //ACTION FORM
        var postForm = $('#form');
        var jsonData = function(form) {
            var arrData = form.serializeArray(),
                objData = {};
            $.each(arrData, function(index, elem) {
                objData[elem.name] = elem.value;
            });
            return JSON.stringify(objData);
        };

        postForm.on('submit', function(e) {
            e.preventDefault();
            var btn = $('.simpanBtn');
            // var id = $(this).data('id');
            var id = $('[name="id"]').val();
            // var firstName = $('[name="firstName"]').val();
            // var gender = $('[name="gender"]').val();
            // var hobi = $('[name="hobi"]').val();
            // var dob = $('[name="dob"]').val();
            // var photo = $('[name="photo"]').val();
            var tr = $('.infoSuccess-' + id);
            var url;
            var btn = $('.simpanBtn');
            // var formData = new FormData($('#form')[0]);
            // formData.append('file', fileInput[0].files[0]);

            btn.append(' <i class="fa fa-spin fa-spinner fa-1x"></i>').attr('disabled', true);

            if (mode == 'add') {
                url = "http://localhost/fullstackCI4jQuery/public/orang/create";
                method = "POST";
                processData = false;
                contentType = false;
                // contentType = 'application/json';
            } else if (mode == 'update') {
                url = "http://localhost/fullstackCI4jQuery/public/orang/update/" + id;
                method = "PUT";
                processData = false;
                // data = formData;
                contentType = 'application/json';
            } else if (mode == 'delete') {
                url = "http://localhost/fullstackCI4jQuery/public/orang/delete/" + id;
                method = "DELETE";
                processData = true;
                contentType = 'application/json';
            }
            $.ajax({
                url: url,
                type: method,
                data: jsonData(postForm),
                crossDomain: true,
                contentType: contentType,
                // processData: processData,
                dataType: "JSON",
                success: function(data) {
                    Message(data.message, data.status);
                    console.log(jsonData(postForm));
                    $('#form')[0].reset();
                    $('.tableShow').removeClass("d-none");
                    btn.html('Save').attr('disabled', false);
                    tr.addClass('text-danger');
                    setTimeout(() => {
                        reload_table();
                    }, 500);
                    setTimeout(() => {
                        $('.formData').addClass("animated fadeOut");
                    }, 1200);
                    setTimeout(() => {
                        $('.formData').removeClass("animated fadeOut");
                        $('.formData').addClass("d-none");
                    }, 1700);
                    $('.simpanBtn').text('Save');
                    $('.simpanBtn').attr('disabled', false);
                }

            });
        });

        // $(document).on("click", ".hapusBtn", function(e) {
        //     e.preventDefault();
        //     var id = $(this).data('id');
        //     $.ajax({
        //         url: '<?= site_url('api/person/index_delete') ?>',
        //         type: "DELETE",
        //         data: {
        //             id: id
        //         },
        //         success: function(data) {
        //             reload_table();
        //         }
        //     });
        // });

        //Show Success or Error message
        function Message(message, status) {
            if (status == true) {
                $("#success-message").html(message).slideDown();
                $("#error-message").slideUp();
                setTimeout(function() {
                    $("#success-message").slideUp();
                }, 2000);

            } else if (status == false) {
                $("#error-message").html(message).slideDown();
                $("#success-message").slideUp();
                setTimeout(function() {
                    $("#error-message").slideUp();
                }, 2000);
            }
        }

    });
</script>
<style>
    #success-message,
    #error-message {
        background: #DEF1D8;
        color: green;
        font-size: 18px;
        padding: 4px;
        margin: 4px;
        display: none;
        position: fixed;
        right: 15px;
        top: 15px;
        z-index: 20;
        border-radius: 5px;
    }

    #error-message {
        background: #EFDCDD;
        color: red;
    }
</style>


<script src="<?= base_url('assets/jquery/jquery.easing.min.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script>
    $("input").change(function() {
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function() {
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function() {
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

    $(document).on("click", ".changeProfile", function(action) {
        $('#fileSelect').click();
    });
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
    });
</script>