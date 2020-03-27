//FOR JQUERY DATATABLE
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

$(document).ready(function() {
    $("#acctable").DataTable({
        lengthMenu: [10, 25, 50, 75, 100, 500, 1000, 10000],
        select: {
            style: "multi"
        },
        order: [[0, "asc"]]
    });
});

$(document).on("click", ".delUser", function() {
    var currentRow = $(this).closest("tr");

    var colId = currentRow.find("td:eq(0)").text();

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons
        .fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        })
        .then(result => {
            if (result.value) {
                $.ajax({
                    url: "/deleteUser/" + colId,
                    type: "POST",
                    data: {
                        _token: CSRF_TOKEN
                    },
                    cache: false,
                    success: function() {
                        toastr.warning("Contact deleted");
                        currentRow.hide();
                    }
                });

                swalWithBootstrapButtons.fire(
                    "Deleted!",
                    "Your file has been deleted.",
                    "success"
                );
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    "Cancelled",
                    "Your file is safe :)",
                    "error"
                );
            }
        });
});
