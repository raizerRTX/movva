<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://use.typekit.net/oov2wcw.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style> 
input[type=text] {
  width: 100%;
  height:100%;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;

}
label{
  vertical-align: top;
  text-align: left;
  font-color:white;
}
input[type=text]:focus {
  width: 100%;
}
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: #d93025;
}
.form{
  border-radius: 30px;
  background-color: #2F9FE9;
  padding: 70px;
  margin-left:0px;
  margin-right:0px;
  margin-bottom:50px;
  transform: translateX(-50%)
  align=center;
  position:relative;
  padding-top:20px;
  padding-left:10px;
  padding-right:10px;
  width:auto;
  
  
  
}
.button {
  background-color: #2F9FE9;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}
text{
  vertical-align: top;
  text-align: left;
  color:white;
  font-size:25px;
  
}
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #f14b18;
  color: white;
}

.topnav .icon {
  display: none;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 20px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  
}

/* Modal Content */
.modal-content {
  background-color: #2F9FE9;
  margin: auto;
  height: 600px;
  border: 1px solid #888;
  width: 100%; 
  height:auto;
  left:0;
  top:0;
  overflow: auto;
 

  
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

table {
  height: 100%;
  width: 100%;
  font-family: Century-Gothic;
  background-color: #2F9FE9;
  border-radius: 8px;
  border: 1px solid #dfe3e6;
  box-shadow: 4px 3px 4px grey;
  padding:10px;
  word-break: break-word;
}

tr,td {
  border: 1px solid blue;
}

h4 {
  margin-left: 1rem;
  font-size:1.3vw;
}

.data {
  margin-left: 0.5rem;
}

.ticket-header {
  background-color: #fafafa;
  border-radius: 8px;
  border: 1px dashed #dfe3e6;
}

.data-content {
  background-color: #fafafa;
  border-radius: 8px;
  border: 1px solid #dfe3e6;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}

div.ticket-header {
  height: 90%;
  width: 95%;
  border: 1px solid #2F9FE9;
  text-align: center;
  font-family: sans-serif;
  font-size: 20pt;
  letter-spacing: 0.5em;
}

div.name-box {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 70px;
  width: 35%;
  border-radius: 8px;
  border: 1px solid #2F9FE9;
}

div.separator-box {
  visibility: hidden;
  height: 70px;
  width: 5%;
  border: 1px solid #2F9FE9;
}

div.fine {
  height: 50%;
  width: 20%;
  border: 1px solid red;
}

div.violation-box {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100px;
  width: 49%;
  border-radius: 8px;
  border: 1px solid #2F9FE9;
}

div.city-address {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 60px;
  width: 30%;
  margin-right: 15px;
  border-radius: 8px;
  border: 1px solid #2F9FE9;
}

div.vehicle-type {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 60px;
  width: 30%;
  margin-right: 15px;
  border-radius: 8px;
  border: 1px solid #2F9FE9;
}

div.vehicle-class {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 60px;
  width: 30%;
  border-radius: 8px;
  border: 1px solid #2F9FE9;
}

div.separator-panel {
  visibility: hidden;
  height: 70px;
  width: 6%;
  border: 1px solid #2F9FE9;
}

div.prone-place {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 60px;
  width: 30%;
  border-radius: 8px;
  border: 1px solid #2F9FE9;
}

div.date-sp {
  height: 60px;
  width: 70%;
  border-radius: 8px;
  border: 1px solid #2F9FE9;
}
.p{
  font-size:1.3vw;
}

</style>
</head>
<body>

  
  <div style="padding-left:16px">
    <h2>MOVVA</h2>
    <p></p>
  </div>
  
  <br><br><br><br><br>
<p style="color:White;font-size:2.5vw;" align=center >CHECK YOUR
  TRAFFIC VIOLATION</p>
 
<div class=form >
<text>Ticket Number:</text>
<form align=center>


<br>
  <input type="text" id = "ticket" name="search" placeholder="Search..">
</form>
</div>


<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <br>
    <br>

    <table>

      <tr>
        <td style = "display: flex; flex-direction:column; align-items:center" class = "ticket-header">
          <div class="ticket-header">
            <h3>Ticket No: <b id = "ticket-no"></b></h3>
          </div>
        </td>
      </tr>

      <tr>
        <td class = "data-content" style="display: flex; flex-direction: row; align-items:center;">
            <div class="name-box">
              <h4 style="margin-right: 1rem">Last Name: <i id="lastName">Rusca</i></h4>
            </div>

            <div class="name-box" style="margin-left: 1rem;">
              <h4 style="margin-right: 1rem">First Name: <i id="firstName">Armando</i></h4>
            </div>

            <div class="name-box" style="margin-left: 1rem;">
              <h4 style="margin-right: 1rem">Middle Name: <i id="middleName">Osas</i></h4>
            </div>

            <div class="separator-box">
              
            </div>

            <div class="name-box" style="margin-left: 1rem;">
              <h4 style="margin-right: 1rem">Sex: <i id="gender">Male</i></h4>
            </div>
        </td>
      </tr>

      <tr>
        <td class = "data-content" style="display: flex; flex-direction: row; align-items:center;">
          <div class="violation-box" style="margin-right: 15px;">
            <h4>Violation(s): </h4>
            <p id = "violation" style = "text-align: center; font-size:1.2vw;" ></p>
          </div>
    
          <div class="violation-box">
            <h2>Total Fine: &#8369; <b id="fine"> 4,000</b></h2>
          </div>
        </td>
      </tr>

      <tr>
        <td class = "data-content" style="display: flex; flex-direction: row; align-items:center;">
          <div class="city-address">
            <h4>City Address: <b id="addr">Manila City</b></h4>
          </div>

          <div class="vehicle-type">
            <h4>Vehicle Type: <b id="vehicle">Motorcyle</b></h4>
          </div>

          <div class="separator-panel">

          </div>

          <div class="vehicle-class">
            <h4>Vehicle Class: <b id="vehicleClass">Private</b></h4>
          </div>
        </td>
      </tr>

      <tr>
        <td class = "data-content" style="display: flex; flex-direction: row; align-items:center;">
          <div class="date-sp">
            <h4>Date: <b id = "date" class = "data"></b></h4>
          </div>

          <div class="prone-place">
            <h4>Prone Place: <b id="prplace">Dalandanan</b></h4>
          </div>
        </td>
      </tr>

      <tr>
        <td class = "data-content">
          <h4>TMO address: </h4>
          <p style="margin-left: 2rem">
              Valenzuela City Action Center, MacArthur Highway (beside Puregold Price Club), Barangay Dalandanan, Valenzuela City,
              Metro Manila, Philippines 1443
            </p>
        </td>
      </tr>

      
    </table>
      
  </div>

</div>

<center>
<button onclick = "getTicket()" class=button>Check all data traffic violations</button>
</center>


</body>

<script>
  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }

  function getTicket() {

    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];
    var ticket = document.getElementById("ticket").value;

    $.ajax({
      type: "POST",
      dataType: "json",
      url: "searchTicket.php", 
      data: { ticket: ticket }, // passing the values
      success: function(res) {

        console.log(res);

        if (res.license == "") {
          alert("No Ticket Found!");
        } else {

          console.log(res);

          document.getElementById('ticket-no').innerHTML = ticket;
          //document.getElementById('license-no').innerHTML = res.license;
          document.getElementById('violation').innerHTML = res.violation;
          //document.getElementById('place').innerHTML = res.address;
          document.getElementById('date').innerHTML = res.date;
          //document.getElementById('remarks').innerHTML = res.remarks;
          $("#firstName").html(res.fname);
          $("#lastName").html(res.lname);
          $("#middleName").html(res.mname);
          $("#gender").html(res.gender);
          $("#fine").html(res.fine);
          $("#addr").html(res.address);
          $("#vehicle").html(res.vehicle);
          $("#vehicleClass").html(res.class);
          $("#prplace").html(res.prone);

          modal.style.display = "block";


          span.onclick = function() {
            modal.style.display = "none";
          }

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
            if (event.target == modal) {
              modal.style.display = "none";
            }
          }


        }

      }
    });

  }
</script>

</html>
