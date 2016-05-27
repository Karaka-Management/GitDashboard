<?php if (!defined('ROOT_PATH')) {
    return;
}

use phpOMS\Utils\Git\Git;
use phpOMS\Utils\Git\Repository;

/** @var array $CONFIG */
Git::setBin($CONFIG['git_path']);

$start = new DateTime('now');
$start->setTimestamp(time() - $CONFIG['age']);

/** @var Repository[] $repositories */
$repositories     = [];
$lastCommits      = [];
$commits          = [];
$contributors     = [];
$branches         = [];
$committerRanking = [];
$tags             = [];
$fileCount        = [];
$loc              = [];
$branchesCount    = 0;
$tagsCount        = 0;

foreach ($CONFIG['repositories'] as $repository) {
    $tRepo              = new Repository($repository);
    $key                = $tRepo->getName();
    $repositories[$key] = $tRepo;
    $branches[$key]     = $tRepo->getBranches();
    $lastCommits[$key]  = $tRepo->getNewest();
    $contributors[$key] = $tRepo->getContributors($start);
    $commits[$key]      = array_sum($tRepo->getCommitsCount($start));
    $tags[$key]         = $tRepo->getTags();
    $fileCount[$key]    = $tRepo->countFiles();
    $loc[$key]          = $tRepo->getLOC();

    $branchesCount += count($branches[$key]);
    $tagsCount += count($tags[$key]);

    foreach ($contributors[$key] as $contributor) {
        $committerRanking[$contributor->getName()] = $contributor;
    }
}

include 'template.php';