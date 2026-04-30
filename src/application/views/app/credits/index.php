<?php include 'modal_make_loan.php'; ?>
<?php include 'modal_refund_loan.php'; ?>
<?php include 'modal_refill.php'; ?>

<section class="py-4 px-4">
    <div class="row mb-3">
        <div class="col-md-4">
            <h2 class="text-uppercase mb-0">Crédit</h2>
        </div>
        <div class="col-md-4 d-none d-md-block text-right">
            <a href="#" class="btn btn-outline-default btn-sm new_caisse" id="refillWallet" data-toggle="modal" data-target="#modalRefillWallet">
                <i class="fa fa-plus"></i> Ravitailler
            </a>
            <a href="#" class="btn btn-outline-danger btn-sm new_caisse" id="makeLoan" data-toggle="modal" data-target="#modalMakeLoan">
                <i class="fa fa-arrow-up"></i> Prêter
            </a>
            <a href="#" class="btn btn-outline-success btn-sm new_caisse" id="refundLoan" data-toggle="modal" data-target="#modalRefundLoan">
                <i class="fa fa-arrow-down"></i> Remboursement
            </a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-8">
            <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Dettes</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Enprunts/Remboursement</a>
                </li>
            </ul>
            <div class="tab-content bg-white pt-3" id="myTabContent">
                <div class="tab-pane fade pt-3 show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div>
                        <!-- Table -->
                        <div class="table-responsive" style="overflow-x:hidden;">
                            <?php if ($credit_debts) : ?>
                                <table class="table align-items-center table-flush" id="myTable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Dette</th>
                                            <th scope="col">Date de mise à jour</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($credit_debts as $debt) : ?>
                                            <tr>
                                                <th scope="row">
                                                    <span class="name mb-0"><?php echo $debt['first_name']; ?> <?php echo $debt['last_name']; ?></span>
                                                </th>
                                                <td class="">
                                                    <span class="font-weight-700"><?php echo $debt['debt_amount']; ?> FCFA</span>
                                                </td>
                                                <td class="">
                                                    <span class=""><?php echo date("j M Y",  strtotime($debt['update_date'])); ?></span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <p class="text-muted lead text-center">Aucun prêt enregistré pour le moment</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade pt-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <!-- Table -->
                    <div class="table-responsive" style="overflow-x:hidden;">
                        <?php if ($credit_records) : ?>
                            <table class="table align-items-center table-flush" id="myTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Emprunt</th>
                                        <th scope="col">Remboursement</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($credit_records as $record) : ?>
                                        <tr>
                                            <th scope="row">
                                                <span class="name mb-0"><?php echo $record['first_name']; ?> <?php echo $record['last_name']; ?></span>
                                            </th>
                                            <td class="">
                                                <span class="text-muted font-weight-700"><?php echo $record['loan']; ?> FCFA</span>
                                            </td>
                                            <td class="">
                                                <span class="text-success font-weight-700"><?php echo $record['refund']; ?> FCFA</span>
                                            </td>
                                            <td class="">
                                                <span class=""><?php echo date("j M Y",  strtotime($record['record_date'])); ?></span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <p class="text-muted lead text-center">Aucun Remboursement enregistré pour le moment</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center mt-5 py-5">
                <h2 class="text-uppercase text-muted">Sold :</h2>
                <h2 class="text-uppercase display-3 mb-0"><?php echo $wallet['sold']; ?> FCFA</h2>
            </div>
        </div>
    </div>
</section>