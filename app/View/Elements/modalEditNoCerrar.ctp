<?php ?>
<div align="center" class="modal fade" id="<?php echo isset($id) ? $id : 'modalAddNoCerrar'; ?>" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" style="max-width: <?php echo $width;?>!important;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo isset($titulo) ? $titulo : ''; ?></h4>
            </div>
            <div class="modal-body contenidoModalNoCerrar" style="padding: 2px;"></div>
            <div style="padding-bottom: 10px; padding-right: 20px;" class="botones" align="right">
                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-warning btn-sm Edit <?php echo ($hide_guardar == "true") ? 'hide': '';?>">Editar</button>
            </div>
        </div>
    </div>
</div>
