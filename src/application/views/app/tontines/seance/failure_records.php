<?php
$this->db->join('members', 'members.id = records.user_id');
$this->db->order_by('members.first_name', 'ASC');
$this->db->order_by('records.user_label', 'ASC');
$records = $this->db->get_where('records', array('session_id' => $seance['session_id'], 'state' => 'none'))->result_array();
?>
<?php if ($records) : ?>
	<table class="table align-items-center table-flush" id="table">
		<thead class="thead-light">
			<tr>
				<th scope="col">Nom</th>
				<th scope="col">Dette</th>
				<th scope="col">Amande</th>
				<th scope="col">Commentaires</th>
				<th scope="col">Date de la séance</th>
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
								<span class="name mb-0 text-sm"><?php echo $record['first_name']; ?> <?php echo $record['last_name']; ?> <strong class="badge badge-success"><?php if($record['user_label'] > 1) {echo $record['user_label'];} ?></strong></span>
							</div>
						</div>
					</th>
					<td>
						<span class="name mb-0 text-sm"><?php echo $record['debt']; ?> FCFA</span>
					</td>
					<td>
						<span class="name mb-0 text-sm"><?php echo $record['sanction']; ?></span>
					</td>
					<td>
						<span class="name mb-0 text-sm"><?php echo $record['comment']; ?></span>
					</td>
					<td>
						<span class="name mb-0 text-sm"><?php echo date("j M Y",  strtotime($record['date'])); ?></span>
					</td>
					<td>
						<a href="#" class="btn btn-sm btn-secondary text-success ml-auto mr-4 shadow-none" onclick="event.preventDefault();
                                                                 document.getElementById('add-record<?php echo $record['rec_id']; ?>').submit();">
							<i class="fa fa-arrow-down mr-2"></i> Cautiser
						</a>
					</td>

				</tr>
				<form action="<?php echo site_url() ?>User/add_record" method="post" id="add-record<?php echo $record['rec_id']; ?>">
					<input type="hidden" class="font-weight-bold" name="seance_id" value="<?php echo $seance['id']; ?>">
					<input type="hidden" class="font-weight-bold" name="record_id" value="<?php echo $record['rec_id']; ?>">
					<input type="hidden" class="font-weight-bold" name="amount" value="5500">
				</form>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php else : ?>
	<p class="text-muted lead ml-3">Aucune entrée</p>
<?php endif; ?>
