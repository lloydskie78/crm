/**
* ! THIS IS NEEDED FOR THE PROJECT!

* ! ROW GROUPING URL:
* ! https://datatables.net/examples/advanced_init/row_grouping.html
 
* ! CHILD ROWS URL:
* ! https://datatables.net/examples/api/row_details.html
* ! http://live.datatables.net/bihawepu/1/edit
* ! http://jsfiddle.net/fe74zm38/

* ! Upload csv File to Datatable
* ! https://www.webslesson.info/2018/07/how-to-load-csv-file-in-jquery-datatables-using-ajax-php.html

**/

// $(function() {
//   $("#example1").attr("height", 200);
// });

var isTabclicked = false;

$(document).ready(function() {
    var table = $("#example1").DataTable({
        responsive: true,
        select: "single",
        columnDefs: [
            {
                targets: [0, 1],
                orderable: false
            }
        ],
        order: [[2, "asc"]]
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

$(document).ready(function() {
    $("#example1").Tabledit({
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
        onSuccess: function(data) {
            if (data.action == "delete") {
                $("#" + data.id).remove();
            }
        }
    });
});

function format(d) {
    // `d` is the original data object for the row
    return (
        '<table class="table" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
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

// For summernote textarea
$(document).ready(function() {
    $("#sumnote1").summernote({
        height: 150
    });
    $("#sumnote2").summernote({
        height: 200
    });
});

//Enable check and uncheck all functionality
$(function() {
    $(".checkbox-toggle").click(function() {
        var clicks = $(this).data("clicks");
        if (clicks) {
            //Uncheck all checkboxes
            $(".mailbox-messages input[type='checkbox']").prop(
                "checked",
                false
            );
            $(".checkbox-toggle .far.fa-check-square")
                .removeClass("fa-check-square")
                .addClass("fa-square");
        } else {
            //Check all checkboxes
            $(".mailbox-messages input[type='checkbox']").prop("checked", true);
            $(".checkbox-toggle .far.fa-square")
                .removeClass("fa-square")
                .addClass("fa-check-square");
        }
        $(this).data("clicks", !clicks);
    });
});
//  Clear Modal
$("#contactModal").on("hidden.bs.modal", function() {
    $(this)
        .find("input,textarea,file")
        .val("")
        .end();
});

// For tab click
$("#tab1").on("click", function() {
    isTabclicked = false;
    // alert("tab no 1 is clicked....");
});
$("#tab2").on("click", function() {
    isTabclicked = true;
    // alert("tab no 2 is clicked....");
});

// Exec when Save button clicked
$("#saveButton").on("click", function() {
    if (isTabclicked == true) {
        function opsi(data) {
            var allRows = data.split(/\r?\n|\r/);
            var table = "<";
        }
    } else {
        // alert("tab no 1 is clicked....");
    }
});

function submit() {
    $("#upload_csv").submit();
}

// For .csv file submission
// function getFile() {
//     var file = document.getElementById("customFile").files[0];
//     var reader = new FileReader();
//     reader.onload = function(progressEvent) {
//         var lines = this.result.split("\n");
//         var hold = [];

//         for (var line = 0; line < lines.length; line++) {
//             var skipFlag = false;
//             columns = lines[line].split(",");

//             for (var column = 0; column < columns.length; column++) {
//                 columns[column] = columns[column].replace("\r", "");
//                 if (columns[column] == "" || columns[column] == null) {
//                     skipFlag = true;
//                 }
//             }

//             if (skipFlag) {
//                 continue;
//             }

//             agency_name = columns[0];
//             name = columns[1];
//             number = columns[2];
//             email = columns[3];
//             msg_in = columns[4];
//             update = columns[5];

//             var json_person = {
//                 agency_name: agency_name,
//                 name: name,
//                 number: number,
//                 email: email,
//                 msg_in: msg_in,
//                 update: update
//             };
//             hold.push(json_person);
//             console.log(hold);
//         }

//         $.ajax({
//             url: "/admin/clientstore",
//             method: "GET",
//             dataType: "json",
//             data: {
//                 clientdetails: hold
//             }
//         });
//     };
//     reader.readAsText(file);
// }

// JSON data for data table
// var testdata = {
//     data: [
//         {
//             id: "1",
//             agency_name: "Kay Burton",
//             name: "JUSTIN",
//             number: "0 400 001",
//             email: "example@kayburton.com.au",
//             msg_in: "",
//             update: ""
//         },
//         {
//             id: "2",
//             agency_name: "O'Brien",
//             name: "Bronwyn",
//             number: "0 400 002",
//             email: "bronwyn.payne@obre.com.au",
//             msg_in: "",
//             update: ""
//         },
//         {
//             id: "3",
//             agency_name: "O'Brien",
//             name: "Hastings",
//             number: "0 400 003",
//             email: "hastings.payne@obre.com.au",
//             msg_in: "",
//             update: ""
//         },
//         {
//             id: "4",
//             agency_name: "Ray White",
//             name: "Kirsty",
//             number: "0 400 004",
//             email: "kirsty.edwards@raywhite.com.au",
//             msg_in: "",
//             update: ""
//         },
//         {
//             id: "5",
//             agency_name: "Barry Plant",
//             name: "Cathy",
//             number: "0 400 005",
//             email: "cdunlo@barryplant.com.au",
//             msg_in: "",
//             update: ""
//         },
//         {
//             id: "6",
//             agency_name: "Hocking Stuart",
//             name: "Holly",
//             number: "0 400 006",
//             email: "hbowman@hockingstuart.com.au",
//             msg_in: "",
//             update: ""
//         }
//     ]
// };
