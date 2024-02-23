<header class="main-nav">

          <div class="sidebar-user text-center"><a class="setting-primary" href="admin_update.php"><i data-feather="edit"></i></a>
          <img class="img-90 rounded-circle" src='<?php echo  './uploads/admin_img/'.$_SESSION["Userimg"]; ?>' alt="">
            <div class="badge-bottom"></div><a href="user-profile.html">
              <h6 class="mt-3 f-14 f-w-600">
                <?php
                    
                    echo $_SESSION["Username"];
                ?>
              </h6></a>
            <p class="mb-0 font-roboto">
                <?php 
                    echo $_SESSION["Useremail"];
                 ?>
            </p>
           
          </div>
          <nav>
            <div class="main-navbar">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="mainnav">           
                <ul class="nav-menu custom-scrollbar">
                  <li class="back-btn">
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  <li class="sidebar-main-title">
                    <div>
                      <h6>General</h6>
                    </div>
                    </li>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="dashboard.php"><i data-feather="home"></i><span>Home</span></a>
                  </li>

                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="layout"></i><span>Location</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="state_view.php">State</a></li>
                       <li><a href="city_view.php">City</a></li>
                      <li><a href="area_view.php">Area</a></li> 
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="box"></i><span>People</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="current_userview.php">Current User</a></li>
                      <li><a href="past_userview.php">Past User</a></li>
                      <!-- <li><a href="user_view.php">User</a></li>
                      <li><a href="vol_view.php">Volunteer</a></li>
                      <li><a href="donation_view.php">Donation Users</a></li> -->
                    </ul>
                  </li>

                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="box"></i><span>Employee</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="vol_view.php">Volunteer</a></li>
                    </ul>
                  </li>

                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="box"></i><span>Donation</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="assign_view.php">Assign Volunteer</a></li>
                      <li><a href="#">Pending Donation</a></li>
                      <li><a href="#">Past Donation</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="box"></i><span>Product</span></a>
                    <ul class="nav-submenu menu-content">
                    <li><a href="category_view.php">Category</a></li>
                      <li><a href="subcat_view.php">Sub Category</a></li>
                      <li><a href="product_view.php">Products</a></li>
                      <li> <a href="offer_view.php">Offers</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="cloud-drizzle"></i><span>Products Detail</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="cart_view.php">Cart</a></li>
                      <li><a href="order_view.php">Order</a></li>
                      <li><a href="review_view.php">Review</a></li>
                    </ul>
                  </li>

                  <li class="sidebar-main-title">
                    <div>
                      <h6>Other</h6>
                    </div>
                  </li>
                  
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="command"></i><span>FAQ</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="faqcat_view.php">Category</a></li>
                      <li><a href="faq_view.php">All FAQ</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="cloud"></i><span>Utilities</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="artical_view.php">Articals</a></li>
                      <li><a href="comment_view.php">Comments</a></li>
                      <li><a href="myfeedback_view.php">Feedback</a></li>
                    </ul>
                  </li>

                  <li class="sidebar-main-title">
                    <div>
                      <h6>Report</h6>
                    </div>
                  </li>

                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="cloud"></i><span>Reports</span></a>
                    <ul class="nav-submenu menu-content">
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </header>