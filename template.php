<?php if(!defined('ROOT_PATH')) return; ?>
<!DOCTYPE HTML>
<html>
<head>
    <title>GitDashboard</title>
    <link rel="stylesheet" href="styles.css" type="text/css" />
    <link rel="stylesheet" href="../cssOMS/chart/chart_line.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css" />
    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script src="../jsOMS/Utils/oLib.js"></script>
    <script src="../jsOMS/Chart/Chart.js"></script>
    <script src="../jsOMS/Chart/PieChart.js"></script>
    <script src="../jsOMS/Chart/LineChart.js"></script>
<body>
<div class="grad grad-main"></div>
<?php include 'header.php'; ?>
<div class="grad grad-main"></div>
<main>
    <?php include 'stats.php'; ?>
    <?php include 'ranking.php'; ?>
    <?php include 'repository.php'; ?>
    <?php include 'live.php'; ?>
</main>
<script>
    jsOMS.ready(function() {
        jsOMS.watcher(function() {
            let xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if(xmlHttp.readyState === 4 && xmlHttp.status === 200) {
                    document.write(xmlHttp.responseText);
                    document.close();
                }
            };

            xmlHttp.open('GET', location.href, true);
            xmlHttp.send();
        }, <?= $CONFIG['update_interval'] * 1000; ?>);
    });
</script>