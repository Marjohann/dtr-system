$("#search").keyup(function(){
    var keyword = $('#search').val();
    
    $('#tbody').load("ajaxcall/load_employee.php",{keyword:keyword},
    function(response, status, xhr) {
      if (status == "error") {
          alert(msg + xhr.status + " " + xhr.statusText);
          console.log(msg + xhr.status + " " + xhr.statusText);
      }
      });
    
    
    })
    