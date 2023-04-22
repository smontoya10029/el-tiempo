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
                    <form method="POST" action="add_producto" id="FormCreateProducto">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label fa fa-user-o" style="font-size: 17px;"><strong></strong></label> <strong> PRODUCTO </strong>
                                <input type="text" onkeyup="this.value = this.value.toUpperCase();" name="data[Charge][producto]" class="form-control text-center" required>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label fa fa-user-o" style="font-size: 17px;"><strong></strong></label> <strong> $VALOR </strong>
                                <input type="number" onkeyup="this.value = this.value.toUpperCase();" name="data[Charge][valor]" class="form-control text-center" required>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.add').on('change', function(e){
        
    })
</script>