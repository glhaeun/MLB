<?php
    $admin_name = $_SESSION['admin_name'];
    
?>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fas fa-bars" style="color:black"></i>
        </button>
    

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" style="gap: 10px;">
                    <i class="fas fa-user text-gray-600" ></i>
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$admin_name?></span>
                
                </a>
            </li>

        </ul>

    </nav>

