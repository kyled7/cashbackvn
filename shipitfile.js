module.exports = function (shipit) {
    require('shipit-deploy')(shipit);

    shipit.initConfig({
        default: {
            workspace: '.',
            servers: 'ec2-user@ec2-52-74-55-153.ap-southeast-1.compute.amazonaws.com',
            ignores: ['.git', 'node_modules', 'bower_components'],
            keepReleases: 2,
        },
        dev: {
            deployTo: '/var/www/cashbackvn/dev',
        }
    });
};