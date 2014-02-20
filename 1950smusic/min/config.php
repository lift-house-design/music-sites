<?php

/**
 * Allow use of the Minify URI Builder app. Only set this to true while you need it.
 */
$min_enableBuilder = true;
$min_builderPassword = 'lhdbra';
$min_errorLogger = false;
$min_allowDebugFlag = false;
$min_documentRoot = '';
$min_cacheFileLocking = true;
$min_expire_hours = 1;


/**
 * Combining multiple CSS files can place @import declarations after rules, which
 * is invalid. Minify will attempt to detect when this happens and place a
 * warning comment at the top of the CSS output. To resolve this you can either 
 * move the @imports within your CSS files, or enable this option, which will 
 * move all @imports to the top of the output. Note that moving @imports could 
 * affect CSS values (which is why this option is disabled by default).
 */
$min_serveOptions['bubbleCssImports'] = true;


/**
 * Cache-Control: max-age value sent to browser (in seconds). After this period,
 * the browser will send another conditional GET. Use a longer period for lower
 * traffic but you may want to shorten this before making changes if it's crucial
 * those changes are seen immediately.
 *
 * Note: Despite this setting, if you include a number at the end of the
 * querystring, maxAge will be set to one year. E.g. /min/f=hello.css&123456
 */
$min_serveOptions['maxAge'] = 3600;


/**
 * To use Google's Closure Compiler API to minify Javascript (falling back to JSMin
 * on failure), uncomment the following line:
 */
//$min_serveOptions['minifiers']['application/x-javascript'] = array('Minify_JS_ClosureCompiler', 'minify');


/**
 * If you'd like to restrict the "f" option to files within/below
 * particular directories below DOCUMENT_ROOT, set this here.
 * You will still need to include the directory in the
 * f or b GET parameters.
 * 
 * // = shortcut for DOCUMENT_ROOT 
 */
//$min_serveOptions['minApp']['allowDirs'] = array('//js', '//css');

/**
 * Set to true to disable the "f" GET parameter for specifying files.
 * Only the "g" parameter will be considered.
 */
$min_serveOptions['minApp']['groupsOnly'] = false;


/**
 * By default, Minify will not minify files with names containing .min or -min
 * before the extension. E.g. myFile.min.js will not be processed by JSMin
 * 
 * To minify all files, set this option to null. You could also specify your
 * own pattern that is matched against the filename.
 */
//$min_serveOptions['minApp']['noMinPattern'] = '@[-\\.]min\\.(?:js|css)$@i';


/**
 * If you minify CSS files stored in symlink-ed directories, the URI rewriting
 * algorithm can fail. To prevent this, provide an array of link paths to
 * target paths, where the link paths are within the document root.
 * 
 * Because paths need to be normalized for this to work, use "//" to substitute 
 * the doc root in the link paths (the array keys). E.g.:
 * <code>
 * array('//symlink' => '/real/target/path') // unix
 * array('//static' => 'D:\\staticStorage')  // Windows
 * </code>
 */
$min_symlinks = array();


/**
 * If you upload files from Windows to a non-Windows server, Windows may report
 * incorrect mtimes for the files. This may cause Minify to keep serving stale 
 * cache files when source file changes are made too frequently (e.g. more than
 * once an hour).
 * 
 * Immediately after modifying and uploading a file, use the touch command to 
 * update the mtime on the server. If the mtime jumps ahead by a number of hours,
 * set this variable to that number. If the mtime moves back, this should not be 
 * needed.
 *
 * In the Windows SFTP client WinSCP, there's an option that may fix this 
 * issue without changing the variable below. Under login > environment, 
 * select the option "Adjust remote timestamp with DST".
 * @link http://winscp.net/eng/docs/ui_login_environment#daylight_saving_time
 */
$min_uploaderHoursBehind = 0;


/**
 * Path to Minify's lib folder. If you happen to move it, change 
 * this accordingly.
 */
$min_libPath = dirname(__FILE__) . '/lib';


// try to disable output_compression (may not have an effect)
ini_set('zlib.output_compression', '0');
