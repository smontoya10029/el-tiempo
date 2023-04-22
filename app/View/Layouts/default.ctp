<?php ?>
<?php
$Router = Router::url('/', true);
//pr($this->Session->read('Message.flash.0.params.class')).exit;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Sentsoft_Gh
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="<?php echo $Router; ?>paper-dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo $Router; ?>paper-dashboard/assets/css/paper-dashboard.css?v=2.0.2" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
    <link href="<?php echo $Router; ?>paper-dashboard/assets/demo/demo.css" rel="stylesheet" />
    <!--   Core JS Files   -->
    <!--<script src="<?php echo $Router; ?>paper-dashboard/assets/js/core/jquery.min.js"></script>-->
    <link href="<?php echo $Router; ?>paper-dashboard/assets/css/loading.css" rel="stylesheet" />
    <link href="<?php echo $Router; ?>css/jAlert-v4.css" rel="stylesheet" />
    <!--<script src="<?php echo $Router; ?>paper-dashboard/assets/js/datatable.js"></script>-->
    <!--<script src="<?php echo $Router; ?>paper-dashboard/assets/js/datatablebt4.js"></script>-->

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/fixedcolumns/3.3.0/css/fixedColumns.bootstrap4.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script>
    <script src="<?php echo $Router; ?>js/jAlert-v4.js"></script>
    <script src="<?php echo $Router; ?>js/jAlert-functions.min.js"></script>
