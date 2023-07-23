<div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
      -->
      <div class="logo" style="padding: 20px; background: #333; margin-bottom: 20px;">
      	<a href="./" class="simple-text logo-normal">
      		<img src="../../../img/logo.png" alt="" style="width: 100%;">
      	</a>
      </div>
      <div class="sidebar-wrapper">
      	<ul class="nav">
      		<li class="nav-item <?php if($page=='Dashboard')echo 'active'; ?> ">
      			<a class="nav-link" href="./">
      				<i class="material-icons">dashboard</i>
      				<p>Dashboard</p>
      			</a>
      		</li>
      		<li class="nav-item <?php if($page=='My Profile')echo 'active'; ?>">
      			<a class="nav-link" href="profile">
      				<i class="material-icons">person</i>
      				<p>My Profile</p>
      			</a>
      		</li>

      		<li class="nav-item <?php if($page=='Fund Wallet')echo 'active'; ?>">
      			<a class="nav-link" href="fund-wallet">
      				<i class="material-icons">money</i>
      				<p>Fund Wallet</p>
      			</a>
      		</li>
			  <li class="nav-item <?php if($page=='Package')echo 'active'; ?>">
      			<a class="nav-link" href="package">
      				<i class="material-icons">library_books</i>
      				<p>Package</p>
      			</a>
      		</li>

      		<li class="nav-item <?php if($page=='Cash Out')echo 'active'; ?>">
      			<a class="nav-link" href="cash-out">
      				<i class="material-icons">money</i>
      				<p>Cash Out</p>
      			</a>
      		</li>
			  <li class="nav-item <?php if($page=='Buy NFT')echo 'active'; ?>">
      			<a class="nav-link" href="buy-nft">
      				<i class="material-icons">money</i>
      				<p>Buy NFT</p>
      			</a>
      		</li>

      		<li class="nav-item <?php if($page=='My Referrals')echo 'active'; ?>">
      			<a class="nav-link" href="referrals">
      				<i class="material-icons">content_paste</i>
      				<p>My Referrals</p>
      			</a>
      		</li>

      		<!-- <li class="nav-item active-pro ">
      			<a class="nav-link" href="support">
      				<i class="material-icons">unarchive</i>
      				<p>Customer Care</p>
      			</a>
      		</li> -->
      	</ul>
      </div>
    </div>