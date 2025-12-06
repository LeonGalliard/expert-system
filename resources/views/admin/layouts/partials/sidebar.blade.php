<!-- Main Sidebar Container -->
<aside class="main-sidebar bg-gray-100 shadow-lg"
       style="height: 100%; min-height: 100vh; position: fixed; top: 0; left: 0; z-index: 1000; border-right: 1px solid #e5e7eb;">
    
    <!-- Brand Logo -->
    <div class="brand-link text-center py-4 bg-white border-bottom">
        <h4 class="text-primary fw-bold m-0">Admin Sistem Pakar</h4>
    </div>

    <!-- Sidebar -->
    <div class="sidebar px-3 py-3" 
         style="height: calc(100vh - 72px); overflow-y: auto;">

        <!-- Sidebar user panel -->
        <div class="user-panel mb-4 px-2 py-3 bg-white rounded-lg shadow-sm">
            <div class="d-flex align-items-center">
                <div class="image me-3 d-flex align-items-center justify-content-center 
                            bg-primary bg-opacity-10 rounded-circle"
                     style="width: 40px; height: 40px;">
                    <i class="fas fa-bi-people text-primary"></i>
                </div>
                <div class="info">
                    <h6 class="mb-0 fw-bold">Admin</h6>
                    <small class="text-muted">Administrator</small>
                </div>
            </div>
        </div>

        <!-- Dashboard button -->
        <div class="mb-3">
            <a href="/" class="btn btn-primary w-100 d-flex align-items-center justify-content-start">
                <i class="fas fa-tachometer-alt me-2"></i>
                <span>Dashboard</span>
            </a>
        </div>

        <!-- Menu Section -->
        <div class="menu-section mb-2">
            <h6 class="text-uppercase text-muted fw-bold fs-7 px-2 mb-3">MENU PAKAR</h6>
        </div>

        <!-- Sidebar Menu -->
        <nav>
            <ul class="nav flex-column">

                <!-- Data Pakar Dropdown -->
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link rounded py-2 px-3 bg-white shadow-sm 
                                      d-flex justify-content-between align-items-center"
                       data-bs-toggle="collapse" data-bs-target="#pakarMenu" aria-expanded="true">

                        <div>
                            <i class="fas fa-cogs me-2 text-primary"></i>
                            <span class="fw-semibold">Data Pakar</span>
                        </div>
                        <i class="fas fa-chevron-down small text-secondary"></i>
                    </a>

                    <div id="pakarMenu" class="collapse show ps-3 mt-2">

                        <a href="{{ route('gejala.index') }}"
                           class="nav-link mb-2 {{ $elementActive === 'gejala' 
                                ? 'active bg-primary text-white rounded py-2 px-3 shadow-sm' 
                                : 'bg-white text-dark rounded py-2 px-3 shadow-sm' }}">
                            <i class="fas fa-exclamation-circle me-2"></i> Data Gejala
                        </a>

                        <a href="{{ route('kerusakan.index') }}"
                           class="nav-link mb-2 {{ $elementActive === 'kerusakan' 
                                ? 'active bg-primary text-white rounded py-2 px-3 shadow-sm' 
                                : 'bg-white text-dark rounded py-2 px-3 shadow-sm' }}">
                            <i class="fas fa-tools me-2"></i> Data Kerusakan
                        </a>

                        <a href="{{ route('aturan.index') }}"
                           class="nav-link mb-2 {{ $elementActive === 'aturan' 
                                ? 'active bg-primary text-white rounded py-2 px-3 shadow-sm' 
                                : 'bg-white text-dark rounded py-2 px-3 shadow-sm' }}">
                            <i class="fas fa-sitemap me-2"></i> Data Aturan
                        </a>

                    </div>
                </li>

            </ul>
        </nav>

        <!-- Settings / Logout -->
        <ul class="nav flex-column">
            <li class="nav-item mt-4">
                <a href="{{ route('logout') }}" 
                   class="nav-link rounded py-2 px-3 bg-danger text-white shadow-sm">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Push content to the right -->
    <div style="margin-left: 250px;">
        <!-- This is where your page content will go -->
    </div>
</aside>
