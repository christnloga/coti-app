    <!-- Page content -->
    <div class="container-fluid mt-3">
        <div class="row mb-5">
            <div class="col-8">
                <h2 class="text-uppercase mb-0">Liste des tontines</h2>
            </div>
            <!-- <div class="col-4 d-none d-md-block text-right">
                <a href="#" class="btn bg-default text-white border-0" roll="btn" data-toggle="modal" data-target="#modalAddTontine">
                    <i class="fa fa-plus"></i> Créer une tontine
                </a>
            </div> -->
            <!-- <div class="col-4 text-right d-none d-sm-block">
                <a class="btn bg-green text-white border-0" data-toggle="modal" data-target="#modalAddTontine" roll="btn">
                    <i class="fa fa-plus"></i>
                </a>
            </div> -->
        </div>

        <!-- <div class='mb-5 text-center'>
            <a href="<?php echo site_url('tontines'); ?>" class="btn btn-sm btn-success rounded-pill">En cours</a>
            <a href="<?php echo site_url('tontines/t/fermees'); ?>" class="btn btn-sm btn-dark rounded-pill">Fermées</a>
        </div> -->

        <!--Modal: modalConfirmDelete-->
        <div class="modal fade pt-5" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-notify" role="document">
                <!--Content-->
                <div class="modal-content text-center">
                    <form method="post" id="end_form">
                        <!--Body-->
                        <div class="modal-body">
                            <h2 class="card-title text-danger">Etes vous sûr ?</h3>

                                <!-- <i class="fas fa-times fa-4x mt-4 text-danger animated rotateIn"></i> -->

                        </div>

                        <input type="hidden" id="state_input" name="state">
                        <input type="hidden" id="id_input" name="end">

                        <!--Footer-->
                        <div class="flex-center py-4">
                            <button type="submit" class="btn btn-danger waves-effect">Oui</button>
                            <a type="button" class="btn btn-info text-white waves-effect mr-2" data-dismiss="modal">Annuler</a>
                        </div>
                    </form>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!--Modal: modalConfirmDelete-->


        <?php include 'create.php'; ?>

        <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0 text-uppercase">Tontines</h3>
                    </div>
                    <!-- <div class="col text-right">
                    <a class="" type="" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><i class="fa fa-plus-circle fa-2x"></i></a>

                    <div class="dropdown-menu">
                    <?php foreach ($users as $user) : ?>
                        <a class="dropdown-item" id="addTo" data-memberid="<?php echo $user['first_name']; ?>"><?php echo $user['first_name']; ?></a>
                    <?php endforeach; ?>
                    </div> 
                </div> -->
                </div>
            </div>

            <div class="table-responsive">
                <!-- Projects table -->
                <?php if ($users) : ?>
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">montant</th>
                                <th scope="col">Fréquence</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tontines as $tontine) : ?>
                                <tr>
                                    <th scope="row">
                                        <span class="name mb-0 text-sm"><?php echo $tontine['name']; ?></span>
                                    </th>
                                    <td>
                                        <span class="name mb-0 text-sm"><?php echo $tontine['amount']; ?> FCFA</span>
                                    </td>
                                    <td>
                                        <span class="name mb-0 text-sm"><?php echo $tontine['frequency']; ?></span>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-default btn-sm ml-3" href="<?php echo site_url('tontines/' . $tontine['id']); ?>">
                                            Détails
                                        </a>
                                        <?php if (!$this->uri->segment(3) == 'fermees') : ?>
                                            <!-- <a class="btn btn-danger btn-sm ml-3 end_tontine" href="#" data-state="0" id="<?php echo $tontine['id']; ?>">
                                                Fermer
                                            </a> -->
                                        <?php endif; ?>
                                        <?php if ($this->uri->segment(3) == 'fermees') : ?>
                                            <a class="btn btn-dark btn-sm ml-3 end_tontine" href="#" data-state="1" id="<?php echo $tontine['id']; ?>">
                                                Restaurer
                                            </a>
                                        <?php endif; ?>
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
