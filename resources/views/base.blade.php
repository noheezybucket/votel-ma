<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    {{-- Bootstrap Tables --}}
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">
    <title>@yield('title')</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap');

        *,
        *::after,
        *::before {
            font-family: 'Montserrat';
        }

        .navicon {
            width: 30px;
        }

        .navicon-item {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        body {
            min-height: 100vh;
            min-height: -webkit-fill-available;
        }

        html {
            height: -webkit-fill-available;
        }

        main {
            display: flex;
            flex-wrap: nowrap;
            height: 100vh;
            height: -webkit-fill-available;
            max-height: 100vh;
            overflow-x: auto;
            overflow-y: hidden;
        }

        .b-example-divider {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .bi {
            vertical-align: -.125em;
            pointer-events: none;
            fill: currentColor;
        }

        .dropdown-toggle {
            outline: 0;
        }

        .nav-flush .nav-link {
            border-radius: 0;
        }

        .btn-toggle {
            display: inline-flex;
            align-items: center;
            padding: .25rem .5rem;
            font-weight: 600;
            color: rgba(0, 0, 0, .65);
            background-color: transparent;
            border: 1px solid transparent;
        }

        .btn-toggle:hover,
        .btn-toggle:focus {
            color: white;
            border: 1px solid white
        }

        /*
        .btn-toggle::before {
            width: 1.25em;
            line-height: 0;
            content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
            transition: transform .35s ease;
            transform-origin: .5em 50%;
        } */

        .btn-toggle[aria-expanded="true"] {
            color: white;
        }

        .btn-toggle[aria-expanded="true"]::before {
            transform: rotate(90deg);
        }

        .btn-toggle-nav a {
            display: inline-flex;
            padding: .1875rem .5rem;
            margin-top: .125rem;
            margin-left: 1.25rem;
            text-decoration: none;
        }

        .btn-toggle-nav a:hover,
        .btn-toggle-nav a:focus {
            background-color: #fff;
        }

        .scrollarea {
            overflow-y: auto;
        }

        .fw-semibold {
            font-weight: 600;
        }

        .lh-tight {
            line-height: 1.25;
        }

        #content {
            overflow-y: auto;
        }

        .overlay {
            position: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: #212529;
            /* semi-transparent white overlay */
            z-index: 9999;
        }
    </style>

    <script>
        let cookies = document.cookie.split('; ')
        let jwt_cookie = false
        let user_id = false
        let user_role = false



        for (let i = 0; i < cookies.length; i++) {
            if (cookies[i].includes('jwt-token'))
                jwt_cookie = cookies[i]
            if (cookies[i].includes('user-id'))
                user_id = cookies[i]
            if (cookies[i].includes('user-role'))
                user_role = cookies[i]
        }

        if (!jwt_cookie)
            document.location = "{{ route('auth.login-form') }}"

        const token = jwt_cookie.substring(10)
        const id_user = user_id.substring(8)
        const role_user = user_role.substring(10)
    </script>

</head>

<body>
    <div id="loader" class="overlay">
        <div class="spinner-border text-primary" role="status">
        </div>
    </div>

    <main class="d-flex">
        <nav class="vh-100 position-sticky sticky-top">
            @yield('sidebar')
        </nav>
        <div class="w-100" id="content">
            <div>
                @yield('content')
            </div>
        </div>
    </main>
    <script>
        // Show loader on page load
        $(document).ready(function() {
            // Hide loader when page is fully loaded
            $(window).on('load', function() {
                $('#loader').fadeOut('slow');
            });
        });
    </script>

    {{-- charts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {{-- jquery --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    @yield('scripts')
    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    {{-- bootstrap table --}}
    <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>

    {{-- logout --}}
    <script>
        const logout = () => {
            $("#logout").prop("disabled", true);
            $("#logout").html('Déconnexion <div class="spinner-border spinner-border-sm" role="status"></div>')

            $.ajax({
                url: "{{ route('auth.logout') }}",
                method: "POST",
                timeout: 5000,
                headers: {
                    Authorization: "Bearer " + token,
                },
            }).then((response) => {

                console.log(response)
                document.cookie = "jwt-token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"
                document.cookie = "user-role=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"
                document.cookie = "user-id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"
                window.location = "{{ route('auth.login-form') }}";
            }).catch(error => {
                $("#logout").prop("disabled", false);
                $("#logout").html(
                    '<x-fas-plug-circle-xmark style="width:18px" /> Se déconnecter')
                console.log(error)
            })
        }

        $("#logout").click(logout)
    </script>

</body>

</html>
