<div class="px-4 py-3">
<h1 class="mb-3">Nouveau membre</h1>
    <?php echo form_open_multipart('user/register'); ?>
        <div class="">
            <div class="row">
                <div class="col-lg-6">
                    <div class="md-form mb-3">
                        <label data-error="wrong" data-success="right" for="form34">Nom</label>
                        <input type="text" name="firstname" class="form-control validate" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="md-form mb-3">
                        <label data-error="wrong" data-success="right" for="form34">Prénom</label>
                        <input type="text" name="lastname" class="form-control validate" required>
                    </div>                        
                </div>
            </div>

            <span class="d-block">Sexe:</span>

            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="male" name="gender" value="masculin" required>
                <label class="form-check-label" for="male">Masculin</label>
            </div>

            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="female" name="gender" value="feminin" required>
                <label class="form-check-label" for="female">Féminin</label>
            </div>

            <div class="md-form mb-3 mt-3">
                <label data-error="wrong" data-success="right" for="form34">Situation matrimoniale</label>
                <select name="familystatus" id="family_status" class="browser-default custom-select" style="height: 45px;">
                <option disabled selected>Choisir</option>
                <option value="Célibataire">Célibataire</option>             
                <option value="Fiancé(e)">Fiancé(e)</option>             
                <option value="Marié(e)">Marié(e)</option>            
                <option value="Divorcé(e)">Divorcé(e)</option>               
                </select>
            </div>
            <!-- Family -->
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <div class="md-form mb-3 mt-2">
                        <label data-error="wrong" data-success="right" for="form34">Nom du père</label>
                        <input type="text" name="father_name" class="form-control validate" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="md-form mb-3 mt-2">
                        <label data-error="wrong" data-success="right" for="form34">Nom de la mère</label>
                        <input type="text" name="mother_name" class="form-control validate" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="md-form mb-3 mt-2">
                        <label data-error="wrong" data-success="right" for="form34">Conjoint</label>
                        <input type="text" name="conjoint" class="form-control validate" required>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="md-form mb-3 mt-2">
                        <label data-error="wrong" data-success="right" for="form34">Contact</label>
                        <input type="text" name="conjoint_contact" class="form-control validate" placeholder="Contact conjoint" required>
                    </div>
                </div>   
                <div class="col-lg-3">
                    <div class="md-form mb-3 mt-2">
                        <label data-error="wrong" data-success="right" for="form34">Ayant droit</label>
                        <input type="text" name="successor" class="form-control validate" required>
                    </div>
                </div>   
                <div class="col-lg-3">
                    <div class="md-form mb-3 mt-2">
                        <label data-error="wrong" data-success="right" for="form34">contact</label>
                        <input type="text" name="successor_contact" class="form-control validate" placeholder="Contact ayant droit" required>
                    </div>
                </div>   
            </div>
            <hr>
            <!-- Contact -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="md-form mb-3 mt-2">
                        <label data-error="wrong" data-success="right" for="form34">Contact</label>
                        <input type="text" name="contact" class="form-control validate" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="md-form mb-3 mt-2">
                        <label data-error="wrong" data-success="right" for="form34">Adresse</label>
                        <input type="text" name="address" class="form-control validate" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="md-form mb-3 mt-2">
                        <label data-error="wrong" data-success="right" for="form34">CNI</label>
                        <input type="text" name="cni" class="form-control validate" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <div class="md-form mb-3">
                        <label data-error="wrong" data-success="right" for="form34">Nom d'utilisateur</label>
                        <input type="text" name="username" class="form-control validate" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="md-form mb-3">
                        <label data-error="wrong" data-success="right" for="form34">Role</label>
                        <select name="role" id="role" class="browser-default custom-select" style="height: 45px;">
                            <option disabled selected>Choisir...</option>
                            <option value="administrateur">Administrateur</option>               
                            <option value="membre">Membre</option>                        
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="md-form mb-3">
                        <label data-error="wrong" data-success="right" for="form34">Qualité</label>
                        <select name="title" id="title" class="browser-default custom-select" style="height: 45px;">
                            <option disabled selected>Choisir...</option>
                            <option value="Membre">Membre</option>
                            <option value="Fondateur">Fondateur</option>               
                            <option value="Président">Président</option>                
                            <option value="Vice President">Vice President</option>                
                            <option value="Secrétaire général">Secrétaire général</option>                
                            <option value="SGA">SGA</option>                
                            <option value="Trésorier">Trésorier</option>                
                            <option value="Comissaire aux comptes">Comissaire aux comptes</option>                
                            <option value="Censeur">Censeur</option>              
                            <option value="Censeur adjoint">Censeur adjoint</option>              
                            <option value="Membre Sage">Membre Sage</option>              
                            <option value="Conseiller">Conseiller</option>              
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="md-form mb-3 mt-2">
                        <label data-error="wrong" data-success="right" for="form34">Mot de passe</label>
                        <input type="password" name="password" class="form-control validate" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="md-form mb-3 mt-2">
                        <label data-error="wrong" data-success="right" for="form34">Confirmer mot de passe</label>
                        <input type="password" name="password2" class="form-control validate" required>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="md-form mt-2">
                        <span class="d-block mb-2">Photo</span>
                        <div class="file-field">
                            <label class="btn btn-light rounded-pill text-dark" data-success="right" for="photo"><i class="fa fa-camera mr-2 text-dark"></i> Choisir une photo</label>
                            <input class="d-none" type="file" id="photo" name="userfile">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-default" id="add_member">Enregistrer</button>
        </div>
    </form>
</div>