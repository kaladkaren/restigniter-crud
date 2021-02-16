<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            List of Customers
            
          </header>
          <div class="panel-body">

            <section>
              <?php if (!count($res)): ?>
                <div class="col-md-12">
                  <center>
                    <p>No entries yet</p>
                    <p>
                      <a href="<?php echo base_url('cms/customers/create') ?>">
                        <button type="button"
                        class="add-btn btn btn-info btn-xs">
                        Add an Entry</button>
                      </a>
                    </p>
                  </center>
                </div>
              <?php endif; ?>
              <?php foreach ($res as $key => $value):?>

                <div class="row">
                  <div class="col-md-2">
                    <center>
                      
                    <img src="<?php echo ($value->profile_picture == NULL ) ? base_url('public/admin/img/default.png') : base_url('public/admin/img/avatar1.jpg') ?>" alt="" style="max-height:75px;">
                    </center>
                  </div>
                  <div class="col-md-3">
                    <?php if($value->customer_type == 'Corporate') : ?>
                      <h5><b>Company Name: </b><?php echo $value->company_name ?></h5>
                    <?php else: ?>
                      <h5><b>Name: </b><?php echo $value->name ?></h5>
                    <?php endif; ?>
                    <p><b>Email Address: </b><?php echo $value->email ?><br>
                    <p><?php echo $value->contact_num ?></p>
                  </div>
                  <div class="col-md-4">
                    <h5></h5>
                    <p><b>Address: </b><?php echo $value->address ?></p>
                    <p><b>Customer Type: </b><?php echo $value->customer_type ?></p>
                  </div>
                  <div class="col-md-2">
                    <h5></h5>
                    <p><b>No. of Buckets: </b><?php echo $value->num_buckets ?></p>
                    <p style="font-style: italic;"><b>Customer Status: </b>Active</p>
                  </div>
                    
                  <div class="col-md-1">
                    <input type="hidden" data-payload='<?php echo json_encode($value, JSON_HEX_APOS|JSON_HEX_QUOT); ?>'>
                    <button class="view-row btn btn-success" name="button">
                      <i class="fa fa-eye"></i>
                    </button><br>
                    <?php // if($value->customer_type == 'Corporate') : ?>
                      <button class="edit-row btn btn-info" name="button" style="margin-top: 5px;">
                        <i class="fa fa-pencil"></i>
                      </button>
                    <?php //endif; ?>
                  </div>
                </div>
                <div style="height: 10px; background-color: #e6ffe6;"></div><br>
                  <?php endforeach; ?>

                  <style>
                  .active_lg {
                    background: lightgray !important
                  }
                  </style>
                  
            </section>


          </div>
        </section>

           
      </div>
    </div>
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
            <div class="row">
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
                  <label >Customer Type</label>
                  <select class="form-control" name="customer_type" id="customer_type">
                    <option value="Household">Household</option>
                    <option value="Corporate" selected="selected">Corporate</option>
                  </select>
                </div>
                <div class="form-group">
                  <label >Address</label>
                  <input type="text" class="form-control" name="address" placeholder="Contact Number">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Number of Buckets</label>
                  <input type="text" class="form-control" name="num_buckets" placeholder="Number of Buckets">
                </div>
                <div class="form-group">
                  <label >Total Points</label>
                  <input type="email" class="form-control" name="total_points" placeholder="Total Points">
                </div>
                <div class="form-group">
                  <label >Remarks</label>
                  <input type="email" class="form-control" name="remarks" placeholder="Remarks">
                </div>
                <div class="form-group">
                  <label >Profile Picture</label>
                  
                  <a href="" id="img_link" target="_blank">
                    <img src="" id="img_src" style='height:50px;margin:10px'alt="" style="display:none">
                  </a>
                  <input type="file" class="form-control" name="profile_picture">
                </div>
              </div>

              <div class="col-md-12 password_panel">
                <div class="form-group">
                  <label ><b>Tag as Suspended?</b> </label><br>
                  <label style="font-style: italic;">Note: Tagging customer as suspended will not be able to avail the service.</label>
                  <select class="form-control" name="is_suspended" id="is_suspended">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                  </select>
                </div>
                <div class="form-group">
                  <label >Password</label>
                  <input type="password" class="form-control" name="password" placeholder="New Password">
                </div>
                <div class="form-group">
                  <label >Confirm Password</label>
                  <input type="password" class="form-control" id="confirm_password" placeholder="Confirm New Password">
                </div>
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

  <script type="text/javascript">

  </script>

  <script src="<?php echo base_url('public/admin/js/custom/') ?>customer_management.js"></script>
  <script src="<?php echo base_url('public/admin/js/custom/') ?>generic.js"></script>
