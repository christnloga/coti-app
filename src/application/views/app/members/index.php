    <!-- Page content -->
    <div class="container-fluid mt-3">
        <div class="row mb-5">
            <div class="col-8">
                <h2 class="text-uppercase mb-0">Liste des membres</h2>
            </div>
            <div class="col-4 d-md-block text-right">
                <a href="membre/new" class="btn bg-default text-white border-0" roll="btn">
                    <i class="fa fa-plus"></i> Ajouter membre
                </a>
            </div>
        </div>

        <!--Modal: modalConfirmDelete-->
        <div class="modal fade pt-5" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-notify" role="document">
                <!--Content-->
                <div class="modal-content text-center">
                    <form method="post" id="delete_form">
                        <!--Body-->
                        <div class="modal-body">
                            <h4 class="card-title text-danger">Etes vous sûr ?</h4>

                            <i class="fas fa-times fa-4x mt-4 text-danger animated rotateIn"></i>

                        </div>

                        <input type="hidden" id="id_input" name="delete_id">

                        <!--Footer-->
                        <div class="flex-center py-4">
                            <button type="submit" class="btn btn-danger waves-effect">Oui, supprimer</button>
                            <a type="button" class="btn btn-info text-white waves-effect mr-2" data-dismiss="modal">Annuler</a>
                        </div>
                    </form>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!--Modal: modalConfirmDelete-->

        <div class="card members-card pb-3">
            <div class="card-header mb-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Liste des membres</h3>
                    </div>
                    <div class="col text-right"><?php echo $users_count; ?> membres</div>
                </div>
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <?php if ($users) : ?>
                    <table class="table align-items-center table-flush" id="myTable">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Nom d'utilisateur</th>
                                <th scope="col">Qualité</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Addresse</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) : ?>
                                <tr class="<?php if($user['first_name'] == 'Colomb'){ echo 'text-primary'; } ?>">
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <a href="#" class="avatar rounded-circle mr-3 overflow-hidden">
                                                <img alt="Image placeholder" src="<?php echo site_url(); ?>assets/images/profile/<?php echo $user['photo']; ?>">
                                            </a>
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm"><?php echo $user['first_name']; ?></span>
                                            </div>
                                        </div>
                                    </th>
                                    <td>
                                        <span class="name mb-0 text-sm"><?php echo $user['last_name']; ?></span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="name mb-0 text-sm"><?php echo $user['username']; ?></span>
                                            <span class="name mb-0 text-sm text-muted">mot de pass: <?php echo $user['pass_readable']; ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="name mb-0 text-sm"><?php echo $user['title']; ?></span>
                                    </td>
                                    <td>
                                        <span class="name mb-0 text-sm"><?php echo $user['contact']; ?></span>
                                    </td>
                                    <td>
                                        <span class="name mb-0 text-sm"><?php echo $user['address']; ?></span>
                                    </td>
                                    <td>

                                        <span class="nav-item dropdown">
                                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <div class="media align-items-center">
                                                    <i class="fas fa-ellipsis-h mr-2"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?php echo site_url('membres/' . $user['id']); ?>">
                                                    <i class="fa fa-eye fa-lg"></i>
                                                    Détails
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="<?php echo site_url('membre/modifier/' . $user['id']); ?>" class="dropdown-item text-success">
                                                    <i class="fa fa-pen fa-lg"></i>
                                                    <span>Modifier</span>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item text-danger delete_member" id="<?php echo $user['id']; ?>">
                                                    <i class="fa fa-trash fa-lg"></i>
                                                    <span>Supprimer</span>
                                                </a>
                                            </div>
                                        </span>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p class="text-muted lead">No Categories Yet</p>
                <?php endif; ?>
            </div>
        </div>