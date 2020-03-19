/**
* ! THIS IS NEEDED FOR THE PROJECT!

* ! ROW GROUPING URL:
* ! https://datatables.net/examples/advanced_init/row_grouping.html
 
* ! CHILD ROWS URL:
* ! https://datatables.net/examples/api/row_details.html
* ! http://live.datatables.net/bihawepu/1/edit
* ! http://jsfiddle.net/fe74zm38/

**/

var isTabclicked = false;
var id = 0;

$(document).ready(function() {
    $("body").bind("ajaxSend", function(elm, xhr, s) {
        if (s.type == "PATCH") {
            xhr.setRequestHeader("X-CSRF-Token", getCSRFTokenValue());
        }
    });

    var table = $("#example1").DataTable({
        columnDefs: [
            {
                targets: [0, 0],
                checkboxes: {
                    selectRow: true
                },
                orderable: false
            }
        ],
        select: {
            style: "multi"
        },
        order: [[2, "asc"]]
    });

    $("#example1").Tabledit({
        deleteButton: true,
        autoFocus: false,
        columns: {
            identifier: [2, "id"],
            editable: [
                [3, "agency-name"],
                [4, "name"],
                [5, "number"],
                [6, "email"],
                [7, "msg_in"],
                [8, "update"]
            ]
        },
        restoreButton: false,
        onSuccess: function(data, textStatus, jqXHR) {
            if (data.action == "delete") {
                alert("Hello World");
            }
        }
    });

    // Add event listener for opening and closing details
    $("#example1 tbody").on("click", "td.details-control", function() {
        var tr = $(this).closest("tr");
        var tdi = tr.find("i.fa");
        var row = table.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass("shown");
            tdi.first().removeClass("fa-minus-square");
            tdi.first().addClass("fa-plus-square");
        } else {
            // Open this row
            row.child(format(row.data())).show();
            tr.addClass("shown");
            tdi.first().removeClass("fa-plus-square");
            tdi.first().addClass("fa-minus-square");
        }
    });

    table.on("user-select", function(e, dt, type, cell, originalEvent) {
        if ($(cell.node()).hasClass("details-control")) {
            e.preventDefault();
        }
    });
});

// FOR INLINE EDITING

$(document).on("click", ".save", function() {
    var currentRow = $(this).closest("tr");

    var col3 = currentRow.find("td:eq(2)").text();
    var col4 = currentRow.find("td:eq(3)").text();
    var col5 = currentRow.find("td:eq(4)").text();
    var col6 = currentRow.find("td:eq(5)").text();
    var col7 = currentRow.find("td:eq(6)").text();
    var col8 = currentRow.find("td:eq(7)").text();
    var col9 = currentRow.find("td:eq(8)").text();

    var ajax_token = $("#ajax-token")
        .html()
        .split("=")[3]
        .replace('"', "")
        .replace('"', "")
        .replace(">", "");

    $.ajax({
        url: "/updateData/" + col3,
        type: "PATCH",
        data: {
            CSRF: ajax_token,
            _token: ajax_token,
            agency_name: col4,
            name: col5,
            number: col6,
            email: col7,
            msg_in: col8,
            update: col9
        },
        cache: false
    });
});

// FOR INLINE EDITING

$(document).on("click", ".confirm", function() {
    var currentRow = $(this).closest("tr");

    var colId = currentRow.find("td:eq(2)").text();

    var ajax_token = $("#ajax-token")
        .html()
        .split("=")[3]
        .replace('"', "")
        .replace('"', "")
        .replace(">", "");

    $.ajax({
        url: "/deleteData/" + colId,
        type: "POST",
        data: {
            CSRF: ajax_token,
            _token: ajax_token
        },
        cache: false,
        success: function() {
            currentRow.hide();
        }
    });
});

