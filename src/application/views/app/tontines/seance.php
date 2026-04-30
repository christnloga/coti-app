<main class="mx-4 my-3">

	<?php
	$this->db->join('members', 'members.id = records.user_id');
	$this->db->order_by('members.first_name', 'ASC');
	$this->db->order_by('records.user_label', 'ASC');
	$members = $this->db->get_where('records', array('tontine_id' => $seance['tontine_id'], 'session_id' => $seance['session_id'], 'seance_id' => $seance['id']))->result_array();

	$this->db->join('members', 'members.id = vente.buyer_id');
	$sale_record = $this->db->get_where('vente', array('seance_id' => $seance['id']))->result_array();
	
	$this->db->join('members', 'members.id = tirage.user_id');
	$tirage_record = $this->db->get_where('tirage', array('seance_id' => $seance['id']))->result_array();

	$this->db->where('seance_id', $seance['id']);
	$this->db->from('vente');
	$sale_record_count = $this->db->count_all_results();
	?>

	<div class="row">
		<div class="col d-flex">
			<h1 class="d-inline-block mb-0">Séance du <?php echo date("j M Y",  strtotime($seance['date'])); ?></h1>
			<?php if ($seance['tontine_id'] == 2) : ?>
				<?php if ($sale_record_count < 6) : ?>
					<span class="ml-3 my-auto"><a href="#" class="btn btn-sm btn-primary rounded-pill shadow-none" data-toggle="modal" data-target="#modalList">Voir la liste</a></span>
					<span class="ml-3 my-auto"><a href="#" class="btn btn-sm btn-outline-primary rounded-pill shadow-none" data-toggle="modal" data-target="#modalVente">Vendre</a></span>
				<?php endif; ?>
			<?php endif; ?>

			<?php if ($seance['tontine_id'] == 1) : ?>
				<!-- <span class="ml-3 my-auto"><a href="#" class="btn btn-sm btn-primary rounded-pill shadow-none" data-toggle="modal" data-target="#modalList">Voir la liste</a></span> -->
				<span class="ml-3 my-auto"><a href="#" class="btn btn-sm btn-outline-primary rounded-pill shadow-none" data-toggle="modal" data-target="#modalTirage">Tirage</a></span>
			<?php endif; ?>
		</div>
		<!-- <div class="col text-right"><a href="#" class="btn btn-default shadow-none" data-toggle="modal" data-target="#modalList">vendre</a></div> -->
	</div>
	<?php if ($this->session->flashdata('sale_state_exist')) : ?>
		<div class="px-4 py-3 bg-danger text-white text-sm rounded animated fadeIn"><i class="fa fa-exclamation-circle mr-2"></i> <?php echo $this->session->flashdata('sale_state_exist'); ?></div>
	<?php endif; ?>
	<?php if ($this->session->flashdata('sale_not_eligible')) : ?>
		<div class="px-4 py-3 bg-danger text-white text-sm rounded animated fadeIn"><i class="fa fa-exclamation-circle mr-2"></i> <?php echo $this->session->flashdata('sale_not_eligible'); ?></div>
	<?php endif; ?>

	<!-- TOTALS CARDS -->
	<div class="row mt-5">
		<div class="col-lg-4">
			<?php
			$this->db->select_sum('amount');
			$total_amount = $this->db->get_where('records', array('seance_id' => $seance['id']))->row()->amount;
			?>
			<div class="card card-stats w-100" style="border-top: 2px solid grey;">
				<!-- Card body -->
				<div class="card-body text-center">
					<div class="row">
						<div class="col">
							<h5 class="card-title text-uppercase text-muted mb-0">Total cotisé</h5>
						</div>
					</div>
					<h3 class="display-3"><?php echo $total_amount; ?> FCFA</h3>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<?php
			$this->db->where('state', 'ok');
			$this->db->where('seance_id', $seance['id']);
			$this->db->from('records');
			$total_participants = $this->db->count_all_results();
			?>
			<div class="card card-stats w-100" style="border-top: 2px solid green;">
				<!-- Card body -->
				<div class="card-body text-center">
					<div class="row">
						<div class="col">
							<h5 class="card-title text-uppercase text-muted mb-0">Total noms ayant cotisé</h5>
						</div>
					</div>
					<h3 class="display-3 text-success"><?php echo $total_participants; ?> Noms</h3>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<?php
			// $this->db->join('members', 'members.id = tontinemember._member');
			// $this->db->where('_tontine', $seance['tontine_id']);
			$this->db->where('state', 'none');
			$this->db->where('seance_id', $seance['id']);
			$this->db->from('records');
			$not_participants = $this->db->count_all_results();
			?>
			<div class="card card-stats w-100" style="border-top: 2px solid red;">
				<!-- Card body -->
				<div class="card-body text-center">
					<div class="row">
						<div class="col">
							<h5 class="card-title text-uppercase text-muted mb-0">Total noms n'ayant pas cotisé</h5>
						</div>
					</div>
					<h3 class="display-3 text-danger"><?php echo $not_participants; ?> Noms</h3>
				</div>
			</div>
		</div>
	</div>
	<!-- TOTALS CARDS -->

	<?php if ($seance['tontine_id'] == 2) : ?>
		<?php include 'seance/modal_list.php'; ?>
		<?php include 'seance/modal_vente.php'; ?>
		<?php include 'seance/vente.php'; ?>
	<?php endif; ?>

	<?php if ($seance['tontine_id'] == 1) : ?>
		<?php include 'seance/modal_tirage.php'; ?>
		<?php include 'seance/tirage.php'; ?>
	<?php endif; ?>

	<!-- BEGIN TABS -->
	<ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
		<li class="nav-item" role="presentation">
			<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Membres de la séance en cours</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">List d'échecs</a>
		</li>
	</ul>
	<div class="tab-content pt-3" id="myTabContent">
		<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
			<?php if ($members) : ?>
				<div class="row p-3">

					<!-- Members list -->
					<div class="col-lg-5">
						<div class="pl-3 mb-3" style="border-left: 3px solid blue;">
							<h3 class="mb-0 text-primary">Membres</h3>
						</div>

						<div class="accordion" id="accordionExample">
							<?php foreach ($members as $member) : ?>
								<div class="card mb-2 shadow-none" style="border-left: 2px solid #11cdef;">
									<div class="card-header bg-white py-3 px-3 shadow-sm d-flex">
										<span class="my-auto"><?php echo $member['first_name']; ?> <?php echo $member['last_name']; ?> <strong class="badge badge-success"><?php if($member['user_label'] > 1) {echo $member['user_label'];} ?></strong></span>
										
										<!-- Undo btn -->
										<?php if($member['state'] == 'ok' && $member['seance_id'] == $seance['id']) : ?>
										<a href="#" class="btn btn-sm btn-secondary ml-auto mr-4 shadow-none" onclick="event.preventDefault();
                                                                 document.getElementById('revert-record<?php echo $member['rec_id']; ?>').submit();">
											<i class="fa fa-undo mr-2 text-warning"></i> Annuler
										</a>
										<?php endif; ?>
										<!-- End Undo btn -->

										<?php if($member['state'] == 'none' && $member['seance_id'] == $seance['id']) : ?>
										<a href="#" class="btn btn-secondary shadow-none btn-sm ml-auto mr-4 text-success" data-toggle="collapse" data-target="#collapseOne<?php echo $member['id']; ?><?php echo $member['user_label']; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $member['id']; ?>"><i class="fa fa-edit mr-1" aria-hidden="true"></i> Cautiser</a>
										<?php endif; ?>
									</div>
									<div id="collapseOne<?php echo $member['id']; ?><?php echo $member['user_label']; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
										<form action="<?php echo site_url() ?>User/revert_record" method="post" id="revert-record<?php echo $member['rec_id']; ?>">
											<input type="hidden" class="font-weight-bold" name="seance_id" value="<?php echo $seance['id']; ?>">
											<input type="hidden" class="font-weight-bold" name="record_id" value="<?php echo $member['rec_id']; ?>">
										</form>
										<div class="card-body" style="background: #f9f8f8;">
											<?php echo form_open_multipart('User/add_record'); ?>
											<!-- <form method="post" id="record_tontine_form"> -->
											<!--Body-->
											<input type="hidden" class="font-weight-bold" name="seance_id" value="<?php echo $seance['id']; ?>">
											<input type="hidden" class="font-weight-bold" name="record_id" value="<?php echo $member['rec_id']; ?>">
											<div class="form-group mb-3 mt-2 text-left">
												<label data-error="wrong" class="font-weight-bold" for="form34">Somme</label>
												<input type="text" name="amount" class="form-control validate" required>
											</div>
											<div class="form-group mb-3 mt-2 text-left">
												<label data-error="wrong" class="font-weight-bold" for="form34">Commenatire (facultatif)</label>
												<input type="text" name="comment" class="form-control validate">
											</div>

											<!--Footer-->
											<div class="flex-center py-4">
												<button type="submit" class="btn btn-default waves-effect">Enregistrer</button>
											</div>
											</form>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<!-- Members list -->

					<!-- Records -->
					<div class="col-lg-7">
						<div class="pl-3 mb-3" style="border-left: 3px solid blue;">
							<h3 class="mb-0 text-primary">Entrées</h3>
						</div>
						<div class="card record-card">
							<?php include 'seance/records.php'; ?>
						</div>
					</div>
					<!-- Records -->
				</div>
			<?php else : ?>
				<p class="text-muted lead">Aucun membre enregistré à la tonine</p>
			<?php endif; ?>
		</div>

		<div class="tab-pane fade pt-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			<!-- Failure Records -->
			<div class="pl-3 mb-3" style="border-left: 3px solid blue;">
				<h3 class="mb-0 text-primary">Entrées</h3>
			</div>
			<div class="card record-card">
				<?php include 'seance/failure_records.php'; ?>
			</div>

			<!--End Failure Records -->
		</div>

	</div>
	<!-- END TABS -->

</main>
