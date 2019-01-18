<?php
  include('include/config.php');
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="<?php echo $sideurl;?>/home.php">Home</a>
  <a href="<?php echo $sideurl;?>/lessons.php">Lessons</a>
  <a href="#">Unguided Timer</a>
  <a href="#">Activity Tracking</a>
  <a id="logout" onclick="logout(this)" href="javascript:void(0)">Logout</a>
</div>


<script>


  function logout(obj)
  {
    swal({
      title: "Confirm!",
      text: 'Do you want Logout..!!!',
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) 
      {
        localStorage.setItem("uid","");
        firebase.auth().signOut().then(function() {
            window.location.href="/dynamiclc";
        }).catch(function(error) {
          var errorCode = error.code;
          alert(error);
        });
        
      } else {
        
      }
    });

  } 


  function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
    document.getElementById("wrapper").style.marginLeft = "300px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("wrapper").style.marginLeft= "0";
}
</script>