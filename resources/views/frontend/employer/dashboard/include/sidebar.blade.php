<a href="{{ route('employer.dashboard.index') }}">
    <div class="tabs">
        <i class="fas fa-tachometer-alt"></i>Dashboard
    </div>
</a>

<a href="{{ route('employer.dashboard.jobs') }}">
    <div class="tabs active">
        <i class="nav-icon fas fa-briefcase"></i>Jobs Posted
    </div>
</a>

<a href="{{ route('employer.applications') }}">
    <div class="tabs active">
        <i class="far fa-envelope"></i>Applications
    </div>
</a>


<a href="{{ route('frontend.job.create') }}">
    <div class="tabs">
        <i class="fas fa-plus"></i>Add Job
    </div>
</a>


<!--Your info-->
<a href="{{ route('employer.profile') }}">
    <div class="tabs">
        <i class="fas fa-user"></i>Profile
    </div>
</a>

<!--Logout-->
<a href="{{ route('employer.signout') }}">
    <div class="tabs">
        <i class="fas fa-sign-out-alt"></i>Logout
    </div>
</a>
