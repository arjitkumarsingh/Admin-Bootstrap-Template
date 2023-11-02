<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="Arjit Kumar Singh">

    <title>My Profile</title>

    <!-- vendor css -->
    <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="../lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="../lib/jquery-datatables/datatables.min.css" rel="stylesheet">
    <!-- azia CSS -->
    <link rel="stylesheet" href="../css/azia.css">

</head>

<body>

    <?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header("location: ../php/signout.php");
    } else {
        include_once "../php/search.php";
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
                            <h6>Aziana Pechon</h6>
                            <span>Premium Member</span>
                        </div><!-- az-header-profile -->

                        <a href="page-profile.php" class="dropdown-item"><i class="typcn typcn-user-outline"></i> Profile</a>
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
                    <div class="az-content-header-right">
                        <div class="media">
                            <div class="media-body">
                                <h3 style="color: #5b47fb;">Search Result</h3>
                            </div><!-- media-body -->
                        </div><!-- media -->
                    </div>
                </div><!-- az-dashboard-one-title -->


                <!-- Admin can view the list of all users -->
                <div id="users-tab" class="card card-dashboard-five mb-3">
                    <table id="search-result" class="display">
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
                        <?php if (isset($searchResult)) { ?>
                            <tbody>
                                <?php foreach ($searchResult as $user) { ?>
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
                                    <th colspan="8">Total number of Employees: <?php echo count($searchResult); ?></th>
                                </tr>
                            </tfoot>
                        <?php } ?>
                    </table>
                    <!-- <a href="javascript:void(0)" class="btn btn-purple btn-block" id="add">Add New User</a> -->
                </div>
            </div>
        </div>
    </div>


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
    <script src="../js/azia.js"></script>
    <script src="../js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../lib/jquery-datatables/datatables.min.js"></script>
    <script src="../js/custom/aks.js"></script>

    <script>
        $(document).ready(function() {
            $("#search-result").DataTable();
        });
    </script>

</body>

</html>