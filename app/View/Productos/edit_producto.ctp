<?php ?>
<?php

$Router = Router::url('/', true);

?>

<?php ?>
<div id="divCreateGrupo">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body ">
                    <form method="POST" action="add_grupo" id="FormEditarGrupo">
                        <input type="hidden" name="data[Producto][id]" class="form-control text-center" value="<?php echo $producto["Producto"]["id"]; ?>">
                        <div class="row">
                        <div class="col-md-6">
                                <label class="control-label fa fa-user-o" style="font-size: 17px;"><strong></strong></label> <strong> PRODUCTO </strong>
                                <input type="text" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $producto['Producto']['nombre'];?>" name="data[Charge][producto]" class="form-control text-center" required>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label fa fa-user-o" style="font-size: 17px;"><strong></strong></label> <strong> $VALOR </strong>
                                <input type="number" onkeyup="this.value = this.value.toUpperCase();" name="data[Producto][valor]" value="<?php echo $producto['Producto']['valor'];?>" class="form-control text-center" required>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    form = $('#form_document').serializeArray()
    json.parse(form);
    let link = '<?php echo $endpoint; ?>/v1/editproducto';

    $.ajax({
        type: "PUT",
        url: link,
        dataType: "json",
        data: {
            form
        }  
        success: function(d){
            console.log("se editar correctamente el producto")
        },
        error: function(xhr, status, error){
            console.error("Ocurrio un error al envio el objeto JSON", error);
        }
    });
</script>