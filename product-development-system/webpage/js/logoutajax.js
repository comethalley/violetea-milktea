$(function() {
    $('.logout-btn').on('click', function(e) {
      e.preventDefault(); // prevent default link behavior

      $.ajax({
        url: 'logout.php',
        type: 'POST',
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Access Revoked',
                text: 'You have been logged out successfully.',
               
                confirmButtonText: "OK",
          
                didClose: function() {
                    // Refresh the page
                    window.location.href = '../index.php';
                }
            });
            // handle successful response
          // for example, redirect to login page
         
        },
        error: function(xhr, status, error) {
          // handle error
        }
      });
    });
  });