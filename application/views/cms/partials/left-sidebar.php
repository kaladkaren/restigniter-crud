
<section id="container" class="">
  <!--header start-->
  <header class="header white-bg">
    <div class="sidebar-toggle-box">
      <i class="fa fa-bars"></i>
    </div>
    <!--logo start-->
    <a href="<?php echo base_url('cms') ?>" class="logo" >Soilmate<span> CRUD</span></a>
    <!--logo end-->
    <div class="top-nav ">
      <ul class="nav pull-right top-menu">
        <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <!-- <img alt="" src="img/avatar1_small.jpg"> -->
            <span class="username">Welcome back, <?php echo $this->session->userdata('name'); ?></span>
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu extended logout">
            <li><a href="<?php echo base_url('cms/login/logout') ?>"><i class="fa fa-key"></i> Log Out</a></li>
          </ul>
        </li>

      </ul>
    </div>
  </header>
  <!--header end-->
  <!--sidebar start-->
  <aside>
    <div id="sidebar"  class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu" id="nav-accordion">
        <!-- <li>
          <a href="<?php echo base_url('') ?>"
            class="<?php echo $this->uri->segment(1) === '' && ($this->uri->segment(2) === null || $this->uri->segment(2) === 'dashboard') ? 'active': ''; ?>">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li> -->

        <li>
          <a href="<?php echo base_url('cms') ?>"
            class="<?php echo $this->uri->segment(1) === 'cms' && ($this->uri->segment(2) === null || $this->uri->segment(2) === 'dashboard') ? 'active': ''; ?>">
            <i class="fa fa-quote-left"></i>
            <span>Admin Management</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url('cms/areas') ?>"
            class="<?php echo $this->uri->segment(2) === 'areas' && ($this->uri->segment(2) === null || $this->uri->segment(2) === 'areas') ? 'active': ''; ?>">
            <i class="fa fa-map-marker"></i>
            <span>Pickup Areas</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url('cms/finance') ?>"
            class="<?php echo $this->uri->segment(2) === 'finance' && ($this->uri->segment(2) === null || $this->uri->segment(2) === 'finance') ? 'active': ''; ?>">
            <i class="fa fa-book"></i>
            <span>Accounting</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url('cms/reports') ?>"
            class="<?php echo $this->uri->segment(2) === 'reports' && ($this->uri->segment(2) === null || $this->uri->segment(2) === 'reports') ? 'active': ''; ?>">
            <i class="fa fa-bar-chart-o"></i>
            <span>Reports</span>
          </a>
        </li>

        <li class="sub-menu">

          <a href="javascript:;" class="<?php echo (in_array($this->uri->segment(2), ['customers', 'corporate', 'about']))  ? 'active': ''; ?>">
            <i class="fa fa-users"></i>
            <span>Customers </span>
          </a>
          <ul class="sub" >
            <li><a <?php echo !$this->uri->segment(3) ? 'style="color:#ff6c60"': ''; ?> href="<?php echo base_url('cms/customers') ?>">List of Customers</a></li>
            <li><a <?php echo $this->uri->segment(3) === 'create' ? 'style="color:#ff6c60"': ''; ?> href="<?php echo base_url('cms/customers/create') ?>">Add Corporate User</a></li>
            <li><a <?php echo $this->uri->segment(3) === 'cancelled_accounts' ? 'style="color:#ff6c60"': ''; ?> href="<?php echo base_url('cms/customers/cancelled_accounts') ?>">Cancelled Accounts</a></li>
          </ul>
        </li>

        <li class="sub-menu">

          <a href="javascript:;" class="<?php echo (in_array($this->uri->segment(2), ['rewards']))  ? 'active': ''; ?>">
            <i class="fa fa-glass"></i>
            <span>Rewards </span>
          </a>
          <ul class="sub" >
            <li><a <?php echo !$this->uri->segment(3) ? 'style="color:#ff6c60"': ''; ?> href="<?php echo base_url('cms/rewards') ?>">List of Rewards</a></li>
            <li><a <?php echo $this->uri->segment(3) === 'request' ? 'style="color:#ff6c60"': ''; ?> href="<?php echo base_url('cms/rewards/request') ?>">Customer Request</a></li>
          </ul>
        </li>

        <li>
          <a href="<?php echo base_url('cms/schedule') ?>"
            class="<?php echo $this->uri->segment(2) === 'schedule' && ($this->uri->segment(2) === null || $this->uri->segment(2) === 'schedule') ? 'active': ''; ?>">
            <i class="fa fa-laptop"></i>
            <span>Scheduling</span>
          </a>
        </li>


      </ul>
      <!-- sidebar menu end-->
    </div>
  </aside>
  <!--sidebar end-->
