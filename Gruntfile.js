module.exports = function (grunt) {
    grunt.initConfig({
        shipit: {
            options: {
                ignores: ['node_modules', 'bower_components'],
                workspace: '.',
                keepReleases: 2,
                servers: 'ec2-user@ec2-52-74-55-153.ap-southeast-1.compute.amazonaws.com',
                key: './'
            },
            development: {
                deployTo: '/var/www/cashbackvn/dev'
            },
            staging: {
                deployTo: '/var/www/cashbackvn/stage'
            },
            production: {
                deployTo: '/var/www/cashbackvn/prod'
            }
        },
    });

    grunt.loadNpmTasks('grunt-shipit');
    grunt.loadNpmTasks('shipit-deploy');

    grunt.registerTask('deploy', ['deploy:init', 'deploy:update', 'deploy:publish', 'deploy:clean']);
};