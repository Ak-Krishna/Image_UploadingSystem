<header id="header" class="header">
   <nav id="nav-bar" class="nav__bar">
    <div class="toggle__div" id="toggle-side-nav">
     <i class='bx bx-list-ul dash-icon'></i>
    </div>

    <div class="login__detail-div" id="login__detail_div">
     <i class='bx bxs-user-circle dash-icon'></i>
     <h3 class="loggedIn__username"><?php echo $_SESSION['username']?></h3>
     <i class='bx bxs-chevron-down dash-icon' id="dropDown_toggle_icon"></i>

     <div class="login__detial-dropdown" id="login__detail-dropdown">
      <ul class="dropdown-menu">
       <li class="menu__item">
        <a href="./userData.php" class="menu__link"><i class='bx bxs-user-detail dash-icon'></i>Profile</a>
       </li>
       <li class="menu__item">
        <a href="./logout.php" class="menu__link"><i class='bx bxs-log-out dash-icon'></i>Logout</a>
       </li>
      </ul>
     </div>
    </div>
   </nav>
  </header>