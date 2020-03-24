//FOR JQUERY DATATABLE
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

$(document).ready(function() {
    $("#temptable").DataTable({
        lengthMenu: [10, 25, 50, 75, 100, 500, 1000, 10000],
        select: {
            style: "multi"
        },
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

//SUMMERNOTE TEXTAREA
// $(document).ready(function() {
//     $(".contents").summernote({
//         height: 150
//     });
// });

//  Clear Modal
$("#msgtemplatemodal").on("hidden.bs.modal", function() {
    $(this)
        .find("input,textarea,file, select")
        .val("")
        .end();
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

        alert("Main: " + maincat + "\nSubcat: " + subcat);
        console.log(maincat);
        console.log(subcat);

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
                    var newTemplate = JSON.parse(response);

                    var newLine = "";

                    newLine += "<tr role='row'>";
                    newLine +=
                        "<td id='id' class='sorting_1'>" +
                        newTemplate.id +
                        "</td>";
                    newLine += "<td>" + newTemplate.main_cat + "</td>";
                    newLine += "<td>" + newTemplate.sub_cat + "</td>";
                    newLine += "<td>" + newTemplate.title + "</td>";
                    newLine += "<td>" + newTemplate.contents + "</td>";
                    newLine +=
                        "<td class='text-center' width='200px'>" +
                        '<div class="form-check"><input class="form-check-input" type="checkbox" value="" id="defaultCheck1"><label class="form-check-label" for="defaultCheck1"></label><div>' +
                        "</td>";
                    newLine +=
                        "<td class='text-center' width='200px'><a class='btn btn-small btn-primary showModal'><i class='fas fa-eye'></i></a>";
                    newLine +=
                        "<a class='btn btn-small btn-warning editModal'><i class='fas fa-edit'></i></a>";
                    newLine +=
                        "<a class='btn btn-small btn-danger delModal'><i class='fas fa-trash-alt'></i></a>";
                    newLine += "</td></tr>";

                    $("#temptable > tbody").append(newLine);

                    toastr.success("Message template added!");
                }
            });
            $("#modalCloseButton").trigger("click");
        } else {
        }
    } else {
        if (title != "" && contents != "" && maincat != "" && subcat != "") {
        } else {
            toastr.error("Fill all fields!");
        }
    }
});

$(".showModal").on("click", function() {
    $("#msgtemplatemodal").modal("show");
});

$("#addTemplate").on("click", function() {
    $("#saveButton").html("Add Template");
});

$(".editModal").on("click", function() {
    $("#msgtemplatemodal").modal("show");
    $("#saveButton").html("Update Template");

    $row = $(this).closest("tr");

    var data = $row
        .children("td")
        .map(function() {
            return $(this).text();
        })
        .get();

    console.log(data);
    $("#title").val(data[3]);
    $("#contents").val(data[4]);
    $("main_cat").val(data[1]);
    $("sub_cat").val(data[2]);
});

$(".delModal").on("click", function() {});
