<section class="px-4 py-3">

	<?php include 'modal_members.php' ?>
	<?php include 'modal_update_sold.php' ?>
	<?php include 'modal_withdraw_sold.php' ?>

	<div class="mb-4">
		<div class="row">
			<div class="col-md-6">
				<h2 class="h1"><?php echo $caisse['name']; ?></h2>
			</div>
			<div class="col-md-6 text-right">
				<a href="#" class="btn btn-sm btn-dark shadow-none" data-toggle="modal" data-target="#showMembersModal"><i class="fa fa-user-plus mr-2"></i> Ajouter membre</a>
			</div>
		</div>
	</div>

	<?php if ($this->session->flashdata('caisse_member_exist')) : ?>
		<div class="px-4 py-3 bg-danger text-white text-sm rounded animated fadeIn"><?php echo $this->session->flashdata('caisse_member_exist'); ?></div>
	<?php endif; ?>

	<ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
		<li class="nav-item" role="presentation">
			<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Membres et soldes</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Historique</a>
		</li>
	</ul>
	<div class="tab-content bg-white pt-3" id="myTabContent">
		<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
			<div>
				<!-- <div class="card-header border-bottom mb-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Soldes</h3>
                        </div>
                        <div class="col text-right">
                            <a href="#" class="btn btn-sm btn-dark shadow-none" data-toggle="modal" data-target="#showMembersModal"><i class="fa fa-user-plus mr-2"></i> Ajouter membre</a>
                        </div>
                    </div>
                </div> -->
				<!-- Table -->
				<div class="table-responsive" style="overflow-x:hidden;">
					<?php if ($caissemembers) : ?>
						<table class="table align-items-center table-flush" id="myTable">
							<thead class="thead-light">
								<tr>
									<th scope="col">Nom</th>
									<th scope="col">sold</th>
									<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($caissemembers as $caissemember) : ?>
									<tr>
										<th scope="row">
											<span class="name mb-0"><?php echo $caissemember['first_name']; ?> <?php echo $caissemember['last_name']; ?></span>
										</th>
										<td class="">
											<span class=""><?php echo $caissemember['member_sold']; ?> FCFA</span>
										</td>
										<td class="text-right">
											<a href="#" class="btn btn-sm btn-flate shadow-none update_sold" data-sold="<?php echo $caissemember['member_sold']; ?>" data-soldid="<?php echo $caissemember['cs_id']; ?>" id="<?php echo $caissemember['id']; ?>">
												<i class="fa fa-arrow-down mr-2 text-primary"></i>Dépôt
											</a>
											<!-- Show if in Caisse Epargne -->
											<?php if ($caissemember['caisse_id'] == 2) : ?>
												<a href="#" class="btn btn-sm btn-flate shadow-none border-left withdraw_sold" data-sold="<?php echo $caissemember['member_sold']; ?>" data-soldid="<?php echo $caissemember['cs_id']; ?>" id="<?php echo $caissemember['id']; ?>">
													<i class="fa fa-arrow-up mr-2 ml-2 text-orange"></i>Retrait
												</a>
											<?php endif; ?>
											<!--  -->

										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					<?php else : ?>
						<p class="text-muted lead text-center">Aucun membre dans cette caisse</p>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="tab-pane fade pt-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			<div class="table-responsive">
				<?php if ($caisserecords) : ?>
					<table class="table align-items-center table-flush" id="myTable">
						<thead class="thead-light">
							<tr>
								<th scope="col">Nom</th>
								<th scope="col">Dépôt</th>
								<?php if ($caissemember['caisse_id'] == 2) : ?>
									<th scope="col">Retrait</th>
								<?php endif; ?>
								<th scope="col">date</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($caisserecords as $caisserecord) : ?>
								<tr>
									<th scope="row">
										<span class="name mb-0"><?php echo $caisserecord['first_name']; ?> <?php echo $caisserecord['last_name']; ?></span>
									</th>
									<td class="">
										<span class="font-weight-bold"><?php echo $caisserecord['amount']; ?> FCFA</span>
									</td>
									<?php if ($caissemember['caisse_id'] == 2) : ?>
										<td class="">
											<span class="font-weight-bold"><?php echo $caisserecord['cash_out']; ?> FCFA</span>
										</td>
									<?php endif; ?>
									<td class="">
										<span class=""><?php echo date("j M Y",  strtotime($caisserecord['record_date'])); ?></span>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				<?php else : ?>
					<p class="text-muted lead text-center">Aucune historique pour cette caisse</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
	</section">
