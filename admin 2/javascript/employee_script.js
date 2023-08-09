$(function () {
  $("#empnum").prop("readonly", true);
});

$(document).ready(function () {
  var dataTable = $("#table_employee").DataTable({
    page: true,
    stateSave: true,
    processing: true,
    serverSide: true,
    deferRender: true,
    ajax: {
      url: "ajaxcall/search_employee.php", // json datasource
      type: "post", // method  , by default get
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
    },
    columnDefs: [
      {
        width: "100px",
        targets: -1,
        data: null,
        defaultContent:
          '<button class="btn btn-danger btn-sm btn-circle add_worksched">  <i class="fa fa-calendar"></i></button><button class="btn btn-warning btn-sm btn-circle edit_employee">  <i class="fa fa-edit"></i></button>',
      },
    ],
  });

  sel_worksched();

  function is_valid(element) {
    // callback function
    // returns every value
    return element.value;
  }
  //DISPLAY NOTIFICATION MESSAGE
  function post_notify(message, type) {
    if (type == "success") {
      $.notify(
        {
          message: message,
        },
        {
          type: "success",
          delay: 2000,
        }
      );
    } else {
      $.notify(
        {
          message: message,
        },
        {
          type: "danger",
          delay: 2000,
        }
      );
    }
  }

  function reset_form_input(form_id) {
    $("#" + form_id).each(function () {
      this.reset();
    });
  }

  //CHECK IF THE EMPLOYEE NUMBER IS AVAILABLE
  $("#empnum").change(function () {
    var emp = $("#empnum").val();

    $.ajax({
      type: "POST",
      url: "ajaxcall/check_empnumber.php",
      data: {
        empnum: emp,
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
    }).done(function (response) {
      var result = JSON.parse(response);
      if (result.data1 != "") {
        $("#checkempid").html("This employee number is already taken.");
        $("#insert").prop("disabled", true);
        console.log(result.data1);
      } else {
        if (emp != "") {
          $("#checkempid").html("This employee number is available.");
          $("#insert").prop("disabled", false);
        }
      }
    });
    if (emp == "") {
      $("#checkempid").html("");
      $("#save").prop("disabled", false);
    }
  });
  //check the biometric id if it is available.
  $("#bioid").change(function () {
    var bio = $("#bioid").val();

    $.ajax({
      type: "POST",
      url: "ajaxcall/check_empnumber.php",
      data: {
        bioid: bio,
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
    }).done(function (response) {
      var result = JSON.parse(response);
      if (result.data2 != "") {
        $("#checkbioid").html("This Biometric ID is already taken.");
        $("#insert").prop("disabled", true);
      } else {
        if (bio != "") {
          $("#checkbioid").html("This Biometric ID is available.");
          $("#insert").prop("disabled", false);
        }
      }
    });
    if (bio == "") {
      $("#checkbioid").html("");
      $("#save").prop("disabled", false);
    }
  });
  //ADD NEW EMPLOYEE
  $("#addemp").click(function () {
    reset_form_input("employee-form");
    $("#checkbioid").html("");
    $("#checkempid").html("");
    $(".modal-title").html("Add Employee");
    $("#empnum").prop("disabled", false);
    $("#insert").prop("hidden", false);
    $("#delete").prop("hidden", true);
    $("#update").prop("hidden", true);
    $("#empnum").prop("readonly", false);
    var cs = "CS";
    // $(`#emp_sched option[value='${cs}']`).prop("selected", "true");
    // $('#emp_sched').val(cs);
    $("#department").select2({
      dropdownParent: $("#addemployee"),
    
    });
    
    $("#emp_sched").select2({
      dropdownParent: $("#addemployee"),
    
    });
  });
 
  //GENERATE EMPLOYEE NO
  $("#lname").on("change", function () {
    if ($("#empnum").val() == "") {
      $.ajax({
        type: "POST",
        data: {},
        url: "ajaxcall/generate_empno.php",
        success: function (data) {
          //$('#entity_no').val(data);
          document.getElementById("empnum").value = data;
          console.log(data);
        },
      });
    }
    $("#empnum").prop("readonly", true);
  });

  //ADD A WORK SCHEDULE TO THE EMPLOYEE
  $("#table_employee tbody").on("click", ".add_worksched", function () {
    event.preventDefault();

    var currow = $(this).closest("tr");
    var col1 = currow.find("td:eq(0)").text();
    var col2 = currow.find("td:eq(5)").text();
    console.log(col2);

    $("#addemployeesched").modal("show");
    $(`#sel_worksched option[value='${col2}']`).prop("selected", "true");
    $("#empno").val(col1);

    $("#sel_worksched").select2({
      dropdownParent: $("#addemployeesched"),
    });

    $("#emp_sched").select2({
      dropdownParent: $("#addemployee"),
    });

    sel_worksched();
  });

  //SELECT THE WORK SCHEDULE AND DISPLAY TO THE TABLE
  function sel_worksched() {
    var worksched = $("#sel_worksched").val();
    $("#work_body").load(
      "ajaxcall/get_workschedule.php",
      {
        workcode: worksched,
      },
      function (response, status, xhr) {
        if (status == "error") {
          alert(msg + xhr.status + " " + xhr.statusText);
          console.log(msg + xhr.status + " " + xhr.statusText);
        }
      }
    );
  }

  //DISPLAY THE WORK SCHEDULE TO THE TABLE WHENEVER THE DROP DOWN CHANGES VALUE
  $("#sel_worksched").change(function () {
    sel_worksched();
  });

  $("#table_employee tbody").on("click", ".edit_employee", function () {
    //SHOWS THE ADD EMPLOYEE MODAL AND DISPLAY THE EMPLOYEE'S INFORMATION
    event.preventDefault();
    $(".modal-title").html("Edit Employee");
    $("#addemployee").modal("show");
    $("#insert").prop("hidden", true);
    $("#update").prop("hidden", false);
    $("#delete").prop("hidden", false);
    $("#empnum").prop("readonly", true);
    var currow = $(this).closest("tr");
    var col1 = currow.find("td:eq(0)").text();
    $.ajax({
      url: "ajaxcall/get_employee.php",
      type: "POST",
      data: {
        id: col1,
      },
      success: function (response) {
        var result = jQuery.parseJSON(response);
        $("#empnum").val(result.employeeno);
        $("#lname").val(result.lastname);
        $("#fname").val(result.firstname);
        $("#mname").val(result.middlename);
        $("#bioid").val(result.bioid);
        $("#department").val(result.department);
        $(`#department option[value='${result.department}']`).prop(
          "selected",
          true
        );
        $("#estatus").val(result.employmentstatus);
        $("#supervisor").val(result.supervisor);
        $("#status").val(result.status);
        $("#worksched").val(result.worksched);
        $("#emp_sched").val(result.workId);
        $(`#emp_sched option[value='${result.workDesc}']`).prop(
          "selected",
          true
        );

        $("#emp_sched").select2({
          dropdownParent: $("#addemployee"),
        });
        $("#department").select2({
          dropdownParent: $("#addemployee"),
        });
        console.log(result.department);
        console.log(result.workId);
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
  });
});
