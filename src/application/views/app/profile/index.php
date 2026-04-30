<section class="py-4 px-4">
    <h1>Mon Profile</h1>
    <div class="card p-3 mt-3">
        <div class="row">
            <div class="image my-3 col-lg-4">
                <div class="profile-photo">
                    <img alt="Image placeholder" class="rounded" src="<?php echo site_url(); ?>assets/images/profile/<?php echo $user['photo']; ?>" style="width:100%;">
                    <div class="overlay"><a href="" class="btn btn-outline-white"><i class="fa fa-pen mr-1"></i> Modifier</a></div>
                </div>
                <?php echo form_open_multipart('user/update_photo'); ?>
                    <div class="input-group mb-3 px-2 py-2 bg-dark shadow-sm mt-3">
                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                        <input id="upload" type="file" name="userfile" class="form-control border-0 d-none">
                        <!-- <label id="upload-label" for="upload" class="font-weight-light text-muted d-none">Choose file</label> -->
                        <div class="input-group-append">
                            <label for="upload" class="btn btn-light m-0 rounded-pill px-4 border-0 text-white"> <i class="fa fa-camera mr-2 text-dark"></i><small class="text-uppercase font-weight-bold text-dark">Choisir photo</small></label>
                        </div>
                        <?php echo form_error('userfile', '<div class="text-danger ml-3 mt-2">', '</div>'); ?>
                        <button type="submit" class="btn btn-gradient-danger border-0">Enregistrer</button>
                    </div>
                </form>
            </div>
            <div class="info col-lg-8">                                
                <ul class="list-group list-group-flush mx-2">
                    <li class="list-group-item">
                        <p class="name mb-0 text-sm font-weight-bold mb-2">Nom: <span class="font-weight-500"><?php echo $user['first_name']; ?></span></p>
                    </li>
                    <li class="list-group-item">
                        <p class="name mb-0 text-sm font-weight-bold mb-2">Prénom: <span class="font-weight-500"><?php echo $user['last_name']; ?></span></p>
                    </li>
                    <li class="list-group-item">
                        <p class="name mb-0 text-sm font-weight-bold mb-2">Nom d'utilisateur: <span class="font-weight-500"><?php echo $user['username']; ?></span></p>
                    </li>
                    <li class="list-group-item">
                        <p class="name mb-0 text-sm font-weight-bold mb-2">Sex: <span class="font-weight-500"><?php echo $user['gender']; ?></span></p>
                    </li>
                    <li class="list-group-item">
                        <p class="name mb-0 text-sm font-weight-bold mb-2">Situation matrimoniale: <span class="font-weight-500"><?php echo $user['family_status']; ?></span></p>
                    </li>
                    <li class="list-group-item">
                        <p class="name mb-0 text-sm font-weight-bold mb-2">Contact: <span class="font-weight-500"><?php echo $user['contact']; ?></span></p>
                    </li>
                    <li class="list-group-item">
                        <p class="name mb-0 text-sm font-weight-bold mb-2">Adresse: <span class="font-weight-500"><?php echo $user['address']; ?></span></p>
                    </li>
                    <li class="list-group-item">
                        <p class="name mb-0 text-sm font-weight-bold mb-2">CNI: <span class="font-weight-500"><?php echo $user['cni']; ?></span></p>
                    </li>
                    <li class="list-group-item">
                        <p class="name mb-0 text-sm font-weight-bold mb-2 text-capitalize">Qualité: <span class="font-weight-500"><?php echo $user['title']; ?></span></p>
                    </li>
                    <li class="list-group-item">
                        <p class="name mb-0 text-sm font-weight-bold mb-2 text-capitalize">Role: <span class="font-weight-500"><?php echo $user['role']; ?></span></p>
                    </li>
                    <li class="list-group-item">
                        <p class="name mb-0 text-sm font-weight-bold mb-2 text-capitalize">Nom du père: <span class="font-weight-500"><?php echo $user['father_name']; ?></span></p>
                    </li>
                    <li class="list-group-item">
                        <p class="name mb-0 text-sm font-weight-bold mb-2 text-capitalize">Nom de la mère: <span class="font-weight-500"><?php echo $user['mother_name']; ?></span></p>
                    </li>
                    <li class="list-group-item">
                        <p class="name mb-0 text-sm font-weight-bold mb-2 text-capitalize">Conjoint: <span class="font-weight-500"><?php echo $user['conjoint']; ?>, <?php echo $user['conjoint_contact']; ?></span></p>
                    </li>
                    <li class="list-group-item">
                        <p class="name mb-0 text-sm font-weight-bold mb-2 text-capitalize">Ayant droit: <span class="font-weight-500"><?php echo $user['successor']; ?>, <?php echo $user['successor_contact']; ?></span></p>
                    </li>
                </ul>
                <a href="profile/edit" class="btn btn-default mt-4 ml-2"><i class="fa fa-pen mr-3"></i>Modifier</a>
            </div>
        </div>
    </div>
</section>