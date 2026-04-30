<section class="py-4 px-4">
    <h1 class="mb-4">Espaces Aides</h1>

    <?php include 'record_help.php' ?>

	<?php if ($this->session->flashdata('help_not_eligible')) : ?>
		<div class="px-4 py-3 mb-3 bg-danger text-white text-sm rounded animated fadeIn"><i class="fa fa-exclamation-circle mr-2"></i> <?php echo $this->session->flashdata('help_not_eligible'); ?></div>
	<?php endif; ?>

    <div class="row">
        <div class="col-lg-5">
            <div class="card members-card pb-3">
                <div class="card-header mb-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Liste des membres</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <?php if ($users) : ?>
                        <table class="table align-items-center table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm"><?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?></span>
                                                </div>
                                            </div>
                                        </th>
                                        <td>
                                            <a class="btn btn-outline-default btn-sm record_help" href="#" id="<?php echo $user['id']; ?>">
                                                Aider membre
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                    <div>
                       <p class="text-muted lead text-center">Aucune entrée</p> 
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card members-card pb-3">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Historique d'aide</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <?php if ($records) : ?>
                        <table class="table align-items-center table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th>Somme</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($records as $record) : ?>
                                    <tr>
                                        <th scope="row">
                                            <span class="name mb-0 text-sm"><?php echo $record['first_name']; ?> <?php echo $record['last_name']; ?></span>
                                        </th>
                                        <th scope="row">
                                            <span class="name mb-0 text-sm"><?php echo $record['amount']; ?> FCFA</span>
                                        </th>
                                        <th scope="row">
                                            <span class="name mb-0 text-sm"><?php echo date("j M Y", strtotime($record['help_date'])); ?></span>
                                        </th>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p class="text-muted lead text-center">Aucune entrée</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</section>
