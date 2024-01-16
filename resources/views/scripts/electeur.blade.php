@section('scripts')
    <script>
        if (role_user != 'electeur') {
            document.cookie = "jwt-token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"
            document.cookie = "user-role=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"
            document.cookie = "user-id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"
            window.location = "{{ route('auth.login-form') }}";
        }
    </script>

    <script>
        function like() {
            var programId = $("#like-button").data('program');
            console.log(programId, id_user)

            $.ajax({
                url: "{{ route('program.like') }}",
                method: "POST",
                data: {
                    program_id: programId,
                    user_id: id_user
                },
                timeout: 5000,
            }).then(response => {
                console.log(response)

                if (response.liked) {
                    $("#dislike-button").removeClass("btn-danger")
                    $("#dislike-button").addClass("btn-outline-danger")



                    $("#like-button").removeClass("btn-outline-primary")
                    $("#like-button").addClass("btn-primary")
                } else {

                    $("#like-button").removeClass("btn-primary")
                    $("#like-button").addClass("btn-outline-primary")
                }

            }).catch(error => {
                console.error(error)
            })
        }

        const dislike = () => {

            var programId = $("#dislike-button").data('program');

            $.ajax({
                url: "{{ route('program.dislike') }}",
                method: "POST",
                data: {
                    program_id: programId,
                    user_id: id_user
                },
                timeout: 5000,
            }).then(response => {

                if (response.disliked) {

                    console.log(response.dislikes.length)

                    $("#like-button").removeClass("btn-primary")
                    $("#like-button").addClass("btn-outline-primary")

                    $("#dislike-button").removeClass("btn-outline-danger")
                    $("#dislike-button").addClass("btn-danger")
                } else {

                    $("#dislike-button").removeClass("btn-danger")
                    $("#dislike-button").addClass("btn-outline-danger")
                }

            }).catch(error => {
                console.error(error)
            })
        }
    </script>
    <script>
        $("#like-button").click(like)
        $("#dislike-button").click(dislike)
    </script>
@endsection
