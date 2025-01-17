<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Meta -->
  <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
  <meta name="author" content="BootstrapDash">

  <title>Azia Responsive Bootstrap 4 Dashboard Template</title>

  <!-- vendor css -->
  <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../lib/typicons.font/typicons.css" rel="stylesheet">
  <link href="../lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
  <link href="../lib/jquery-datatables/datatables.min.css" rel="stylesheet">
  <!-- azia CSS -->
  <link rel="stylesheet" href="../css/azia.css">
  <!-- toastr css -->
  <link href="../lib/jquery-toastr/toastr.min.css" rel="stylesheet">

</head>

<body>

  <?php
  session_start();
  if (isset($_SESSION['id'])) {
    require "../php/users-get.php";
  } else {
    header("location: ../php/signout.php");
  }
  ?>

  <div class="az-header">
    <div class="container">
      <div class="az-header-left">
        <a href="index.html" class="az-logo"><span></span> azia</a>
        <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
      </div><!-- az-header-left -->
      <div class="az-header-menu">
        <div class="az-header-menu-header">
          <a href="index.html" class="az-logo"><span></span> azia</a>
          <a href="" class="close">&times;</a>
        </div><!-- az-header-menu-header -->
        <ul class="nav">
          <li class="nav-item active show">
            <a href="page-dashboard-admin.php" class="nav-link"><i class="typcn typcn-chart-area-outline"></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i> Pages</a>
            <nav class="az-menu-sub">
              <a href="page-signin.html" class="nav-link">Sign In</a>
              <a href="page-signup.html" class="nav-link">Sign Up</a>
            </nav>
          </li>
          <li class="nav-item">
            <a href="chart-chartjs.html" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i> Charts</a>
          </li>
          <li class="nav-item">
            <a href="form-elements.html" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i> Forms</a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-book"></i> Components</a>
            <div class="az-menu-sub">
              <div class="container">
                <div>
                  <nav class="nav">
                    <a href="elem-buttons.html" class="nav-link">Buttons</a>
                    <a href="elem-dropdown.html" class="nav-link">Dropdown</a>
                    <a href="elem-icons.html" class="nav-link">Icons</a>
                    <a href="table-basic.html" class="nav-link">Table</a>
                  </nav>
                </div>
              </div><!-- container -->
            </div>
          </li>
        </ul>
      </div><!-- az-header-menu -->
      <div class="az-header-right">
        <a href="https://www.bootstrapdash.com/demo/azia-free/docs/documentation.html" target="_blank" class="az-header-search-link"><i class="far fa-file-alt"></i></a>
        <a href="" class="az-header-search-link"><i class="fas fa-search"></i></a>
        <div class="az-header-message">
          <a href="#"><i class="typcn typcn-messages"></i></a>
        </div><!-- az-header-message -->
        <div class="dropdown az-header-notification">
          <a href="" class="new"><i class="typcn typcn-bell"></i></a>
          <div class="dropdown-menu">
            <div class="az-dropdown-header mg-b-20 d-sm-none">
              <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
            </div>
            <h6 class="az-notification-title">Notifications</h6>
            <p class="az-notification-text">You have 2 unread notification</p>
            <div class="az-notification-list">
              <div class="media new">
                <div class="az-img-user"><img src="../img/faces/face2.jpg" alt=""></div>
                <div class="media-body">
                  <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>
                  <span>Mar 15 12:32pm</span>
                </div><!-- media-body -->
              </div><!-- media -->
              <div class="media new">
                <div class="az-img-user online"><img src="../img/faces/face3.jpg" alt=""></div>
                <div class="media-body">
                  <p><strong>Joyce Chua</strong> just created a new blog post</p>
                  <span>Mar 13 04:16am</span>
                </div><!-- media-body -->
              </div><!-- media -->
              <div class="media">
                <div class="az-img-user"><img src="../img/faces/face4.jpg" alt=""></div>
                <div class="media-body">
                  <p><strong>Althea Cabardo</strong> just created a new blog post</p>
                  <span>Mar 13 02:56am</span>
                </div><!-- media-body -->
              </div><!-- media -->
              <div class="media">
                <div class="az-img-user"><img src="../img/faces/face5.jpg" alt=""></div>
                <div class="media-body">
                  <p><strong>Adrian Monino</strong> added new comment on your photo</p>
                  <span>Mar 12 10:40pm</span>
                </div><!-- media-body -->
              </div><!-- media -->
            </div><!-- az-notification-list -->
            <div class="dropdown-footer"><a href="">View All Notifications</a></div>
          </div><!-- dropdown-menu -->
        </div><!-- az-header-notification -->
        <div class="dropdown az-profile-menu">
          <a href="" class="az-img-user"><img src="../img/faces/face1.jpg" alt=""></a>
          <div class="dropdown-menu">
            <div class="az-dropdown-header d-sm-none">
              <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
            </div>
            <div class="az-header-profile">
              <div class="az-img-user">
                <img src="../img/faces/face1.jpg" alt="">
              </div><!-- az-img-user -->
              <h6><?php echo $_SESSION['name']; ?></h6>
              <span>Premium Member</span>
            </div><!-- az-header-profile -->

            <a href="page-profile.php" class="dropdown-item"><i class="typcn typcn-user-outline"></i> Profile</a>
            <!-- <a href="" class="dropdown-item"><i class="typcn typcn-edit"></i> Edit Profile</a> -->
            <a href="" class="dropdown-item"><i class="typcn typcn-time"></i> Activity Logs</a>
            <a href="" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Account Settings</a>
            <a href="../php/signout.php" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Sign Out</a>
          </div><!-- dropdown-menu -->
        </div>
      </div><!-- az-header-right -->
    </div><!-- container -->
  </div><!-- az-header -->

  <div class="az-content az-content-dashboard">
    <div class="container">
      <div class="az-content-body">
        <div class="az-dashboard-one-title">
          <div>
            <h2 class="az-dashboard-title">Hi, welcome back!</h2>
            <p class="az-dashboard-text">Your web analytics dashboard template.</p>
          </div>
          <div class="az-content-header-right">
            <div class="media">
              <div class="media-body">
                <label>Start Date</label>
                <h6>Oct 10, 2018</h6>
              </div><!-- media-body -->
            </div><!-- media -->
            <div class="media">
              <div class="media-body">
                <label>End Date</label>
                <h6>Oct 23, 2018</h6>
              </div><!-- media-body -->
            </div><!-- media -->
            <div class="media">
              <div class="media-body">
                <label>Event Category</label>
                <h6>All Categories</h6>
              </div><!-- media-body -->
            </div><!-- media -->
            <a href="" class="btn btn-purple">Export</a>
          </div>
        </div><!-- az-dashboard-one-title -->

        <div class="az-dashboard-nav">
          <nav class="nav">
            <a class="nav-link active" data-toggle="tab" href="#" id="overview">Overview</a>
            <a class="nav-link" data-toggle="tab" href="#">Audiences</a>
            <a class="nav-link" data-toggle="tab" href="#">Demographics</a>
            <?php if ($_SESSION['role'] == 1) { ?>
              <a class="nav-link" data-toggle="tab" href="#" id="users">Users</a>
            <?php } ?>
            <!-- <a class="nav-link" data-toggle="tab" href="#" id="add">Add</a> -->
          </nav>

          <nav class="nav">
            <a class="nav-link" href="#"><i class="far fa-save"></i> Save Report</a>
            <a class="nav-link" href="#"><i class="far fa-file-pdf"></i> Export to PDF</a>
            <a class="nav-link" href="#"><i class="far fa-envelope"></i>Send to Email</a>
            <a class="nav-link" href="#"><i class="fas fa-ellipsis-h"></i></a>
          </nav>
        </div>

        <div class="row row-sm mg-b-20" id="overview-tab">
          <div class="col-lg-7 ht-lg-100p">
            <div class="card card-dashboard-one">
              <div class="card-header">
                <div>
                  <h6 class="card-title">Website Audience Metrics</h6>
                  <p class="card-text">Audience to which the users belonged while on the current date range.</p>
                </div>
                <div class="btn-group">
                  <button class="btn active">Day</button>
                  <button class="btn">Week</button>
                  <button class="btn">Month</button>
                </div>
              </div><!-- card-header -->
              <div class="card-body">
                <div class="card-body-top">
                  <div>
                    <label class="mg-b-0">Users</label>
                    <h2>13,956</h2>
                  </div>
                  <div>
                    <label class="mg-b-0">Bounce Rate</label>
                    <h2>33.50%</h2>
                  </div>
                  <div>
                    <label class="mg-b-0">Page Views</label>
                    <h2>83,123</h2>
                  </div>
                  <div>
                    <label class="mg-b-0">Sessions</label>
                    <h2>16,869</h2>
                  </div>
                </div><!-- card-body-top -->
                <div class="flot-chart-wrapper">
                  <div id="flotChart" class="flot-chart"></div>
                </div><!-- flot-chart-wrapper -->
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-lg-5 mg-t-20 mg-lg-t-0">
            <div class="row row-sm">
              <div class="col-sm-6">
                <div class="card card-dashboard-two">
                  <div class="card-header">
                    <h6>33.50% <i class="icon ion-md-trending-up tx-success"></i> <small>18.02%</small></h6>
                    <p>Bounce Rate</p>
                  </div><!-- card-header -->
                  <div class="card-body">
                    <div class="chart-wrapper">
                      <div id="flotChart1" class="flot-chart"></div>
                    </div><!-- chart-wrapper -->
                  </div><!-- card-body -->
                </div><!-- card -->
              </div><!-- col -->
              <div class="col-sm-6 mg-t-20 mg-sm-t-0">
                <div class="card card-dashboard-two">
                  <div class="card-header">
                    <h6>86k <i class="icon ion-md-trending-down tx-danger"></i> <small>0.86%</small></h6>
                    <p>Total Users</p>
                  </div><!-- card-header -->
                  <div class="card-body">
                    <div class="chart-wrapper">
                      <div id="flotChart2" class="flot-chart"></div>
                    </div><!-- chart-wrapper -->
                  </div><!-- card-body -->
                </div><!-- card -->
              </div><!-- col -->
              <div class="col-sm-12 mg-t-20">
                <div class="card card-dashboard-three">
                  <div class="card-header">
                    <p>All Sessions</p>
                    <h6>16,869 <small class="tx-success"><i class="icon ion-md-arrow-up"></i> 2.87%</small></h6>
                    <small>The total number of sessions within the date range. It is the period time a user is actively
                      engaged with your website, page or app, etc.</small>
                  </div><!-- card-header -->
                  <div class="card-body">
                    <div class="chart"><canvas id="chartBar5"></canvas></div>
                  </div>
                </div>
              </div>
            </div><!-- row -->
          </div><!--col -->
        </div><!-- row -->

        <!-- Admin can view the list of all users -->
        <div id="users-tab" style="display: none;" class="card card-dashboard-five mb-3">
          <form action="page-search.php" method="POST">
            <div class="input-group mb-3">
              <!-- <span class="input-group-text">Search: </span> -->
              <input type="text" class="form-control" name="search" id="search" placeholder="Search keywords" aria-label="Enter your search keywords" aria-describedby="basic-addon1">
              <button type="submit" class="btn btn-purple">Search</button>
            </div>
          </form>
          <table id="users-details" class="display">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Status</th>
                <th>Role</th>
                <th>Activity</th>
                <th>Action</th>
              </tr>
            </thead>
            <?php if (isset($users)) { ?>
              <tbody>
                <?php foreach ($users as $user) { ?>
                  <tr id="row-<?php echo $user['id']; ?>">
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['password']; ?></td>
                    <td>
                      <?php if ($user['status'] != 0) { ?>
                        <a href="../php/status-update.php?id=<?php echo $user['id'] . '&status=' . $user['status']; ?>" class="btn btn-success toggle-status">&nbsp;Active &nbsp;</a>
                      <?php } else { ?>
                        <a href="../php/status-update.php?id=<?php echo $user['id'] . '&status=' . $user['status']; ?>" class="btn btn-danger toggel-status">Inactive</a>
                      <?php } ?>
                    </td>
                    <td>
                      <?php
                      if ($user['role'] == 1) {
                        echo "Admin";
                      } else {
                        echo "User";
                      }
                      ?>
                    </td>
                    <td><a href="page-user-log.php?id=<?php echo $user['id']; ?>" onclick="viewActivity(<?php echo $user['id']; ?>)">View</a></td>
                    <td>
                      <a href="javascript:void(0)" onclick="updateUser(<?php echo $user['id']; ?>, '<?php echo $user['name']; ?>', '<?php echo $user['email']; ?>',
                      '<?php echo $user['password']; ?>', '<?php echo $user['role']; ?>')">
                        <i class="typcn typcn-edit"></i>
                      </a>
                      &nbsp; &nbsp;
                      <a href="../php/user-delete.php?id=<?php echo $user['id']; ?>"><i class="typcn typcn-trash" id="delete-<?php echo $user['id']; ?>"></i></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="8">Total number of Employees: <?php echo count($users); ?></th>
                </tr>
              </tfoot>
            <?php } ?>
          </table>
          <div class="page">
            <?php
            for ($i = 1; $i <= $total_pages; $i++) {
            ?>
              <form action="page-dashboard-admin.php" method="get" >
                <input type="hidden" name="page" value="<?php echo $i; ?>">
                <button type="submit" class="page-button"><?php echo $i; ?></button>
              </form>
            <?php } ?>
          </div>
          <a href="javascript:void(0)" class="btn btn-purple btn-block" id="add">Add New User</a>
        </div>


        <!-- Admin can update details of a user -->
        <div id="update-user" style="display: none;" class="card card-dashboard-five mb-3">
          <table id="user-details" class="display">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <form action="#" method="POST" id="update-user-form">
                  <td id="update-id"></td>
                  <td id="update-name"><input class="form-control" type="text" id="name" name="name" aria-label="full name"></td>
                  <td id="update-email"><input class="form-control" type="email" id="email" name="email" aria-label="email id"></td>
                  <td id="update-password"><input class="form-control" type="password" id="password" name="password" aria-label="password"></td>
                  <td id="update-role">
                    <select name="role" class="form-control">
                      <option id="role-1" value="1">Admin</option>
                      <option id="role-2" value="2">User</option>
                    </select>
                  </td>
                  <td id="action"><button type="submit" class="btn btn-purple">Save</button></td>
                </form>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- New User from -->
        <div id="new-user" style="display: none;" class="card card-dashboard-five mb-3">
          <form action="../php/user-save.php" method="POST" id="new-user-form">

            <div class="input-group mb-3">
              <span class="input-group-text">Name: </span>
              <input class="form-control" type="text" name="name" id="new-name" placeholder="Full Name" aria-label="full name">
            </div>
            <?php
            if (isset($_SESSION['nameErr'])) {
            ?>
              <div class="mb-3 text-danger">
                <?php
                echo $_SESSION['nameErr'];
                unset($_SESSION['nameErr']);
                ?>
              </div>
            <?php
            } else {
            ?>
              <div class="mb-3 text-danger" id="nameErr"><br></div>
            <?php
            }
            ?>


            <div class="input-group mb-3">
              <span class="input-group-text">Email: </span>
              <input class="form-control" type="email" name="email" id="new-email" placeholder="xyz@example.com" aria-label="email id">
            </div>
            <?php
            if (isset($_SESSION['emailErr'])) {
            ?>
              <div class="mb-3 text-danger">
                <?php
                echo $_SESSION['emailErr'];
                unset($_SESSION['emailErr']);
                ?>
              </div>
            <?php
            } else {
            ?>
              <div class="mb-3 text-danger" id="emailErr"><br></div>
            <?php
            }
            ?>


            <div class="input-group mb-1">
              <span class="input-group-text">Password: </span>
              <input class="form-control" type="password" name="password" id="new-password" placeholder="Password" aria-label="password">
            </div>
            <input type="checkbox" id="checkbox-password">
            <label id="label-password" for="password" class="text-secondary">Show Password</label>

            <?php
            if (isset($_SESSION['passwordErr'])) {
            ?>
              <div class="mb-3 text-danger">
                <?php
                echo $_SESSION['passwordErr'];
                unset($_SESSION['passwordErr']);
                ?>
              </div>
            <?php
            } else {
            ?>
              <div class="mb-3 text-danger" id="passwordErr"><br></div>
            <?php
            }
            ?>

            <!-- <div class="d-grid gap-2"> -->
            <button type="submit" class="btn btn-purple btn-block">Add</button>
            <!-- </div> -->
          </form>
        </div>


        <div class="row row-sm mg-b-20">
          <div class="col-lg-4">
            <div class="card card-dashboard-pageviews">
              <div class="card-header">
                <h6 class="card-title">Page Views by Page Title</h6>
                <p class="card-text">This report is based on 100% of sessions.</p>
              </div><!-- card-header -->
              <div class="card-body">
                <div class="az-list-item">
                  <div>
                    <h6>Admin Home</h6>
                    <span>/demo/admin/index.html</span>
                  </div>
                  <div>
                    <h6 class="tx-primary">7,755</h6>
                    <span>31.74% (-100.00%)</span>
                  </div>
                </div><!-- list-group-item -->
                <div class="az-list-item">
                  <div>
                    <h6>Form Elements</h6>
                    <span>/demo/admin/forms.html</span>
                  </div>
                  <div>
                    <h6 class="tx-primary">5,215</h6>
                    <span>28.53% (-100.00%)</span>
                  </div>
                </div><!-- list-group-item -->
                <div class="az-list-item">
                  <div>
                    <h6>Utilities</h6>
                    <span>/demo/admin/util.html</span>
                  </div>
                  <div>
                    <h6 class="tx-primary">4,848</h6>
                    <span>25.35% (-100.00%)</span>
                  </div>
                </div><!-- list-group-item -->
                <div class="az-list-item">
                  <div>
                    <h6>Form Validation</h6>
                    <span>/demo/admin/validation.html</span>
                  </div>
                  <div>
                    <h6 class="tx-primary">3,275</h6>
                    <span>23.17% (-100.00%)</span>
                  </div>
                </div><!-- list-group-item -->
                <div class="az-list-item">
                  <div>
                    <h6>Modals</h6>
                    <span>/demo/admin/modals.html</span>
                  </div>
                  <div>
                    <h6 class="tx-primary">3,003</h6>
                    <span>22.21% (-100.00%)</span>
                  </div>
                </div><!-- list-group-item -->
              </div><!-- card-body -->
            </div><!-- card -->

          </div><!-- col -->
          <div class="col-lg-8 mg-t-20 mg-lg-t-0">
            <div class="card card-dashboard-four">
              <div class="card-header">
                <h6 class="card-title">Sessions by Channel</h6>
              </div><!-- card-header -->
              <div class="card-body row">
                <div class="col-md-6 d-flex align-items-center">
                  <div class="chart"><canvas id="chartDonut"></canvas></div>
                </div><!-- col -->
                <div class="col-md-6 col-lg-5 mg-lg-l-auto mg-t-20 mg-md-t-0">
                  <div class="az-traffic-detail-item">
                    <div>
                      <span>Organic Search</span>
                      <span>1,320 <span>(25%)</span></span>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-purple wd-25p" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div><!-- progress -->
                  </div>
                  <div class="az-traffic-detail-item">
                    <div>
                      <span>Email</span>
                      <span>987 <span>(20%)</span></span>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-primary wd-20p" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div><!-- progress -->
                  </div>
                  <div class="az-traffic-detail-item">
                    <div>
                      <span>Referral</span>
                      <span>2,010 <span>(30%)</span></span>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-info wd-30p" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div><!-- progress -->
                  </div>
                  <div class="az-traffic-detail-item">
                    <div>
                      <span>Social</span>
                      <span>654 <span>(15%)</span></span>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-teal wd-15p" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                    </div><!-- progress -->
                  </div>
                  <div class="az-traffic-detail-item">
                    <div>
                      <span>Other</span>
                      <span>400 <span>(10%)</span></span>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-gray-500 wd-10p" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                    </div><!-- progress -->
                  </div>
                </div><!-- col -->
              </div><!-- card-body -->
            </div><!-- card-dashboard-four -->
          </div><!-- col -->
        </div><!-- row -->

        <div class="row row-sm mg-b-20 mg-lg-b-0">
          <div class="col-lg-5 col-xl-4">
            <div class="row row-sm">
              <div class="col-md-6 col-lg-12 mg-b-20 mg-md-b-0 mg-lg-b-20">
                <div class="card card-dashboard-five">
                  <div class="card-header">
                    <h6 class="card-title">Acquisition</h6>
                    <span class="card-text">Tells you where your visitors originated from, such as search engines,
                      social networks or website referrals.</span>
                  </div><!-- card-header -->
                  <div class="card-body row row-sm">
                    <div class="col-6 d-sm-flex align-items-center">
                      <div class="card-chart bg-primary">
                        <span class="peity-bar" data-peity='{"fill": ["#fff"], "width": 20, "height": 20 }'>6,4,7,5,7</span>
                      </div>
                      <div>
                        <label>Bounce Rate</label>
                        <h4>33.50%</h4>
                      </div>
                    </div><!-- col -->
                    <div class="col-6 d-sm-flex align-items-center">
                      <div class="card-chart bg-purple">
                        <span class="peity-bar" data-peity='{"fill": ["#fff"], "width": 21, "height": 20 }'>7,4,5,7,2</span>
                      </div>
                      <div>
                        <label>Sessions</label>
                        <h4>9,065</h4>
                      </div>
                    </div><!-- col -->
                  </div><!-- card-body -->
                </div><!-- card-dashboard-five -->
              </div><!-- col -->
              <div class="col-md-6 col-lg-12">
                <div class="card card-dashboard-five">
                  <div class="card-header">
                    <h6 class="card-title">Sessions</h6>
                    <span class="card-text"> A session is the period time a user is actively engaged with your website,
                      app, etc.</span>
                  </div><!-- card-header -->
                  <div class="card-body row row-sm">
                    <div class="col-6 d-sm-flex align-items-center">
                      <div class="mg-b-10 mg-sm-b-0 mg-sm-r-10">
                        <span class="peity-donut" data-peity='{ "fill": ["#007bff", "#cad0e8"],  "innerRadius": 14, "radius": 20 }'>4/7</span>
                      </div>
                      <div>
                        <label>% New Sessions</label>
                        <h4>26.80%</h4>
                      </div>
                    </div><!-- col -->
                    <div class="col-6 d-sm-flex align-items-center">
                      <div class="mg-b-10 mg-sm-b-0 mg-sm-r-10">
                        <span class="peity-donut" data-peity='{ "fill": ["#00cccc", "#cad0e8"],  "innerRadius": 14, "radius": 20 }'>2/7</span>
                      </div>
                      <div>
                        <label>Pages/Session</label>
                        <h4>1,005</h4>
                      </div>
                    </div><!-- col -->
                  </div><!-- card-body -->
                </div><!-- card-dashboard-five -->
              </div><!-- col -->
            </div><!-- row -->
          </div><!-- col-lg-3 -->
          <div class="col-lg-7 col-xl-8 mg-t-20 mg-lg-t-0">
            <div class="card card-table-one">
              <h6 class="card-title">What pages do your users visit</h6>
              <p class="az-content-text mg-b-20">Part of this date range occurs before the new users metric had been
                calculated, so the old users metric is displayed.</p>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="wd-5p">&nbsp;</th>
                      <th class="wd-45p">Country</th>
                      <th>Entrances</th>
                      <th>Bounce Rate</th>
                      <th>Exits</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><i class="flag-icon flag-icon-us flag-icon-squared"></i></td>
                      <td><strong>United States</strong></td>
                      <td><strong>134</strong> (1.51%)</td>
                      <td>33.58%</td>
                      <td>15.47%</td>
                    </tr>
                    <tr>
                      <td><i class="flag-icon flag-icon-gb flag-icon-squared"></i></td>
                      <td><strong>United Kingdom</strong></td>
                      <td><strong>290</strong> (3.30%)</td>
                      <td>9.22%</td>
                      <td>7.99%</td>
                    </tr>
                    <tr>
                      <td><i class="flag-icon flag-icon-in flag-icon-squared"></i></td>
                      <td><strong>India</strong></td>
                      <td><strong>250</strong> (3.00%)</td>
                      <td>20.75%</td>
                      <td>2.40%</td>
                    </tr>
                    <tr>
                      <td><i class="flag-icon flag-icon-ca flag-icon-squared"></i></td>
                      <td><strong>Canada</strong></td>
                      <td><strong>216</strong> (2.79%)</td>
                      <td>32.07%</td>
                      <td>15.09%</td>
                    </tr>
                    <tr>
                      <td><i class="flag-icon flag-icon-fr flag-icon-squared"></i></td>
                      <td><strong>France</strong></td>
                      <td><strong>216</strong> (2.79%)</td>
                      <td>32.07%</td>
                      <td>15.09%</td>
                    </tr>
                    <tr>
                      <td><i class="flag-icon flag-icon-ph flag-icon-squared"></i></td>
                      <td><strong>Philippines</strong></td>
                      <td><strong>197</strong> (2.12%)</td>
                      <td>32.07%</td>
                      <td>15.09%</td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- table-responsive -->
            </div><!-- card -->
          </div><!-- col-lg -->

        </div><!-- row -->
      </div><!-- az-content-body -->
    </div>
  </div><!-- az-content -->

  <div class="az-footer ht-40">
    <div class="container ht-100p pd-t-0-f">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com
        2020</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a>
        from Bootstrapdash.com</span>
    </div><!-- container -->
  </div><!-- az-footer -->


  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/ionicons/ionicons.js"></script>
  <script src="../lib/jquery.flot/jquery.flot.js"></script>
  <script src="../lib/jquery.flot/jquery.flot.resize.js"></script>
  <script src="../lib/chart.js/Chart.bundle.min.js"></script>
  <script src="../lib/peity/jquery.peity.min.js"></script>

  <script src="../js/azia.js"></script>
  <script src="../js/chart.flot.sampledata.js"></script>
  <script src="../js/dashboard.sampledata.js"></script>
  <script src="../js/jquery.cookie.js" type="text/javascript"></script>
  <script src="../lib/jquery-datatables/datatables.min.js"></script>
  <script src="../lib/jquery-toastr/toastr.min.js"></script>
  <script src="../js/custom/aks.js"></script>

  <!-- Toastr notifications -->
  <?php
  if (isset($_SESSION['user'])) {
  ?>
    <script>
      $(document).ready(function() {
        toastr.success("<?php echo $_SESSION['user']; ?>", '*User', {
          closeButton: true,
          progressBar: true,
          preventDuplicates: true,
        });
      });
    </script>
  <?php
    unset($_SESSION['user']);
  }
  ?>

  <?php
  if (isset($_SESSION['userErr'])) {
  ?>
    <script>
      $(document).ready(function() {
        toastr.error("<?php echo $_SESSION['userErr']; ?>", '*User', {
          closeButton: true,
          progressBar: true,
          preventDuplicates: true,
        });
      });
    </script>
  <?php
    unset($_SESSION['userErr']);
  }
  ?>

  <!-- Data Table -->
  <script>
    $(document).ready(function() {
      // var usersRecord = $('#users-details').DataTable();
      var userRecord = $('#user-details').DataTable();
      var userLog = $("#user-activities").DataTable();
    });
  </script>
  <script>
    $(function() {
      'use strict'

      var plot = $.plot('#flotChart', [{
        data: flotSampleData3,
        color: '#007bff',
        lines: {
          fillColor: {
            colors: [{
              opacity: 0
            }, {
              opacity: 0.2
            }]
          }
        }
      }, {
        data: flotSampleData4,
        color: '#560bd0',
        lines: {
          fillColor: {
            colors: [{
              opacity: 0
            }, {
              opacity: 0.2
            }]
          }
        }
      }], {
        series: {
          shadowSize: 0,
          lines: {
            show: true,
            lineWidth: 2,
            fill: true
          }
        },
        grid: {
          borderWidth: 0,
          labelMargin: 8
        },
        yaxis: {
          show: true,
          min: 0,
          max: 100,
          ticks: [
            [0, ''],
            [20, '20K'],
            [40, '40K'],
            [60, '60K'],
            [80, '80K']
          ],
          tickColor: '#eee'
        },
        xaxis: {
          show: true,
          color: '#fff',
          ticks: [
            [25, 'OCT 21'],
            [75, 'OCT 22'],
            [100, 'OCT 23'],
            [125, 'OCT 24']
          ],
        }
      });

      $.plot('#flotChart1', [{
        data: dashData2,
        color: '#00cccc'
      }], {
        series: {
          shadowSize: 0,
          lines: {
            show: true,
            lineWidth: 2,
            fill: true,
            fillColor: {
              colors: [{
                opacity: 0.2
              }, {
                opacity: 0.2
              }]
            }
          }
        },
        grid: {
          borderWidth: 0,
          labelMargin: 0
        },
        yaxis: {
          show: false,
          min: 0,
          max: 35
        },
        xaxis: {
          show: false,
          max: 50
        }
      });

      $.plot('#flotChart2', [{
        data: dashData2,
        color: '#007bff'
      }], {
        series: {
          shadowSize: 0,
          bars: {
            show: true,
            lineWidth: 0,
            fill: 1,
            barWidth: .5
          }
        },
        grid: {
          borderWidth: 0,
          labelMargin: 0
        },
        yaxis: {
          show: false,
          min: 0,
          max: 35
        },
        xaxis: {
          show: false,
          max: 20
        }
      });


      //-------------------------------------------------------------//


      // Line chart
      $('.peity-line').peity('line');

      // Bar charts
      $('.peity-bar').peity('bar');

      // Bar charts
      $('.peity-donut').peity('donut');

      var ctx5 = document.getElementById('chartBar5').getContext('2d');
      new Chart(ctx5, {
        type: 'bar',
        data: {
          labels: [0, 1, 2, 3, 4, 5, 6, 7],
          datasets: [{
            data: [2, 4, 10, 20, 45, 40, 35, 18],
            backgroundColor: '#560bd0'
          }, {
            data: [3, 6, 15, 35, 50, 45, 35, 25],
            backgroundColor: '#cad0e8'
          }]
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            enabled: false
          },
          legend: {
            display: false,
            labels: {
              display: false
            }
          },
          scales: {
            yAxes: [{
              display: false,
              ticks: {
                beginAtZero: true,
                fontSize: 11,
                max: 80
              }
            }],
            xAxes: [{
              barPercentage: 0.6,
              gridLines: {
                color: 'rgba(0,0,0,0.08)'
              },
              ticks: {
                beginAtZero: true,
                fontSize: 11,
                display: false
              }
            }]
          }
        }
      });

      // Donut Chart
      var datapie = {
        labels: ['Search', 'Email', 'Referral', 'Social', 'Other'],
        datasets: [{
          data: [25, 20, 30, 15, 10],
          backgroundColor: ['#6f42c1', '#007bff', '#17a2b8', '#00cccc', '#adb2bd']
        }]
      };

      var optionpie = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
          display: false,
        },
        animation: {
          animateScale: true,
          animateRotate: true
        }
      };

      // For a doughnut chart
      var ctxpie = document.getElementById('chartDonut');
      var myPieChart6 = new Chart(ctxpie, {
        type: 'doughnut',
        data: datapie,
        options: optionpie
      });

    });
  </script>
</body>

</html>