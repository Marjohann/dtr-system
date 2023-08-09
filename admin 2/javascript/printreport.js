$(document).ready(function () {
  var getDaysInMonth = function (month, year) {
    // Here January is 1 based
    //Day 0 is the last day in the previous month
    return new Date(year, month, 0).getDate();
    // Here January is 0 based
    // return new Date(year, month+1, 0).getDate();
  };
  $(document).bind('keydown',function(e){
    if(e.keyCode == 120) {
   
      printIndividual();
  //     var tabledtr = document.getElementById("dtr");
  //     var currow = $(tabledtr).closest("tr");
  //     var col1 = currow.find("td:eq(0)").text();
  // console.log(col1);
   
  
    }
  })
  $("#print").click(function () {
    printIndividual();
    
  });


function printIndividual(){
  console.log("test");
  var hiddenempno = $("#hiddenempno").val();
  // var datefrom = $('#dtefrom').datepicker({dateFormat: 'yy-mm-dd'}).val();
  // var dateto = $('#dteto').val();
  var month = $("#months").val();
  var year = $("#year").val();
  var period = $("#period").val();
  var finalmonth = "";
  var daysinmonth = "";
  if (month == "January") {
    finalmonth = "01";
  }
  if (month == "February") {
    finalmonth = "02";
  }
  if (month == "March") {
    finalmonth = "03";
  }
  if (month == "April") {
    finalmonth = "04";
  }
  if (month == "May") {
    finalmonth = "05";
  }
  if (month == "June") {
    finalmonth = "06";
  }
  if (month == "July") {
    finalmonth = "07";
  }
  if (month == "August") {
    finalmonth = "08";
  }
  if (month == "September") {
    finalmonth = "09";
  }
  if (month == "October") {
    finalmonth = "10";
  }
  if (month == "November") {
    finalmonth = "11";
  }
  if (month == "December") {
    finalmonth = "12";
  }

  //  console.log(getDaysInMonth(finalmonth,year));
  var param =
    "empno=" +
    hiddenempno +
    "&year=" +
    year +
    "-" +
    finalmonth +
    "-%" +
    "&days=" +
    getDaysInMonth(finalmonth, year);
  var secondhalf =
    "empno=" + hiddenempno + "&year=" + year + "-" + finalmonth + "";
  if (period == "All Period") {
    $("#printlink").attr(
      "href",
      "../plugins/jasperreport/dtrreport.php?" + param,
      "_parent"
    );
    //  $('#printlink').attr("href","../plugins/jasperreport/report3X3.php?"+param,'_parent');
  } else if (period == "16-31") {
    $("#printlink").attr(
      "href",
      "../plugins/jasperreport/dtrreport2nd.php?" + secondhalf,
      "_parent"
    );
  } else if (period == "1-15") {
    $("#printlink").attr(
      "href",
      "../plugins/jasperreport/dtrreport1st.php?" + secondhalf,
      "_parent"
    );
  }


}
  //PRINT ALL DTR INSIDE THE SPECIFIC DEPARTMENT
  $("#printAll").click(function () {
    printAll();
    
  });
  function printAll() {
    console.log("print all");
    const deptid = $("#hiddendeptid").val();
    const emptype = $("#emp_status").val();
    // var datefrom = $('#dtefrom').datepicker({dateFormat: 'yy-mm-dd'}).val();
    // var dateto = $('#dteto').val();
    const month = $("#months").val();
    const year = $("#year").val();
    const period = $("#period").val();
    var finalmonth = "";
    var daysinmonth = "";
    if (month == "January") {
      finalmonth = "01";
    }
    if (month == "February") {
      finalmonth = "02";
    }
    if (month == "March") {
      finalmonth = "03";
    }
    if (month == "April") {
      finalmonth = "04";
    }
    if (month == "May") {
      finalmonth = "05";
    }
    if (month == "June") {
      finalmonth = "06";
    }
    if (month == "July") {
      finalmonth = "07";
    }
    if (month == "August") {
      finalmonth = "08";
    }
    if (month == "September") {
      finalmonth = "09";
    }
    if (month == "October") {
      finalmonth = "10";
    }
    if (month == "November") {
      finalmonth = "11";
    }
    if (month == "December") {
      finalmonth = "12";
    }
    //  console.log(getDaysInMonth(finalmonth,year));
    var param =
      "dept=" +
      deptid +
      "&year=" +
      year +
      "-" +
      finalmonth +
      "-%" +
      "&empstatus=" +
      emptype +
      "&days=" +
      getDaysInMonth(finalmonth, year);
    var secondhalf =
      "dept=" +
      deptid +
      "&empstatus=" +
      emptype +
      "&year=" +
      year +
      "-" +
      finalmonth +
      "";
    if (period == "All Period") {
      $("#printlink_all").attr(
        "href",
        "../plugins/jasperreport/department/dtrreport.php?" + param,
        "_parent"
      );
      //  $('#printlink').attr("href","../plugins/jasperreport/report3X3.php?"+param,'_parent');
    } else if (period == "16-31") {
      $("#printlink_all").attr(
        "href",
        "../plugins/jasperreport/department/dtrreport2nd.php?" +
          secondhalf +
          "&days=" +
          getDaysInMonth(finalmonth, year),
        "_parent"
      );
    } else if (period == "1-15") {
      $("#printlink_all").attr(
        "href",
        "../plugins/jasperreport/department/dtrreport1st.php?" + secondhalf,
        "_parent"
      );
    }
  }
});
