<?php ?>
<?php

$Router = Router::url('/', true);

?>

<div id="gruposorg">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div align="left">
                        </h4><strong>INFORMACION:</strong> modulo validacion producto</h4>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div align="center">
                        <strong>MODULO DE PRODUCTO</strong>
                        <div align="right">
                            <button class="btn btn-success-crear btnNuevo" id="btnNuevo" data_id="nuevo" style="margin-top: 100px;">
                                <strong class="fa fa-save"></strong> CARGOS
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Listado De Productos</h4>
                </div>
                <div class="card-body">
                    <table id="tablaempleado" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>PRODUCTO</th>
                                <th>$VALOR</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->element('modalAddNoCerrar', array('titulo' => '', 'hide_guardar' => 'false', 'width' => '90%', 'id' => 'modal_create')); ?>
<?php echo $this->element('modalEditNoCerrar', array('titulo' => '', 'hide_guardar' => 'false', 'width' => '90%', 'id' => 'modal_edit')); ?>
<?php echo $this->element('modalGuardarNoCerrar', array('titulo' => '', 'hide_guardar' => 'false', 'width' => '90%', 'id' => 'modal_user')); ?>

<script type="text/javascript">
    var tablaempleado;
    $("#gruposorg").ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $('#gruposorg #tablaproducto').mouseover(function() {
            $('.tooltips').tooltip();
        });
        var aLengthMenu = ["10", "25", "50", "100"];
        tablaempleado = $('#tablaproducto').DataTable({
            bDestroy: true,
            scrollY: true,
            scrollX: true,
            scrollCollapse: true,
            fixedColumns: true,
            aLengthMenu: aLengthMenu,
            iDisplayLength: 10,
            bProcessing: true,
            bServerSide: true,
            aaSorting: [
                [0, "DESC"]
            ],
            sAjaxSource: check_dir() + "CommunityOrgs/inicio",
            sServerMethod: "POST",
            fnServerParams: function(aoData) {
                aoData.push(

                );
            },
            language: {
                url: check_dir() + 'paper-dashboard/assets/json/datatable_spanish.json'
            }
        });
        $("#gruposorg").on('click', '.btnNuevo', function(e) {
            loading(true);
            var data_id = $(this).attr("data_id");
            e.preventDefault();
            $("#modal_create").modal("show");
            $('#modal_create .contenidoModalNoCerrar > *').html();
            $.ajax({
                method: 'GET',
                url: check_dir() + 'Productos/add_producto/',
                data: {}
            }).done(function(html) {
                loading(false);
                $('#modal_create .contenidoModalNoCerrar').html($(html));
                $('#modal_create .modal-title').html('NUEVO PRODUCTO');
            }).fail(function(html) {
                loading(false);
                alert("Mensaje", "ERROR: (" + html + ").");
            });
        });
        $("#modal_create").on('click', '.Add', function(e) {
            if (setFormValidationQ("FormCreateProducto")) {
                $("#FormCreateProducto").submit();
            }
        });
        $("#gruposorg").on('click', '.btnEdit', function(e) {
            loading(true);
            var data_id = $(this).attr("data_id");
            e.preventDefault();
            $("#modal_edit").modal("show");
            $('#modal_edit .contenidoModalNoCerrar > *').html();
            $.ajax({
                method: 'GET',
                url: check_dir() + 'Productos/edit_producto/' + data_id,
                data: {}
            }).done(function(html) {
                loading(false);
                $('#modal_edit .contenidoModalNoCerrar').html($(html));
                $('#modal_edit .modal-title').html('EDITAR GRUPO');
            }).fail(function(html) {
                loading(false);
            });
        });
        $("#modal_edit").on('click', '.Edit', function(e) {
            if (setFormValidationQ("FormEditarGrupo")) {
                $("#FormEditarGrupo").submit();
            }
        });
    });
</script>