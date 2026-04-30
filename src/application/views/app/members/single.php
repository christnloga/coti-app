<section class="px-4 py-3">
    <div class="card p-3">
        <!-- Tab style 2 -->
        <ul class="nav nav-tabs mt-3 mb-2" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tontines" role="tab" aria-controls="tontines" aria-selected="false">Tontines</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#caisses" role="tab" aria-controls="caisses" aria-selected="false">Caisses</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#credit" role="tab" aria-controls="credit" aria-selected="false">Crédit</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <div class="image my-3 col-lg-4">
                        <img alt="Image placeholder" class="rounded" src="<?php echo site_url(); ?>assets/images/profile/<?php echo $auser['photo']; ?>" style="width:100%;">
                    </div>
                    <div class="info col-lg-8">
                        <ul class="list-group list-group-flush mx-2">
                            <li class="list-group-item">
                                <p class="name mb-0 text-sm font-weight-bold mb-2">Nom: <span class="font-weight-500 text-blue"><?php echo $auser['first_name']; ?></span></p>
                            </li>
                            <li class="list-group-item">
                                <p class="name mb-0 text-sm font-weight-bold mb-2">Prénom: <span class="font-weight-500 text-blue"><?php echo $auser['last_name']; ?></span></p>
                            </li>
                            <li class="list-group-item">
                                <p class="name mb-0 text-sm font-weight-bold mb-2">Nom d'utilisateur: <span class="font-weight-500 text-blue"><?php echo $auser['username']; ?></span></p>
                            </li>
                            <li class="list-group-item">
                                <p class="name mb-0 text-sm font-weight-bold mb-2">Sex: <span class="font-weight-500 text-blue"><?php echo $auser['gender']; ?></span></p>
                            </li>
                            <li class="list-group-item">
                                <p class="name mb-0 text-sm font-weight-bold mb-2">Situation matrimoniale: <span class="font-weight-500 text-blue"><?php echo $auser['family_status']; ?></span></p>
                            </li>
                            <li class="list-group-item">
                                <p class="name mb-0 text-sm font-weight-bold mb-2">Contact: <span class="font-weight-500 text-blue"><?php echo $auser['contact']; ?></span></p>
                            </li>
                            <li class="list-group-item">
                                <p class="name mb-0 text-sm font-weight-bold mb-2">Adresse: <span class="font-weight-500 text-blue"><?php echo $auser['address']; ?></span></p>
                            </li>
                            <li class="list-group-item">
                                <p class="name mb-0 text-sm font-weight-bold mb-2">CNI: <span class="font-weight-500 text-blue"><?php echo $auser['cni']; ?></span></p>
                            </li>
                            <li class="list-group-item">
                                <p class="name mb-0 text-sm font-weight-bold mb-2 text-capitalize">Role: <span class="font-weight-500 text-blue"><?php echo $auser['role']; ?></span></p>
                            </li>
                            <li class="list-group-item">
                                <p class="name mb-0 text-sm font-weight-bold mb-2 text-capitalize">Nom du père: <span class="font-weight-500 text-blue"><?php echo $auser['father_name']; ?></span></p>
                            </li>
                            <li class="list-group-item">
                                <p class="name mb-0 text-sm font-weight-bold mb-2 text-capitalize">Nom de la mère: <span class="font-weight-500 text-blue"><?php echo $auser['mother_name']; ?></span></p>
                            </li>
                            <li class="list-group-item">
                                <p class="name mb-0 text-sm font-weight-bold mb-2 text-capitalize">Conjoint: <span class="font-weight-500 text-blue"><?php echo $auser['conjoint']; ?>, <?php echo $auser['conjoint_contact']; ?></span></p>
                            </li>
                            <li class="list-group-item">
                                <p class="name mb-0 text-sm font-weight-bold mb-2 text-capitalize">Ayant droit: <span class="font-weight-500 text-blue"><?php echo $auser['successor']; ?>, <?php echo $auser['successor_contact']; ?></span></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tontines" role="tabpanel" aria-labelledby="stontines-tab">
                <h2 clas="my-5">Tontines:</h2>

                <!-- <ul class="list-group list-group-flush">
                <?php foreach ($membertontines as $membertontine) : ?>
                    <li class="list-group-item">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <span class="name mb-0 text-sm"><?php echo $membertontine['name']; ?></span>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
                </ul> -->

                <?php
                $this->db->join('tontine', 'tontine.id = tontinemember._tontine');
                $query = $this->db->get_where('tontinemember', array('_member' => $auser['id']));
                $tontines = $query->result_array();
                ?>
                <?php foreach ($tontines as $tontine) : ?>
                    <div class="media align-items-center">
                        <div class="media-body">
                            <h2 class="name h3 m-3"><?php echo $tontine['name']; ?></h2>

                            <div class="table-responsive mt-3">
                                <!-- Projects table -->

                                <?php
                                $this->db->join('members', 'members.id = records.user_id');
                                $this->db->order_by('rec_id', 'DESC');
                                $query = $this->db->get_where('records', array(
                                    'user_id' => $auser['id'],
                                    'tontine_id' => $tontine['_tontine']
                                ));
                                $records = $query->result_array();
                                ?>

                                <?php if ($records) : ?>
                                    <table class="table align-items-center table-flush" id="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Nom</th>
                                                <th scope="col">montant</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Commentaires</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($records as $record) : ?>
                                                <tr>
                                                    <th scope="row">
                                                        <div class="media align-items-center">
                                                            <a href="#" class="avatar rounded-circle overflow-hidden mr-3">
                                                                <img alt="Image placeholder" src="<?php echo site_url(); ?>assets/images/profile/<?php echo $record['photo']; ?>">
                                                            </a>
                                                            <div class="media-body">
                                                                <span class="name mb-0 text-sm"><?php echo $record['first_name']; ?> <?php echo $record['last_name']; ?></span>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <td>
                                                        <span class="name mb-0 text-sm"><?php echo $record['amount']; ?> FCFA</span>
                                                    </td>
                                                    <td>
                                                        <span class="name mb-0 text-sm"><?php echo date("j M Y",  strtotime($record['date'])); ?></span>
                                                    </td>
                                                    <td>
                                                        <span class="name mb-0 text-sm"><?php echo $record['comment']; ?></span>
                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                <?php else : ?>
                                    <p class="text-muted lead ml-3">Aucune entrée</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="tab-pane fade" id="caisses" role="tabpanel" aria-labelledby="caisses-tab">
                <?php
                $this->db->join('caisses', 'caisses.id = caissemember._caisse');
                $query = $this->db->get_where('caissemember', array('_member' => $auser['id']));
                $caisses = $query->result_array();
                ?>
                <?php foreach ($caisses as $caisse) : ?>
                    <div class="media align-items-center">
                        <div class="media-body">
                            <h2 class="name h3 m-3"><?php echo $caisse['name']; ?></h2>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="table-responsive mt-3">
                                        <!-- Projects table -->

                                        <?php
                                        $this->db->join('members', 'members.id = caisserecords.user_id');
                                        $this->db->order_by('rec_id', 'DESC');
                                        $query = $this->db->get_where('caisserecords', array(
                                            'user_id' => $auser['id'],
                                            'caisse_id' => $caisse['_caisse']
                                        ));
                                        $records = $query->result_array();
                                        ?>

                                        <?php if ($records) : ?>
                                            <table class="table align-items-center table-flush" id="table">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">Nom</th>
                                                        <th scope="col">montant</th>
                                                        <th scope="col">Date</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($records as $record) : ?>
                                                        <tr>
                                                            <th scope="row">
                                                                <div class="media align-items-center">
                                                                    <a href="#" class="avatar rounded-circle overflow-hidden mr-3">
                                                                        <img alt="Image placeholder" src="<?php echo site_url(); ?>assets/images/profile/<?php echo $record['photo']; ?>">
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <span class="name mb-0 text-sm"><?php echo $record['first_name']; ?> <?php echo $record['last_name']; ?></span>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <td>
                                                                <span class="name mb-0 text-sm"><?php echo $record['amount']; ?> FCFA</span>
                                                            </td>
                                                            <td>
                                                                <span class="name mb-0 text-sm"><?php echo date("j M Y",  strtotime($record['record_date'])); ?></span>
                                                            </td>

                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        <?php else : ?>
                                            <p class="text-muted lead ml-3">Aucune entrée</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-center mt-2 py-5">
                                        <h2 class="text-uppercase text-muted">Sold :</h2>
                                        <h2 class="text-uppercase display-3 mb-0"><?php echo $caisse['sold']; ?> FCFA</h2>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="tab-pane fade" id="credit" role="tabpanel" aria-labelledby="credit-tab">
                <div class="table-responsive mt-3">
                    <!-- Projects table -->
                    <div class="row">
                        <div class="col-md-8">
                            <?php
                            $this->db->join('members', 'members.id = credit_records.user_id');
                            $this->db->order_by('rec_id', 'DESC');
                            $query = $this->db->get_where('credit_records', array(
                                'user_id' => $auser['id']
                            ));
                            $credit_records = $query->result_array();
                            ?>

                            <?php if ($credit_records) : ?>
                                <table class="table align-items-center table-flush" id="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Emprunt</th>
                                            <th scope="col">Remboursement</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($credit_records as $row) : ?>
                                            <tr>
                                                <th scope="row">
                                                    <div class="media align-items-center">
                                                        <a href="#" class="avatar rounded-circle overflow-hidden mr-3">
                                                            <img alt="Image placeholder" src="<?php echo site_url(); ?>assets/images/profile/<?php echo $record['photo']; ?>">
                                                        </a>
                                                        <div class="media-body">
                                                            <span class="name mb-0 text-sm"><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></span>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td>
                                                    <span class="name mb-0 text-sm font-weight-700 text-muted"><?php echo $row['loan']; ?> FCFA</span>
                                                </td>
                                                <td>
                                                    <span class="name mb-0 text-sm font-weight-700 text-success"><?php echo $row['refund']; ?> FCFA</span>
                                                </td>
                                                <td>
                                                    <span class="name mb-0 text-sm"><?php echo date("j M Y",  strtotime($row['record_date'])); ?></span>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <p class="text-muted lead ml-3">Aucune entrée</p>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-4">
                            <?php
                            $query = $this->db->get_where('credit_debts', array('user_id' => $auser['id']));
                            $debt = $query->row_array();
                            ?>
                            <div class="card text-center mt-2 py-5">
                                <h2 class="text-uppercase text-muted">Dette :</h2>
                                <?php if ($debt) : ?>
                                    <h2 class="text-uppercase display-3 mb-0"><?php echo $debt['debt_amount']; ?> FCFA</h2>
                                <?php else : ?>
                                    <h2 class="text-uppercase text-muted display-3 mb-0">Pas de dette</h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>