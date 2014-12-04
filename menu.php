<div class="cl-sidebar">
	<div class="cl-toggle"><i class="fa fa-bars"></i></div>
	<div class="cl-navblock">
    <div class="menu-space">
      <div class="content">
        <div class="side-user">
          <div class="avatar"><img src="images/avatar1_50.jpg" alt="Avatar" /></div>
          <div class="info">
            <a href="#"><?php echo $_SESSION["UserName"]; ?></a>
            <img src="images/state_online.png" alt="Status" /> <span>Online</span>
          </div>
        </div>

        <ul class="cl-vnavigation">
          <li>
            <a href="main.php">
              <i class="fa fa-home"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="fanCentrifugal">
            <a href="#">
              <i class="fa fa-list"></i>
              <span>Fans Centrifugal</span>
            </a>
          </li>
          <div id="fanCentrifugal">
            <li style="background-color:#CFCFCF;">
              <a href="#">
                <i class="fa fa-tachometer"></i>
                <span>HA</span>
              </a>
              <ul class="sub-menu">
                <li><a href="#"><i class="fa fa-angle-right"></i>Select</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i>More Info</a></li>
                <li>
                  <figure style="padding: 13px 13px 0px 13px;">
                    <img src="images/blur_bg.png" style="width: 100%;">
                  </figure>
                </li>
              </ul>
            </li>
            <li style="background-color:#CFCFCF;">
              <a href="#"><i class="fa fa-tachometer"></i><span>HC</span></a>
              <ul class="sub-menu">
                <li><a href="#"><i class="fa fa-angle-right"></i>Select</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i>More Info</a></li>
                <li>
                  <figure style="padding: 13px 13px 0px 13px;">
                    <img src="images/blur_bg.png" style="width: 100%;">
                  </figure>
                </li>
              </ul>
            </li>
            <li style="background-color:#CFCFCF;">
              <a href="#"><i class="fa fa-tachometer"></i><span>HBDD</span></a>
              <ul class="sub-menu">
                <li><a href="#"><i class="fa fa-angle-right"></i>Select</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i>More Info</a></li>
                <li>
                  <figure style="padding: 13px 13px 0px 13px;">
                    <img src="images/blur_bg.png" style="width: 100%;">
                  </figure>
                </li>
              </ul>
            </li>
            <li style="background-color:#CFCFCF;">
              <a href="#"><i class="fa fa-tachometer"></i><span>HD</span></a>
              <ul class="sub-menu">
                <li><a href="#"><i class="fa fa-angle-right"></i>Select</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i>More Info</a></li>
                <li>
                  <figure style="padding: 13px 13px 0px 13px;">
                    <img src="images/blur_bg.png" style="width: 100%;">
                  </figure>
                </li>
              </ul>
            </li>
            <li style="background-color:#CFCFCF;">
              <a href="#"><i class="fa fa-tachometer"></i><span>GL</span></a>
              <ul class="sub-menu">
                <li><a href="#"><i class="fa fa-angle-right"></i>Select</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i>More Info</a></li>
                <li>
                  <figure style="padding: 13px 13px 0px 13px;">
                    <img src="images/blur_bg.png" style="width: 100%;">
                  </figure>
                </li>
              </ul>
            </li>
            <li style="background-color:#CFCFCF;">
              <a href="#"><i class="fa fa-tachometer"></i><span>LH</span></a>
              <ul class="sub-menu">
                <li><a href="#"><i class="fa fa-angle-right"></i>Select</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i>More Info</a></li>
                <li>
                  <figure style="padding: 13px 13px 0px 13px;">
                    <img src="images/blur_bg.png" style="width: 100%;">
                  </figure>
                </li>
              </ul>
            </li>
            <li style="background-color:#CFCFCF;">
              <a href="#"><i class="fa fa-tachometer"></i><span>STDM</span></a>
              <ul class="sub-menu">
                <li><a href="#"><i class="fa fa-angle-right"></i>Select</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i>More Info</a></li>
                <li>
                  <figure style="padding: 13px 13px 0px 13px;">
                    <img src="images/blur_bg.png" style="width: 100%;">
                  </figure>
                </li>
              </ul>
            </li>
          </div>
          
          <li class="fanAxial">
            <a href="#">
              <i class="fa fa-list"></i>
              <span>Fans Axial</span>
            </a>
          </li>
          <div id="fanAxial">
            <li><a href="#"><i class="fa fa-tachometer"></i><span>FZ</span></a>
              <ul class="sub-menu">
                <li><a href="#"><i class="fa fa-angle-right"></i>Select</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i>More Info</a></li>
                <li>
                  <figure style="padding: 13px 13px 0px 13px;">
                    <img src="images/blur_bg.png" style="width: 100%;">
                  </figure>
                </li>
              </ul>
            </li>  
          </div>

          <li class="fanAir">
            <a href="#">
              <i class="fa fa-list"></i>
              <span>Fans RGML</span>
            </a>
          </li>
          <div id="fanAir">
            <li><a href="#"><i class="fa fa-tachometer"></i><span>RGML</span></a>
              <ul class="sub-menu">
                <li><a href="#"><i class="fa fa-angle-right"></i>Select</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i>More Info</a></li>
                <li>
                  <figure style="padding: 13px 13px 0px 13px;">
                    <img src="images/blur_bg.png" style="width: 100%;">
                  </figure>
                </li>
              </ul>
            </li>  
          </div>
          
          <li class="tools">
            <a href="#">
              <i class="fa fa-wrench"></i>
              <span>Tools</span>
            </a>
          </li>
          <div id="tools">
            <li><a href=""><i class="fa fa-bar-chart-o"></i><span>Reports</span></a></li>
            <li><a href=""><i class="fa fa-lock"></i><span>Password Requests</span></a></li>
            <li><a href=""><i class="fa fa-gears"></i><span>Admin</span></a>
              <ul class="sub-menu">
                <li><a href="users.php"><i class="fa fa-angle-right"></i>Users</a></li>
                <li><a href="customer.php"><i class="fa fa-angle-right"></i>Customers</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i>Fans</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i>Accessories</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i>Catalogs</a></li>
              </ul>
            </li>  
          </div>
          
        </ul>
      </div>
    </div>
    <div class="text-right collapse-button " style="padding:7px 9px;">
      <button id="sidebar-collapse" class="btn btn-default" style="">
        <i style="color:#fff;" class="fa fa-angle-left"></i>
      </button>
    </div>
	</div>
</div>