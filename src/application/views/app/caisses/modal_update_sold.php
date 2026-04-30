<!-- Modal 2 -->
<div class="modal fade pt-5" id="updateSoldModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify" role="document">
        <!--Content-->
        <div class="modal-content text-center px-4 pt-3">
            <?php echo form_open_multipart('Caisses/update_sold'); ?>
            <!--Body-->
            <input type="hidden" name="caisse_id" value="<?php echo $caisse['id']; ?>">
            <input type="hidden" id="member_id" name="member_id">
            <input type="hidden" id="sold_id" name="sold_id">
            <div class="form-group mb-3 mt-2 text-left">
                <!-- <label data-error="wrong" data-success="right" for="form34">Sold actuel</label> -->
                <input type="hidden" id="sold" name="sold" class="form-control validate">
            </div>
            <div class="form-group mb-3 mt-2 text-left">
                <label class="font-weight-bold" data-error="wrong" data-success="right" for="form34">Montant du dépôt</label>
                <input type="text" name="cach_in" class="form-control validate" required>
            </div>
            <div class="form-group mb-3 mt-2 text-left">
                <label class="font-weight-bold" data-error="wrong" data-success="right" for="form34">Date</label>
                <input type="date" name="date" class="form-control validate" required>
            </div>

            <!--Footer-->
            <div class="flex-center py-4">
                <button type="submit" class="btn btn-default waves-effect">Valider</button>
                <a type="button" class="btn btn-outline-default waves-effect mr-2" data-dismiss="modal">Annuler</a>
            </div>
            </form>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Modal 2 -->