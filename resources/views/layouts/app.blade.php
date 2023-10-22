<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Your Application Description">

    <!-- Tabler CSS -->
    <link href="{{ asset('css/tabler.min.css') }}" rel="stylesheet">

    <!-- Additional Stylesheets -->
    <!-- Include any additional stylesheets your project might need -->

    <title>Your Application</title>
</head>
<body class="antialiased">
<div class="page">
    <!-- Header -->
    <header class="navbar navbar-expand-md navbar-light d-print-none">
        <!-- Include your header content here -->
        <!-- Example: Navbar Brand, Navigation Links, User Profile Dropdown, etc. -->
    </header>

    <!-- Sidebar -->
    <div class="content">
        <div class="container-xl">
            <div class="row">
                <!-- Include your sidebar here -->
                <!-- Example: Sidebar Navigation Links, User Profile, etc. -->

                <!-- Main Content -->
                <main class="col-md-9 col-lg-10 py-3">
                    <!-- Include your page content here -->
                    <!-- Example: Yield content for different pages -->
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer footer-transparent d-print-none">
        <!-- Include your footer content here -->
        <!-- Example: Copyright, Links, etc. -->
    </footer>
</div>

<!-- Tabler JS -->
<script src="{{ asset('js/tabler.min.js') }}"></script>

<!-- Additional Scripts -->
<!-- Include any additional scripts your project might need -->

<!-- Yield Scripts for Specific Pages -->
@yield('scripts')
</body>
</html>
