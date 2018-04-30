<!DOCTYPE html>
<html lang="en">

@include($configs['view'].'.includes.head')

<body>

    <div id="wrapper">
        <!-- Navigation -->
        @include($configs['view'] . '.includes.header')

        @yield('content')

    </div>
    <!-- /#wrapper -->

    @include($configs['view']. '.includes.footer')

</body>

</html>
