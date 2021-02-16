<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <!-- page start-->
    <div class="row">

      <form role="form" method="post"
      enctype="multipart/form-data"
       action="<?php echo base_url('cms/rewards/add')?>">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
              Customer information<br>
              <sub><strong>Please fill out the required fields (*)</strong></sub>
              <?php if ($flash_msg = $this->session->flash_msg): ?>
                <br><sub style="color: <?php echo $flash_msg['color'] ?>"><?php echo $flash_msg['message'] ?></sub>
              <?php endif; ?>
          </header>
          <div class="row">
            <div class="col-md-12">
              <section class="panel">
                <div class="panel-body">
                  <div class="form-group">
                    <label >Upload Profile Picture (Logo of Company) </label>
                    <input type="file" class="form-control" name="profile_picture">
                  </div>
                  <div class="form-group">
                    <label >Name *</label>
                    <input type="text" class="form-control" name="name" required="required">
                  </div>
                  <div class="form-group">
                    <label >Business Name/Comapany Name*</label>
                    <input type="text" class="form-control" name="company_name" required="required">
                  </div>
                  <div class="form-group">
                    <label >Email Adress *</label>
                    <input type="number" min="0" class="form-control" name="email" required="required">
                  </div>
                  <div class="form-group">
                    <label >Customer Type *</label>
                    <select class="form-control" name="customer_type" disabled="disabled">
                      <option value="Household">Household</option>
                      <option value="Corporate" selected="selected">Corporate</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label >Location Area *</label>
                    <select class="form-control" name="area_name">
                      <?php foreach (getAreas($this) as $key => $value): #helpers/custom_helper.php ?>
                        <option value="<?php echo $value->id ?>">
                          <?php echo $value->area_name ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label >Complete Adress *</label>
                    <input type="text" class="form-control" name="address" required="required">
                  </div>

                  <div class="form-group">
                    <label >Upload Documents (BIR cert, Mayor's Permit, DTI, etc.) </label>
                    <input type="file" class="form-control" multiple name="attachments">
                  </div>


                  <div class="form-group">
                    <input class="btn btn-info" type="submit" value="Add User">
                  </div>
                  <!-- last element -->
                </div>
              </section>
            </div>
          </div>
        </section>
      </div>


    </div>
  </form>
  <!-- page end-->
</section>
</section>
<!--main content end-->


<script type="text/javascript">

$(document).ready(function() {
});

</script>
<script src="<?php echo base_url('public/admin/js/custom/') ?>create_rewards_management.js"></script>
<script src="<?php echo base_url('public/admin/js/custom/') ?>generic.js"></script>
