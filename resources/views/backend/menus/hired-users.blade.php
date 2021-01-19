<li class="nav-item {{ request()->is('admin/hired-users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('backend.hiredUsers.index') }}">
		<i class="fas fa-link"></i>
        <span>Hired Users</span>
    </a>
</li>