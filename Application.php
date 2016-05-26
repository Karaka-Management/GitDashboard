<?php
if(!defined('ROOT_PATH')) {
    return;
}

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

include 'template.php';