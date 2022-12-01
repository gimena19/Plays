<div class="modal fade" id="modalAgregaContenido" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="tituloModal">Agrega contenido</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form class ="form-horizontal" id="formContenido" method="POST" action="php/pagina/agregaContenido.php">
                        <div class="form-group ">
                            <label for="titulo">Titulo:</label>
                            <input class="form-control" name="titulo" id="titulo" type="text" maxlength="30" placeholder="Titulo de la entrada:">
                        </div>
                        <div class="form-group">
                            <label for="contenido">Contenido:</label>
                            <textarea class="form-control" rows="10" name="contenido" id="contenido" maxlength="1000" placeholder="Escribe la entrada"></textarea>
                        </div>
                        <div class="invisible">
                            <input name="paginaId" value="<?php echo $paginaId;?>">
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <button class="btn btn-success" name="contenidoId" id="modalButton" type="submit">Agregar</button>
                            </div>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </div>
</div>