<li class="nav-item {{ request()->is('admin/companies*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('backend.companies.index') }}">
        <i class="fa fa-building-o"></i>
        <span>Companies</span>
    </a>
</li>