    <!-- Header -->
    <div class="header pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 d-inline-block text-uppercase mb-0"><span class=""><i class="fa fa-chart-bar fa-lg mr-3"></i></span>Résumé</h6>
            </div>
          </div>
          <h2 class="text-muted text-center my-3">Fonds de caisses</h2>
          <?php if ($user['role'] == 'administrateur') : ?>
            <!-- Card stats -->
            <div class="d-flex justify-content-between">
              <?php foreach ($caisses as $caisse) : ?>
                <?php
                $this->db->select_sum('member_sold');
                $this->db->where('caisse_id', $caisse['id']);
                $sold = $this->db->get('caissesolds')->row()->member_sold;
                ?>
                <div class="card card-stats w-100 mr-2">
                  <!-- Card body -->
                  <div class="card-body text-center">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0"><?php echo $caisse['name']; ?></h5>
                      </div>
                    </div>
                    <h3 class="display-3"><?php echo $sold; ?> FCFA</h3>
                    <p class="mb-0 text-sm">
                      <span class="text-muted mr-2">Au total</span>
                    </p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <!-- Page content -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8">
            <h2 class="text-primary text-center">Mes tontines</h2>
            <div class="card">
              <div class="media align-items-center">
                <div class="media-body">
                  <?php foreach ($tontines as $tontine) : ?>
                    <h2 class="name h3 m-3"><?php echo $tontine['name']; ?></h2>

                    <div class="table-responsive mt-3">
                      <!-- Projects table -->

                      <?php $this->db->join('members', 'members.id = records.user_id');
                      $query = $this->db->get_where('records', array(
                        'user_id' => $this->session->userdata('user_id'),
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
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <h2 class="text-primary text-center">Mes solds</h2>
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body text-center py-0">
                <?php
                $this->db->join('caisses', 'caisses.id = caissesolds.caisse_id');
                $solds = $this->db->get_where('caissesolds', array('user_id' => $this->session->userdata('user_id')))->result_array();
                ?>
                <?php foreach ($solds as $sold) : ?>
                  <div class="sold border-bottom py-2">
                    <div class="mt-3">
                      <h5 class="card-title text-uppercase text-purple mb-0"><?php echo $sold['name']; ?></h5>
                      <h3 class="display-4 text-success"><?php echo $sold['member_sold']; ?> F</h3>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>