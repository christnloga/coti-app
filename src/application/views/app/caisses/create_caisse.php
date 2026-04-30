<!--Modal: modalNewCaisse-->
<div class="modal fade pt-5" id="modalNewCaisse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify" role="document">
        <!--Content-->
        <div class="modal-content text-center px-4 pt-3">
            <?php echo form_open_multipart('Caisses/create'); ?>
            <!--Body-->
            <div class="md-form mb-3 mt-2">
                <label data-error="wrong" data-success="right" for="form34">Nom de la caisse</label>
                <input type="text" name="name" class="form-control validate" required>
            </div>

            <!--Footer-->
            <div class="flex-center py-4">
                <button type="submit" class="btn btn-default waves-effect">Créer</button>
                <a type="button" class="btn btn-outline-default mr-2" data-dismiss="modal">Annuler</a>
            </div>
            </form>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: modalNewCaisse-->