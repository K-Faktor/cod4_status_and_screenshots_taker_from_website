<?php

$src_folder = '/home/cod4_1/.callofduty4/screenshots';

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Za30 CoD Gaming | Скриншоты</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/status/images/icons/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .navbar {
            margin-bottom: 50px;
            border-radius: 0;
        }

        .jumbotron {
            margin-bottom: 0;
        }

        .navbar-fixed-bottom {
            background-color: #1E1E1E;
            color: white;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body style="background-color: #101820FF;">

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://za30cod.ru">Главная</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="http://45.155.207.181/status">Статус сервера</a></li>
                <li class="active"><a href="http://45.155.207.181/screenshots/">Скриншоты</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container text-center">
    <div class="row">

        <?php
        function scan_dir($dir)
        {
            $file_display = array('jpg', 'jpeg', 'png', 'gif');
            $files = array();
            foreach (scandir($dir) as $file) {
                $tmp = explode('.', $file);
                $file_type = strtolower(end($tmp));
                if (($file !== '.') && ($file !== '..') && (in_array($file_type, $file_display))) {
                    $filemtime = filemtime($dir . '/' . $file);
                    $files[$file] = $filemtime;
                }
            }

            arsort($files);
            $files = array_keys($files);

            return ($files) ? $files : false;
        }

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $per_page = 9;

        $start_from = ($page - 1) * $per_page;
        $stop_at = $start_from + $per_page - 1;

        $files = scan_dir($src_folder);

        $total_files = $files;
        $tmp_files = array();

        for ($j = $start_from; $j <= $stop_at; ++$j) {
            if ($j <= (count($files) - 1))
                array_push($tmp_files, $files[$j]);
        }

        $files = $tmp_files;

        $x = 1;
        foreach ($files as $file) {
            echo '<div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">' . $file . '</div>
                        <div class="panel-body"><img src="file_viewer.php?file=' . base64_encode($src_folder . "/" . $file) . '" class="img-responsive" style="width:100%; height: 250px;" alt="' . $file . '" data-toggle="modal" data-target="#' . $x . 'myModal"></div>
                        <div class="panel-footer">' . date("d-M-Y H:i:s", filemtime($src_folder . '/' . $file)) . '</div>
                    </div>
                </div>';
            $y = $x % 3;
            if ($y == 0) {
                echo '</div>
                    <div class="row">';
            }

            echo '<!-- Modal -->
                <div id="' . $x . 'myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="file_viewer.php?file=' . base64_encode($src_folder . "/" . $file) . '" class="img_responsive" style="width:100%;" alt="' . $file . '">
                            </div>
                        </div>
                    </div>
                </div>';
            $x += 1;
        }
        ?>
    </div>
</div>

<div class="container text-center">
    <center>
        <?php $total_pages = ceil(count($total_files) / $per_page);
        for ($i = 1; $i <= 5; ++$i) {
            if ($i == 1) {
                echo '<ul class="pagination">';
            }
            if ($page != 1 && $i == 1) {
                echo '<li><a href=?page=1><<</a></li><li><a href=?page=' . ($page - 1) . '><</a></li>';
            }
            if ($page == ($page + $i - 1)) {
                echo '<li class="active"><a href=?page=' . ($page + $i - 1) . '>' . ($page + $i - 1) . '</a></li>';
            } else {
                if (($page + $i - 2) != $total_pages) {
                    echo '<li><a href=?page=' . ($page + $i - 1) . '>' . ($page + $i - 1) . '</a></li>';
                } else {
                    echo '</ul>';
                    break;
                }
            }
            if ($i >= 5) {
                echo '<li><a href=?page=' . ($page + 1) . ' >></a></li><li><a href=?page=' . $total_pages . ' >>></a></li></ul>';
            }
        }
        ?>
    </center>
</div><br><br>

<!-- Fixed Footer -->
<footer class="navbar-fixed-bottom">
    <div class="container text-center" id="currentDate">
        <p>Авторское право 2017 - <span id="currentDateFormatted"></span></p>
    </div>
</footer>

<script>
    function formatDate() {
        const options = { day: 'numeric', month: 'long', year: 'numeric' };
        const currentDate = new Date().toLocaleDateString('ru-RU', options);
        return currentDate;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const currentDateElement = document.getElementById('currentDateFormatted');

        if (currentDateElement) {
            currentDateElement.innerHTML = formatDate();
        }
    });
</script>

</body>
</html>
