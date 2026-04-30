<div class="px-4 py-3">

	<?php include 'new_session.php'; ?>

	<div class="my-4 text-center">
		<h1><?php echo $tontine['name']; ?> : <span class="ml-2 font-weight-400"><?php echo $tontine['amount']; ?> F</span></h1>
	</div>

	<hr>

	<div class="row">
		<div class="col-lg-6">
			<div class="row mb-3">
				<div class="col-8">
					<div class="pl-3" style="border-left: 3px solid #11cdef;">
						<h2 class="mb-0 text-info">Sessions</h2>
					</div>
				</div>
				<div class="col-4 d-none d-md-block text-right">
					<a href="#" class="btn btn-sm btn-outline-default shadow-none new_session" data-toggle="modal" data-target="#newSessionModal">
						<i class="fa fa-plus mr-2"></i>Nouvelle session
					</a>
				</div>
			</div>

			<!-- Sessions -->

			<?php if ($sessions) : ?>

				<?php foreach ($sessions as $session) : ?>
					<div class="bg-white py-3 px-3 my-2 shadow-sm d-flex">
						<div class="bg-info rounded-circle my-auto mr-3" style="height: 10px; width: 10px;"></div>
						<span class="my-auto">Session <?php echo date("j M Y",  strtotime($session['created_on'])); ?></span>
						<a href="<?php echo site_url('tontines/sessions/' . $session['sess_id']); ?>" class="btn btn-outline-info btn-sm rounded-pill ml-auto"><i class="fa fa-eye mr-1" aria-hidden="true"></i> Voir</a>
					</div>
				<?php endforeach; ?>

			<?php else : ?>
				<p class="text-muted lead">Aucune session ouverte</p>
			<?php endif; ?>
		</div>
		<div class="col-lg-6 border-left">
			

		</div>
	</div>
	<!-- Projects table -->

	<script type="text/javascript">
		jQuery(window).load(function() {
			var $ = jQuery;
			// New session modal call
			$(document).on('click', '.new_session', function() {
				var tontineID = $(this).attr('id');
				console.log(sold);
				console.log(soldID);
				// $("#tontine_id").val(tontineID);
				$("#newSessionModal").modal('show');
			});
		});
	</script>
