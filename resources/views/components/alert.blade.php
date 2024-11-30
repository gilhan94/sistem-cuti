@if (session('danger'))
    @php
        $message = session('danger');
    @endphp
    <script>
        let message = "<?= $message ?>"
        Swal.fire({
            title: 'GAGAL',
            html: message,
            icon: 'error',
            confirmButtonText: 'OKE'
        })
    </script>
@endif
@if (session('success'))
    @php
        $message = session('success');
    @endphp
    <script>
        let message = "<?= $message ?>"
        Swal.fire({
            title: 'BERHASIL',
            html: message,
            icon: 'success',
            confirmButtonText: 'OKE'
        })
    </script>
@endif
<script>
    window.addEventListener('showAlert', event => {
        alert(event.detail.message);
    })
</script>
