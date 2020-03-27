//FOR JQUERY DATATABLE
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
var tempid = 0;

$(document).ready(function() {
    $("#temptable").DataTable({
        lengthMenu: [10, 25, 50, 75, 100, 500, 1000, 10000],
        select: {
            style: "multi"
        },
        columnDefs: [
            {
                bSortable: false,
                targets: [5, 6]
            }
        ],
        columnDefs: [
            {
                targets: [4],
                visible: false,
                searchable: false
            }
        ],
        order: [[0, "asc"]]
    });
});

//FOR SELECT OPTION CHANGE

$(document).ready(function() {
    $("#maincatSelect").on("change", function() {
        var val = $(this).val();
        if (val == "item1") {
            $("#subcatSelect").html(
                "<option value='test'>item1a</option><option value='test2'>item1b</option>"
            );
        } else if (val == "item2") {
            $("#subcatSelect").html(
                "<option value='test'>item2a</option><option value='test2'>item2b</option>"
            );
        } else if (val == "item3") {
            $("#subcatSelect").html(
                "<option value='test'>item3a</option><option value='test2'>item3b</option>"
            );
        } else if (val == "item4") {
            $("#subcatSelect").html(
                "<option value='test'>item4a</option><option value='test2'>item4b</option>"
            );
        } else if (val == "item0") {
            $("#subcatSelect").html(
                "<option value=''>--- select main category first ---</option>"
            );
        }
    });
});

//  Clear Modal
$("#msgtemplatemodal").on("hidden.bs.modal", function() {
    $(this)
        .find("input,textarea,file")
        .val("")
        .end();
    $("#main_cat").val("item0");
});

$(document).on("click", "#saveButton", function() {
    if (
        $("#saveButton")
            .text()
            .trim() == "Add Template"
    ) {
        var title = $("#title").val();
        var contents = $("#contents").val();
        var maincat = $("#maincatSelect option:selected").text();
        var subcat = $("#subcatSelect option:selected").text();

        if (title != "" && contents != "" && maincat != "" && subcat != "") {
            $.ajax({
                url: "/addTemplate",
                type: "POST",
                data: {
                    _token: CSRF_TOKEN,
                    title: title,
                    contents: contents,
                    main_cat: maincat,
                    sub_cat: subcat
                },
                cache: false,
                success: function(response) {
                    console.log(JSON.parse(response));

                    // if ($("#temptable").find(".dataTables_empty").length) {
                    //     $("#temptable > tbody").empty();
                    // }

                    // var newTemplate = JSON.parse(response);

                    // var newLine = "";

                    // newLine += "<tr>";
                    // newLine +=
                    //     "<td id='id' class='sorting_1'>" +
                    //     newTemplate.id +
                    //     "</td>";
                    // newLine += "<td>" + newTemplate.main_cat + "</td>";
                    // newLine += "<td>" + newTemplate.sub_cat + "</td>";
                    // newLine += "<td>" + newTemplate.title + "</td>";
                    // newLine += "<td>" + newTemplate.contents + "</td>";
                    // newLine +=
                    //     "<td class='text-center' width='70px'>" +
                    //     '<div class="form-check"><input class="form-check-input" type="checkbox" value="" id="defaultCheck1"><label class="form-check-label" for="defaultCheck1"></label><div>' +
                    //     "</td>";
                    // newLine +=
                    //     "<td class='text-center' width='120px'><a class='btn btn-small btn-warning editModal'><i class='fas fa-edit'></i></a>";
                    // newLine +=
                    //     "<a class='btn btn-small btn-danger delModal'><i class='fas fa-trash-alt'></i></a>";
                    // newLine += "</td></tr>";

                    // $("#temptable > tbody").append(newLine);\

                    $("#temptable").load(window.location + " #temptable");
                    toastr.success("Message template added!");
                }
            });
            $("#modalCloseButton").trigger("click");
        } else {
            toastr.error("Fill all fields!");
        }
    } else if (
        $("#saveButton")
            .text()
            .trim() == "Update Template"
    ) {
        if (title != "" && contents != "" && maincat != "" && subcat != "") {
            var title = $("#title").val();
            var contents = $("#contents").val();
            var maincat = $("#maincatSelect option:selected").text();
            var subcat = $("#subcatSelect option:selected").text();

            $.ajax({
                url: "/updateTemplate/" + tempid,
                type: "PATCH",
                data: {
                    _token: CSRF_TOKEN,
                    title: title,
                    contents: contents,
                    main_cat: maincat,
                    sub_cat: subcat
                },
                cache: false,
                success: function() {
                    toastr.success("Contact updated successfully");
                    tempid = 0;
                    $("#temptable").load(window.location + " #temptable");
                }
            });
            $("#modalCloseButton").trigger("click");
        } else {
            toastr.error("Fill all fields!");
        }
    }
});

$("#addTemplate").on("click", function() {
    $("#saveButton").html("Add Template");
});

$(document).on("click", ".editModal", function() {
    var currentRow = $(this).closest("tr");

    tempid = currentRow.find("td:eq(0)").text();

    $("#msgtemplatemodal").modal("show");
    $("#saveButton").html("Update Template");

    main_category_array = [
        "Client Email",
        "Client Text",
        "Cleaner Email",
        "Cleaner Text"
    ];

    sub_category_array = [
        ["item1a", "item1b"],
        ["item2a", "item2b"],
        ["item3a", "item3b"],
        ["item4a", "item4b"]
    ];

    $row = $(this).closest("tr");

    var data = $row
        .children("td")
        .map(function() {
            return $(this).text();
        })
        .get();

    console.log(data);

    let main_category_index = main_category_array.indexOf(data[1]);
    let sub_category_index = sub_category_array[main_category_index].indexOf(
        data[2]
    );

    if (main_category_index == 0) {
        $("#subcatSelect").html(
            "<option value='test'>item1a</option><option value='test2'>item1b</option>"
        );
    } else if (main_category_index == 1) {
        $("#subcatSelect").html(
            "<option value='test'>item2a</option><option value='test2'>item2b</option>"
        );
    } else if (main_category_index == 2) {
        $("#subcatSelect").html(
            "<option value='test'>item3a</option><option value='test2'>item3b</option>"
        );
    } else if (main_category_index == 3) {
        $("#subcatSelect").html(
            "<option value='test'>item4a</option><option value='test2'>item4b</option>"
        );
    } else {
        $("#subcatSelect").html(
            "<option value=''>--- select main category first ---</option>"
        );
    }

    $("#title").val(data[3]);
    $("#contents").val(data[4]);
    $("#maincatSelect").prop("selectedIndex", main_category_index + 1);
    $("#subcatSelect").prop("selectedIndex", sub_category_index);
});

$(document).on("click", ".delModal", function() {
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
                    url: "/deleteTemplate/" + colId,
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
