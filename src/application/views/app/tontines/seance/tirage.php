<?php if ($tirage_record) : ?>
	<div class="pl-3 mb-3" style="border-left: 3px solid blue;">
		<h3 class="mb-0 text-primary d-inline-block">Détails sur le tirage</h3>
		<!-- <span class="ml-2"><a href="#" class="btn btn-sm btn-primary shadow-none" data-toggle="modal" data-target="#modalList">Voir la liste</a></span> -->
	</div>
	<div class="card" style="border-left: 2px solid grey; border-right: 2px solid grey;">
		<?php foreach ($tirage_record as $tirage) : ?>
			<div class="row mx-1 py-3 border-bottom">
				<div class="col-lg-4 text-center border-right">
					<h5 class="text-muted text-uppercase">Montant perçu</h5>
					<h2 class="mb-0"><?php echo $tirage['tirage_amount']; ?> FCFA</h2>
				</div>
				<div class="col-lg-4 text-center">
					<h5 class="text-muted text-uppercase">Bénéficiare</h5>
					<h2 class="mb-0"><?php echo $tirage['first_name']; ?> <?php echo $tirage['last_name']; ?> <strong class="badge badge-success"><?php if($tirage['user_label'] > 1) {echo $tirage['user_label'];} ?></strong></h2>
				</div>
				<!-- <div class="col-lg-4 text-center border-left">
					<h5 class="text-muted text-uppercase">Lui a coûté</h5>
					<h2 class="mb-0"><?php echo $tirage['cost']; ?> FCFA</h2>
				</div> -->
			</div>
			<?php endforeach; ?>
		</div>
<?php endif ?>
