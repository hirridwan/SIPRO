"use-strict";

$("#table-1").dataTable({
    // "scrollX":true,
    "columnDefs": [
      { 
        "autoWidth":true,
        "width":'20%',
        "sortable": false, 
        "targets": [6],
      }
    ]
  });
  $("#table-2").dataTable({
    "columnDefs": [
      { "sortable": false, "targets": [0,2,3] }
    ]
  });
  