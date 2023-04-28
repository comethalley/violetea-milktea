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
    "order": [[ 0, "desc" ]]
  });
});


$(document).ready(function () {
  $(".editbtn").on("click", function () {
    $("#editmodal").modal("show");

    $tr = $(this).closest("tr");

    var data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(data);

    $("#edit_id").val(data[0]);
    $("#name").val(data[1]);
    $("#product_formulation").val(data[2]);
    $("#ingredient_sourcing").val(data[3]);
    $("#pricing_strategy").val(data[4]);
    $("#researchID").val(data[5]);
  });
});

$(document).ready(function () {
  $("#updateForm").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "S2_update.php",
      data: $("#updateForm").serialize(),
      success: function (response) {
        Swal.fire({
          icon: "success",
          title: "Research Updated Successfully",
          didClose: function () {
            // Refresh the page
            location.reload();
          },
        });

        $("#editmodal").modal("hide");

        // Add code here to update the table with the new data
      },
    });
  });
});

$(document).ready(function () {
  $(".archivebtn").on("click", function () {
    $("#archivemodal").modal("show");

    $tr = $(this).closest("tr");

    var data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(data);

    $("#archive_id").val(data[0]);
    $("#archive_name").val(data[1]);
    $("#archive_product_formulation").val(data[2]);
    $("#archive_ingredient_sourcing").val(data[3]);
    $("#archive_pricing_strategy").val(data[4]);
    $("#archive_researchID").val(data[5]);
  });
});
$(document).ready(function () {
  $("#myIngredient").submit(function (event) {
    event.preventDefault(); // Prevent the form from submitting normally
    var form = $(this);
    var url = form.attr("action");
    $.ajax({
      type: "POST",
      url: "./S2_delete.php",
      data: form.serialize(), // Serialize the form data
      success: function (data) {
        Swal.fire({
          icon: "success",
          title: "Successfully Archived",
          didClose: function () {
            // Refresh the page
            location.reload();
          },
        });
        console.log(data);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        // Handle any errors that occur during the AJAX request
        console.log("Error: ");
      },
    });
  });
});

$(document).ready(function () {
  $("body").on("click", ".nextbtn", function (event) {
    var userid = $(this).data("id");
    $.ajax({
      url: "product-concept-upload.php",
      type: "post",
      data: {
        userid: userid,
      },
      success: function (response) {
        $("#modal-body").html(response);
        $("#nextmodal").modal("show");
      },
    });
  });
});
