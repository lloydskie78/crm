// This function is for the jquery datatable
// $(function() {
//     $("#example1").DataTable();
// });

var editor; // use a global for the submit and return data rendering in the examples

/**
* ! THIS IS NEEDED FOR THE PROJECT!

* ! ROW GROUPING URL:
* ! https://datatables.net/examples/advanced_init/row_grouping.html
* ! 
* ! CHILD ROWS URL:
* ! https://datatables.net/examples/api/row_details.html
* ! http://live.datatables.net/bihawepu/1/edit
* ! http://jsfiddle.net/fe74zm38/
**/

// $(function() {
//   $("#example1").attr("height", 200);
// });

$(document).ready(function() {
    debugger;
    var table = $("#example1").DataTable({
        data: testdata.data,
        select: "single",
        columns: [
            {
                className: "icheck-primary",
                orderable: false,
                data: null,
                defaultContent: "",
                render: function() {
                    return (
                        '<input type="checkbox" value="" id="check1" />' +
                        '<label for="check1"></label>'
                    );
                },
                width: "13px"
            },
            {
                className: "details-control",
                orderable: false,
                data: null,
                defaultContent: "",
                render: function() {
                    return '<i class="fa fa-plus-square" aria-hidden=clear"true"></i>';
                },
                width: "15px"
            },
            {
                data: "id"
            },
            {
                data: "agency-name"
            },
            {
                data: "suburb"
            },
            {
                data: "name"
            },
            {
                data: "last-name"
            },
            {
                data: "number"
            },
            {
                data: "email"
            },
            {
                data: "department"
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

    // $("#example1 tbody").Tabledit({
    //     columns: {
    //         identifier: [2, "id"],
    //         editable: [
    //             [3, "agency-name"],
    //             [4, "suburb"],
    //             [5, "name"],
    //             [6, "last-name"],
    //             [7, "number"],
    //             [8, "email"],
    //             [9, "department"]
    //         ]
    //     }
    // });
});

$(document).ready(function() {
    $("#example1").Tabledit({
        columns: {
            identifier: [2, "id"],
            editable: [
                [3, "agency-name"],
                [4, "suburb"],
                [5, "name"],
                [6, "last-name"],
                [7, "number"],
                [8, "email"],
                [9, "department"]
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
        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
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
        "<th>Msg In</th>" +
        "<th>Update Note</th>" +
        "</tr></thead>" +
        "<tbody>" +
        "<tr>" +
        "</tr>" +
        "</tbody>" +
        "</table>"
    );
}

var testdata = {
    data: [
        {
            id: "1",
            "agency-name": "Kay Burton",
            suburb: "South Yara",
            name: "JUSTIN",
            "last-name": "",
            number: "0 400 001",
            email: "example@kayburton.com.au",
            department: "Manager"
        },
        {
            id: "2",
            "agency-name": "O'Brien",
            suburb: "Chelsea",
            name: "Bronwyn",
            "last-name": "Payne",
            number: "0 400 002",
            email: "bronwyn.payne@obre.com.au",
            department: "Sales"
        },
        {
            id: "3",
            "agency-name": "O'Brien",
            suburb: "Hastings",
            name: "Bronwyn",
            "last-name": "Payne",
            number: "0 400 003",
            email: "hastings.payne@obre.com.au",
            department: "Sales"
        },
        {
            id: "4",
            "agency-name": "Ray White",
            suburb: "Ferntree Gully",
            name: "Kirsty",
            "last-name": "Edwards",
            number: "0 400 004",
            email: "kirsty.edwards@raywhite.com.au",
            department: "Sales"
        },
        {
            id: "5",
            "agency-name": "Barry Plant",
            suburb: "Keysborough",
            name: "Cathy",
            "last-name": "Mcrae",
            number: "0 400 005",
            email: "cdunlo@barryplant.com.au",
            department: "Sales"
        },
        {
            id: "6",
            "agency-name": "Hocking Stuart",
            suburb: "Frankston",
            name: "Holly",
            "last-name": "Bowman",
            number: "0 400 006",
            email: "hbowman@hockingstuart.com.au",
            department: "Sales"
        }
    ]
};

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
