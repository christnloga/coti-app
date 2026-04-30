    <!-- New Seance Modal -->
    <div class="modal fade pt-5" id="newSeanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-notify" role="document">
            <!--Content-->
            <div class="modal-content px-4 pt-3">
				<div class="bg-secondary p-3 mb-3 rounded">
					<span class="text-danger text-sm"><strong>Important! </strong>Assurez-vous d'avoir ajouté tout les membre qui participeront à cette session avant de créer une séance</span>
				</div>
                <?php echo form_open_multipart('Tontine/create_seance'); ?>
                <!--Body-->
                <input type="hidden" class="font-weight-bold" name="session_id" value="<?php echo $session['sess_id']; ?>">
                <input type="hidden" class="font-weight-bold" name="tontine_id" value="<?php echo $session['tontine_id']; ?>">
                <div class="form-group mb-3 mt-2 text-left">
                    <label data-error="wrong" class="font-weight-bold" for="form34">Choisir date de séance</label>
                    <input type="date" name="date" class="form-control validate" required>
                </div>

                <!--Footer-->
                <div class="flex-center text-center py-4">
                    <button type="submit" class="btn btn-default waves-effect">Enregistrer</button>
                    <a type="button" class="btn btn-danger text-white waves-effect mr-2" data-dismiss="modal">Annuler</a>
                </div>
                </form>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- New Seance Modal -->
