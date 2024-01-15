@section('scripts')
    <script>
        const register = () => {
            $('#register-btn').prop('disabled', true)
            $('#register-btn').html(
                '<div class="spinner-border spinner-border-sm" role="status"></div>')

            let data = {
                fullname: $("#fullname").val(),
                cni: $("#cni").val(),
                password: $("#password").val(),
                role: $("#role").val()
            }

            $.ajax({
                url: "{{ route('auth.register') }}",
                method: "POST",
                data: data,
                timeout: 5000,
            }).then(response => {
                $('#register-btn').prop('disabled', false)
                $('#register-btn').html(
                    'S\'inscrire <x-fas-arrow-right-to-bracket style="width: 20px; margin-right:5px" />')

                console.log(response)
                if (response.status === 'success') {
                    $("#error").html("")
                    window.location.href = "{{ route('auth.login-form') }}"
                }


            }).catch(error => {
                $('#register-btn').prop('disabled', false)
                $('#register-btn').html(
                    'S\'inscrire <x-fas-arrow-right-to-bracket style="width: 20px; margin-right:5px" />')

                console.log(error)

                if (error.status === 400) {
                    var url =
                        "https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=fr&dt=t&q=" +
                        encodeURI(error.responseJSON.message)
                    $.getJSON(url, function(data) {
                        $("#error").html(
                            '<span  class="alert alert-danger d-block">' + data[0][0][0] + '</span>'
                        )
                    })
                }

                if (error.status === 500) {
                    $("#error").html("Le serveur a rencontré un problème...")
                }


            })
        }

        const login = () => {
            $('#login-btn').prop('disabled', true)
            $('#login-btn').html(
                '<div class="spinner-border spinner-border-sm" role="status"></div>')

            let data = {
                cni: $("#cni").val(),
                password: $("#password").val(),
            }

            $.ajax({
                url: "{{ route('auth.login') }}",
                method: 'POST',
                data: data,
                timeout: 5000
            }).then(response => {
                $('#login-btn').prop('disabled', false)
                $('#login-btn').html(
                    'Se connecter <x-fas-arrow-right-to-bracket style="width: 20px; margin-right:5px" />')

                console.log(response)

                if (response.status === "success") {
                    $("#error").html("")
                    if (response.user.role === 'electeur') {
                        window.location.href = "{{ route('electeur.stats') }}"
                    }

                    if (response.user.role === "admin") {
                        window.location.href = "{{ route('admin.dashboard') }}"

                    }

                }
            }).catch(error => {
                $('#login-btn').prop('disabled', false)
                $('#login-btn').html(
                    'Se connecter <x-fas-arrow-right-to-bracket style="width: 20px; margin-right:5px" />')

                var url =
                    "https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=fr&dt=t&q=" +
                    encodeURI(error.responseJSON.message)
                $.getJSON(url, function(data) {
                    $("#error").html(
                        '<span  class="alert alert-danger d-block">' + data[0][0][0] + '</span>'
                    )
                })



                console.log(error)
            })
        }
    </script>
    <script>
        if (window.location.href === "{{ route('auth.register-form') }}") {
            $("#register-btn").click(register)
        }

        if (window.location.href === "{{ route('auth.login-form') }}") {
            $("#login-btn").click(login)
        }
    </script>
@endsection
