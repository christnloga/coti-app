<div class="py-3 mx-3">
    <h1 class="mb-3">Modifier profil</h1>
    <?php echo form_open_multipart('user/update'); ?>
    <div class="modal-body">
        <input type="hidden" name="id" value="<?php echo $auser['id']; ?>">
        <div class="row">
            <div class="col-lg-6">
                <div class="md-form mb-3">
                    <label data-error="wrong" data-success="right" for="form34">Nom</label>
                    <input type="text" name="firstname" class="form-control validate" value="<?php echo $auser['first_name']; ?>" required>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="md-form mb-3">
                    <label data-error="wrong" data-success="right" for="form34">Prénom</label>
                    <input type="text" name="lastname" class="form-control validate" value="<?php echo $auser['last_name']; ?>" required>
                </div>
            </div>
        </div>

        <span class="d-block">Sexe:</span>

        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" id="male" name="gender" value="masculin" <?php if ($auser['gender'] == 'masculin') echo 'checked'; ?>>
            <label class="form-check-label" for="male">Masculin</label>
        </div>

        <div class="form-check form-check-inline">
            <input type="radio" class="form-check-input" id="female" name="gender" value="feminin" <?php if ($auser['gender'] == 'feminin') echo 'checked'; ?>>
            <label class="form-check-label" for="female">Féminin</label>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="md-form mb-3 mt-3">
                    <label data-error="wrong" data-success="right" for="form34">Situation matrimoniale</label>
                    <select name="familystatus" id="family_status" class="browser-default custom-select" style="height: 45px;">
                        <option disabled value="">Choisir...</option>
                        <option value="Célibataire" <?php if ($auser['family_status'] == 'Célibataire') echo 'selected'; ?>>Célibataire</option>
                        <option value="Fiancé(e)" <?php if ($auser['family_status'] == 'Fiancé(e)') echo 'selected'; ?>>Fiancé(e)</option>
                        <option value="Marié(e)" <?php if ($auser['family_status'] == 'Marié(e)') echo 'selected'; ?>>Marié(e)</option>
                        <option value="Divorcé" <?php if ($auser['family_status'] == 'Divorcé') echo 'selected'; ?>>Divorcé</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="md-form mb-3 mt-3">
                    <label data-error="wrong" data-success="right" for="form34">Qualité</label>
                    <select name="familystatus" id="family_status" class="browser-default custom-select" style="height: 45px;">
                        <option disabled value="">Choisir...</option>
                        <option value="Membre" <?php if ($auser['role'] == 'Membre') echo 'selected'; ?>>Membre</option>
                        <option value="Fondateur" <?php if ($auser['role'] == 'Fondateur') echo 'selected'; ?>>Fondateur</option>
                        <option value="Président" <?php if ($auser['role'] == 'Président') echo 'selected'; ?>>Président</option>
                        <option value="Vice President" <?php if ($auser['role'] == 'Vice President') echo 'selected'; ?>>Vice President</option>
                        <option value="Secrétaire général" <?php if ($auser['role'] == 'Secrétaire général') echo 'selected'; ?>>Secrétaire général</option>
                        <option value="SGA" <?php if ($auser['role'] == 'SGA') echo 'selected'; ?>>SGA</option>
                        <option value="Trésorier" <?php if ($auser['role'] == 'Trésorier') echo 'selected'; ?>>Trésorier</option>
                        <option value="Comissaire aux comptes" <?php if ($auser['role'] == 'Comissaire aux comptes') echo 'selected'; ?>>Comissaire aux comptes</option>
                        <option value="Censeur" <?php if ($auser['role'] == 'Censeur') echo 'selected'; ?>>Censeur</option>
                        <option value="Censeur adjoint" <?php if ($auser['role'] == 'Censeur adjoint') echo 'selected'; ?>>Censeur adjoint</option>
                        <option value="Membre Sage" <?php if ($auser['role'] == 'Membre Sage') echo 'selected'; ?>>Membre Sage</option>
                        <option value="Conseiller" <?php if ($auser['role'] == 'Conseiller') echo 'selected'; ?>>Conseiller</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="md-form mb-3 mt-3">
                    <label data-error="wrong" data-success="right" for="form34">Rôle</label>
                    <select name="familystatus" id="family_status" class="browser-default custom-select" style="height: 45px;">
                        <option disabled value="">Choisir...</option>
                        <option value="administrateur" <?php if ($auser['role'] == 'administrateur') echo 'selected'; ?>>Administrateur</option>
                        <option value="membre" <?php if ($auser['role'] == 'membre') echo 'selected'; ?>>Membre</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- Family -->
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <div class="md-form mb-3 mt-2">
                    <label data-error="wrong" data-success="right" for="form34">Nom du père</label>
                    <input type="text" name="father_name" class="form-control validate" value="<?php echo $auser['father_name']; ?>" required>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="md-form mb-3 mt-2">
                    <label data-error="wrong" data-success="right" for="form34">Nom de la mère</label>
                    <input type="text" name="mother_name" class="form-control validate" value="<?php echo $auser['mother_name']; ?>" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="md-form mb-3 mt-2">
                    <label data-error="wrong" data-success="right" for="form34">Conjoint</label>
                    <input type="text" name="conjoint" class="form-control validate" value="<?php echo $auser['conjoint']; ?>" required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="md-form mb-3 mt-2">
                    <label data-error="wrong" data-success="right" for="form34">Contact</label>
                    <input type="text" name="conjoint_contact" class="form-control validate" placeholder="Contact conjoint" value="<?php echo $auser['conjoint_contact']; ?>" required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="md-form mb-3 mt-2">
                    <label data-error="wrong" data-success="right" for="form34">Ayant droit</label>
                    <input type="text" name="successor" class="form-control validate" value="<?php echo $auser['successor']; ?>" required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="md-form mb-3 mt-2">
                    <label data-error="wrong" data-success="right" for="form34">contact</label>
                    <input type="text" name="successor_contact" class="form-control validate" placeholder="Contact ayant droit" value="<?php echo $auser['successor_contact']; ?>" required>
                </div>
            </div>
        </div>
        <hr>
        <!-- Contact -->
        <div class="row">
            <div class="col-lg-4">
                <div class="md-form mb-3 mt-2">
                    <label data-error="wrong" data-success="right" for="form34">Contact</label>
                    <input type="text" name="contact" class="form-control validate" value="<?php echo $auser['contact']; ?>" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="md-form mb-3 mt-2">
                    <label data-error="wrong" data-success="right" for="form34">Adresse</label>
                    <input type="text" name="address" class="form-control validate" value="<?php echo $auser['address']; ?>" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="md-form mb-3 mt-2">
                    <label data-error="wrong" data-success="right" for="form34">CNI</label>
                    <input type="text" name="cni" class="form-control validate" value="<?php echo $auser['cni']; ?>" required>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <div class="md-form mb-3">
                    <label data-error="wrong" data-success="right" for="form34">Nom d'utilisateur</label>
                    <input type="text" name="username" class="form-control validate" value="<?php echo $auser['username']; ?>" required>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-default" id="add_member">Enregistrer</button>
        </div>
        </form>
    </div>