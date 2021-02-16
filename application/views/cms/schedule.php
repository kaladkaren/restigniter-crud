<style type="text/css">
  tr:nth-child(even) {background: #e6ffe6}
  tr:nth-child(odd) {background: #FFF}
</style>
<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Schedule
            <?php if ($flash_msg = $this->session->flash_msg): ?>
              <br><sub style="color: <?php echo $flash_msg['color'] ?>"><?php echo $flash_msg['message'] ?></sub>
            <?php endif; ?>
          </header>
          <div class="panel-body">
            <p>
              <button type="button" class="add-btn btn btn-success btn-sm">Add new schedule</button>
            </p>
            
            <div class="row">
              <div class="col-md-4" style="text-align:left">
                <p><b>Date Range</b></p>
              </div>
              <div class="col-md-2" style="text-align: left; font-style: bold;">
                <p><b>By Location</b></p>
              </div>
              <div class="col-md-2" style="text-align: left; font-style: bold;">
                <p><b>By Customer Type </b></p>
              </div>
              <div class="col-md-4" style="text-align: right; font-style: bold;">
                <p><b>Date Today</b></p>
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
                    <select name="user_id" class="form-control">
                        <option value="">Type</option>
                        <option>Household</option>
                        <option>Corporate</option>
                    </select>
                  </div>
                  
                  <div class="col-md-1">
                      <input type="submit" value="Search" class="btn btn-info btn-sm">
                  </div>

                  <div class="col-md-2" style="text-align: right; font-style: italic;">
                    <p><?php echo(date("F j, Y")); ?></p>
                  </div>
              </div>
            </form>
            <hr>

            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="1">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Area</th>
                    <th>Customer Type</th>
                    <th>Pickup Date</th>
                    <th>Weight</th>
                    <th>Pickup Status</th>
                    <th>Staff Assigned</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php //if (count($res) > 0 ): ?>

                    <?php //$i = 1; foreach ($res as $key => $value): 
                    ?>
                      <tr>
                        <td><?php //echo $value->name ?>Marikina City</td>
                        <td><?php //echo $value->email ?>Household</td>
                        <td>Febuary 28, 2021</td>
                        <td>1kg</td>
                        <td>Pending</td>
                        <td>Juan Dela Cruz</td>
                        <td>
                          
                          <button type="button"
                          data-payload='<?php //echo json_encode($value, JSON_HEX_APOS|JSON_HEX_QUOT); ?>'
                          class="view-row btn btn-info btn-xs"><i class="fa fa-eye"></i> Details</button><br>
                          
                          <button type="button" data-id='<?php //echo $value->id; ?>'
                            class="tag-picked btn btn-warning btn-xs" style="margin-top: 2px;">Tag as picked up</button>


                        </td>
                      </tr>

                      <tr>
                        <td><?php //echo $value->name ?>Pasay City</td>
                        <td><?php //echo $value->email ?>Corporate</td>
                        <td>Any date</td>
                        <td>5kg</td>
                        <td>Pending</td>
                        <td>Brent De Guzman</td>
                        <td>
                          
                          <button type="button"
                          data-payload='<?php //echo json_encode($value, JSON_HEX_APOS|JSON_HEX_QUOT); ?>'
                          class="edit-row btn btn-info btn-xs"><i class="fa fa-eye"></i> Details</button><br>
                          
                          <button type="button" data-id='<?php //echo $value->id; ?>'
                            class="btn btn-warning btn-xs" style="margin-top: 2px;">Tag as picked up</button>


                        </td>
                      </tr>
                      <tr>
                        <td><?php //echo $value->name ?>Marikina City</td>
                        <td><?php //echo $value->email ?>Household</td>
                        <td>Febuary 28, 2021</td>
                        <td>1kg</td>
                        <td>Pending</td>
                        <td>Juan Dela Cruz</td>
                        <td>
                          
                          <button type="button"
                          data-payload='<?php //echo json_encode($value, JSON_HEX_APOS|JSON_HEX_QUOT); ?>'
                          class="edit-row btn btn-info btn-xs"><i class="fa fa-eye"></i> Details</button><br>
                          
                          <button type="button" data-id='<?php //echo $value->id; ?>'
                            class="btn btn-warning btn-xs" style="margin-top: 2px;">Tag as picked up</button>


                        </td>
                      </tr>

                      <tr>
                        <td><?php //echo $value->name ?>Marikina City</td>
                        <td><?php //echo $value->email ?>Household</td>
                        <td>Febuary 28, 2021</td>
                        <td>1kg</td>
                        <td>Pending</td>
                        <td>Juan Dela Cruz</td>
                        <td>
                          
                          <button type="button"
                          data-payload='<?php //echo json_encode($value, JSON_HEX_APOS|JSON_HEX_QUOT); ?>'
                          class="edit-row btn btn-info btn-xs"><i class="fa fa-eye"></i> Details</button><br>
                          
                          <button type="button" data-id='<?php //echo $value->id; ?>'
                            class="btn btn-warning btn-xs" style="margin-top: 2px;">Tag as picked up</button>


                        </td>
                      </tr>
                      <?php //endforeach; ?>


                    <?php //else: ?>
                      <!-- <tr>
                        <td colspan="4" style="text-align:center">Empty table data</td>
                      </tr> -->
                    <?php //endif; ?>
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
              <label >Staff Assigned</label>
              <select name="admin_id" class="form-control">
                <option value="">Staff</option>
                <?php foreach (getStaff($this) as $key => $value): #helpers/custom_helper.php ?>
                  <option value="<?php echo $value->id ?>">
                    <?php echo $value->name ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label >Area</label>
              <select name="area_id" class="form-control">
                <option value="">Areas</option>
                <?php foreach (getAreas($this) as $key => $value): #helpers/custom_helper.php ?>
                  <option value="<?php echo $value->id ?>">
                    <?php echo $value->area_name ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
              <label >Booking Type</label>
              <select name="booking_type" class="form-control">
                  <option>Household</option>
                  <option>Corporate</option>
              </select>
            </div>

            <div class="form-group">
              <label >Pickup Date</label>
              <input type="date" class="form-control" name="pickup_date">
            </div>

            <div class="form-group">
              <label >Pickup Time</label>
              <input type="time" class="form-control" name="pickup_time">
            </div>

            <div class="form-group">
              <label>Weight</label>
              <input type="text" class="form-control" name="weight" placeholder="Weight">
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

<script>
  n =  new Date();
  y = n.getFullYear();
  m = n.getMonth() + 1;
  d = n.getDate();
  document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
</script>

  <script src="<?php echo base_url('public/admin/js/custom/') ?>schedule_management.js"></script>
  <script src="<?php echo base_url('public/admin/js/custom/') ?>generic.js"></script>
