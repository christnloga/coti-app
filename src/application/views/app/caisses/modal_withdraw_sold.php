<!-- Modal 2 -->
<div class="modal fade pt-5" id="withdrawSoldModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify" role="document">
        <!--Content-->
        <div class="modal-content text-center px-4 pt-3">
            <?php echo form_open_multipart('Caisses/withdraw_sold'); ?>
            <!--Body-->
            <input type="hidden" name="caisse_id" value="<?php echo $caisse['id']; ?>">
            <input type="hidden" id="memberId" name="member_id">
            <input type="hidden" id="soldId" name="sold_id">
            <div class="form-group mb-3 mt-2 text-left">
                <input type="hidden" id="current_sold" name="sold" class="form-control validate">
            </div>
            <div class="form-group mb-3 mt-2 text-left">
                <label class="font-weight-bold" data-error="wrong" data-success="right" for="form34">Monatant du retrait</label>
                <input type="text" name="cach_out" class="form-control validate" required>
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