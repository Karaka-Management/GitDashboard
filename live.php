<?php if(!defined('ROOT_PATH')) return; ?>
<section>
    <?php foreach($lastCommits as $lastCommit) : ?>
    <div class="w-50">
        <table>
            <tbody>
            <tr><th>ID<td><?= $lastCommit->getId(); ?>
            <tr><th>Contributor<td><?= $lastCommit->getAuthor()->getName(); ?>
            <tr><th>Date<td><?= $lastCommit->getDate()->format('Y-m-d h:i:s'); ?>
            <tr><th>Message<td><?= $lastCommit->getMessage(); ?>
            <tr><th>Files<td><ul>
                <?php $files = $lastCommit->getFiles(); foreach($files as $path => $file) : ?>
                    <li><?= $path; ?>
                <?php endforeach; ?>
                </ul>
        </table>
    </div>
    <?php endforeach; ?>
</section>