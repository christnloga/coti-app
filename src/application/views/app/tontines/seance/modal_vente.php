<!-- Modal: Vente -->
<div class="modal fade" id="modalVente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <?php echo form_open_multipart('tontine/record_sale'); ?>
            <div class="modal-body mx-3">

                <input type="hidden" class="font-weight-bold" name="seance_id" value="<?php echo $seance['id']; ?>">
                <input type="hidden" class="font-weight-bold" name="session_id" value="<?php echo $seance['session_id']; ?>">
                <input type="hidden" class="font-weight-bold" name="tontine_id" value="<?php echo $seance['tontine_id']; ?>">
                <!-- <input type="hidden" class="font-weight-bold" name="total_amount" value="<?php echo $total_amount; ?>"> -->

                <div class="form-group mb-3 mt-2 text-left">
                    <label class="font-weight-bold" for="form34">Montant</label>
                    <input type="text" name="amount" class="form-control validate" required>
                </div>
                <div class="form-group mb-3 mt-2 text-left">
                    <label class="font-weight-bold" for="form34">Coût</label>
                    <input type="text" name="cost" class="form-control validate" required>
                </div>
                <div class="md-form mt-3">
                    <label class="font-weight-bold" for="form34">Bénéficiare</label>
                    <select name="user_id" class="browser-default custom-select" style="height: 45px;">
                        <option disabled selected>Choisir</option>
                        <?php foreach ($members as $member) : ?>
                            <option value="<?php echo $member['id']; ?>"><?php echo $member['first_name']; ?> <?php echo $member['last_name']; ?> <?php echo $member['user_label']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="md-form mt-3">
                    <label class="font-weight-bold" for="form34">Confirmer Bénéficiare</label>
                    <select name="user_label" class="browser-default custom-select" style="height: 45px;">
                        <option disabled selected>Choisir</option>
                        <?php foreach ($members as $member) : ?>
                            <option value="<?php echo $member['user_label']; ?>"><?php echo $member['first_name']; ?> <?php echo $member['last_name']; ?> <?php echo $member['user_label']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-3 mt-2 text-left">
                    <label data-error="wrong" class="font-weight-bold" for="form34">Date</label>
                    <input type="date" name="date" class="form-control validate" required>
                </div>


            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-default waves-effect mr-2 text-white">Valider</button>
                <a type="button" class="btn btn-outline-default waves-effect mr-2" data-dismiss="modal">Annuler</a>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal: Vente -->
