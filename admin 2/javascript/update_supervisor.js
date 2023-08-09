
function updateSupervisor(){
    const department = $("#update_supervisor_department").val();
    const supervisor_name = $("#supervisor_name").val();
    const sup_emp_status = $("#update_emp_status").val();
    console.log(department,supervisor_name);
    $.ajax({
      type:"POST",
      url: "ajaxcall/update_supervisor.php",
      data: {
        dept: department,
        supervisor: supervisor_name,
        empstatus: sup_emp_status,

      },
      success: function (message) {
          notification(message, "","Refresh","success","success");
      },
      error: function (xhr, b, c) {
        console.log(
          "xhr=" +
            xhr.responseText +
            " b=" +
            b.responseText +
            " c=" +
            c.responseText
        );
    
      },
    });
}