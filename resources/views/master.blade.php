<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#138e69">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/images/favicon-32x32.ico" type="image/x-icon">
    <link rel="icon" href="/images/favicon.png" type="image/png">

    <title>Email Checker</title>
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>

<body style="background-color: #000">

<div class="container" id="app">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">

                <router-link to="/" tag="li" exact>
                    <a href="">Home</a>
                </router-link>

                <router-link to="/batch" tag="li">
                    <a href="">Batch Check</a>
                </router-link>

            </ul>
        </nav>
        <h3 style="color: white">Email Checker</h3>
    </div>

    <router-view></router-view>

    <footer class="footer">
        <p>&copy; {{ Carbon\Carbon::now()->year }}
            <a target="_blank" href="http://www.tintnaingwin.com">amigo</a>
            <a target="_blank" href="http://about.me/alexandreroy">aroy314</a>
            <a target="_blank" href="https://github.com/aroy314/email-checker-demo" style="color: #5e5e5e"><i class="fa fa-github fa-lg" aria-hidden="true"></i></a>
        </p>

    </footer>

</div> <!-- /container -->

<script src="{{ mix('js/app.js') }}"></script>

<script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/service-worker.js').then(function (registration) {
            // Registration Success
            console.log('[serviceWorker]: registration successful with scope: ', registration.scope);
        }).catch(function (err) {
            // Registration failed :(
            console.log('[serviceWorker] registration failed', err);
        });
    }
</script>

@stack('scripts')

</body>
</html>
