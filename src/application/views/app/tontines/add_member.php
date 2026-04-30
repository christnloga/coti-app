    <!-- Modal -->
    <div class="modal fade" id="addMembersModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <?php if ($users) : ?>
                            <table class="table align-items-center table-flush" id="membersModal">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user) : ?>
                                        <tr>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <a href="#" class="avatar rounded-circle mr-3 overflow-hidden">
                                                        <img alt="Image placeholder" src="<?php echo site_url(); ?>assets/images/profile/<?php echo $user['photo']; ?>">
                                                    </a>
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-sm"><?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?></span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td>

                                                <span class="nav-item dropdown">
                                                    <?php echo form_open_multipart('Tontine/add_member'); ?>
                                                    <input type="hidden" name="tontine_id" value="<?php echo $session['tontine_id']; ?>" class="form-control validate">
                                                    <input type="hidden" name="session_id" value="<?php echo $session['sess_id']; ?>" class="form-control validate">
                                                    <input type="hidden" name="member_id" value="<?php echo $user['id']; ?>" class="form-control validate">
                                                    <button href="#" class="dropdown-item text-blue delete_member">
                                                        <i class="fa fa-plus fa-lg mr-2"></i>
                                                        <span>Ajouter</span>
                                                    </button>
                                                    </form>
                                                </span>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <p class="text-muted lead">Aucun utilisateur dans la base de donnés</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
