$(document).ready(function () {

    $('.viewbtn').on('click', function () {
        $('#viewmodal').modal('show');
        $.ajax({ //create an ajax request to suggestion.php
            type: "GET",
            url: "suggestion.php",
            dataType: "html", //expect html to be returned                
            success: function (response) {
                $("#responsecontainer").html(response);
                //alert(response);
            }
        });
    });

});


$(document).ready(function () {

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

$(document).ready(function () {

    $('#researchtableid').DataTable({
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


$(document).ready(function () {

    $('body').on("click", ".retrievebtn2", function(event) {

        $('#retrievemodal2').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        console.log(data);

        $('#retrieve_id').val(data[0]);
        $('#retrieve_title').val(data[1]);
        $('#retrieve_introduction').val(data[2]);
        $('#retrieve_market').val(data[3]);
        $('#retrieve_user').val(data[4]);
        $('#retrieve_technical').val(data[5]);
        $('#retrieve_conclusion').val(data[6]);
    });
});


$(function() {
    $('#myForm').on('submit', function(e) {
      e.preventDefault(); // prevent default form submission behavior
      
      $.ajax({
        url: '../webpage/includes/retrieve-function-research.php',
        type: 'POST',
        data: $(this).serialize(), // serialize form data
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Retrieved Successfully',
                didClose: function() {
                    // Refresh the page
                    location.reload();
                }
            });
        },
        error: function(xhr, status, error) {
          // handle error
        }
      });
    });
  });