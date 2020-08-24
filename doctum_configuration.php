<?php

use Doctum\Doctum;
use Symfony\Component\Finder\Finder;
use Doctum\RemoteRepository\GitHubRemoteRepository;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->in(__DIR__ . '/src');

return new Doctum($iterator, [
    'title'                => 'PHP-SwfTools API',
    'build_dir'            => __DIR__ . '/docs/source/API/API',
    'cache_dir'            => __DIR__ . '/docs/source/API/API/cache',
    'remote_repository'    => new GitHubRemoteRepository('alchemy-fr/PHPSwftools', __DIR__),
]);
