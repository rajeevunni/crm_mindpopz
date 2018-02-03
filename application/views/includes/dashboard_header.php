<div class="main_bg_1">
	<div class="main_bg_sub_sub_1">
		<div class="icon_logout">
			<a href="<?php echo base_url().'index.php/Dashboard'; ?>">
				<!-- <div class="logo_icon logo_icon_inner"></div> -->
				<div class="helpus_logo">TICKET TRACKING SYSTEM</div>
			</a>
			<?php
			if($this->session->userdata('user_logged')=="yes:tracking_user")
			{
			?>
				<div class="header-hotlink buttons header-hotlink_dashboard">
					<ul>
						<li><a href="<?php echo base_url().'index.php/Logout' ?>" class="logout__button">Log out</a></li>
					</ul>
				</div>
			<?php
			}
			?>
			<div class="clear"></div>	
		</div>
	</div>			
	<div class="clear"></div>
</div>
<div class="popup-background"></div>
<div class="popup-popup-content">
	<div class="popup__content">			
	</div>			
</div>
<div class="popup-more-content">
	<div class="more__content">			
	</div>			
</div>