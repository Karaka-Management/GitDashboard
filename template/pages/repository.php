<?php if(!defined('ROOT_PATH')) return; ?>
<section>
    <?php foreach($repositories as $key => $repository) : ?>
        <div class="repository w-25">
            <h2><?= $repository->getName(); ?></h2>
            <div>
                <table>
                    <tbody>
                    <tr><th>Branches<td><?= count($branches[$key]); ?>
                    <tr><th>Contributors<td><?= count($contributors[$key]); ?>
                    <tr><th>Commits<td><?= $commits[$key]; ?>
                    <tr><th>Last Commit<td><?= $lastCommits[$key]->getDate()->format('Y-m-d'); ?>
                    <tr><th>Tags<td><?= count($tags[$key]); ?>
                </table>
            </div>
        </div>
    <?php endforeach; ?>
</section>
