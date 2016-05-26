<?php
if(!defined('ROOT_PATH')) {
    return;
}
?>
<section>
    <div>
        <div class="live-push">
            <h2>Last commit</h2>
            <?= $repositories[0]->getNewest()->getAuthor()->getName(); ?>
            <?= $repositories[0]->getNewest()->getDate()->format('Y-m-d'); ?>
            <?= $repositories[0]->getNewest()->getMessage(); ?>
            <?= $repositories[0]->getNewest()->getFiles(); ?>
        </div>
    </div>
    <div>
        <div class="live-random-commit">

        </div>
    </div>
</section>