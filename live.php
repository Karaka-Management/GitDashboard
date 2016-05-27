<?php if(!defined('ROOT_PATH')) return; ?>
<section>
    <?php foreach($lastCommits as $lastCommit) : ?>
    <div class="w-100">
        <?= $lastCommit->getAuthor()->getName(); ?>
        <?= $lastCommit->getDate()->format('Y-m-d'); ?>
        <?= $lastCommit->getMessage(); ?>
        <?= $lastCommit->getFiles(); ?>
    </div>
    <?php endforeach; ?>
</section>