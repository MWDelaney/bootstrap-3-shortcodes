module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    markdown: {
      all: {
        files: [
          {
            expand: true,
            src: 'README.md',
            dest: 'includes/help/',
            ext: '.html'
          }
        ]
      },
      options: {
        template: 'includes/help/README.jst',
        postCompile: function(src, contect) {
          grunt.log.write('Generating HTML from README.md...').ok()
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-markdown');

  grunt.registerTask('default', ['markdown']);

}
