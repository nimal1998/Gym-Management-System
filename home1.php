<?php include 'db_connect.php' ?>
<style>
   span.float-right.summary_icon {
    font-size: 3rem;
    position: absolute;
    right: 1rem;
    color: #ffffff96;
}
/* active members,totel packeges, */
.imgs{
		margin: .5em;
		max-width: calc(100%);
		max-height: calc(100%);
	}
	.imgs img{
		max-width: calc(100%);
		max-height: calc(100%);
		cursor: pointer;
	}
	#imagesCarousel,#imagesCarousel .carousel-inner,#imagesCarousel .carousel-item{
		height: 60vh !important;background: black;
	}
	#imagesCarousel .carousel-item.active{
		display: flex !important;
	}
	#imagesCarousel .carousel-item-next{
		display: flex !important;
	}
	#imagesCarousel .carousel-item img{
		margin: auto;
	}
	#imagesCarousel img{
		width: auto!important;
		height: auto!important;
		max-height: calc(100%)!important;
		max-width: calc(100%)!important;
	}
</style>
<div class="containe-fluid">
<div class="row mt-3 ml-3 mr-3">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
  <?php echo "Welcome ". $_SESSION['user']."!"  ?>
<hr>
<div class="row">
<div class="col-md-4">
<div class="card">
<div class="card-body bg-success">
<div class="card-body text-white">
<span class="float-right summary_icon"><i class="fa fa-users"></i></span>
<h4><b>
<?php echo $conn->query("SELECT * FROM schedules")->num_rows; ?>
</b></h4>
<p><b>Active Schedules</b></p>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="card-body bg-success">
<div class="card-body text-white">
<span class="float-right summary_icon"><i class="fa fa-list"></i></span>
<h4><b>
<?php echo $conn->query("SELECT * FROM packages")->num_rows; ?>
</b></h4>
<p><b>Available Packages</b></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