function format(d) {
    // `d` is the original data object for the row
    return (
        '<table class="table table-bordered table-hover table-condensed" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        "<thead><tr>" +
        "<th></th>" +
        "<th>Stage</th>" +
        "<th></th>" +
        "<th></th>" +
        "<th>Month</th>" +
        "<th>Month</th>" +
        "<th>Day</th>" +
        "<th>Priority</th>" +
        "<th>Stage</th>" +
        "</tr></thead>" +
        "<tbody>" +
        "<tr>" +
        "<td>lead" +
        "</td>" +
        "<td>active (def)" +
        "</td>" +
        "<td>WB" +
        "</td>" +
        "<td>< 1 >" +
        "</td>" +
        "<td>j" +
        "</td>" +
        "<td>j" +
        "</td>" +
        "<td>m" +
        "</td>" +
        "<td>any" +
        "</td>" +
        "<td>< warm >" +
        "</td>" +
        "</tr>" +
        "<tr>" +
        "<td>opp" +
        "</td>" +
        "<td>interest" +
        "</td>" +
        "<td>GA" +
        "</td>" +
        "<td>< 1 >" +
        "</td>" +
        "<td>f" +
        "</td>" +
        "<td>a" +
        "</td>" +
        "<td>t" +
        "</td>" +
        "<td>pm" +
        "</td>" +
        "<td>< low >" +
        "</td>" +
        "</tr>" +
        "<tr>" +
        "<td>prop" +
        "</td>" +
        "<td>no interest" +
        "</td>" +
        "<td>SE" +
        "</td>" +
        "<td>< 3 >" +
        "</td>" +
        "<td>m" +
        "</td>" +
        "<td>s" +
        "</td>" +
        "<td>w" +
        "</td>" +
        "<td>now" +
        "</td>" +
        "<td>$0" +
        "</td>" +
        "</tr>" +
        "<tr>" +
        "<td>sold" +
        "</td>" +
        "<td>not now" +
        "</td>" +
        "<td>SC" +
        "</td>" +
        "<td>< 1 >" +
        "</td>" +
        "<td>a" +
        "</td>" +
        "<td>o" +
        "</td>" +
        "<td>t" +
        "</td>" +
        "<td>wkly" +
        "</td>" +
        "<td>$0" +
        "</td>" +
        "</tr>" +
        "<tr>" +
        "<td>done" +
        "</td>" +
        "<td>stop" +
        "</td>" +
        "<td>HS" +
        "</td>" +
        "<td>< 1 >" +
        "</td>" +
        "<td>m" +
        "</td>" +
        "<td>n" +
        "</td>" +
        "<td>f" +
        "</td>" +
        "<td>mthly" +
        "</td>" +
        "<td>$0" +
        "</td>" +
        "</tr>" +
        "<tr>" +
        "<td>paid" +
        "</td>" +
        "<td>inactive" +
        "</td>" +
        "<td>CM" +
        "</td>" +
        "<td>< 1 >" +
        "</td>" +
        "<td>j" +
        "</td>" +
        "<td>d" +
        "</td>" +
        "<td>s" +
        "</td>" +
        "<td>00/00/00" +
        "</td>" +
        "<td>$0" +
        "</td>" +
        "</tr>" +
        "</tbody>" +
        "</table>"
    );
}

$(".custom-file-input").on("change", function() {
    var fileName = $(this)
        .val()
        .split("\\")
        .pop();
    $(this)
        .siblings(".custom-file-label")
        .addClass("selected")
        .html(fileName);
});

// This function is for the table drag and drop
$(function() {
    var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width());
        });
        return $helper;
    };
    // ,updateIndex = function(e, ui) {};

    $("#example1 tbody")
        .sortable({
            helper: fixHelperModified
            // ,stop: updateIndex
        })
        .disableSelection();
});

// For summernote textarea`
$(document).ready(function() {
    $(".update").summernote({
        height: 200
    });
    $(".msg_in").summernote({
        height: 150
    });
});

//Enable check and uncheck all functionality

$(".checkbox-toggle").click(function(e) {
    alert("Hellow");
    $(this)
        .closest("table")
        .find("td input:checkbox")
        .prop("checked", this.checked);
});

//  Clear Modal
$("#contactModal").on("hidden.bs.modal", function() {
    $(this)
        .find("input,textarea,file")
        .val("")
        .end();
});

// $("#saveButton").on("click", function() {
//     if (isTabclicked == true) {
//         function opsi(data) {
//             var allRows = data.split(/\r?\n|\r/);
//             var table = "<";
//         }
//     } else {
//         // alert("tab no 1 is clicked....");
//     }
// });

// For tab click
$("#tab1").on("click", function() {
    isTabclicked = false;
    // alert("tab no 1 is clicked....");
    $("#tabber").val(isTabclicked);
});
$("#tab2").on("click", function() {
    isTabclicked = true;
    // alert("tab no 2 is clicked....");
    $("#tabber").val(isTabclicked);
});

function submit() {
    $("#upload_csv").submit();
    w;
}
