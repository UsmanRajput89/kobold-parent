module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            // This is where we set up all the tasks we'd like grunt to watch for
            // changes.
            files: ['<%= jshint.files %>'],
            tasks: ['jshint', 'qunit'],
            scripts: {
              files: ['js/**/{,*/}*.js'],
              tasks: ['uglify', 'concat'],
              options: {
                spawn: false,
              },
            },
            css: {
              files: ['sass/{,*/}{,*/}{,*/}*.{scss,sass}'],
              tasks: ['sass', 'postcss'],
              options: {
                spawn: false,
              }
            }
        },
        uglify: {
            // This is for minifying all of our scripts.
            options: {
              mangle: false,
              preserveComments: false
            },
            my_target: {
              files: [{
                expand: true,
                cwd: 'js/source',
                src: '{,*/}{,*/}{,*/}*.js',
                dest: 'js/build'
              }]
            }
        },
        concat: {
            options: {
              // define a string to put between each file in the concatenated output
              separator: ';\n'
            },
            dist: {
              // the files to concatenate
              src: [
              	    'js/build/vendor/popper/popper.min.js',
                    'js/build/vendor/bootstrap/bootstrap.min.js',
                    'js/build/vendor/slick/slick.min.js',
                    'js/build/vendor/smartmenus/jquery.smartmenus.js',
                    'js/build/vendor/smartmenus/jquery.smartmenus.bootstrap.js',
                    'js/build/vendor/matchHeight/jquery.matchHeight.js',
		    'js/build/vendor/jquery.youtubebackground.js',
                    'js/build/header.js',
                    'js/build/footer.js',
                    'js/build/scroll.js',
		    'js/build/anchor.js',
                    'js/build/main.js',
                    ],
              // the location of the resulting JS file
              dest: 'js/scripts-all.js'
            }
        },
        qunit: {
            files: ['test/**/*.html']
        },
        jshint: {
            // define the files to lint
            files: ['Gruntfile.js', 'src/**/*.js', 'test/**/*.js'],
            // configure JSHint (documented at http://www.jshint.com/docs/)
            options: {
              // more options here if you want to override JSHint defaults
              globals: {
                jQuery: true,
                console: true,
                module: true
              }
            }
        },
        sass: {
            dist: {
                options: {
                  style: 'compressed', // This controls the compiled css and can be changed to nested, compact or compressed
                  sourceMap: true
                },
                files: [{
                    expand: true,
                    cwd: 'sass',
                    src: ['*.scss'],
                    dest: 'css/',
                    ext: '.css'
                }]
            }
        },
        postcss: {
            options: {
              map: true,
              processors: [
                require('pixrem')(), // add fallbacks for rem units
                require('autoprefixer')({browsers: 'last 2 versions'}), // add vendor prefixes
                require('cssnano')() // minify the result
              ]
            },
            dist: {
              src: 'css/*.css'
            }
          }
    });
    
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-qunit');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-sass');
    
    grunt.file.setBase('../');
      
    // this would be run by typing "grunt test" on the command line
    grunt.registerTask('test', ['jshint', 'qunit']);
    
    // the default task can be run just by typing "grunt" on the command line
    grunt.registerTask('default', ['concat', 'uglify', 'sass', 'postcss:dist']);

};