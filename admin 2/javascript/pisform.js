
      $(function () {
           $("#employees").DataTable();
          
          
          
 var table = document.getElementsByTagName("table")[0];
var tbody = table.getElementsByTagName("tbody")[0];

tbody.onclick = function (e) {
    e = e || window.event;
    var empno = [];
     var lname = [];
     var fname = [];
     var mname = [];
     var raddress = [];
     var rzipcode = [];
     var rtelno = [];
     var paddress = [];
     var pzipcode = [];
     var ptelno = [];
     var civil = [];
     var bday = [];
     var sx = [];
     var hght = [];
     var btype = [];
     var wght = [];
     var cnumber = [];
     var pgibigno = [];
     var pgibigissued = [];
     var philhealth = [];
     var pissued = [];
     var tin = [];
     var gsisno = [];
      var ctc = [];
      var gsisumid = [];
      
    
    var target = e.srcElement || e.target;
    while (target && target.nodeName !== "TR") {
        target = target.parentNode;
    }
    if (target) { 
        var cells = target.getElementsByTagName("td");
       
       
        empno.push(cells[0].innerHTML);
        lname.push(cells[1].innerHTML);
        fname.push(cells[2].innerHTML);
        mname.push(cells[3].innerHTML);
        raddress.push(cells[4].innerHTML);
        rzipcode.push(cells[5].innerHTML);
        rtelno.push(cells[6].innerHTML);
        paddress.push(cells[7].innerHTML);
        pzipcode.push(cells[8].innerHTML);
        ptelno.push(cells[9].innerHTML);
        civil.push(cells[10].innerHTML);
        bday.push(cells[11].innerHTML);
        sx.push(cells[12].innerHTML);
        hght.push(cells[13].innerHTML);
        btype.push(cells[14].innerHTML);
        wght.push(cells[15].innerHTML);
        cnumber.push(cells[16].innerHTML);
        pgibigno.push(cells[17].innerHTML);
        pgibigissued.push(cells[18].innerHTML);
        philhealth.push(cells[19].innerHTML);
         pissued.push(cells[20].innerHTML);
         tin.push(cells[21].innerHTML);
         gsisno.push(cells[22].innerHTML);
         ctc.push(cells[23].innerHTML);
         gsisumid.push(cells[24].innerHTML);
       
        
        
        
   
        document.getElementById("empnum").value = empno;
        document.getElementById("lname").value = lname;
        document.getElementById("fname").value = fname;
        document.getElementById("mname").value = mname;
        document.getElementById("raddress").value = raddress;
        document.getElementById("rzipcode").value = pzipcode;
        document.getElementById("rtelno").value = rtelno;
        document.getElementById("paddress").value = paddress;
        document.getElementById("pzipcode").value = pzipcode;
        document.getElementById("ptel").value = ptelno;
        document.getElementById("civil").value = civil;
        document.getElementById("bday").value = bday;
        document.getElementById("sx").value = sx;
        document.getElementById("hght").value = hght;
        document.getElementById("btype").value = btype;
        document.getElementById("wght").value = wght;
        document.getElementById("cnumber").value = cnumber;
        document.getElementById("pgibig").value = pgibigno;
        document.getElementById("pgibig").value = pgibigno;
        document.getElementById("cnumber").value = cnumber;
        document.getElementById("pgibigissued").value = pgibigissued;
        document.getElementById("pnumber").value = philhealth;
        document.getElementById("pissued").value = pissued;
        document.getElementById("tin").value = tin;
        document.getElementById("gsisno").value = gsisno;
        document.getElementById("ctc").value = ctc;
        document.getElementById("gsisumid").value = gsisumid;
         
        var empnum = empno.toString();
            $("#image").load("import_image.php",{
           employeeno: empnum
        
     

  
    }, function(response, status, xhr) {
  if (status == "error") {
      alert(msg + xhr.status + " " + xhr.statusText);
      console.log(msg + xhr.status + " " + xhr.statusText);
  }
});
        

    }
   
  }
    
    

  });