<header class="main-header"><nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<img src="../assets/img/logo/<?php echo "$i[gambar] "; ?>" width="40" class="align-center pull-left" alt="" style='padding: 5px;'> 
			<a class="navbar-brand" href="#"><b>KNPI | INPUT DATA</b></a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><i class="fa fa-home"></i> BERANDA <span class="sr-only">(current)</span></a></li>
				<li><a href="user_ubah.php?id=<?php echo $_SESSION['id']; ?>"><i class="fa fa-user"></i> LIHAT DATA</a></li>
				<li><a target='_blank' href="cetak.php?id=<?php echo $_SESSION['id']; ?>"><i class="fa fa-print"></i> CETAK KARTU 1</a></li>
				<li><a target='_blank' href="cetak1.php?id=<?php echo $_SESSION['id']; ?>"><i class="fa fa-print"></i> CETAK KARTU 2</a></li>
				<!-- <li><a target='_blank' href="cetak.php?id=<?php echo $_SESSION['id']; ?>"><i class="fa fa-print"></i> CETAK KARTU</a></li> -->
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a>
						Hallo, Apa Kabar?
					</a>
				</li>
				<li class="dropdown user user-menu">
					<a><img src="../assets/img/user/<?php if (trim($_SESSION['gambar']) == ''){ echo "blank.png"; }else{ echo $_SESSION['gambar']; } ?>" class="user-image" alt="User">
						<span class="hidden-xs"><?php echo $_SESSION['nama']; ?></span>
					</a>
				</li>
				<li class="dropdown messages-menu bg-orange">
					<a href="logout.php" onclick="return confirm('Yakin ingin Logout?')">
						<i class="fa fa-sign-out"></i> KELUAR
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav></header>