</head>
<style>
    .btn-success-crear {
        background-color: #25075a !important;
        color: #FFF !important;
        border-radius: 10px !important;
    }

    .btn-success-crearcargo {
        background-color: #a92935 !important;
        color: #FFF !important;
        border-radius: 10px !important;
    }

    .btn-success-reporte {
        background-color: #2ba748 !important;
        color: #FFF !important;
        border-radius: 10px !important;
    }

    .btn-success-buscar {
        background-color: #59b16c9e !important;
        color: #FFF !important;
        border-radius: 10px !important;
    }

    .generar_reporte {
        background-color: #59b16c9e !important;
        color: #FFF !important;
        border-radius: 10px !important;
    }

    a::after {
        content: none !important;
    }

    table.dataTable {
        font-size: 12px !important;
    }

    #formBuscar {
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        padding: 20px;
    }

    .alert.alert-info {
        background-color: #f79ba4 !important;
        border-radius: 10px !important;
        text-align: center !important;
    }

    .alert.alert-default {
        background-color: #451198 !important;
        border-radius: 10px !important;
        text-align: center !important;
    }

    .main-panel {
        background-color: #FEF8F6 !important;
    }

    .navbar.navbar-transparent {
        background-color: #2E1A47 !important;
    }

    .navbar.navbar-transparent a:not(.dropdown-item):not(.btn) {
        color: #FFF !important;
    }

    .navbar-header {
        padding-left: 1290px;
        font-size: 25px;
    }

    .logo2 {
        width: 190px !important;
    }

    .off-canvas-sidebar[data-color=brown]:after,
    .sidebar[data-color=brown]:after {
        background: linear-gradient(to right, #2E1A47, #2E1A47);
    }

    .color-user {
        color: #FFF;
    }

    .off-canvas-sidebar .nav li>a,
    .sidebar .nav li>a {
        color: #F7BD00 !important;
    }

    .fa-handshake-o:before {
        color: #DCD8E7;
    }

    .sidebar-normal-sub {
        font-size: 12px;
    }

    .hide {
        display: none;
    }

    .ja_close {
        display: none !important;
    }
</style>

<body class="">
    <div class="cssload-dots hide" style="position: absolute;z-index: 99999999999999999999999999999999999999;">
        <div class="cssload-dot"></div>
        <div class="cssload-dot"></div>
        <div class="cssload-dot"></div>
        <div class="cssload-dot"></div>
        <div class="cssload-dot"></div>
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <filter id="goo">
                    <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="12"></feGaussianBlur>
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0	0 1 0 0 0	0 0 1 0 0	0 0 0 18 -7" result="goo"></feColorMatrix>
                    <!--<feBlend in2="goo" in="SourceGraphic" result="mix" ></feBlend>-->
                </filter>
            </defs>
        </svg>
    </div>
    <div class="wrapper">
        <?php if ($this->session->check('Message.flash')) : ?>
            <div data-notify="container" class="col-11 col-md-4 alert alert-<?php echo $this->Session->read('Message.flash.0.params.class'); ?> alert-with-icon" role="alert" data-notify-position="top-center" style="margin: 0px auto; position: absolute; z-index: 1060; top: 20px; left: 0px; right: 0px;">
                <button type="button" onclick="$(this).parent().addClass('hide');" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -13px; z-index: 1062;">
                    <i class="nc-icon nc-simple-remove"></i>
                </button>
                <span data-notify="icon" class="nc-icon nc-bell-55"></span>
                <span data-notify="title"></span>
                <span data-notify="message"><?php echo $this->session->flash(); ?></span>
                <a href="#" target="_blank" data-notify="url"></a>
            </div>
        <?php endif; ?>
        <?php echo $this->element('menu'); ?>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-icon btn-round">
                                <i class="nc-icon nc-minimal-right text-center visible-on-sidebar-mini"></i>
                                <i class="nc-icon nc-minimal-left text-center visible-on-sidebar-regular"></i>
                            </button>
                        </div>
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo" style="color:white">Gestion Humana</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item <?php echo ($this->Session->read('Auth.User.rol_id') != "1") ? 'hide' : ''; ?>">
                                <a class="nav-link btn-rotate" href="<?php echo $Router; ?>Configurations/index">
                                    <i style="color:white" class="nc-icon nc-settings-gear-65"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block" id="configuraciones">Opciones</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-rotate" href="<?php echo $Router; ?>Users/logout">
                                    <i style="color:white" class="fa fa-sign-out" aria-hidden="true"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block" id="configuraciones">Salida</span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <?= $this->fetch('content') ?>
                <input type="hidden" id="rol_id_identification" value="<?php echo ($this->Session->read('Auth.User.rol_id')) ?>" />
                <input type="hidden" id="user_id_identification" value="<?php echo ($this->Session->read('Auth.User.id')) ?>" />
            </div>
            <footer class="footer footer-black  footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="credits ml-auto">
                            <span class="copyright">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>, Elite Logistica y Rendimiento S.A.S
                            </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?php echo $Router; ?>paper-dashboard/assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo $Router; ?>paper-dashboard/assets/js/core/popper.min.js"></script>
    <script src="<?php echo $Router; ?>paper-dashboard/assets/js/core/bootstrap.min.js"></script>
    <!--<script src="<?php echo $Router; ?>paper-dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.js"></script>
    <!--  Notifications Plugin    -->
    <script src="<?php echo $Router; ?>paper-dashboard/assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo $Router; ?>paper-dashboard/assets/js/paper-dashboard.js" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.full.min.js"></script>
    <script src="<?php echo $Router; ?>paper-dashboard/assets/demo/demo.js"></script>
    <script>
        $(document).on('click', '.tooltips', function(e) {
            $("[data-toggle='tooltip']").tooltip('hide');
        });

        function menuclick(menuid, submenuid, url) {
            $.ajax({
                type: 'GET',
                url: check_dir() + 'Users/menuclick/' + menuid + '/' + submenuid,
                dataType: 'json',
                success: function(data) {
                    window.location.replace(url);
                }
            });
        }

        function loading(action) {
            if (action == true) {
                $(".cssload-dots").removeClass("hide");
                $(".content").addClass("disabledbutton");
            } else {
                $(".content").removeClass("disabledbutton");
                $(".cssload-dots").addClass("hide");
            }
        }

        function messages(mensaje, color) {
            $.notifyClose();
            $.notify({
                icon: ((color == 'success') ? "fa fa-check" : "fa fa-ban"),
                message: mensaje
            }, {
                newest_on_top: true,
                z_index: 9999999999999,
                type: color,
                timer: 2000,
                placement: {
                    from: 'top',
                    align: 'center'
                }
            });
        }

        function setFormValidationQ(FormId) {
            var idq = false;
            var contador = 0;
            $(".errormensaje").remove();
            $("#" + FormId + " textarea").each(function(index, value) {
                if ($(value).attr("required")) {
                    if ($(value).val() == "" || $(value).val() == null) {
                        $(value).attr("dataerroridentificador", contador);
                        $(value).parent('div').append("<error class='errormensaje' id='errormensaje" + contador + "' style='color:#b40000;font-weight: bold;font-size:8px;float: left;'>" + $(value).attr("text_error") + "</error>");
                        contador++;
                    } else {
                        $("#errormensaje" + $(value).attr("dataerroridentificador")).remove();
                    }
                }
            });
            $("#" + FormId + "input").each(function(index, value) {
                if ($(value).attr("required")) {
                    if ($(value).attr("type") == "text" || $(value).attr("type") == "date" || $(value).attr("type") == "password" || $(value).attr("type") == "file" || $(value).attr("type") == "number") {
                        if ($(value).val() == "" || $(value).val() == null) {
                            $(value).attr("dataerroridentificador", contador);
                            $(value).parent('div').append("<error class='errormensaje' id='errormensaje" + contador + "' style='color:#b40000;font-weight: bold;font-size:8px;float: left;'>" + $(value).attr("text_error") + "</error>");
                            contador++;
                        } else {
                            $("#errormensaje" + $(value).attr("dataerroridentificador")).remove();
                        }
                    }
                    if ($(value).attr("type") == "checkbox") {
                        if (!$(value).prop('checked')) {
                            $(value).attr("dataerroridentificador", contador);
                            $(value).parent('div').append("<error class='errormensaje' id='errormensaje" + contador + "' style='color:#b40000;font-weight: bold;font-size:8px;float: left;'>" + $(value).attr("text_error") + "</error>");
                            contador++;
                        } else {
                            $("#errormensaje" + $(value).attr("dataerroridentificador")).remove();
                        }
                    }
                    if ($(value).attr("type") == "email") {
                        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($(value).val())) {
                            $("#errormensaje" + $(value).attr("dataerroridentificador")).remove();
                        } else {
                            $(value).attr("dataerroridentificador", contador);
                            $(value).parent('div').append("<error class='errormensaje' id='errormensaje" + contador + "' style='color:#b40000;font-weight: bold;font-size:8px;float: left;'>" + $(value).attr("text_error") + "</error>");
                            contador++;
                        }
                    }
                }
            });
            $("#" + FormId + " select").each(function(index, value) {
                if ($(value).attr("required")) {
                    if ($(value).val() == "" || $(value).val() == null) {
                        $(value).attr("dataerroridentificador", contador);
                        $(value).parent('div').append("<error class='errormensaje' id='errormensaje" + contador + "' style='color:#b40000;font-weight: bold;font-size:8px;float: left;'>" + $(value).attr("text_error") + "</error>");
                        contador++;
                    } else {
                        $("#errormensaje" + $(value).attr("dataerroridentificador")).remove();
                    }
                }
            });
            if (contador > 0) {
                idq = false;
            } else {
                idq = true;
            }
            return idq;
        }

        function check_dir() {
            var link = document.URL;
            cantidad = link.split("/").length - 1;
            var pathArray = window.location.pathname.split('/');
            var ban = '//' + window.location.host + '/' + pathArray[1] + '/';
            return ban;
        }

        function check(e) {
            tecla = (document.all) ? e.keyCode : e.which;
            //Tecla de retroceso para borrar, siempre la permite
            if (tecla == 8) {
                return true;
            }
            // Patron de entrada, en este caso solo acepta numeros y letras
            patron = /[A-Za-z0-9]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }
    </script>
    <style>
        .dropdown-item.active,
        .dropdown-item:active {
            color: #fff;
            text-decoration: none;
            background-color: #84228c;
        }
    </style>
</body>

</html>