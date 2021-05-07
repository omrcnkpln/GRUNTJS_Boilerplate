const { package } = require('grunt');
const sass = require('node-sass');

module.exports = function (grunt) {

  grunt.initConfig({

    sass: {
      options: {
        implementation: sass,
        sourceMap: true
      },
      dest: {
        files: {
          'src/css/pasadagli-main.css': 'src/scss/pasadagli-main.scss'
        }
      }
    },

    autoprefixer: {
      options: {
        browsers: ['opera 12', 'ff 15', 'chrome 25']
      },

      dist: {
        files: {
          'src/css/prefix/main.css': 'src/css/main.css',
          'src/css/prefix/pasadagli-main.css': 'src/css/pasadagli-main.css',
        }
      }
    },

    cssmin: {
      build: {
        files: {
          'dest/css/pasadagli-main.min.css': 'src/css/prefix/*.css',
        }
      }
    },

    // concat: {
    //   options: {
    //     separator: ';',
    //   },
    //   dist: {
    //     src: ['src/js/basic-slider.js', 'src/js/akademi-slider.js'],
    //     dest: 'src/js/bundle.js',
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
        'src/js/akademi-slider-2.js'
      ]
    },

    babel: {
      options: {
        sourceMap: true,
        presets: ["@babel/preset-env"],
      },
      dest: {
        files: {
          'src/js/babel/akademi-slider.js': 'src/js/akademi-slider.js',
          'src/js/babel/akademi-slider-2.js': 'src/js/akademi-slider-2.js',
          'src/js/babel/anasayfa-slider.js': 'src/js/anasayfa-slider.js',
          'src/js/babel/basic-slider.js': 'src/js/basic-slider.js',
          'src/js/babel/basic-slider-2.js': 'src/js/basic-slider-2.js',
          'src/js/babel/contents-slider.js': 'src/js/contents-slider.js',
          'src/js/babel/header.js': 'src/js/header.js',
          'src/js/babel/header-bg-transparent.js': 'src/js/header-bg-transparent.js',
          'src/js/babel/header-bg-white.js': 'src/js/header-bg-white.js',
          'src/js/babel/header-bg-white-2.js': 'src/js/header-bg-white-2.js',
          'src/js/babel/hizmetler.js': 'src/js/hizmetler.js',
          'src/js/babel/iletisim-2.js': 'src/js/iletisim-2.js',
          'src/js/babel/loader.js': 'src/js/loader.js',
          'src/js/babel/makaleSlider.js': 'src/js/makaleSlider.js',
          'src/js/babel/odul-kazanan-ogrenciler.js': 'src/js/odul-kazanan-ogrenciler.js',
          'src/js/babel/ogr-ajax.js': 'src/js/ogr-ajax.js',
          'src/js/babel/ogr-modal.js': 'src/js/ogr-modal.js',
          'src/js/babel/sepetim.js': 'src/js/sepetim.js',
          'src/js/babel/site.js': 'src/js/site.js',
          'src/js/babel/timeline.js': 'src/js/timeline.js',
          'src/js/babel/timeline-3.js': 'src/js/timeline-3.js',
          'src/js/babel/yayinlar-slider.js': 'src/js/yayinlar-slider.js',
        },
      },
    },

    uglify: {
      options: {
        compress: true,
      },
      dest: {
        files: {
          'dest/js/akademi-slider.min.js': 'src/js/babel/akademi-slider.js',
          'dest/js/akademi-slider-2.min.js': 'src/js/babel/akademi-slider-2.js',
          'dest/js/anasayfa-slider.min.js': 'src/js/babel/anasayfa-slider.js',
          'dest/js/basic-slider.min.js': 'src/js/babel/basic-slider.js',
          'dest/js/basic-slider-2.min.js': 'src/js/babel/basic-slider-2.js',
          'dest/js/contents-slider.min.js': 'src/js/babel/contents-slider.js',
          'dest/js/header.min.js': 'src/js/babel/header.js',
          'dest/js/header-bg-transparent.min.js': 'src/js/babel/header-bg-transparent.js',
          'dest/js/header-bg-white.min.js': 'src/js/babel/header-bg-white.js',
          'dest/js/header-bg-white-2.min.js': 'src/js/babel/header-bg-white-2.js',
          'dest/js/hizmetler.min.js': 'src/js/babel/hizmetler.js',
          'dest/js/iletisim-2.min.js': 'src/js/babel/iletisim-2.js',
          'dest/js/loader.min.js': 'src/js/babel/loader.js',
          'dest/js/makaleSlider.min.js': 'src/js/babel/makaleSlider.js',
          'dest/js/odul-kazanan-ogrenciler.min.js': 'src/js/babel/odul-kazanan-ogrenciler.js',
          'dest/js/ogr-ajax.min.js': 'src/js/babel/ogr-ajax.js',
          'dest/js/ogr-modal.min.js': 'src/js/babel/ogr-modal.js',
          'dest/js/sepetim.min.js': 'src/js/babel/sepetim.js',
          'dest/js/site.min.js': 'src/js/babel/site.js',
          'dest/js/timeline.min.js': 'src/js/babel/timeline.js',
          'dest/js/timeline-3.min.js': 'src/js/babel/timeline-3.js',
          'dest/js/yayinlar-slider.min.js': 'src/js/babel/yayinlar-slider.js',
        }
      }
    },

    browserSync: {
      dev: {
        bsFiles: {
          src: [
            'dest/css/*.css',
            'dest/js/*.js',
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