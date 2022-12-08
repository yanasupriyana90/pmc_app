$(function () {
  $(document).on('click', '#delete', function (e) {
    e.preventDefault();
    var link = $(this).attr("href");


    Swal.fire({
      title: 'Are You Sure ?',
      text: "Delete This Data ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Delete It !'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })


  });

});
