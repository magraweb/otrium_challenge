<?php

require_once 'config/config.php';

$e=""; 
$error=""; 
if($_GET['e']){
    $error = $_GET['e'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Report App</title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./assets/css/custom.css" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet"
        type="text/css" />

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" aria-label="navigation">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?=SITE_URL?>" rel="noopener">Report App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05"
                aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample05">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="#">Dashboard</a>
                    </li>

                </ul>
                <form>
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>
    </nav>

</body>

<main class="container">
    <div class="starter-template text-center py-5 px-3">
        <h1>Report App</h1>
        <p>Download Report in CSV</p>
    </div>

    <?php
     if($error){
         ?>
            <span class="alert card-header col-form-label-sm d-block fst-italic m-4 p-2 text-center text-danger"><?=$error ?></span>
    <?php
     }
    ?>
    

    <form action="controller/report.controller.php" method="post">
        <figure class="text-center">
            <blockquote class=" ">

                <label class="text-uppercase  fw-bolder">Start Date (M-d-Y)</label>&nbsp; | &nbsp;
                <label class="text-uppercase  fw-bolder">End Date (M-d-Y)</label>
                <br />  <br />
                <input type="text" name="startDate" value="05/01/2018" class="datepicker" />
                <input type="text" name="endDate" value="05/07/2018" class="datepicker" />

                <br /><br /> <br />
                <label class="text-uppercase  fw-bolder">Report Type</label>
                <br /> <br />
                <label>Brand Report</label>
                <input type="radio" name="reportType" value="brandwise" checked /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label>Day Report</label>
                <input type="radio" name="reportType" value="daywise" />
                <br /> <br />

                <button type="submit" class="btn btn-primary">Generate Report</button>

            </blockquote>
        </figure>
    </form>
</main>

<footer>
    <div class="container text-center">
        <a href="https://www.linkedin.com/in/manojabewardana/" target="_blank" title="Jasa Pembuatan Website"
            rel="noopener" class="text-uppercase  fw-bolder">Manoj Abewardana</a>
    </div>
</footer>

</html>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<script>
$(function() {
    $(".datepicker").datepicker({
    showButtonPanel: true,
    changeMonth: true,
    changeYear: true,
    showOtherMonths: true,
    selectOtherMonths: true ,
    dateFormat: 'yy/dd/mm'
});
});
</script>