module.exports = function(grunt) {

  // Project configuration.
	grunt.initConfig({
	  uglify: {
	    my_target: {
	      files: {
	        'dest/output.min.js': ['./public/js/*.js']
	      }
	    }
	  }
	});
	cssmin: {
	  combine: {
	    files: {
	        'path/to/output.css': ['./public/css/*.css']
	    }
	  }
	}


  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-uglify');

  // Default task(s).
  grunt.registerTask('default', ['uglify']);

};