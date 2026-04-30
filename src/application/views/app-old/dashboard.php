    <!-- Header -->
    <div class="header pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 d-inline-block text-uppercase mb-0"><span class=""><i class="fa fa-desktop fa-lg mr-3"></i></span>Dashboard</h6>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Women items</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $women_count?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-purple text-white rounded-circle shadow">
                        <i class="fa fa-female"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2">Total items</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Men items</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $men_count?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="fa fa-male"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2">Total items</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Kids items</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $kids_count?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="fa fa-baby"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2">Total items</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">home items</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $home_count?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-building"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2">Total items</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Men categories</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <?php if($menCategories) : ?>
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Category name</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($menCategories as $category): ?>
                    <tr>
                        <th scope="row">
                          <div class="media align-items-center">
                            <a class="avatar rounded-circle mr-3">
                              <img src="<?php echo site_url(); ?>assets/icons/cat_icons/<?php echo $category['icon']; ?>">
                            </a>
                            <div class="media-body">
                              <span class="name mb-0 text-sm"><?php echo $category['cat_name']; ?></span>
                            </div>
                          </div>
                        </th>
                        <td>
                          <a href="<?php echo base_url('collections/men-collection/categories/'.$category['cat_id']); ?>/<?php echo $category['cat_name']; ?>" class="btn btn-sm btn-info">See all</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
              <?php else : ?>
                <p class="text-muted lead">No Categories Yet</p>
            <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Women categories</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <?php if($womenCategories) : ?>
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Category name</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($womenCategories as $category): ?>
                    <tr>
                        <th scope="row">
                          <div class="media align-items-center">
                            <a class="avatar rounded-circle mr-3">
                              <img src="<?php echo site_url(); ?>assets/icons/cat_icons/<?php echo $category['icon']; ?>">
                            </a>
                            <div class="media-body">
                              <span class="name mb-0 text-sm"><?php echo $category['cat_name']; ?></span>
                            </div>
                          </div>
                        </th>
                        <td>
                          <a href="<?php echo base_url('collections/women-collection/categories/'.$category['cat_id']); ?>/<?php echo $category['cat_name']; ?>" class="btn btn-sm btn-primary">See all</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
              <?php else : ?>
                <p class="text-muted lead">No Categories Yet</p>
            <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Kids categories</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <?php if($kidsCategories) : ?>
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Category name</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($kidsCategories as $category): ?>
                    <tr>
                        <th scope="row">
                          <div class="media align-items-center">
                            <a class="avatar rounded-circle mr-3">
                              <img src="<?php echo site_url(); ?>assets/icons/cat_icons/<?php echo $category['icon']; ?>">
                            </a>
                            <div class="media-body">
                              <span class="name mb-0 text-sm"><?php echo $category['cat_name']; ?></span>
                            </div>
                          </div>
                        </th>
                        <td>
                          <a href="<?php echo base_url('collections/kids-collection/categories/'.$category['cat_id']); ?>/<?php echo $category['cat_name']; ?>" class="btn btn-sm btn-warning">See all</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
              <?php else : ?>
                <p class="text-muted lead">No Categories Yet</p>
            <?php endif; ?>
            </div>
          </div>
        </div>

         <div class="col-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Home categories</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <?php if($homeCategories) : ?>
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Category name</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($homeCategories as $category): ?>
                    <tr>
                        <th scope="row">
                          <div class="media align-items-center">
                            <div class="media-body">
                              <span class="name mb-0 text-sm"><?php echo $category['cat_name']; ?></span>
                            </div>
                          </div>
                        </th>
                        <td>
                          <a href="<?php echo base_url('collections/home-design/categories/'.$category['cat_id']); ?>/<?php echo $category['cat_name']; ?>" class="btn btn-sm btn-success">See all</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
              <?php else : ?>
                <p class="text-muted lead">No Categories Yet</p>
            <?php endif; ?>
            </div>
          </div>
        </div>
      </div>