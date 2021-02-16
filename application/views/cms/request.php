<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Customers Request
            <?php if ($flash_msg = $this->session->flash_msg): ?>
              <br><sub style="color: <?php echo $flash_msg['color'] ?>"><?php echo $flash_msg['message'] ?></sub>
            <?php endif; ?>
          </header>
          <div class="panel-body">
            
            <div class="row">
              <div class="col-md-4" style="text-align: left; font-style: bold;">
                <p><b>Date range filter</b></p>
              </div>
              <div class="col-md-4" style="text-align: left; font-style: bold;">
                <p><b>Search Name </b></p>
              </div>
              <div class="col-md-4" style="text-align:left">
                
              </div>
            </div>

            <form action="" method="GET">
              <div class="row">
                  <div class="col-md-2">
                      <input type="date" name="from" placeholder="from" class="form-control"
                      value="<?php echo @$_GET['from'] ?>">
                  </div>
                  <div class="col-md-2">
                      <input type="date" name="to" placeholder="to" class="form-control"
                      value="<?php echo @$_GET['to'] ?>">
                  </div>
                  <div class="col-md-2">
                    <select name="user_id" class="form-control">
                      <option value="">Areas</option>
                      <?php foreach (getAreas($this) as $key => $value): #helpers/custom_helper.php ?>
                        <option value="<?php echo $value->id ?>">
                          <?php echo $value->area_name ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="col-md-3">
                    <input type="text" min="1" step="1" name="name" class="form-control" value="<?php echo @$_GET['name'] ?>" placeholder="Enter customer name">
                  </div>
                  
                  <div class="col-md-3">
                      <input type="submit" value="Apply" class="btn btn-info btn-sm">
                  </div>
              </div>
            </form>
            <hr style="color: green;">

            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="1">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Contact Number</th>
                    <th>Reward Name</th>
                    <th>Request Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (count($res) > 0 ): ?>

                    <?php $i = 1; foreach ($res as $key => $value): ?>
                      <tr>
                        <th scope="row"><?php echo $i++ ?></th>
                        <td><?php echo $value->name ?></td>
                        <td><?php echo $value->email ?></td>
                        <td><?php echo $value->contact_num ?></td>
                        <td>1 bag of compost</td>
                        <td>February 10, 2021</td>
                        <td>
                          <button type="button"
                          data-payload='<?php echo json_encode($value, JSON_HEX_APOS|JSON_HEX_QUOT); ?>'
                          class="edit-row btn btn-info btn-xs">Edit</button>
                          <button type="button" data-id='<?php echo $value->id; ?>'
                            class="btn btn-delete btn-danger btn-xs">Delete</button>
                        </td>
                        </tr>
                      <?php endforeach; ?>


                    <?php else: ?>
                      <tr>
                        <td colspan="4" style="text-align:center">Empty table data</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- page end-->
    </section>
  </section>

  <!-- Modal -->
  <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Manage</h4>
        </div>
        <div class="modal-body">

          <form id="main-form" role="form" method="post">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="name" placeholder="Name">
            </div>

            <div class="form-group">
              <label >Description</label>
              <input type="email" class="form-control" name="description" placeholder="Email">
            </div>

            <div class="form-group">
              <label >Points Need</label>
              <input type="text" class="form-control" name="points_need" placeholder="Contact Number">
            </div>

          </div>
          <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            <input class="btn btn-info" type="submit" value="Save changes">
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- modal -->

  <script src="<?php echo base_url('public/admin/js/custom/') ?>rewards_management.js"></script>
  <script src="<?php echo base_url('public/admin/js/custom/') ?>generic.js"></script>
