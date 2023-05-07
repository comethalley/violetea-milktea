//Get suggestion from suggestion.php

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

// product concept table
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
  });
});

//Edit product concept
$(document).ready(function () {
  $("body").on("click", ".editbtn", function (event) {
    var userid = $(this).data("id");
    $.ajax({
      url: "ajax.php",
      type: "post",
      data: { userid: userid },
      success: function (response) {
        $(".modal-body").html(response);
        $("#editmodal").modal("show");
      },
    });
  });
});

//Archive product concept call archive-product-concept.php
$(document).ready(function () {
  $("body").on("click", ".archivebtn", function (event) {
    var archiveid = $(this).data("id");
    $.ajax({
      url: "archive-product-concept.php",
      type: "post",
      data: { archiveid: archiveid },
      success: function (response) {
        $(".modal-body").html(response);
        $("#archivemodal").modal("show");
      },
    });
  });
});
