<a href="#" class="btn btn-primary" data-toggle="modal" data-target=".modal">Ajouter une photo</a>

<div class="modal">
    <div class="modal-dialog">
        <form class="form-horizontal" action="addCarousel.php" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Ajouter une photo</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="addCarousel.php" method="POST">
                        <fieldset>
                            <div class="form-group">
                                <label for="inputContent" class="col-lg-2 control-label">Contenu</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputContent" name="inputContent" placeholder="Contenu Photo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputImg" class="col-lg-2 control-label">Upload photo</label>
                                <div class="col-lg-10">
                                    <input type="file" class="form-control" id="inputImg" name="inputImg">
                                </div>
                            </div>
                        </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>