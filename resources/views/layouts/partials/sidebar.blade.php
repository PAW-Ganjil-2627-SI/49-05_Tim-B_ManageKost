<div class="d-flex flex-column h-100">
    <div class="d-flex align-items-center justify-content-between sidebar-brand">
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-2 text-decoration-none text-dark">
            <span class="brand-mark">KM</span>
            <div>
                <div class="fw-bold lh-sm" style="font-size: 0.98rem;">KosManage</div>
                <div class="text-muted" style="font-size: 0.72rem;">Manajemen Kos &amp; Properti</div>
            </div>
        </a>
        <button type="button" class="btn btn-sm btn-secondary d-lg-none" data-bs-dismiss="offcanvas" aria-label="Tutup menu">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <div class="p-3 flex-grow-1 overflow-y-auto">
        <div class="sidebar-section-label">Utama</div>
        <nav class="sidebar-nav mb-4" aria-label="Navigasi Utama">
            <a href="{{ route('dashboard') }}"
               class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="d-flex align-items-center gap-2">
                    <i class="bi bi-grid-1x2"></i>
                    <span>Dashboard</span>
                </span>
            </a>
        </nav>

        <div class="sidebar-section-label">Pengelolaan Properti</div>
        <nav class="sidebar-nav" aria-label="Menu Pengelolaan">
            <a href="{{ route('kamar.index') }}"
               class="sidebar-link {{ request()->routeIs('kamar.*') ? 'active' : '' }}">
                <span class="d-flex align-items-center gap-2">
                    <i class="bi bi-door-open"></i>
                    <span>Master Kamar</span>
                </span>
            </a>

            <a href="{{ route('penghuni.index') }}"
               class="sidebar-link {{ request()->routeIs('penghuni.*') ? 'active' : '' }}">
                <span class="d-flex align-items-center gap-2">
                    <i class="bi bi-people"></i>
                    <span>Data Penghuni</span>
                </span>
            </a>

            <a href="{{ route('housekeeper.index') }}"
               class="sidebar-link {{ request()->routeIs('housekeeper.*') ? 'active' : '' }}">
                <span class="d-flex align-items-center gap-2">
                    <i class="bi bi-person-badge"></i>
                    <span>Housekeeper / Staff</span>
                </span>
            </a>

            <a href="{{ route('inventaris.index') }}"
               class="sidebar-link {{ request()->routeIs('inventaris.*') ? 'active' : '' }}">
                <span class="d-flex align-items-center gap-2">
                    <i class="bi bi-box-seam"></i>
                    <span>Inventaris Aset</span>
                </span>
            </a>
        </nav>
    </div>

    <div class="sidebar-footer">
        @auth
            <div class="d-flex align-items-center justify-content-between gap-2">
                <div class="d-flex align-items-center gap-2 min-w-0">
                    <div class="rounded-circle border border-2 border-dark bg-white d-flex align-items-center justify-content-center fw-bold flex-shrink-0"
                         style="width: 36px; height: 36px; font-size: 0.85rem;">
                        {{ Auth::user()->initials() }}
                    </div>
                    <div class="text-truncate">
                        <div class="fw-bold text-truncate" style="font-size: 0.85rem;">{{ Auth::user()->name }}</div>
                        <div class="text-muted text-truncate text-capitalize" style="font-size: 0.72rem;">{{ Auth::user()->role }}</div>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="d-inline flex-shrink-0">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-secondary" title="Keluar">
                        <i class="bi bi-box-arrow-right"></i>
                    </button>
                </form>
            </div>
        @endauth
    </div>
</div>

