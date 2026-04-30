<!--Modal: modalRefillWallet-->
<div class="modal fade pt-5" id="modalRefillWallet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify" role="document">
        <!--Content-->
        <div class="modal-content px-4 pt-3">
            <?php echo form_open_multipart('Credits/refill_wallet'); ?>
            <!--Body-->
            <input type="hidden" value="<?php echo $wallet['sold']; ?>" id="sold" name="sold">
            <div class="md-form mb-3 mt-2">
                <label class="font-weight-bold" for="form34">Montant</label>
                <input type="text" name="amount" class="form-control validate" required>
            </div>

            <div class="md-form mb-3 mt-3">
                <label class="font-weight-bold" for="form34">Date</label>
                <input type="date" name="date" class="form-control validate" required>
            </div>

            <!--Footer-->
            <div class="text-center py-4">
                <button type="submit" class="btn btn-default waves-effect">Valider</button>
                <a type="button" class="btn btn-outline-default mr-2" data-dismiss="modal">Annuler</a>
            </div>
            </form>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: modalRefillWallet-->