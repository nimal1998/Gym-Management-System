<!DOCTYPE html>
<html lang="en">
<?php session_start();
require_once("db_connect.php");
?>
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}">
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<title>Gym Management System</title>
<?php
if(!isset($_SESSION['user']))
header('location:login.php');
include('./header.php');
?>

</head>
</style>
<body>
<?php include 'topbar1.php' ?>
<?php include 'navbar1.php' ?>
<div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
<div class="toast-body text-white">
</div>
</div>
</div>
</div>
<main id="view-panel" >
<?php  ?>
<?php  ?>

<br><b><center>  <?php echo "Welcome ". $_SESSION['user']."!"  ?></center></b></br></br>

                        <?php

						$user=$_SESSION['user'];
				$sq="SELECT * FROM members INNER JOIN users ON members.id=users.id WHERE users.username ='$_SESSION[user]'";
                $result = $conn->query($sq);
                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
				  $uid=$row['id'];



				  }}

					?>

<div class="col-md-8">
<div class="card">
<div class="card-header">
<b>Package List</b>
</div>
<div class="card-body">
<table class="table table-bordered table-hover">
<colgroup>
<col width="5%">
<col width="55%">
<col width="20%">
<col width="20%">
</colgroup>
<thead>
<tr>
<th class="text-center">#</th>
<th class="text-center">package</th>
<th class="text-center">Amount</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
<?php
$i = 1;
$check= $conn->query("SELECT * FROM user_packages where member_id='$uid'");
if(mysqli_fetch_assoc($check)){
$package = $conn->query("SELECT a.id, a.package,a.description,a.amount, b.id from packages a ,user_packages b where a.id=b.id and b.member_id='$uid'");
while($row=$package->fetch_assoc()):
?>
<tr>
<td class="text-center"><?php echo $i++ ?></td>
<td class="">
<p>package: <b><?php echo $row['package'] ?></b></p>
<p>Description: <small><b><?php echo $row['description'] ?></b></small></p>
</td>
<td class="text-right">
<b><?php echo number_format($row['amount'],2) ?></b>
</td>


<td class="text-center">
	<form>
	<input type="hidden" name="id" value=" <?PHP echo $row['id'] ?>">
	<input type="hidden" name="memberid" value=" <?PHP echo $uid ?>">
	<button class="btn btn-sm btn-outline-primary edit_member" type="submit" disabled name="edit">Purchased</button>
  <?php $url="generate.php?id=".$row['id']."&uid=".$uid; ?>
<a href="<?php echo $url;?>">Reciept
</a>
	</form>

	</td>
	<?php endwhile; ?>
  <?php
}
else{
  $i = 1;
  $package = $conn->query("SELECT * FROM packages order by id asc");
  while($row=$package->fetch_assoc()):
  ?>
  <tr>
  <td class="text-center"><?php echo $i++ ?></td>
  <td class="">
  <p>package: <b><?php echo $row['package'] ?></b></p>
  <p>Description: <small><b><?php echo $row['description'] ?></b></small></p>
  </td>
  <td class="text-right">
  <b><?php echo number_format($row['amount'],2) ?></b>
  </td>


  <td class="text-center">


  	<input type="hidden" name="id" value=" <?PHP echo $row['id'] ?>">
  	<input type="hidden" name="memberid" value=" <?PHP echo $uid ?>">
  	<button class="btn btn-sm btn-outline-primary edit_member"  name="edit" onclick="pay('<?php echo $row['amount']; ?>','<?php echo $row['id']; ?>','<?php echo $uid; ?>')">Purchase</button>



  	</td>
  <?php endwhile;  }?>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</main>
<div id="preloader"></div>
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<div class="modal fade" id="uni_modal" role='dialog'>
<div class="modal-dialog modal-md" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title"></h5>
</div>
<div class="modal-body">
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
</div>
</div>
</div>
</div>
<div class="modal fade" id="confirm_modal" role='dialog'>
<div class="modal-dialog modal-md" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Confirmation</h5>
</div>
<div class="modal-body">
<div id="delete_content"></div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<div class="modal fade" id="viewer_modal" role='dialog'>
<div class="modal-dialog modal-md" role="document">
<div class="modal-content">
<button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
<img src="" alt="">
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://checkout.stripe.com/checkout.js"></script>

<script type="text/javascript">

  function pay(amount,id,uid) {
    var handler = StripeCheckout.configure({
      key: 'pk_test_5f6jfFP2ZV5U9TXQYG0vtqFJ00eFVWNoRX', // your publisher key id
      locale: 'auto',
      currency:'INR',
      token: function (token) {
        // You can access the token ID with `token.id`.
        // Get the token ID to your server-side code for use.
        console.log('Token Created!!');
        console.log(token)
        $('#token_response').html(JSON.stringify(token));

        $.ajax({
          url:"payment.php",
          method: 'post',
          data: { tokenId: token.id, amount: amount ,id: id, uid: uid},
          dataType: "json",
          success: function( response ) {
          location.reload();
          }
        })
      }
    });

    handler.open({
      name: 'Gym management Site',
      description: 'Gym',
      amount: amount * 100
    });
  }
</script>

</body>
<script>
 window.start_load = function(){
  $('body').prepend('<di id="preloader2"></di>')
  }
 window.end_load = function(){
  $('#preloader2').fadeOut('fast', function() {
  $(this).remove();
  })
  }
 window.viewer_modal = function($src = ''){
 start_load()
 var t = $src.split('.')
 t = t[1]
if(t =='mp4'){
var view = $("<video src='"+$src+"' controls autoplay></video>")
}else{
var view = $("<img src='"+$src+"' />")
}
$('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
$('#viewer_modal .modal-content').append(view)
$('#viewer_modal').modal({
show:true,
backdrop:'static',
keyboard:false,
focus:true
})
end_load()
}
window.uni_modal = function($title = '' , $url='',$size=""){
start_load()
$.ajax({
url:$url,
error:err=>{
console.log()
alert("An error occured")
},
success:function(resp){
if(resp){
$('#uni_modal .modal-title').html($title)
$('#uni_modal .modal-body').html(resp)
if($size != ''){
$('#uni_modal .modal-dialog').addClass($size)
}else{
$('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
}
$('#uni_modal').modal({
show:true,
backdrop:'static',
keyboard:false,
focus:true
})
end_load()
}
}
})
}
window._conf = function($msg='',$func='',$params = []){
 $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
 $('#confirm_modal .modal-body').html($msg)
 $('#confirm_modal').modal('show')
}
 window.alert_toast= function($msg = 'TEST',$bg = 'success'){
 $('#alert_toast').removeClass('bg-success')
 $('#alert_toast').removeClass('bg-danger')
  $('#alert_toast').removeClass('bg-info')
  $('#alert_toast').removeClass('bg-warning')
  if($bg == 'success')
  $('#alert_toast').addClass('bg-success')
  if($bg == 'danger')
  $('#alert_toast').addClass('bg-danger')
  if($bg == 'info')
  $('#alert_toast').addClass('bg-info')
  if($bg == 'warning')
  $('#alert_toast').addClass('bg-warning')
  $('#alert_toast .toast-body').html($msg)
  $('#alert_toast').toast({delay:3000}).toast('show');
  }
  $(document).ready(function(){
  $('#preloader').fadeOut('fast', function() {
  $(this).remove();
  })
  })
  $('.datetimepicker').datetimepicker({
  format:'Y/m/d H:i',
  startDate: '+3d'
  })
  $('.select2').select2({
  placeholder:"Please select here",
  width: "100%"
  })
</script>
</html>
