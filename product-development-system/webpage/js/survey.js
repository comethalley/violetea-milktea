$(document).ready(function () {
  $(".viewbtn").on("click", function () {
    $("#viewmodal").modal("show");
    $.ajax({
      //create an ajax request to suggestion.php
      type: "GET",
      url: "survey.php",
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
    $("#question").val(data[1]);
  });
});

$(document).ready(function () {
  $("#updateForm").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "../webpage/includes/update-question.php",
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
    $("#archive_question").val(data[1]);
  });
});

$(document).ready(function () {
  $(".addbtn").on("click", function () {
    $("#addmodal").modal("show");
  });
});

$(document).ready(function () {
  $("#archiveForm").submit(function (event) {
    event.preventDefault(); // Prevent the form from submitting normally
    var form = $(this);
    var url = form.attr("action");
    $.ajax({
      type: "POST",
      url: "../webpage/includes/archive-question.php",
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

//Add question
$(document).ready(function () {
  $("#addQuestion").on("submit", function (e) {
    e.preventDefault();
    var formData = $("#addQuestion").serialize();
    var requiredFields = ["question"]; // List of required field names
    var emptyFields = [];
    requiredFields.forEach(function (field) {
      if ($('[question="' + field + '"]').val() === "") {
        emptyFields.push(field);
      }
    });
    if (emptyFields.length > 0) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "The following fields are required: " + emptyFields.join(", "),
      });
      return;
    }
    $.ajax({
      type: "POST",
      url: "./includes/add-question.php",
      data: formData,
      success: function (response) {
        Swal.fire({
          icon: "success",
          title: "Question Add Successfully",
          didClose: function () {
            // Refresh the page
            location.reload();
          },
        });
        $("#modal").modal("hide");
        // Add code here to update the table with the new data
      },
    });
  });
});
