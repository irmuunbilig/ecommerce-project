<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Store
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == "/aiym/admin/") { echo "active"; } ?>" href="/aiym/admin" ><i class="fas fa-fw fa-chart-pie"></i>Dashboard </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == "/aiym/admin/orders.php") { echo "active"; } ?>" href="/aiym/admin/orders.php" ><i class="fab fa-first-order"></i>Orders  </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == "/aiym/admin/categories.php") { echo "active"; } ?>" href="/aiym/admin/categories.php" ><i class="fas fa-list-ol"></i>Categories </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == "/aiym/admin/products.php") { echo "active"; } ?>" href="/aiym/admin/products.php" ><i class="fas fa-cubes"></i>Products </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == "/aiym/admin/contacts.php") { echo "active"; } ?>" href="/aiym/admin/contacts.php" ><i class=" fas fa-envelope"></i>Contacts </a>
                    </li>
                    <li class="nav-divider">
                        Admin
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == "/aiym/admin/account.php") { echo "active"; } ?>" href="/aiym/admin/account.php" ><i class="fa fa-fw fa-user-circle"></i> Account </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == "/aiym/admin/users.php") { echo "active"; } ?>" href="/aiym/admin/users.php" ><i class="fas fa-users"></i> Users </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
