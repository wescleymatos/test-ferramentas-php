<?php
/*
 * This file has been generated automatically.
 * Please change the configuration for correct use deploy.
 */

require 'recipe/common.php';

// Set configurations
set('repository', 'git@github.com:wescleymatos/test-ferramentas-php.git');
set('shared_files', []);
set('shared_dirs', []);
set('writable_dirs', []);

// Configure servers
server('production', 'SSH_ADDRESS', 22)
    ->user('SSH_USER')
    ->password('SHH_PASS')
    ->env('branch', 'master')
    ->env('deploy_path', 'PATH_SERVER');

server('homologation', 'SSH_ADDRESS', 22)
    ->user('SSH_USER')
    ->password('SHH_PASS')
    ->env('branch', 'dev')
    ->env('deploy_path', 'PATH_SERVER');


task('run:composer', function () {
    cd("{{release_path}}");
    run("curl -sS https://getcomposer.org/installer | php7");
    run("php7 -c {{deploy_path}}/php.ini composer.phar update --no-dev");
})->desc('Composer update');


task('deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:symlink',
    'run:composer',
    'cleanup',
])->desc('Deploy project production');

after('deploy', 'success');
