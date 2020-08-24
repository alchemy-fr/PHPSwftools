<?php

use Doctum\Doctum;
use Symfony\Component\Finder\Finder;
use Doctum\RemoteRepository\GitHubRemoteRepository;
use Doctum\Version\GitVersionCollection;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->in(__DIR__ . '/src');

$versions = GitVersionCollection::create(__DIR__)
    //->addFromTags('v2.0.*')
    ->add('SILEX2', 'silex2 branch')
    ->add('master', 'master branch');

return new Doctum($iterator, [
    'title'                => 'PHP-SwfTools API',
    'build_dir'            => __DIR__ . '/docs/build/API/API/%version%',
    'cache_dir'            => __DIR__ . '/docs/build/API/API/%version%/cache',
    'versions'             => $versions,
    'remote_repository'    => new GitHubRemoteRepository('alchemy-fr/PHPSwftools', __DIR__),
]);
