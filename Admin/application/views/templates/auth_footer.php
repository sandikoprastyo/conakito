<!--SWEET ALLERT-->
<script src="<?= base_url('assets/js/sweetalert2.all.min.js'); ?>"></script>
<script>
  const tombol1 = document.querySelector('#tombol1');
  tombol1.addEventListener('click', function() {
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false,
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
              if (result.value) {
                swalWithBootstrapButtons.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
              ) {
                swalWithBootstrapButtons.fire(
                  'Cancelled',
                  'Your imaginary file is safe :)',
                  'error'
                }
              })
</script>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('../Admin/assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('../Admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('../Admin/assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('../Admin/assets/js/sb-admin-2.min.js'); ?>"></script>

</body>

</html>