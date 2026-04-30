<?php include 'create_caisse.php'; ?>

<!-- Page content -->
<div class="container-fluid mt-3">
    <div class="row mb-5">
        <div class="col-8">
            <h2 class="text-uppercase mb-0">Liste des Caisses</h2>
        </div>
        <div class="col-4 d-none d-md-block text-right">
            <a href="#" class="btn btn-default new_caisse" id="new_caisse">
                <i class="fa fa-plus"></i> Ajouter une caisse
            </a>
        </div>
    </div>

    <div class="card shadow-none">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0 text-uppercase">Caisses</h3>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <!-- Projects table -->
            <?php if ($caisses) : ?>
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Sold</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($caisses as $caisse) : ?>
                            <?php
                            $this->db->select_sum('member_sold'); 
                            $this->db->where('caisse_id', $caisse['id']);
                            $sold = $this->db->get('caissesolds')->row()->member_sold;
                            ?>
                            <tr>
                                <th scope="row">
                                    <span class="name mb-0 text-sm"><?php echo $caisse['name']; ?></span>
                                </th>
                                <td>
                                    <span class="name mb-0 text-sm"><?php echo $sold; ?> FCFA</span>
                                </td>
                                <td>
                                    <a class="btn btn-outline-default btn-sm ml-3" href="<?php echo site_url('caisses/' . $caisse['id']); ?>">
                                        Détails
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p class="text-muted lead">No Entry Yet</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Tab style 1 -->
    <!-- <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...1</div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...2</div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...3</div>
        </div> -->

    <!-- Tab style 2 -->
    <!-- <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...1</div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...2</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...3</div>
        </div> -->