<div id="head-nav" class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="fa fa-gear"></span>
      </button>
      
      <img src="images/oie_transparent.png" style="width: 190px; height: 45px; padding-top: 10px; padding-left: 25px; padding-right: 47px;">

    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="main.php">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right user-nav">
        <li class="dropdown profile_menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img alt="Avatar" src="images/avatar2.jpg" /><?php session_start(); echo $_SESSION["CompleteUserName"]; ?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Profile</a></li>
            <li class="divider"></li>
            <li><a href="#" onclick="cerrarSesion()">Sign Out</a></li>
          </ul>
        </li>
      </ul>	
    </div><!--/.nav-collapse -->
  </div>
</div>