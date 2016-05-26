<?php
if(!defined('ROOT_PATH')) {
    return;
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>GitDashboard</title>
    <link rel="stylesheet" href="styles.css" type="text/css" />
    <link rel="stylesheet" href="../cssOMS/chart/chart_line.css" type="text/css" />
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
