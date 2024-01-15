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
        $('.like-button, .dislike-button').on('click', function() {
            var programId = $(this).data('program');
            var reactionType = $(this).data('type');
            $("#loader").show()
            $.ajax({
                url: "{{ route('program.likeDislike') }}",
                type: 'POST',
                data: {
                    program: programId,
                    type: reactionType,
                    user_id: id_user
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).then(response => {


                console.log(response)
                // Update the UI dynamically
                var likeCount = response.likes;
                var dislikeCount = response.dislikes;
                window.location.reload()
                $('.like-button').html(likeCount +
                    ' J\'aime <x-far-thumbs-up style="width:20px" />');
                $('.dislike-button').html(dislikeCount +
                    ' Je n\'aime pas <x-far-thumbs-down style="width:20px" />');
            }).catch(error => {

                console.log(error);
            });
        });
    </script>
@endsection
