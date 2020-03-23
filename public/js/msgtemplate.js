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
$(document).ready(function() {
    $(".contents").summernote({
        height: 150
    });
});

//  Clear Modal
$("#contactModal").on("hidden.bs.modal", function() {
    $(this)
        .find("input,textarea,file, select")
        .val("")
        .end();
});

$(document).on("click", "#saveButton", function() {
    var title = $("#title").val();
    var contents = $("#contents").val();
    var maincat = $("#maincatSelect option:selected").text();
    var subcat = $("#subcatSelect option:selected").text();

    alert("Main: " + maincat + "\nSubcat: " + subcat);

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
            success: function() {
                toastr.success("Message template added!");
            }
        });
    } else {
        toastr.error("Fill all fields");
    }
});
