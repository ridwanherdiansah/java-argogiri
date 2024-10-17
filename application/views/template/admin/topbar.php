

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="<?= base_url(); ?>Admin/dashboard"><img src="<?= base_url(); ?>assets/images/logo/logo2.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="header-top-right">

                            <div class="dropdown">
                                <a href="#" class="user-dropdown d-flex dropend" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar avatar-md2" >
                                        <img src="<?= base_url(); ?>assets/images/faces/1.jpg" alt="Avatar">
                                    </div>
                                    <div class="text">
                                        <h6 class="user-dropdown-name">Nama</h6>
                                        <p class="user-dropdown-status text-sm text-muted"><?= $_SESSION['admin']['username']; ?></p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="#">My Account</a></li>
                                  <li><a class="dropdown-item" href="#">Settings</a></li>
                                  <li><hr class="dropdown-divider"></li>
                                  <li><a class="dropdown-item" href="<?= base_url(); ?>P_auth/Logout">Logout</a></li>
                                </ul>
                            </div>

                            <!-- Burger button responsive -->
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <ul>
                            
                            <li
                                class="menu-item  ">
                                <a href="<?= base_url(); ?>Admin/dashboard" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            
                            <li
                                class="menu-item">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-stack"></i>
                                    <span>User</span>
                                </a>
                                <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                            
                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url(); ?>Suplier/T_suplier"
                                                    class='submenu-link'>Suplier</a>

                                                
                                            </li>
                                            
                                        
                                        
                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url(); ?>Buyers/T_buyers"
                                                    class='submenu-link'>Buyers</a>

                                                
                                            </li>
                                            
                                        </ul>
                                        
                                    </div>
                                </div>
                            </li>
                            
                            <li
                                class="menu-item">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-grid-1x2-fill"></i>
                                    <span>Transaksi</span>
                                </a>
                                <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                            
                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url(); ?>Pembelian/T_pembelian"
                                                    class='submenu-link'>Pembelian</a>

                                                
                                            </li>
                                        
                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url(); ?>Penjualan/T_penjualan"
                                                    class='submenu-link'>Penjualan</a>

                                                
                                            </li>
                                        
                                    </div>
                                </div>
                            </li>
                            
                            
                            <li
                                class="menu-item ">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-file-earmark-medical-fill"></i>
                                    <span>Inventory</span>
                                </a>
                                <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                            
                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url(); ?>Inventori/T_ceri"
                                                    class='submenu-link'>Ceri</a>

                                                
                                            </li>
                                        
                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url(); ?>Inventori/T_gabah"
                                                    class='submenu-link'>Gabah</a>

                                                
                                            </li>
                                        
                                    </div>
                                </div>
                            </li>
                            
                            <li
                                class="menu-item  ">
                                <a href="<?= base_url(); ?>Kas/Kas" class='menu-link'>
                                    <i class="bi bi-file-earmark-medical-fill"></i>
                                    <span>Kas</span>
                                </a>
                            </li>
                            

                            <li
                                class="menu-item active">
                                <a href="#" class='menu-link'>
                                    <i class="bi bi-grid-1x2-fill"></i>
                                    <span>Piutang</span>
                                </a>
                                <div
                                    class="submenu ">
                                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                    <div class="submenu-group-wrapper">
                                        
                                        
                                        <ul class="submenu-group">
                                            
                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url(); ?>Piutang/T_pembelian"
                                                    class='submenu-link'>Pembelian</a>

                                                
                                            </li>
                                        
                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url(); ?>Piutang/T_penjualan"
                                                    class='submenu-link'>Penjualan</a>

                                                
                                            </li>

                                            <li
                                                class="submenu-item  ">
                                                <a href="<?= base_url(); ?>Piutang/T_karyawan"
                                                    class='submenu-link'>Karyawan</a>

                                                
                                            </li>
                                        
                                    </div>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </nav>

            </header>