<!DOCTYPE html>
<html lang="en">

@include('admin.head')

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include('admin.menu-m')

        @include('admin.menu')

        <!-- PAGE CONTAINER-->
        <div class="page-container">
           @include('admin.header')

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        @yield ('content')
                        
                        @include('admin.footer')
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
    @include('admin.scripts')
</body>

</html>
<!-- end document-->
