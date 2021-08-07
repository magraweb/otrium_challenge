<?php include 'Views/header.php'; ?>

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



<main class="container">
    <div class="starter-template text-center py-5 px-3">
        <h1>Report App</h1>
        <p>Download Report in CSV</p>
    </div>

 
        <figure class="text-center">
            <blockquote class=" "> 

                <a href="<?= SITE_URL?>Apps/AppsContoller.php?action=turn-over-per-brand" type="submit" class="btn btn-primary">Brand Report</a>
                <a href="<?= SITE_URL?>Apps/AppsContoller.php?action=turn-over-per-day" type="submit" class="btn btn-primary">Day Report</a>
                <a href="<?= SITE_URL?>Apps/AppsContoller.php?action=turn-over-per-day-per-brand" type="submit" class="btn btn-primary">Top Selling</a>

            </blockquote>
        </figure> 


      <!-- <form action="controller/report.controller.php" method="post">
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
    </form> -->
</main>


</body>


<?php include 'Views/footer.php'; ?>