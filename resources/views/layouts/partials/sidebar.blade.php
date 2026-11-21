
<a href="{{ route('kamar.index') }}" class="sidebar-brand">
    <span class="brand-mark">K</span>
    <div>
        <div class="fw-bold">KosManage</div>
        <small class="text-muted">Sistem Manajemen Kos</small>
    </div>
</a>

<div class="p-3 d-flex flex-column h-100">
    <div class="sidebar-section-label">MENU UTAMA</div>

    <nav class="sidebar-nav">
        <a href="{{ route('kamar.index') }}" class="sidebar-link active">
            <span>
                <i class="bi bi-house-door me-2"></i>
                Master Kamar
            </span>
        </a>
    </nav>

    <div class="mt-auto pt-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="sidebar-link w-100 border-0 bg-transparent text-start">
                <span>
                    <i class="bi bi-box-arrow-right me-2"></i>
                    Logout
                </span>
            </button>
        </form>
    </div>
</div>
