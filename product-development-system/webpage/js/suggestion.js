$(document).ready(function() {
    $('#myResearch').submit(function(event) {
      event.preventDefault(); // Prevent the form from submitting normally
      var form = $(this);
      var url = form.attr('action');
      $.ajax({
        type: "POST",
        url: "../webpage/includes/archive-function.php",
        data: form.serialize(), // Serialize the form data
        success: function(data) {
          Swal.fire({
            icon: 'success',
            title: 'Successfully Archived',
            didClose: function() {
              // Refresh the page
              location.reload();
            }
          });
          console.log(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          // Handle any errors that occur during the AJAX request
          console.log("Error: ");
        }
      });
    });
  
    $('#mySuggestion').submit(function(event) {
      event.preventDefault(); // Prevent the form from submitting normally
      var form = $(this);
      var url = form.attr('action');
      $.ajax({
        type: "POST",
        url: "../webpage/includes/archive-user-function.php",
        data: form.serialize(), // Serialize the form data
        success: function(data) {
          Swal.fire({
            icon: 'success',
            title: 'Successfully Archived',
            didClose: function() {
              // Refresh the page
              location.reload();
            }
          });
          console.log(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          // Handle any errors that occur during the AJAX request
          console.log("Error: ");
        }
      });
    });
  });

  //get the data in suggestion.php

  $(document).ready(function() {

    $('.viewbtn').on('click', function() {
        $('#viewmodal').modal('show');
        $.ajax({ //create an ajax request to suggestion.php
            type: "GET",
            url: "suggestion.php",
            dataType: "html", //expect html to be returned                
            success: function(response) {
                $("#responsecontainer").html(response);
                //alert(response);
            }
        });
    });

});

//suggestion customazation pagination and search
$(document).ready(function() {

    $('#datatableid').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search Your Data",
        }
    });

});
//research customazation pagination and search
$(document).ready(function() {

    var table = $('#researchtableid').DataTable({
        "pagingType": "full_numbers",

        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search Your Data",
        }
    });


});
//Edit research data 
$(document).ready(function() {

    $('body').on("click", ".editbtn", function(event) {

        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#edit_id').val(data[0]);
        $('#title').val(data[1]);
        $('#introduction').val(data[2]);
        $('#option').val(data[3]);
        $('#option').text((data[3]));
        $('#conclusion').val(data[4]);                
    });
});


//Validation for add research
$(document).ready(function() {
    $('#addForm').on('submit', function(e) {
        e.preventDefault();
        var formData = $('#addForm').serialize();
        var requiredFields = ['title', 'introduction', 'trends', 'conclusion']; // List of required field names
        var emptyFields = [];
        requiredFields.forEach(function(field) {
            if ($('[name="' + field + '"]').val() === '') {
                emptyFields.push(field);
            }
        });
        if (emptyFields.length > 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'The following fields are required: ' + emptyFields.join(', ')
            });
            return;
        }
        $.ajax({
            type: 'POST',
            url: './includes/add.php',
            data: formData,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Research Add Successfully',
                    didClose: function() {
                        // Refresh the page
                        location.reload();
                    }
                });
                $('#modal').modal('hide');
                // Add code here to update the table with the new data
            }
        });
    });


});

//Update research data 
$(document).ready(function() {
    $('#updateForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: './update.php',
            data: $('#updateForm').serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Research Updated Successfully',
                    didClose: function() {
                        // Refresh the page
                        location.reload();
                    }
                });

                $('#editmodal').modal('hide');

                // Add code here to update the table with the new data

            }
        });

    });
});

//Archive research data

$(document).ready(function() {

    $('body').on("click", ".archivebtn", function(event) {

        $('#archivemodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#archive_id').val(data[0]);
        $('#archive_title').val(data[1]);
        $('#archive_introduction').val(data[2]);
        $('#archive_trend').val(data[3]);
        $('#options').text((data[3]));
        $('#archive_conclusion').val(data[4]);
    });
});

//Archive suggestion data

$(document).ready(function() {

    $('body').on("click", ".userbtn", function(event) {

        $('#archiveusermodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#user_id').val(data[0]);
        $('#username').val(data[1]);
        $('#subject').val(data[2]);
        $('#body').val(data[3]);
    });
});



$(document).ready(function(){
    $('body').on("click", ".nextbtn", function(event){
            var userid = $(this).data('id');
            $.ajax(
                {
                    url: 'S2_create.php',
                    type: 'post',
                    data: {userid: userid},
                    success: function(response){
                        $('#modal-body').html(response);
                        $('#nextmodal').modal('show');
                    }
                }
            )
        });
    });