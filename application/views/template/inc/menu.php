<aside class="main-sidebar">
		<section class="sidebar">
			<div class="user-panel">
				<div class="pull-left image">
				</div>
				<div class="pull-left info">
				</div>
			</div>
			
			
			<!-- search form (Optional) -->
			<form action="#" method="get" class="sidebar-form">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
						<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>
			
			<!-- Sidebar Menu -->
			<ul class="sidebar-menu">
				<li class="header">MAIN MENU</li>
				<li class="<?php echo $this->uri->segment(2) == ''? 'active':'';?>"><a href="<?php echo base_url().'doc';?>"><i class="fa fa-home"></i> <span>Home</span></a></li>		
				<li class="treeview <?php echo $this->uri->segment(2) == 'member'? 'active':'';?>">
					<a href="#"><i class="fa fa-users"></i> <span>Member</span> <i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url().'doc/member';?>#auth"><i class="fa fa-arrow-circle-right"></i> Auth</a></li>
						<li><a href="#detail"><i class="fa fa-arrow-circle-right"></i> Detail Member</a></li>
					</ul>
				</li>
				
			</ul>
        </section>
	</aside>
	<?php #print_r($this->session->all_userdata());?>
