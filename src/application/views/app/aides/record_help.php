<!--Modal: modalNewHelp-->
<div class="modal fade pt-5" id="modalNewHelp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify" role="document">
        <!--Content-->
        <div class="modal-content px-4 pt-3">
            <?php echo form_open_multipart('Aides/create'); ?>
            <!--Body-->
            <input type="hidden" id="member_id" name="member_id">
            <div class="md-form mb-3 mt-2">
                <label class="font-weight-bold" for="form34">Somme</label>
                <input type="text" name="amount" class="form-control validate" required>
            </div>

            <div class="md-form mt-3">
                <label class="font-weight-bold" for="form34">Motif</label>
                <select name="type_id" class="browser-default custom-select" style="height: 45px;">
                    <option disabled selected>Choisir</option>
                    <?php foreach ($helptypes as $row) : ?>
                        <option value="<?php echo $row['type_id']; ?>"><?php echo $row['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="md-form mt-3">
                <label class="font-weight-bold" for="form34">Provénance</label>
                <select name="source" class="browser-default custom-select" style="height: 45px;">
                    <option disabled selected>Choisir</option>
                    <?php foreach ($caisses as $caisse) : ?>
                        <option value="<?php echo $caisse['id']; ?>"><?php echo $caisse['name']; ?></option>
                    <?php endforeach; ?>
                </select>
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
<!--Modal: modalNewHelp-->
