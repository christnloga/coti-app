<!-- Modal: Add tontine -->
<div class="modal fade" id="modalAddTontine" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <?php echo form_open_multipart('tontine/save_tontine'); ?>
            <div class="modal-body mx-3">

                <div class="form-group mb-3 mt-2 text-left">
                    <label data-error="wrong" class="font-weight-bold" for="form34">Nom</label>
                    <input type="text" name="name" class="form-control validate" required>
                </div>
                <div class="form-group mb-3 mt-2 text-left">
                    <label data-error="wrong" class="font-weight-bold" for="form34">Montant</label>
                    <input type="text" name="amount" class="form-control validate" required>
                </div>

                <div class="md-form mt-3">
                    <label data-error="wrong" data-success="right" for="form34">Fréquence</label>
                    <select name="frequency" class="browser-default custom-select" style="height: 45px;">
                        <option disabled selected>Choisir</option>
                        <option value="Hebdomadaire">Hebdomadaire</option>
                        <option value="Mensuel">Mensuel</option>
                        <option value="Bi-mensuel">Bi-mensuel</option>
                        <option value="Tri-mensuel">Tri-mensuel</option>
                    </select>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-default waves-effect">Enregistrer</button>
                <a type="button" class="btn btn-outline-default waves-effect mr-2" data-dismiss="modal">Annuler</a>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal: Add tontine -->