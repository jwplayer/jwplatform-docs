module.exports = function (grunt) {

  'use strict';

  // configure grunt
  grunt.initConfig({
    'mkdocs-jwplayer': {
      build: {
        options: {
          serve: false
        }
      },
      serve: {
        options: {
          serve: true
        }
      }
    }
  });

  // load grunt plugins
  grunt.loadNpmTasks('grunt-mkdocs-jwplayer');

  // build docs
  grunt.registerTask('default', [
    'mkdocs-jwplayer:build'
  ]);

  // build docs and serve localhost
  grunt.registerTask('serve', [
    'mkdocs-jwplayer:serve'
  ]);

};
