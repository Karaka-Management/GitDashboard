<?php if(!defined('ROOT_PATH')) return; ?>
<section>
    <div class="w-25">
        <h2>Top <?= $CONFIG['ranking_limit']; ?> Implementer</h2>
        <div class="repository-ranking">
            <ol>
                <?php $c = 0; foreach($committerRanking as $name => $committed) : ?>
                <?php if(!in_array($name, $CONFIG['ranking']) && $c < $CONFIG['ranking_limit']) : ?>
                <li><?= $name; ?> - <?= $committed->getAdditionCount(); ?>
                    <?php $c++; endif; endforeach; ?>
            </ol>
        </div>
    </div>
    <div class="w-25">
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
    <div class="w-25">
        <h2>Top <?= $CONFIG['ranking_limit']; ?> Cleaner</h2>
        <div class="repository-ranking">
            <ol>
                <?php $c = 0; foreach($committerRanking as $name => $committed) : ?>
                <?php if(!in_array($name, $CONFIG['ranking']) && $c < $CONFIG['ranking_limit']) : ?>
                <li><?= $name; ?> - <?= $committed->getRemovalCount(); ?>
                    <?php $c++; endif; endforeach; ?>
            </ol>
        </div>
    </div>
    <div class="w-25">
        <h2>Top <?= $CONFIG['ranking_limit']; ?> Committer</h2>
        <div class="repository-ranking">
            <ol>
                <?php $c = 0; foreach($committerRanking as $name => $committed) : ?>
                <?php if(!in_array($name, $CONFIG['ranking']) && $c < $CONFIG['ranking_limit']) : ?>
                <li><?= $name; ?> - <?= $committed->getCommitCount(); ?>
                    <?php $c++; endif; endforeach; ?>
            </ol>
        </div>
    </div>
</section>
