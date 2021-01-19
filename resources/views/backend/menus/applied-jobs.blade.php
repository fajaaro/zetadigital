<li class="nav-item {{ request()->is('admin/applied-jobs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('backend.appliedJobs.index') }}">
		<i class="fas fa-briefcase"></i>
        <span>Applied Jobs</span>
    </a>
</li>