<?php
$this->db->join('members', 'members.id = records.user_id');
$this->db->order_by('members.first_name', 'ASC');
$this->db->order_by('records.user_label', 'ASC');
$records = $this->db->get_where('records', array('seance_id' => $seance['id'], 'state' => 'ok'))->result_array();
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
                                <span class="name mb-0 text-sm"><?php echo $record['first_name']; ?> <?php echo $record['last_name']; ?> <strong class="badge badge-success"><?php if($record['user_label'] > 1) {echo $record['user_label'];} ?></strong></span>
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
