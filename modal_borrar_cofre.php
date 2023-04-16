
<div class="modal" tabindex="-1" id="modal_borrar_cofre">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title bg-danger">Borrar partida del cofre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Estás seguro que desea borrar la partida del cofre, <?php echo $_SESSION["usuario"] ?>?</p>
        <p>Esta acción no podrá ser revertida.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="modal_boton_borrar">Borrar</button>
      </div>
    </div>
  </div>
</div>