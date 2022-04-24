@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between" role=" alert">
        {{ Session::get('success') }}
        <i class="fas fa-times" data-bs-dismiss="alert" style="font-size:1.3rem;cursor: pointer;"></i>

    </div>
@endif
@if (Session::has('error'))
    {{-- <p class="alert alert-danger">{{ Session::get('error') }}</p> --}}
    <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between" role=" alert">
        {{ Session::get('error') }}
        <i class="fas fa-times" data-bs-dismiss="alert" style="font-size:1.3rem;cursor: pointer;"></i>

    </div>
@endif
