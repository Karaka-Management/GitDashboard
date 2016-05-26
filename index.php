<?php
ini_set('display_errors', '1');

require_once __DIR__ . '/../phpOMS/Autoloader.php';
require_once __DIR__ . '/config.php';

use phpOMS\Utils\Git\Git;
use phpOMS\Utils\Git\Repository;

/** @var array $CONFIG */
Git::setBin($CONFIG['git_path']);

$start = new DateTime('now');
$start->setTimestamp(time() - $CONFIG['age']);

/** @var Repository[] $repositories */
$repositories = [];
foreach ($CONFIG['repositories'] as $repository) {
    $repositories[] = new Repository($repository);
}

$lastCommits = [];
$commits = [];
$contributors = [];
$branches = [];
$branchesCount = 0;
$committerRanking = [];
$tags = [];
$tagsCount = 0;

foreach($repositories as $key => $repository) {
    $branches[$key] = $repository->getBranches();
    $branchesCount += count($branches[$key]);
    $lastCommits[$key] = $repository->getNewest();
    $contributors[$key] = $repository->getContributors($start);
    $commits[$key] = array_sum($repository->getCommitsCount($start));
    $tags[$key] = $repository->getTags();
    $tagsCount += count($tags[$key]);

    foreach($contributors[$key] as $contributor) {
        if(!isset($committerRanking[$contributor->getName()])) {
            $committerRanking[$contributor->getName()] = 0;
        }

        $committerRanking[$contributor->getName()] += $contributor->getCommitCount();
    }
}

