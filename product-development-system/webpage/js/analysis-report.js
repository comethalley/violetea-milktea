$(document).ready(function () {
  $(".viewbtn").on("click", function () {
    $("#viewmodal").modal("show");
    $.ajax({
      //create an ajax request to suggestion.php
      type: "GET",
      url: "suggestion.php",
      dataType: "html", //expect html to be returned
      success: function (response) {
        $("#responsecontainer").html(response);
        //alert(response);
      },
    });
  });
});

$(document).ready(function () {
  $("#datatableid").DataTable({
    pagingType: "full_numbers",
    lengthMenu: [
      [10, 25, 50, -1],
      [10, 25, 50, "All"],
    ],
    responsive: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search Your Data",
    },
    order: [[0, "desc"]],
  });
});

//surveys
$(document).ready(function () {
  $("#surveyid").DataTable({
    pagingType: "full_numbers",
    lengthMenu: [
      [10, 25, 50, -1],
      [10, 25, 50, "All"],
    ],
    responsive: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search Your Data",
    },
    order: [[0, "desc"]],
  });
});

$(document).ready(function () {
  $("body").on("click", ".archivebtn", function (event) {
    $("#archivemodal").modal("show");

    $tr = $(this).closest("tr");

    var data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(data);

    $("#user_id").val(data[0]);
    $("#username").val(data[1]);
    $("#civilStatus").val(data[2]);
    $("#gender").val(data[3]);
    $("#address").val(data[4]);
    $("#age").val(data[5]);
    $("#timestamp").val(data[6]);
    $("#conceptID").val(data[7]);
  });
});

$(document).ready(function () {
  $("body").on("click", ".editbtn", function (event) {
    var id = $(this).data("id");
    $.ajax({
      url: "analysis-report-chart.php",
      type: "post",
      data: {
        id: id,
      },
      success: function (response) {
        $("#modal-body").html(response);
        $("#editmodal").modal("show");

        // Delay the rendering of the charts until the modal is fully displayed;
      },
    });
  });
});

$(document).ready(function () {
  $("body").on("click", ".addbtn", function (event) {
    var id = $(this).data("id");
    $.ajax({
      url: "add-inventory.php",
      type: "post",
      data: {
        id: id,
      },
      success: function (response) {
        $("#add-inventory-modal-body").html(response);
        $("#inventory").modal("show");
      },
    });
  });
});

//reject modal product
$(document).ready(function () {
  $("body").on("click", ".rejectbtn", function (event) {
    var id = $(this).data("id");
    $.ajax({
      url: "reject-product.php",
      type: "post",
      data: { id: id },
      success: function (response) {
        $("#reject-modal-body").html(response);
        $("#rejectmodal").modal("show");
      },
    });
  });
});
