@include('parts.header')
@auth
    @include('parts.head')
    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">
        @include('parts.left_side')

        {{--        @include('cms.parts.breadcum')--}}
        <!-- START CONTENT -->
            <section id="content">

                <!--start container-->
                <div class="container">
                    @yield('content')
                </div>
            </section>
            {{--            @include('cms.parts.right_side')--}}
        </div>
    </div>
    @include('parts.foot')
@elseguest
    @yield('content')
@endauth
@include('parts.footer')
