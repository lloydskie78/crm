// FOR DATATABLE JQUERY

$(document).ready(function() {
    $("#smstable").DataTable({
        lengthMenu: [10, 25, 50, 75, 100, 500, 1000, 10000],
        select: {
            style: "multi"
        },
        order: [[2, "asc"]]
    });
});
