@extends('frontend.layouts.master')

@section('content')
    <div class="card__item card__item--main">
        <div class="main-container">

            <section class="dashboard-container">

                <div class="left-side">
                    <div class="left-container">


                        @include(
                            'frontend.employer.dashboard.include.sidebar'
                        )


                    </div>
                </div>
                <div class="right-side">
                    <div class="top">
                        <div class="welcome"> {{ $title }}</div>



                    </div>


                    @yield('contents')




                </div>
            </section>




        </div>




    </div>
    @include('frontend.includes.footer')
@endsection
