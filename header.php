<?php
if(!defined('ROOT_PATH')) {
    return;
}
?>
<header>
    <div id="logo">
        <img width="100px" src="main.png">
    </div>
    <h1>Git Dashboard</h1>
    <table>
        <tbody>
        <tr><th>Repositories<td><?= count($repositories); ?>
            <th>Contributers<td><?= count($committerRanking); ?>
            <th>Commits<td><?= array_sum($commits); ?>
        <tr><th>Last Commit<td><?= current($lastCommits)->getDate()->format('Y-m-d'); ?>
            <th>Tags<td><?= $tagsCount; ?>
            <th>Branches<td><?= $branchesCount; ?>
    </table>
</header>