/*usort($lastCommits, function($a, $b) {
    if ($a->getDate() == $b->getDate()) {
        return 0;
    }

    return $a->getDate() < $b->getDate() ? -1 : 1;
});*/
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>GitDashboard</title>
    <style>
        html, body {
            height: 100%;
            padding: 0;
            margin: 0 auto;
            font-family: arial, serif;
            background: #eaecf0;
            color: #000;
            line-height: 1.3em;
            overflow-x: hidden;
        }

        .grad {
            height: 5px;
            width: 100%;
        }

        .grad-main {
            background: #ffbf00; /* Old browsers */
            background: -moz-linear-gradient(left,  #ffbf00 0%, #a06114 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(left,  #ffbf00 0%,#a06114 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to right,  #ffbf00 0%,#a06114 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffbf00', endColorstr='#a06114',GradientType=1 ); /* IE6-9 */
        }

        header {
            -webkit-box-shadow: inset 0 10px 10px -10px rgba(0,0,0,0.8);
            -moz-box-shadow: inset 0 10px 10px -10px rgba(0,0,0,0.8);
            box-shadow: inset 0 10px 10px -10px rgba(0,0,0,0.8);

            background: #2f2f2f;
            padding: 20px;
            color: #fff;
        }

        header h1 {
            text-shadow: 2px 2px #000;
        }

        @keyframes slidy {
            0% { left: 0; }
            20% { left: 0; }
            25% { left: -100%; }
            45% { left: -100%; }
            50% { left: -200%; }
            70% { left: -200%; }
            75% { left: -300%; }
            95% { left: -300%; }
            100% { left: -400%; }
        }

        main > section {
            width: 25%; float: left; display: inline-block;
        }

        section > div {
            float: left;
            background: #fff;
            padding: 10px;
            margin: 10px;
            border: 1px solid #9d9d9d;
        }

        h2 {
            border-bottom: 1px solid #9d9d9d;
            padding: 0;
            margin: 0 0 10px 0;
        }

        main {
            color: #4D4D4D;
            font-size: 1.3em;
            line-height: 1.7em;
            position: relative;
            width: 400%;
            margin: 0;
            left: 0;
            text-align: left;
            animation: 10s slidy infinite;
            overflow: hidden;
            padding: 0 10px 10px 10px;
        }

        td, th {
            text-align: left;
        }

        .stats-loc {
            width: 200px;
            height: 180px;
        }

        .stats-commits {
            width: 400px;
            height: 180px;
        }

        .chart {
            background: #fff;
            width: 100%;
            height: 100%;
            border: 1px solid #9d9d9d;
            float: left;
            clear: both;
            box-sizing: border-box;
        }
    </style>
    <link rel="stylesheet" href="../cssOMS/chart/chart_line.css" type="text/css" />
    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script src="../jsOMS/Utils/oLib.js"></script>
    <script src="../jsOMS/Chart/Chart.js"></script>
    <script src="../jsOMS/Chart/PieChart.js"></script>
    <script src="../jsOMS/Chart/LineChart.js"></script>
<body>
<div class="grad grad-main"></div>
<header>
    <table>
        <tbody>
        <tr><th>Repositories<td><?= count($repositories); ?>
        <tr><th>Contributers<td><?= count($committerRanking); ?>
        <tr><th>Commits<td><?= array_sum($commits); ?>
        <tr><th>Last Commit<td><?= current($lastCommits)->getDate()->format('Y-m-d'); ?>
        <tr><th>Tags<td><?= $tagsCount; ?>
        <tr><th>Branches<td><?= $branchesCount; ?>
    </table>
</header>
<div class="grad grad-main"></div>
<main>
    <section>
        <div>
            <div class="stats-commits">
                <h2>Commits</h2>
                <div id="commit-chart" class="chart"></div>
                <script>
                    let commitChart = new jsOMS.Chart.LineChart('commit-chart');
                    commitChart.getChart().setMargin(5, 5, 5, 5);
                    commitChart.getChart().setAxis('x', { label: { text: 'Month' }});
                    commitChart.getChart().setAxis('y', { label: { text: 'Commits' }});
                    commitChart.getChart().setLegend({visible: false});
                    commitChart.getChart().setData([{
                        id: 'Something',
                        name: 'Huh',
                        points: [
                            {x: 1, y: 1},
                            {x: 2, y: 2},
                            {x: 3, y: 3},
                            {x: 4, y: 2},
                            {x: 5, y: 4},
                            {x: 6, y: 4},
                            {x: 7, y: 7},
                            {x: 8, y: 1},
                            {x: 9, y: 0},
                            {x: 10, y: 5},
                            {x: 11, y: 3},
                            {x: 12, y: 6}
                        ]
                    }]);
                    commitChart.draw();
                </script>
            </div>
        </div>
        <div>
            <div class="stats-loc">
                <h2>LOC</h2>
                <div id="loc-chart" class="chart"></div>
                <script>
                    let locChart = new jsOMS.Chart.PieChart('loc-chart');
                    locChart.getChart().setMargin(5, 5, 5, 5);
                    locChart.getChart().setLegend({visible: false});
                    locChart.getChart().setData([{
                        id: 'Something',
                        name: 'Huh',
                        points: [
                            {name: 'a', value: 1},
                            {name: 'b', value: 2},
                            {name: 'c', value: 3},
                            {name: 'd', value: 4},
                            {name: 'e', value: 5}
                        ]
                    }]);
                    locChart.draw();
                </script>
                </div>
        </div>
        <div>
            <div class="stats-bugs">
                <h2>Bugs</h2>
            </div>
        </div>
    </section>
    <section>
        <div>
            <h2>Top <?= $CONFIG['ranking_limit']; ?> Implementer</h2>
            <div class="repository-ranking">
                <ol>
                    <?php $c = 0; foreach($committerRanking as $name => $committed) : ?>
                    <?php if(!in_array($name, $CONFIG['ranking']) && $c < $CONFIG['ranking_limit']) : ?>
                    <li><?= $name; ?>
                        <?php $c++; endif; endforeach; ?>
                </ol>
            </div>
        </div>
        <div>
            <h2>Top <?= $CONFIG['ranking_limit']; ?> Bug Fixer</h2>
            <div class="repository-ranking">
                <ol>
                    <?php $c = 0; foreach($committerRanking as $name => $committed) : ?>
                    <?php if(!in_array($name, $CONFIG['ranking']) && $c < $CONFIG['ranking_limit']) : ?>
                    <li><?= $name; ?>
                        <?php $c++; endif; endforeach; ?>
                </ol>
            </div>
        </div>
        <div>
            <h2>Top <?= $CONFIG['ranking_limit']; ?> Cleaner</h2>
            <div class="repository-ranking">
                <ol>
                    <?php $c = 0; foreach($committerRanking as $name => $committed) : ?>
                    <?php if(!in_array($name, $CONFIG['ranking']) && $c < $CONFIG['ranking_limit']) : ?>
                    <li><?= $name; ?>
                        <?php $c++; endif; endforeach; ?>
                </ol>
            </div>
        </div>
        <div>
            <h2>Top <?= $CONFIG['ranking_limit']; ?> Committer</h2>
            <div class="repository-ranking">
                <ol>
                    <?php $c = 0; foreach($committerRanking as $name => $committed) : ?>
                    <?php if(!in_array($name, $CONFIG['ranking']) && $c < $CONFIG['ranking_limit']) : ?>
                    <li><?= $name; ?>
                        <?php $c++; endif; endforeach; ?>
                </ol>
            </div>
        </div>
    </section>
    <section>
        <?php foreach($repositories as $key => $repository) : ?>
            <div class="repository">
                <h2><?= $repository->getDirectoryPath(); ?></h2>
                <div>
                    <table>
                        <tbody>
                        <tr><th>Branches<td><?= count($branches[$key]); ?>
                        <tr><th>Contributors<td><?= count($contributors[$key]); ?>
                        <tr><th>Commits<td><?= $commits[$key]; ?>
                        <tr><th>Last Commit<td><?= $lastCommits[$key]->getDate()->format('Y-m-d'); ?>
                        <tr><th>Tags<td><?= count($tags[$key]); ?>
                        <tr><th>Description<td><?= $repository->getDescription(); ?>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
    <section>
        <div>
            <div class="live-push">

            </div>
        </div>
        <div>
            <div class="live-random-commit">

            </div>
        </div>
    </section>
</main>