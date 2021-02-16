<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Finance: List of Unpaid Customers
            <?php if ($flash_msg = $this->session->flash_msg): ?>
              <br><sub style="color: <?php echo $flash_msg['color'] ?>"><?php echo $flash_msg['message'] ?></sub>
            <?php endif; ?>
          </header>
          <div class="panel-body">

            <div class="row">
              <div class="col-md-4" style="text-align:left">
                <p><b>Date Range</b></p>
              </div>
              <div class="col-md-2" style="text-align: left; font-style: bold;">
                <p><b>By Location</b></p>
              </div>
              <div class="col-md-3" style="text-align: left; font-style: bold;">
                <p><b>By Name/Company Name </b></p>
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
                    <input type="text" name="name" class="form-control" value="<?php echo @$_GET['name'] ?>" placeholder="Enter customer name">
                  </div>
                  
                  <div class="col-md-3">
                      <input type="submit" value="Search" class="btn btn-info btn-sm">
                  </div>
              </div>
            </form>
            <hr>
            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="1">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Pickup Date</th>
                    <th>No. of Buckets</th>
                    <th>Weight</th>
                    <th>Area</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (count($res) > 0 ): ?>

                    <?php $i = 1; foreach ($res as $key => $value): 
                    ?>
                      <tr>
                        <th scope="row"><?php echo $i++ ?></th>
                        <td><?php echo $value->name ?></td>
                        <td><?php echo $value->email ?></td>
                        <td><?php echo $value->created_at ?></td>
                        <td><?php echo $value->num_buckets ?></td>
                        <td>1kg</td>
                        <td>Marikina City</td>
                        <td>Php. 560.00</td>
                        <td>
                          
                          <button type="button"
                          data-payload='<?php echo json_encode($value, JSON_HEX_APOS|JSON_HEX_QUOT); ?>'
                          class="view-row btn btn-info btn-xs"><i class="fa fa-eye"></i> Details</button><br>
                          <button type="button" data-id='<?php echo $value->id; ?>'
                            class="send-row btn btn-success btn-xs" style="margin-top: 2px;"><i class="fa fa-envelope"></i> Send Reminder</button><br>
                          <button type="button" data-id='<?php echo $value->id; ?>'
                            class="tag-paid-row btn btn-warning btn-xs" style="margin-top: 2px;">Tag as paid</button>


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
            <div class="row details">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                  <label >Email address</label>
                  <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <label >User Type</label>
                  <select class="form-control" name="user_type">
                    <option>Admin</option>
                    <option>Staff</option>
                  </select>
                </div>
                <div class="form-group">
                  <label >Contact Number</label>
                  <input type="text" class="form-control" name="contact_num" placeholder="Contact Number">
                </div>
                <div class="form-group">
                  <label >No. of Buckets</label>
                  <input type="text" class="form-control" name="num_buckets" placeholder="No. of Buckets">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label >Pickup Date</label>
                  <input type="date" class="form-control" name="pickup_date" placeholder="Pickup Date">
                </div>
                <div class="form-group">
                  <label >Pickup Time</label>
                  <input type="time" class="form-control" name="pickup_time" placeholder="Pickup Time">
                </div>
                <div class="form-group">
                  <label >Pickup Location</label>
                  <input type="text" class="form-control" name="pickup_location" placeholder="Pickup Location">
                </div>
                 <div class="form-group">
                  <label >Booked Date</label>
                  <input type="date" class="form-control" name="created_at" placeholder="Booked Date">
                </div>
                <div class="form-group">
                  <label >Total Price</label>
                  <input type="text" class="form-control" name="total_price" placeholder="Total Price">
                </div>
              </div>
          </div>

          <div class="tag-paid">
            <div class="form-group">
              <label>Payment Date</label>
              <input type="date" class="form-control" name="updated_at">
            </div>
            <div class="form-group">
              <label>Payment Method</label>
              <input type="text" class="form-control" name="payment_method">
            </div>
            <div class="form-group">
              <label>Payment Status</label>
              <input type="text" class="form-control" name="payment_status" value="Verified" disabled="disabled">
            </div>
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

  <script src="<?php echo base_url('public/admin/js/custom/') ?>finance_management.js"></script>
  <script src="<?php echo base_url('public/admin/js/custom/') ?>generic.js"></script>
