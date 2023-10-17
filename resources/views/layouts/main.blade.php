
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
  
    {{-- sidebar --}}
    @include('layouts.sidebar')

    <!--  Main wrapper -->
    <div class="body-wrapper">
      
        {{-- Header --}}
        @include('layouts.header')

      <div class="container-fluid">
       @yield('container')
        

        {{-- Footer --}}
        @include('layouts.footer')
        