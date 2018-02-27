<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" type="button">
                    ×
                </button>
                <h4 class="modal-title">
                    Confirmacion
                </h4>
            </div>
            <div class="modal-body">
                <p>
                    ¿Esta completamente seguro de eliminar Usuario?
                </p>
            </div>
            <div class="modal-footer">
                <form action='{!!url("users")!!}' class="form-horizontal" id="idFormDelete" method="GET">
                    <button class="btn btn-default" type="submit">
                        Si
                    </button>
                    <button class="btn btn-default" data-dismiss="modal" type="button">
                        No
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>