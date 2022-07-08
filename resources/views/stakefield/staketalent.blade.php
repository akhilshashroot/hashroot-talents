
<style>


/* 
table.dataTable td:nth-child(2){
  width: 34px;
  max-width: 34px;
  word-break: break-all;
  white-space: pre-line;
} */
  select.form-control{
    display: inline;
    width: 200px;
    margin-left: 25px;
  }
  .dataTables_length{
    display:none;
  }
  .w3-container{
    padding: 4rem;
    position: relative;
    }
  .btn-enquiry{
    margin: auto;
    width: 20%;
    /* border: 3px solid green; */
    padding: 10px;
  }

  .btn-enquiry-top{
    margin: auto;
    width:13%;
    /* border: 3px solid green; */
    padding: 10px;
  }
    .dataTables_wrapper .dataTables_paginate .paginate_button {
    box-sizing: border-box;
    display: inline-block;
    min-width: 1.5em;
    padding: 0.5em 1em;
    margin-left: 2px;
    text-align: center;
    text-decoration: none !important;
    cursor: pointer;
    color: #333 !important;
    border: 1px solid transparent;
    border-radius: 2px;
}
.dataTables_wrapper .dataTables_length select {
    border: 1px solid #aaa;
    border-radius: 3px;
    padding: 5px;
    background-color: transparent;
    padding: 4px;
}
.table {
  @media only screen and (min-width: 768px) {
    table-layout: fixed;
    max-width: 100% !important;
  }
}

thead {
  background: #ddd;
}

.table td:nth-child(2) {
  overflow: hidden;
  text-overflow: ellipsis;
}

.highlight {
  background: lighten(yellow,30%);
}

@media only screen and (max-width: 767px) {
  .grecaptcha-badge{
        display:none !important;
        }
        .dataTables_empty::before {
   content: none !important;
}
  /* Force table to not be like tables anymore */
  table,
  thead,
  tbody,
  th,
  td,
  tr {
    display: block;
  }
  /* Hide table headers (but not display: none;, for accessibility) */
  thead tr,
  tfoot tr {
    position: absolute;
    top: -9999px;
    left: -9999px;
  }
  td {
    /* Behave  like a "row" */
    border: none;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-left: 50% !important;
  }
  td:before {
    /* Now like a table header */
    position: absolute;
    /* Top/left values mimic padding */
    top: 6px;
    left: 6px;
    width: 45%;
    padding-right: 10px;
    white-space: nowrap;
  }
  
  .table td:nth-child(1) {
      height: 100%;
      top: 0;
      left: 0;
      font-weight: bold;
      background: #55565b;
      color:#fff;
  }
  /*
	Label the data
	*/
  td:nth-of-type(1):before {
    content: "#";
  }
  td:nth-of-type(2):before {
    content: "Talent ID";
  }
  td:nth-of-type(3):before {
    content: "Skillset";
  }
  td:nth-of-type(4):before {
    content: "Experience";
  }
  td:nth-of-type(5):before {
    content: "TAT";
  }
  td:nth-of-type(6):before {
    content: "Availability";
  }
  td:nth-of-type(7):before {
    content: "Rate (USD)";
  }
  td:nth-of-type(8):before {
    content: "Action";
  }
  
  .dataTables_length {
    display: none;
  }
}
.tooltip.show {
  opacity: 1;
}

.tooltip-inner {
  background-color: #55565b;
  box-shadow: 0px 0px 4px black;
  opacity: 1 !important;
}

.tooltip.bs-tooltip-right .arrow:before {
  border-right-color: #55565b !important;
}

.tooltip.bs-tooltip-left .arrow:before {
 border-left-color: #55565b !important;
}

.tooltip.bs-tooltip-bottom .arrow:before {
 border-bottom-color: #55565b !important;
}

.tooltip.bs-tooltip-top .arrow:before {
 border-top-color: #55565b !important;
}
</style>


    <!-- Create the drop down filter -->
    <!-- <h2 class="title custom text-center" id="verified-sec" style="margin-top: 30px;" rel="₹">Talents Pool</h2> -->
    <!-- Set up the datatable -->
    <!-- <div class="btn-enquiry">
    <div class="tooltip-wrapper disabled" data-title="Search and select profiles to enable this button">
    <a  class="btn btn-primary btn-sm disabled" id="passingID" style="color: #fff;"  >Enquiry</a>
</div></div> -->

    <div class="w3-container"> 
    <!-- <div class="btn-enquiry-top">
    <span class="d-inline-block" id="toolID" tabindex="0" data-toggle="tooltip"
              data-placement="right" title="Search and select talents to enable this button">
              <a  class="btn btn-primary btn-sm disabled" id="passingID" style="color: #fff;"  >Enquiry</a>

    </span>
  </div> -->
    <table class="table table-hover" id="filterTable" style="width: 100%;" >
      <thead class="tdhcc">
        <tr>
          <th scope="col">#</th>
          <th scope="col" >Talent ID</th>
          <th scope="col" >Skills & Tools </th>
          <th scope="col" >Experience </th>
          <th scope="col"  data-toggle="tooltip" title="Time taken for the talent to onboard">TAT</th>
          <th scope="col" >Availability </th>
          <th scope="col" >Rate (USD) </th>
          <th scope="col" >Action </th>
           
        </tr>
      </thead>

      <!-- <tfoot>
        <tr>
          <th scope="col">Sl No</th>
          <th scope="col">Talent ID</th>
          <th scope="col">Skillset </th>
          <th scope="col">Experience </th>
          <th scope="col">Turnaround time</th>
          <th scope="col">Availability </th>
          <th scope="col">Rate </th>
          <th scope="col">Action </th>
           
        </tr>
      </tfoot> -->
      <tbody>
      </tbody>

    </table>
<!-- <div class="btn-enquiry">
    <span class="d-inline-block" id="toolID" tabindex="0" data-toggle="tooltip"
              data-placement="right" title="Search and select talents to enable this button">
              <a  class="btn btn-primary btn-sm disabled" id="passingID" style="color: #fff;"  >Enquiry Now</a>

    </span>
  </div> -->
</div>
 

