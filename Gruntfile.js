/* jshint node:true */
module.exports = function( grunt ) {
	'use strict';

	grunt.initConfig({

		// Setting folder templates.
		dirs: {
			css: 'css',
			images: 'img',
			js: 'js'
		},

		// Minify .js files.
		uglify: {
			options: {
				// Preserve comments that start with a bang.
				preserveComments: /^!/
			},

			frontend: {
				files: [{
					expand: true,
					cwd: '<%= dirs.js %>/',
					src: [
						'*.js',
						'!*.min.js',
						'!*.float.js'
					],
					dest: '<%= dirs.js %>/',
					ext: '.min.js'
				}]
			},
		},

		// Remove all .min.css files.
		clean: {
			css: ['css/*.min.css'],
		},

		// Minify all .css files.
		cssmin: {
			minify: {
				expand: true,
				cwd: '<%= dirs.css %>/',
				src: ['*.css'],
				dest: '<%= dirs.css %>/',
				ext: '.min.css'
			}
		},

		// Watch changes for assets.
		watch: {
			css: {
				files: ['<%= dirs.css %>/*.css'],
				tasks: ['cssmin']
			},
			js: {
				files: [
					'<%= dirs.js %>/*js',
				],
				tasks: ['uglify']
			}
		},

		// Generate POT files.
		makepot: {
			options: {
				type: 'wp-plugin',
				domainPath: 'languages',
				potHeaders: {
					'report-msgid-bugs-to' : 'https://github.com/easypropertylistings/epl-jupix/issues',
					'last-translator' : 'Merv Barrett <support@easypropertylistings.com.au>',
					'language-team' : 'Real Estate Connected <support@realestateconnected.com.au>',
					'Plural-Forms': 'nplurals=2; plural=(n > 1);',
					'X-Poedit-SourceCharset' : 'UTF-8',
					'X-Poedit-KeywordsList' : '__;_e;_x;_ex;_n',
					'X-Poedit-Basepath' : '..',
					'X-Poedit-SearchPath-0' : '.',
					'X-Poedit-SearchPathExcluded-0' : 'node_modules',
					'X-Poedit-SearchPathExcluded-1' : 'epl-apidocs',
					'X-Poedit-SearchPathExcluded-2' : 'apigen',
					'X-Poedit-SearchPathExcluded-3' : 'Gruntfile.js',
					'X-Poedit-SearchPathExcluded-4' : 'apigen.neon',
					'X-Poedit-SearchPathExcluded-5' : 'package.json',
					'X-Poedit-SearchPathExcluded-6' : 'README.md'
				}
			},
			dist: {
				options: {
					potFilename: 'epl-jupix.pot',
					exclude: [
						'apigen/.*',
						'tests/.*',
						'tmp/.*'
					]
				}
			}
		},

	});

	grunt.loadNpmTasks( 'grunt-wp-i18n' );
	grunt.loadNpmTasks( 'grunt-contrib-uglify' );
	grunt.loadNpmTasks( 'grunt-contrib-clean' );
	grunt.loadNpmTasks( 'grunt-contrib-cssmin' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );

	// Register tasks
	grunt.registerTask( 'default', [
		'uglify',
		'cleancss',
		'css',
		'makepot'
	]);

	grunt.registerTask( 'js', [
		'uglify:frontend'
	]);

	grunt.registerTask( 'cleancss', [
		'clean'
	]);

	grunt.registerTask( 'css', [
		'cssmin'
	]);

	grunt.registerTask( 'dev', [
		'default',
		'makepot'
	]);

};