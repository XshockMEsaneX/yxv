module.exports = function(grunt) {
  grunt.initConfig({
  sass: {                              // Task
    dist: {                            // Target
      options: {                       // Target options
        style: 'expanded'
      },
      files: {                         // Dictionary of files
        'css/main.css': 'css/scss/main.scss',      // 'destination': 'source'
      }
    }
  },
  watch: {
  css: {
    files: '**/**/*.scss',
    tasks: ['sass'],
  },
},
});

grunt.loadNpmTasks('grunt-contrib-sass');
grunt.loadNpmTasks('grunt-contrib-watch');

grunt.registerTask('default', ['sass']);
}