<div class="fade modal" id="modalEliminaContenido" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="tituloModal">
                   Eliminar contenido 
                </h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;
                    </span>
                </button>
            </div>
            <form method="post" action="./php/pagina/eliminaContenido.php">
                <div class="modal-body">
                    <label>
                        Se va a eliminar el articulo.<br>¿Deseas continuar?
                    </label>
                    <div class="invisible">
                        <input id="contenidoId" name="contenidoId">
                    </div>
                </div>
                <div class="modal-footer">
                    <buttton type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cerrar
                    </buttton>
                    <button class="btn btn-success btn-primary" type="submit">
                        Aceptar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>