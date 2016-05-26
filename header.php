<?php
if(!defined('ROOT_PATH')) {
    return;
}
?>
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
