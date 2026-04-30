    <!-- Page content -->
    <div class="container-fluid mt-3">    
        <div class="row mb-5">
            <div class="col-8">
                <h2 class="text-uppercase mb-0"><span class="btn rounded bg-gradient-info p-3 text-white mr-2 border-0" id="test"><i class="fa fa-male fa-lg"></i></span>Men collection</h2>
            </div>
            <div class="col-4 d-none d-md-block text-right">
                <a class="btn bg-gradient-info text-white border-0" roll="btn" href="<?php echo base_url(); ?>admin/men-collection/create"> <i class="fa fa-plus"></i> New Item</a>
            </div>
            <div class="col-4 text-right d-md-none d-sm-block">
                <a class="btn bg-gradient-info text-white border-0" roll="btn" href="<?php echo base_url(); ?>admin/men-collection/create"> <i class="fa fa-plus"></i></a>
            </div>
        </div>

        <!--Modal: modalConfirmDelete-->
        <div class="modal fade pt-5" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-notify" role="document">
                <!--Content-->
                <div class="modal-content text-center">
                    <form method="post" id="delete_form">
                        <!--Body-->
                        <div class="modal-body">
                            <h4 class="card-title text-danger">Delete item ?</h4>

                            <i class="fas fa-times fa-4x mt-4 text-danger animated rotateIn"></i>

                        </div>
                        
                        <div id="id_input">
                            
                        </div>

                        <!--Footer-->
                        <div class="flex-center py-4">
                            <button type="submit" class="btn btn-danger waves-effect">Delete</button> 
                            <a type="button" class="btn btn-info text-white waves-effect mr-2" data-dismiss="modal">Cancel</a>
                        </div>
                    </form>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!--Modal: modalConfirmDelete-->

        <!-- Posts -->
        <div class="row mt-3 mb-5" id="itemsContainer">
            <?php if ($items) : ?>
                <?php foreach ($items as $item) : ?>
                    
                    <div class="col-sm-12 col-md-6 col-lg-4 animated fadeIn">
                        <!-- Card -->
                        <div class="">
                            <div class="item-card mx-auto" data-cardid="<?php echo $item['item_id']; ?>">
                                <a href="<?php echo site_url('collections/men-collection/'.$item['slug']); ?>">
                                    <div class="item-image">
                                        <div class="overlay">
                                            <i class="fa fa-eye fa-lg text-light"></i>
                                        </div>
                                        <img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $item['main_image']; ?>">
                                    </div>
                                </a>
                                <div class="container item-description py-2">
                                    <div class="row">
                                        <div class="col-9">                                
                                            <a href="<?php echo site_url('collections/kids-collection/'.$item['slug']); ?>"><h4 class="font-weight-bold text-dark"><?php echo $item['item_name']; ?></h4></a>
                                            <a href="<?php echo base_url('collections/men-collection/categories/'.$item['cat_id']); ?>/<?php echo $item['cat_name']; ?>" class=""><small class="text-muted"><?php echo $item['cat_name']; ?></small></a>
                                            <h5 class="text-info font-weight-bold">€<?php echo $item['price']; ?></h5>
                                        </div>                             
                                        <div class="col-md-3 mt-2">
                                            <a href="<?php echo base_url(); ?>admin/men-collection/edit/<?php echo $item['slug']; ?>" class=""><i class="fa fa-edit fa-lg text-default"></i></a>
                                            <a class="delete_item" id="<?php echo $item['item_id']; ?>"><i class="fa fa-trash fa-lg text-danger mt-3"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card -->
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-muted lead ml-4">No Item Yet</p>
            <?php endif; ?>
        </div>
        <!-- /Posts -->