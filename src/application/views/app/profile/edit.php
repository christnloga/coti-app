<section class="py-4 px-4">
    <?php if($user['role'] == 'administrateur') : ?>
    <div class="part-one">
        <?php echo form_open_multipart('user/update'); ?>
        <div class="">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div class="row">
                <div class="col-lg-6">
                    <div class="md-form mb-3">
                        <label data-error="wrong" data-success="right" for="form34">Nom</label>
                        <input type="text" name="firstname" class="form-control validate" value="<?php echo $user['first_name']; ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="md-form mb-3">
                        <label data-error="wrong" data-success="right" for="form34">Prénom</label>
                        <input type="text" name="lastname" class="form-control validate" value="<?php echo $user['last_name']; ?>">
                    </div>
                </div>
            </div>

            <span class="d-block">Sexe:</span>

            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="male" name="gender" value="masculin" <?php if ($user['gender'] == 'masculin') echo 'checked'; ?>>
                <label class="form-check-label" for="male">Masculin</label>
            </div>

            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="female" name="gender" value="feminin" <?php if ($user['gender'] == 'feminin') echo 'checked'; ?>>
                <label class="form-check-label" for="female">Féminin</label>
            </div>
            
            <div class="row">
                <div class="col-lg-4">
                    <div class="md-form mb-3 mt-3">
                        <label data-error="wrong" data-success="right" for="form34">Situation matrimoniale</label>
                        <select name="familystatus" id="family_status" class="browser-default custom-select" style="height: 45px;" required>
                        <option disabled value="">Choisir...</option>
                        <option value="Célibataire" <?php if ($user['family_status'] == 'Célibataire') echo 'selected'; ?>>Célibataire</option>
                        <option value="Fiancé(e)" <?php if ($user['family_status'] == 'Fiancé(e)') echo 'selected'; ?>>Fiancé(e)</option>  
                        <option value="Marié(e)" <?php if ($user['family_status'] == 'Marié(e)') echo 'selected'; ?>>Marié(e)</option>
                        <option value="Divorcé" <?php if ($user['family_status'] == 'Divorcé') echo 'selected'; ?>>Divorcé</option>    
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="md-form mb-3 mt-3">
                        <label data-error="wrong" data-success="right" for="form34">Qualité</label>
                        <select name="title" id="title" class="browser-default custom-select" style="height: 45px;" required>
                        <option disabled value="">Choisir...</option>
                        <option value="Membre" <?php if ($user['role'] == 'Membre') echo 'selected'; ?>>Membre</option>               
                        <option value="Fondateur" <?php if ($user['role'] == 'Fondateur') echo 'selected'; ?>>Fondateur</option>               
                        <option value="Président" <?php if ($user['role'] == 'Président') echo 'selected'; ?>>Président</option>                
                        <option value="Vice President" <?php if ($user['role'] == 'Vice President') echo 'selected'; ?>>Vice President</option>                
                        <option value="Secrétaire général" <?php if ($user['role'] == 'Secrétaire général') echo 'selected'; ?>>Secrétaire général</option>                
                        <option value="SGA" <?php if ($user['role'] == 'SGA') echo 'selected'; ?>>SGA</option>                
                        <option value="Trésorier" <?php if ($user['role'] == 'Trésorier') echo 'selected'; ?>>Trésorier</option>                
                        <option value="Comissaire aux comptes" <?php if ($user['role'] == 'Comissaire aux comptes') echo 'selected'; ?>>Comissaire aux comptes</option>                
                        <option value="Censeur" <?php if ($user['role'] == 'Censeur') echo 'selected'; ?>>Censeur</option>              
                        <option value="Censeur adjoint" <?php if ($user['role'] == 'Censeur adjoint') echo 'selected'; ?>>Censeur adjoint</option>              
                        <option value="Membre Sage" <?php if ($user['role'] == 'Membre Sage') echo 'selected'; ?>>Membre Sage</option>              
                        <option value="Conseiller" <?php if ($user['role'] == 'Conseiller') echo 'selected'; ?>>Conseiller</option>
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
                        <input type="text" name="father_name" class="form-control validate" value="<?php echo $user['father_name']; ?>" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="md-form mb-3 mt-2">
                        <label data-error="wrong" data-success="right" for="form34">Nom de la mère</label>
                        <input type="text" name="mother_name" class="form-control validate" value="<?php echo $user['mother_name']; ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="md-form mb-3 mt-2">
                        <label data-error="wrong" data-success="right" for="form34">Conjoint</label>
                        <input type="text" name="conjoint" class="form-control validate" value="<?php echo $user['conjoint']; ?>" required>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="md-form mb-3 mt-2">
                        <label data-error="wrong" data-success="right" for="form34">Contact</label>
                        <input type="text" name="conjoint_contact" class="form-control validate" placeholder="Contact conjoint" value="<?php echo $user['conjoint_contact']; ?>" required>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="md-form mb-3 mt-2">
                        <label data-error="wrong" data-success="right" for="form34">Ayant droit</label>
                        <input type="text" name="successor" class="form-control validate" value="<?php echo $user['successor']; ?>" required>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="md-form mb-3 mt-2">
                        <label data-error="wrong" data-success="right" for="form34">contact</label>
                        <input type="text" name="successor_contact" class="form-control validate" placeholder="Contact ayant droit" value="<?php echo $user['successor_contact']; ?>" required>
                    </div>
                </div>
            </div>
            <hr>
            <!-- Contact -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="md-form mb-3 mt-2">
                        <label data-error="wrong" data-success="right" for="form34">Contact</label>
                        <input type="text" name="contact" class="form-control validate" value="<?php echo $user['contact']; ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="md-form mb-3 mt-2">
                        <label data-error="wrong" data-success="right" for="form34">Adresse</label>
                        <input type="text" name="address" class="form-control validate" value="<?php echo $user['address']; ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="md-form mb-3 mt-2">
                        <label data-error="wrong" data-success="right" for="form34">CNI</label>
                        <input type="text" name="cni" class="form-control validate" value="<?php echo $user['cni']; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="md-form mb-3">
                        <label data-error="wrong" data-success="right" for="form34">Nom d'utilisateur</label>
                        <input type="text" name="username" class="form-control validate" value="<?php echo $user['username']; ?>">
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-6 col-sm-12">
                    <div class="md-form">
                        <div class="file-field">
                            <label data-success="right" for="form34">Photo</label>
                            <input type="file" name="userfile">
                        </div>
                    </div>
                </div> -->
        </div>
        <button type="submit" class="btn btn-default mt-3" id="add_member">Enregistrer</button>
        </form>
    </div>
    <hr>
    <?php endif; ?>
    <div class="part-two pt-2">
        <h3 class="">Changer mot de pass</h3>
        <?php echo form_open_multipart('user/update_password'); ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="md-form mb-3 mt-2">
                    <label data-error="wrong" data-success="right" for="form34">Mot de passe</label>
                    <input type="password" name="password" class="form-control validate">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="md-form mb-3 mt-2">
                    <label data-error="wrong" data-success="right" for="form34">Confirmer mot de passe</label>
                    <input type="password" name="password2" class="form-control validate">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-default mt-3" id="add_member">Enregistrer</button>
        </form>
    </div>
</section>