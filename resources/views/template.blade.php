<html>
<head>
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
</head>
<body>
    <nav class="navbar navbar-expand bg-dark">
        <ul class="nav">
            <li>
                <a class="nav-link" href="{{url('/beranda')}}">Home</a>
            </li>
            <li>
                <a class="nav-link" href="{{url('/data-siswa')}}">Data Siswa</a>
            </li>
            <li>
                <a class="nav-link" href="{{url('/info')}}">Info Kegiatan</a>
            </li>
        </ul>
    </nav>
    @yield('content')

    <footer class="fixed-bottom bg-primary">
        <div class="text-center">
            (c) 2020 Copyright : SMA 404
        </div>
    </footer>

    <script src="{{url('assets/js/jquery-3.5.1.slim.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>