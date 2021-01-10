/* jshint node:true */
module.exports = function( grunt ) {
	'use strict';

	var sass = require( 'node-sass' );

	var processors = [ require( 'autoprefixer' )() ];
	if ( grunt.option('env') === 'production' ) {
		processors.push( require( 'cssnano' )() );
	}

	grunt.initConfig({

		// Autoprefixer.
		postcss: {
			options: {
				processors: processors
			},
			dist: {
				src: [
					'style.css',
					'assets/css/admin/*.css',
					'assets/css/woocommerce/extensions/*.css',
					'assets/css/woocommerce/woocommerce.css',
					'assets/css/woocommerce/woocommerce_customizer.css',
					'assets/css/woocommerce/woocommerce-legacy.css',
					'assets/css/base/*.css'
				]
			}
		},

		// Minify .js files.
		uglify: {
			options: {
				output: {
					comments: 'some'
				}
			},
			main: {
				files: [{
					expand: true,
					cwd: 'assets/js/',
					src: [
						'*.js',
						'!*.min.js'
					],
					dest: 'assets/js/',
					ext: '.min.js'
				}]
			},
			vendor: {
				files: [{
					expand: true,
					cwd: 'assets/js/vendor/',
					src: [
						'*.js',
						'!*.min.js'
					],
					dest: 'assets/js/vendor/',
					ext: '.min.js'
				}]
			},
			woocommerce: {
				files: [{
					expand: true,
					cwd: 'assets/js/woocommerce/',
					src: [
						'*.js',
						'!*.min.js'
					],
					dest: 'assets/js/woocommerce/',
					ext: '.min.js'
				}]
			},
			extensions: {
				files: [{
					expand: true,
					cwd: 'assets/js/woocommerce/extensions/',
					src: [
						'*.js',
						'!*.min.js'
					],
					dest: 'assets/js/woocommerce/extensions/',
					ext: '.min.js'
				}]
			}
		},

		// Compile all .scss files.
		sass: {
			dist: {
				options: {
					implementation: sass,
					require: 'susy',
					sourceMap: false,
					includePaths: require( 'bourbon' ).includePaths
				},
				files: [{
					'style.css': 'style.scss',
					// 'assets/css/woocommerce/extensions/bookings.css': 'assets/css/woocommerce/extensions/bookings.scss',
					// 'assets/css/woocommerce/extensions/brands.css': 'assets/css/woocommerce/extensions/brands.scss',
					// 'assets/css/woocommerce/extensions/wishlists.css': 'assets/css/woocommerce/extensions/wishlists.scss',
					// 'assets/css/woocommerce/extensions/ajax-layered-nav.css': 'assets/css/woocommerce/extensions/ajax-layered-nav.scss',
					// 'assets/css/woocommerce/extensions/variation-swatches.css': 'assets/css/woocommerce/extensions/variation-swatches.scss',
					// 'assets/css/woocommerce/extensions/composite-products.css': 'assets/css/woocommerce/extensions/composite-products.scss',
					// 'assets/css/woocommerce/extensions/photography.css': 'assets/css/woocommerce/extensions/photography.scss',
					// 'assets/css/woocommerce/extensions/product-reviews-pro.css': 'assets/css/woocommerce/extensions/product-reviews-pro.scss',
					// 'assets/css/woocommerce/extensions/smart-coupons.css': 'assets/css/woocommerce/extensions/smart-coupons.scss',
					// 'assets/css/woocommerce/extensions/deposits.css': 'assets/css/woocommerce/extensions/deposits.scss',
					// 'assets/css/woocommerce/extensions/bundles.css': 'assets/css/woocommerce/extensions/bundles.scss',
					// 'assets/css/woocommerce/extensions/ship-multiple-addresses.css': 'assets/css/woocommerce/extensions/ship-multiple-addresses.scss',
					// 'assets/css/woocommerce/extensions/advanced-product-labels.css': 'assets/css/woocommerce/extensions/advanced-product-labels.scss',
					// 'assets/css/woocommerce/extensions/mix-and-match.css': 'assets/css/woocommerce/extensions/mix-and-match.scss',
					// 'assets/css/woocommerce/extensions/memberships.css': 'assets/css/woocommerce/extensions/memberships.scss',
					// 'assets/css/woocommerce/extensions/quick-view.css': 'assets/css/woocommerce/extensions/quick-view.scss',
					// 'assets/css/woocommerce/extensions/product-recommendations.css': 'assets/css/woocommerce/extensions/product-recommendations.scss',
					'assets/css/woocommerce/woocommerce.css': 'assets/css/woocommerce/woocommerce.scss',
					'assets/css/woocommerce/woocommerce_customizer.css': 'assets/css/woocommerce/woocommerce_customizer.scss',
					//'assets/css/woocommerce/woocommerce-legacy.css': 'assets/css/woocommerce/woocommerce-legacy.scss',
					'assets/css/base/icons.css': 'assets/css/base/icons.scss',
				}]
			}
		},

		// Minify all .css files.
		cssmin: {
		},

		// Watch changes for assets.
		watch: {
			css: {
				files: [
					'style.scss',
					'assets/css/admin/welcome-screen/*.scss',
					'assets/css/woocommerce/*.scss',
					'assets/css/sass/customizer/*.scss',
					'assets/css/woocommerce/extensions/*.scss',
					'assets/css/base/*.scss',
					'assets/css/components/*.scss',
					'assets/css/sass/utils/*.scss',
					'assets/css/sass/vendors/*.scss',
					'assets/css/overlay/*.scss',
					'assets/css/overlay/_frontpage.scss',
					'assets/css/utils/**/*.scss',
				],
				tasks: [
					'sass',
					'css'
				]
			},
			js: {
				files: [
					// main js
					'assets/js/**/*.js',
					'!assets/js/**/*.min.js',

					// WooCommerce js
					'assets/js/woocommerce/**/*.js',
					'!assets/js/woocommerce/**/*.min.js',

					// Extensions js
					'assets/js/woocommerce/extensions/**/*.js',
					'!assets/js/woocommerce/extensions/**/*.min.js',

				],
				tasks: [
					'jshint',
					'uglify'
				]
			}
		},


		// Creates deploy-able theme
		copy: {
			deploy: {
				src: [
					'**',
					'.htaccess',
					'!.*',
					'!.*/**',
					'!*.md',
					'!*.scss',
					'!.DS_Store',
					'!assets/css/**/*.scss',
					'!assets/css/sass/**',
					'!assets/js/src/**',
					'!composer.json',
					'!composer.lock',
					'!Gruntfile.js',
					'!node_modules/**',
					'!npm-debug.log',
					'!package.json',
					'!package-lock.json',
					'!phpcs.xml',
					'!storefront/**',
					'!storefront.zip',
					'!vendor/**'
				],
				dest: 'storefront',
				expand: true,
				dot: true
			}
		},

		compress: {
			zip: {
				options: {
					archive: './storefront.zip',
					mode: 'zip'
				},
				files: [
					{ src: './storefront/**' }
				]
			}
		}
	});

	// Load NPM tasks to be used here
	grunt.loadNpmTasks( 'grunt-contrib-uglify' );
	grunt.loadNpmTasks( 'grunt-sass' );
	grunt.loadNpmTasks( 'grunt-contrib-cssmin' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-contrib-copy' );
	grunt.loadNpmTasks( '@lodder/grunt-postcss' );
	grunt.loadNpmTasks( 'grunt-contrib-compress' );


	// Register tasks
	grunt.registerTask( 'default', [
		'css',
		'uglify'
	]);

	grunt.registerTask( 'css', [
		'sass',
		'postcss',
		// 'cssmin',
	]);

	grunt.registerTask( 'dev', [
		'default',
	]);

	grunt.registerTask( 'deploy', [
		'dev',
		'copy',
		'compress'
	]);
};
