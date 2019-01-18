<?php
	include('include/config.php');
	include('sidebar/sidebar.php');
?>
<script type="text/javascript">
	var uid = localStorage.getItem('uid');
	if(typeof uid != "null" &&  uid != null  && uid.length != 0 )
	{

	}else{
		window.location.href="/dynamiclc";
	}

</script>

<div id="wrapper">
	<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
	<h1>Welcome User</h1>
	<div class="lessons">
		 <a href="<?php echo $sideurl;?>/lessons.php">Lessons</a>
	</div>
	<div class="Unguidedtimer">
		<a href="#">Unguided Timer</a>
	</div>
	<div class="activityTracker">
		<a href="#">Activity Tracking</a>
	</div>
</div>

<script type="text/javascript">
	
</script>