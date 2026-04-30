    <!-- Modal -->
    <div class="modal fade" id="modalList" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Membres ayant perçu depuis le debut de la session</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <?php
                        $this->db->join('members', 'members.id = vente.buyer_id');
						$this->db->order_by('members.first_name', 'ASC');
						$this->db->order_by('vente.buyer_label', 'ASC');
                        $sale_records = $this->db->get_where('vente', array('session_id' => $seance['session_id']))->result_array();
                        ?>
                        <table class="table align-items-center table-flush" id="membersModal">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th>Montant</th>
                                    <th>Coût</th>
                                    <th>Date</th>
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
                                        <td>
                                            <span class="name mb-0 text-sm"><?php echo $row['sale_amount']; ?></span>
                                        </td>
                                        <td>
                                            <span class="name mb-0 text-sm"><?php echo $row['cost']; ?></span>
                                        </td>
                                        <td>
                                            <span class="name mb-0 text-sm"><?php echo date("j M Y",  strtotime($row['sale_date'])); ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
