//FOR JQUERY DATATABLE

$(document).ready(function() {
    $("#temptable").DataTable({
        lengthMenu: [10, 25, 50, 75, 100, 500, 1000, 10000],
        select: {
            style: "multi"
        },
        order: [[2, "asc"]]
    });
});

//FOR SELECT OPTION CHANGE

$(document).ready(function() {
    $("#maincatSelect").on("change", function() {
        var val = $(this).val();
        if (val == "item1") {
            $("#subcatSelect").html(
                "<option value='test'>item1: test 1</option><option value='test2'>item1: test 2</option>"
            );
        } else if (val == "item2") {
            $("#subcatSelect").html(
                "<option value='test'>item2: test 1</option><option value='test2'>item2: test 2</option>"
            );
        } else if (val == "item3") {
            $("#subcatSelect").html(
                "<option value='test'>item3: test 1</option><option value='test2'>item3: test 2</option>"
            );
        } else if (val == "item3") {
            $("#subcatSelect").html(
                "<option value='test'>item3: test 1</option><option value='test2'>item4: test 2</option>"
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

$(document).ready(function() {
    var source = [
        "Client Email",
        "Client Text",
        "Cleaner Email",
        "Cleaner Text"
    ];
    $("#list1").jqxComboBox({
        theme: "arctic",
        selectedIndex: 3,
        source: source,
        width: 200,
        height: 25
    });
    $("#list2").jqxComboBox({
        theme: "arctic",
        selectedIndex: 3,
        source: source,
        width: 200,
        height: 25
    });
});

//  Clear Modal
$("#contactModal").on("hidden.bs.modal", function() {
    $(this)
        .find("input,textarea,file, select")
        .val("")
        .end();
});
