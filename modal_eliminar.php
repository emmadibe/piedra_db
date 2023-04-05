
<div class="modal" tabindex="-1" id="modal_eliminar_usuario">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-danger">
            <h5 class="modal-title ">ADVERTENCIA, <?php echo strtoupper ($_SESSION["usuario"]) ?>!!</h5>
            <!-- strtoupper es una función de PHP que convierte a todas las letras del string entre paréntesis en mayúsculas. -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>¿Está seguro de eliminar al usuario?</p>
    
            <p>Esta accion no se puede revertir.</p>
        </div>

             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <a id="modal_eliminar_usuario_usuario" class="btn btn-danger">Eliminar a  </a>
    </div>
    </div>
</div>
