$(document).ready(function() {
    $("#temptable").DataTable({
        lengthMenu: [10, 25, 50, 75, 100, 500, 1000, 10000],
        select: {
            style: "multi"
        },
        order: [[2, "asc"]]
    });
});

$(document).ready(function() {
    $(".contents").summernote({
        height: 150
    });
});


$(document).ready(function (){

    var subcat = function(){
        if($("").is())
    };

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
