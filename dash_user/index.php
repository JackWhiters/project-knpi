<?php
include "header.php";
include "menu.php";
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
?>

<div class="wrapper">


	<!-- Full Width Column -->
	<div class="content-wrapper">
		<div class="container">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					<?php echo "$i[sekolah] "; ?>
					<small>Control Panel.</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li><a href="#">Layout</a></li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
						<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
					</ol>
					<div class="carousel-inner">
						<div class="item active">
							<img src="../assets/img/slide/slide-1.png" alt="First slide" class="img-rounded img-thumbnail">
							<div class="carousel-caption">
								<h4>SELAMAT DATANG DI APLIKASI <?php echo "$i[nama] "; ?></h4>
							</div>
						</div>
						<div class="item">
							<img src="../assets/img/slide/slide-2.png" alt="Second slide" class="img-rounded img-thumbnail">
							<div class="carousel-caption">
								<h4>TETAPLAH BELAJAR HINGGA AKHIR HAYATMU</h4>
							</div>
						</div>
						<div class="item">
							<img src="../assets/img/slide/slide-3.png" alt="tree slide" class="img-rounded img-thumbnail">
							<div class="carousel-caption">
								<h4>TEKNOLOGI MENJADI PENGGERAK KEHIDUPAN</h4>
							</div>
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
						<span class="fa fa-angle-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
						<span class="fa fa-angle-right"></span>
					</a>
				</div>
<br>
				<div class="col-lg-4 col-xs-4">
						<!-- small box -->
						<div class="small-box bg-aqua">
							<div class="inner">
								<h4>
									LIHAT DATA
								</h4>
								<p><?php echo "$i[nama] "; ?></p>
							</div>
							<div class="icon">
								<i class="fa fa-edit"></i>
							</div>
							<a href="user_ubah.php?id=<?php echo $_SESSION['id']; ?>" class="small-box-footer">K L I K <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-4 col-xs-4">
						<!-- small box -->
						<div class="small-box bg-orange">
							<div class="inner">
								<h4>
									CETAK KARTU
								</h4>
								<p><?php echo "$i[nama] "; ?></p>
							</div>
							<div class="icon">
								<i class="fa fa-print"></i>
							</div>
							<a target='_blank' href="cetak.php?id=<?php echo $_SESSION['id']; ?>" class="small-box-footer">Cetak Sekarang <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-4 col-xs-4">
						<!-- small box -->
						<div class="small-box bg-orange">
							<div class="inner">
								<h4>
									CETAK KARTU
								</h4>
								<p><?php echo "$i[nama] "; ?></p>
							</div>
							<div class="icon">
								<i class="fa fa-print"></i>
							</div>
							<a target='_blank' href="cetak1.php?id=<?php echo $_SESSION['id']; ?>" class="small-box-footer">Cetak Sekarang <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.container -->
	</div>
	<!-- /.content-wrapper -->
	<?php include "footer.php";?>
</div>
