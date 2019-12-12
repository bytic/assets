module.exports = function (grunt) {
    var path = require('path');

    require('load-grunt-config')(grunt, {
        configPath: [
            path.join(process.cwd(), 'vendor/bytic/assets/grunt/config'),
            path.join(process.cwd(), 'grunt')
        ],
        loadGruntTasks: {
            config: require('./package.json')
        }
    });

    // Task definition
    grunt.registerTask("compileAssets", [
        "bowercopy", "copy", "concat", "cssmin", "uglify"
    ]);

    // Task definition
    grunt.registerTask("default", [
        "clean", "compileAssets"
    ]);
};
