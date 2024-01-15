@section('scripts')
    <script>
        if (role_user != 'electeur') {
            document.cookie = "jwt-token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"
            document.cookie = "user-role=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"
            document.cookie = "user-id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"
            window.location = "{{ route('auth.login-form') }}";
        }
    </script>
@endsection
