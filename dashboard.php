<?php require 'includes/connection.php'; ?>
<?php require 'includes/functions.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <?php require 'includes/head.php'; ?>
</head>
<body>
    <style>
        body {
            font-size: .875rem;
        }

        .feather {
        width: 16px;
        height: 16px;
        vertical-align: text-bottom;
        }

        /*
        * Sidebar
        */

        .sidebar {
        position: fixed;
        top: 0;
        /* rtl:raw:
        right: 0;
        */
        bottom: 0;
        /* rtl:remove */
        left: 0;
        z-index: 100; /* Behind the navbar */
        padding: 48px 0 0; /* Height of navbar */
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        @media (max-width: 767.98px) {
        .sidebar {
            top: 5rem;
        }
        }

        .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
        }

        .sidebar .nav-link {
        font-weight: 500;
        color: #333;
        }

        .sidebar .nav-link .feather {
        margin-right: 4px;
        color: #727272;
        }

        .sidebar .nav-link.active {
        color: #2470dc;
        }

        .sidebar .nav-link:hover .feather,
        .sidebar .nav-link.active .feather {
        color: inherit;
        }

        .sidebar-heading {
        font-size: .75rem;
        text-transform: uppercase;
        }

        /*
        * Navbar
        */

        .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: 1rem;
        background-color: rgba(0, 0, 0, .25);
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
        }

        .navbar .navbar-toggler {
        top: .25rem;
        right: 1rem;
        }

        .navbar .form-control {
        padding: .75rem 1rem;
        border-width: 0;
        border-radius: 0;
        }

        .form-control-dark {
        color: #fff;
        background-color: rgba(255, 255, 255, .1);
        border-color: rgba(255, 255, 255, .1);
        }

        .form-control-dark:focus {
        border-color: transparent;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
        }

    </style>
    <?php include 'includes/header.php' ?>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
                    <span data-feather="home"></span>
                    Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file"></span>
                    Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="shopping-cart"></span>
                    Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="users"></span>
                    Customers
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Reports
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="layers"></span>
                    Integrations
                    </a>
                </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Saved reports</span>
                <a class="link-secondary" href="#" aria-label="Add a new report">
                    <span data-feather="plus-circle"></span>
                </a>
                </h6>
                <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Current month
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Last quarter
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Social engagement
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Year-end sale
                    </a>
                </li>
                </ul>
            </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                </button>
                </div>
            </div>

            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

            <h2>Section title</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Header</th>
                    <th scope="col">Header</th>
                    <th scope="col">Header</th>
                    <th scope="col">Header</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>1,001</td>
                    <td>random</td>
                    <td>data</td>
                    <td>placeholder</td>
                    <td>text</td>
                    </tr>
                    <tr>
                    <td>1,002</td>
                    <td>placeholder</td>
                    <td>irrelevant</td>
                    <td>visual</td>
                    <td>layout</td>
                    </tr>
                    <tr>
                    <td>1,003</td>
                    <td>data</td>
                    <td>rich</td>
                    <td>dashboard</td>
                    <td>tabular</td>
                    </tr>
                    <tr>
                    <td>1,003</td>
                    <td>information</td>
                    <td>placeholder</td>
                    <td>illustrative</td>
                    <td>data</td>
                    </tr>
                    <tr>
                    <td>1,004</td>
                    <td>text</td>
                    <td>random</td>
                    <td>layout</td>
                    <td>dashboard</td>
                    </tr>
                    <tr>
                    <td>1,005</td>
                    <td>dashboard</td>
                    <td>irrelevant</td>
                    <td>text</td>
                    <td>placeholder</td>
                    </tr>
                    <tr>
                    <td>1,006</td>
                    <td>dashboard</td>
                    <td>illustrative</td>
                    <td>rich</td>
                    <td>data</td>
                    </tr>
                    <tr>
                    <td>1,007</td>
                    <td>placeholder</td>
                    <td>tabular</td>
                    <td>information</td>
                    <td>irrelevant</td>
                    </tr>
                    <tr>
                    <td>1,008</td>
                    <td>random</td>
                    <td>data</td>
                    <td>placeholder</td>
                    <td>text</td>
                    </tr>
                    <tr>
                    <td>1,009</td>
                    <td>placeholder</td>
                    <td>irrelevant</td>
                    <td>visual</td>
                    <td>layout</td>
                    </tr>
                    <tr>
                    <td>1,010</td>
                    <td>data</td>
                    <td>rich</td>
                    <td>dashboard</td>
                    <td>tabular</td>
                    </tr>
                    <tr>
                    <td>1,011</td>
                    <td>information</td>
                    <td>placeholder</td>
                    <td>illustrative</td>
                    <td>data</td>
                    </tr>
                    <tr>
                    <td>1,012</td>
                    <td>text</td>
                    <td>placeholder</td>
                    <td>layout</td>
                    <td>dashboard</td>
                    </tr>
                    <tr>
                    <td>1,013</td>
                    <td>dashboard</td>
                    <td>irrelevant</td>
                    <td>text</td>
                    <td>visual</td>
                    </tr>
                    <tr>
                    <td>1,014</td>
                    <td>dashboard</td>
                    <td>illustrative</td>
                    <td>rich</td>
                    <td>data</td>
                    </tr>
                    <tr>
                    <td>1,015</td>
                    <td>random</td>
                    <td>tabular</td>
                    <td>information</td>
                    <td>text</td>
                    </tr>
                </tbody>
                </table>
            </div>
            </main>
        </div>
        </div>

    <div class="form">
        <p>Hey, <?php echo $_SESSION['_user']['name']; ?>!</p>
        <p>You are now user dashboard page.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>