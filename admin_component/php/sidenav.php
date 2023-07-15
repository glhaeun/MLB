<style>
    @import url('https://fonts.googleapis.com/css?family=Bangers|Cinzel:400,700,900|Lato:100,300,400,700,900|Lobster|Lora:400,700|Mansalva|Muli:200,300,400,600,700,800,900|Open+Sans:300,400,600,700,800|Oswald:200,300,400,500,600,700|Roboto:100,300,400,500,700,900&display=swap');


*, *::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Nunito';
}

.bg-red-voting {
    background: radial-gradient(circle at 10% 20%, rgb(0, 0, 0) 0%, rgb(64, 64, 64) 90.2%);}

.logo  {
    margin-top:30px;
}

  /* message */

    .sidebar .nav-item .nav-link {
    padding: 1rem;
    padding-left: 2rem;
    padding-right: 2rem;

    display: flex;
    justify-content: space-between;
}
</style>

        <ul class="navbar-nav bg-red-voting sidebar sidebar-dark accordion" id="accordionSidebar">


        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dash.php">
            <div class="sidebar-brand-text mx-3 logo" style="text-align: left ; font-size:25px; color:white; 
            font-weight: 800;
            line-height: 0.65;
            font-style: italic;
            font-family: 'Helvetica';">MLB
            </div></a>


        <li class="nav-item active">
            <a class="nav-link" href="../admin/dash.php">
            <i class="fas fa-columns"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Interface
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="../admin/admin.php"
                aria-expanded="true" >
                <i class="fas fa-fw fa-cog"></i>
                <span>Admin Profile</span>
            </a>
        </li>
        

        <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage:</h6>
                        <a class="collapse-item" href="../admin/product.php">Products</a>
                        <a class="collapse-item" href="../admin/user.php">Users</a>
                        <a class="collapse-item" href="../admin/order.php">Orders</a>
                    </div>
                </div>
            </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Pages
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="../admin/home.php" >
                <i class="fas fa-fw fa-folder"></i>
                <span>Index Page</span>
            </a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="../admin/about.php">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>About Page</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="../admin/others.php">
                <i class="fas fa-list"></i>
                <span>Other Pages</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link" href="dash.php?logout_admin=<?=$_SESSION['admin_id'];?>">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

</ul>
