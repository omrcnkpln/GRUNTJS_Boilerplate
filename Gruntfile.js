const { package } = require('grunt');
const sass = require('node-sass');

module.exports = function (grunt) {

  grunt.initConfig({

    sass: {
      options: {
        implementation: sass,
        sourceMap: true
      },
      dist: {
        files: {
          'src/css/style.css': 'src/scss/style.scss'
        }
      }
    },

    autoprefixer: {
      options: {
        browsers: ['opera 12', 'ff 15', 'chrome 25']
      },

      dist: {
        target: [
          'src/css/style.css'
        ]
      }
    },

    cssmin: {
      build: {
        files: {
          'dist/css/main.min.css': 'src/css/*.css',
        }
      }
    },

    // concat: {
    //   options: {
    //     separator: ';',
    //   },
    //   dist: {
    //     src: ['src/js/basic-slider.js', 'src/js/akademi-slider.js'],
    //     dist: 'src/js/bundle.js',
    //   },
    // },

    // jshint: {
    //   options: {
    //     reporter: require('jshint-stylish') // use jshint-stylish to make our errors look and read good
    //   },

    //   // when this task is run, lint the Gruntfile and all js files in src
    //   files: ['src/js/*.js']
    // },

    eslint: {
      options: {
        configFile: '.eslintrc.js',
        // format: 'html',
        // outputFile: 'logs/eslintReport.html',
        fix: true
      },
      target: [
        'src/js/*.js'
      ]
    },

    babel: {
      options: {
        sourceMap: true,
        presets: ["@babel/preset-env"],
      },
      dist: {
        files: {
          'src/js/babel/custom.js': 'src/js/custom.js',
        },
      },
    },

    uglify: {
      options: {
        compress: true,
      },
      dist: {
        files: {
          'dist/js/custom.min.js': 'src/js/babel/custom.js',
        }
      }
    },

    browserSync: {
      dev: {
        bsFiles: {
          src: [
            'dist/css/*.css',
            'dist/js/*.js',
            '*.html',
            // 'logs/*.html'
          ]
        },
        options: {
          watchTask: true,
          server: './'
        }
      }
    },

    watch: {
      stylesheets: {
        files: ['src/scss/*.scss'],
        tasks: ['sass', 'newer:autoprefixer', 'cssmin']
      },

      js: {
        files: ['src/js/*.js'],
        tasks: ['newer:eslint', 'newer:babel', 'newer:uglify'],
      }
    }
  })

  // LOAD GRUNT PLUGINS ========================================================
  // grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-eslint');

  grunt.loadNpmTasks('grunt-newer');
  grunt.loadNpmTasks('grunt-browser-sync');

  // grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-babel');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['browserSync', 'watch']);
}