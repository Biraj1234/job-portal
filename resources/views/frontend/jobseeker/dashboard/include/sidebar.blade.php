<a href="{{ route('jobseeker.dashboard.index') }}">
    <div class="tabs">
        <i class="fas fa-tachometer-alt"></i>Dashboard
    </div>
</a>



<!--Add room-->

<a href="{{ route('jobseeker.jobs') }}">
    <div class="tabs">
        <i class="fas fa-plus"></i>Applied Jobs
    </div>
</a>


<!--Your info-->
<a href="{{ route('jobseeker.profile') }}">
    <div class="tabs">
        <i class="fas fa-user"></i>My information
    </div>
</a>

<!--Logout-->
<a href="{{ route('jobseeker.signout') }}">
    <div class="tabs">
        <i class="fas fa-sign-out-alt"></i>Logout
    </div>
</a>
