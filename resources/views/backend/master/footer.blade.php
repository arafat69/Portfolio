</div>

</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('public/backend/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('public/backend/assets/js/app.js') }}"></script>
<script src="{{ asset('public/backend/assets/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('public/backend/assets/js/toastr.min.js') }}"></script>
<script src="{{ asset('public/backend/assets/js/main.js') }}"></script>
<script>
    @if (Session::has('message'))
        toastr.success('{{ session('message') }}');
    @endif
</script>
</body>

</html>
