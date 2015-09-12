module.exports = function(grunt) {

    // 1. All configuration goes here
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        concat: {
            dist: {
                src: [
                    'js/*.js'
                ],
                dest: 'build/js/app.js',
            }
        },


        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'build/css/style.css' : 'css/app.scss'
                }
            }
        },

        uglify: {
            build: {
                src:  'build/js/app.js',
                dest: 'build/js/app.min.js'
            },
        },


        watch: {
            scripts: {
                files: ['js/*.js'],
                tasks: ['concat', 'uglify']
            },
            css: {
                files: [
                    'css/*.scss',
                    'css/imports/*.scss',
                    'css/imports/client_imports/*.scss',
                    'css/imports/admin_imports/*.scss',
                    'css/imports/overlay_imports/*.scss',
                    'css/imports/overlay_imports/*.scss'
                ],
                tasks: ['sass'],
                options: {
                    spawn: false,
                }
            }
        }

    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-concat');

    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.loadNpmTasks('grunt-contrib-sass');

    grunt.registerTask('default', 'watch');


};
