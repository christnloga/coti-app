<main class="mx-4 my-3">

	<?php include 'new_seance.php' ?>
	<?php include 'add_member.php'; ?>

	<?php
	$this->db->join('members', 'members.id = vente.buyer_id');
	$this->db->order_by('members.first_name', 'ASC');
	$this->db->order_by('vente.buyer_label', 'ASC');
	$sale_records = $this->db->get_where('vente', array('session_id' => $session['sess_id']))->result_array();
	?>

	<div class="row">
		<div class="col">
			<h1>Session <?php echo date("j M Y",  strtotime($session['created_on'])); ?></h1>
		</div>
		<!-- <div class="col text-right">
			<a href="#" class="btn btn-default rounded-pill shadow-none new_session" data-toggle="modal" data-target="#newSeanceModal">
				<i class="fa fa-plus mr-2"></i>Nouvelle séance
			</a>
		</div> -->
	</div>
	<div class="row mt-3">
		<div class="col-lg-8">

			<!-- BEGIN TABS -->
			<ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Séances</a>
				</li>
				<li class="nav-item" role="presentation">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Membres incrits</a>
				</li>
			</ul>
			<!-- Tab contents -->
			<div class="tab-content pt-3 px-3" id="myTabContent">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="row mb-3">
						<div class="col-8">
							<div class="pl-3" style="border-left: 3px solid blue;">
								<h2 class="mb-0 text-primary">Liste des séances</h2>
							</div>
						</div>
						<div class="col-4 d-none d-md-block text-right">
							<a href="#" class="btn btn-sm btn-outline-default shadow-none new_session" data-toggle="modal" data-target="#newSeanceModal">
								<i class="fa fa-user-plus mr-2"></i>Nouvelle séance
							</a>
						</div>
					</div>
					<?php if ($seances) : ?>
						<?php foreach ($seances as $seance) : ?>
							<div class="bg-white py-3 px-3 my-2 shadow-sm d-flex" style="border-left: 2px solid #11cdef;">
								<span class="my-auto">séance du <?php echo date("j M Y",  strtotime($seance['date'])); ?></span>
								<a href="<?php echo site_url('tontines/sessions/seance/' . $seance['id']); ?>" class="btn btn-info shadow-none btn-sm rounded-pill ml-auto"><i class="fa fa-eye mr-1" aria-hidden="true"></i> Consulter</a>
							</div>
						<?php endforeach; ?>
					<?php else : ?>
						<p class="text-muted lead">Aucune séance Enregistré</p>
					<?php endif; ?>
				</div>

				<div class="tab-pane fade pt-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="row mb-3">
						<div class="col-8">
							<div class="pl-3" style="border-left: 3px solid blue;">
								<h2 class="mb-0 text-primary">Membres adhérants</h2>
							</div>
						</div>
						<div class="col-4 d-none d-md-block text-right">
							<a href="#" class="btn btn-sm btn-outline-default shadow-none new_session" data-toggle="modal" data-target="#addMembersModal">
								<i class="fa fa-user-plus mr-2"></i>Ajouter membre
							</a>
						</div>
					</div>
					<div class=''>
						<?php if ($tontinemembers) : ?>
							<?php foreach ($tontinemembers as $tontinemember) : ?>
								<div class="bg-white py-3 px-3 my-2 shadow-sm d-flex" style="border-left: 2px solid blue;">
									<span class="my-auto"><?php echo $tontinemember['first_name']; ?> <?php echo $tontinemember['last_name']; ?> <strong class="badge badge-success"><?php if($tontinemember['label'] > 1) {echo $tontinemember['label'];} ?></strong></span>
								</div>
							<?php endforeach; ?>
						<?php else : ?>
							<p class="text-muted lead ml-3">Aucun membre inscrits</p>
						<?php endif; ?>
					</div>
				</div>

			</div>
			<!-- END TABS -->

		</div>
		<div class="col-lg-4 mt-4">
			<div class="bg-white py-3 px-3 my-2 shadow-lg text-center" style="border-left: 2px solid light blue;">
				<?php
				$this->db->where('session_id', $session['sess_id']);
				$this->db->from('seance');
				$query = $this->db->count_all_results();
				?>
				<div class="bg-info rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2 mt-3" style="height: 90px; width: 90px;">
					<h1 class="display-2 text-white"><?php echo $query ?></h1>
				</div>
				<h2>Séance(s)</h2>
				<p>Au total</p>
			</div>

			<?php if ($sale_records) : ?>
				<div class="bg-white my-2 shadow-lg" style="border-left: 2px solid light blue;">
					<div class="table-responsive">
						<!-- Projects table -->
						<table class="table align-items-center table-flush">
							<thead class="thead-light text-center">
								<tr>
									<th class="text-lg" scope="col">Membre ayant perçu</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($sale_records as $row) : ?>
									<tr>
										<th scope="row">
											<div class="media align-items-center">
												<a href="#" class="avatar rounded-circle mr-3 overflow-hidden">
													<img alt="Image placeholder" src="<?php echo site_url(); ?>assets/images/profile/<?php echo $row['photo']; ?>">
												</a>
												<div class="media-body">
													<span class="name mb-0 text-sm"><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?> <strong class="badge badge-success"><?php if($row['buyer_label'] > 1) {echo $row['buyer_label'];} ?></strong></span>
												</div>
											</div>
										</th>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>

</main>
