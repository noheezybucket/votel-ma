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

        const login = () => {}
    </script>
    <script>
        if (window.location.href === "{{ route('auth.register-form') }}") {
            $("#register-btn").click(register)
        }
    </script>
@endsection
