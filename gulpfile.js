var fs          = require("fs"),
    gulp        = require("gulp"), 
    sass        = require("gulp-ruby-sass") ,
    bower       = require("gulp-bower"),
    uglify      = require("gulp-uglify"),
    concat      = require("gulp-concat"),
    prefix      = require("gulp-autoprefixer"),
    livereload  = require("gulp-livereload"),
    json        = JSON.parse(fs.readFileSync("./package.json"));

var config = function(){
    var appName = json.name;

    var path = {
        "bower"  : "./bower_components/",
        "assets" : "./assets",
        "static" : "./webroot"
    };

    return {
        "path": path,
        "scss": {
            "input": path.assets + "/scss/app.scss",
            "include": [
                path.bower  + "/foundation/scss/",
                path.bower  + "/font-awesome/scss/",
                path.assets + "/scss/"
            ],
            "output": path.static + "/css",
            "watch": [
                path.assets + "/scss/**.scss",

            ]
        },
        "icons":{
            "input": [
                path.bower + "/font-awesome/fonts/**.*",
                // path.bower + "/bootstrap-sass/assets/fonts/**/*.*"
            ],
            "output": path.static + "/fonts"
        },
        "script":{
            "input" : [
                path.bower  + "/jquery/dist/jquery.js",
                path.bower  + "/fastclick/lib/fastclick.js",
                // TODO: Consider loading individual modules for foundation
                path.bower  + "/foundation/js/foundation.min.js",
                path.assets + "/js/*.js"
            ],
            "output": {
                "dir"     : path.static + "/js",
                "filename": "script.js"
            },
            "watch": [
                path.assets + "/js/*.js"
            ]
        },
        "copy": {
            "files":[
                {
                    "input" : path.bower + "/modernizr/modernizr.js",
                    "output": path.static + "/js/",
                }
            ]
        }
    };
}();

gulp.task("bower", function() { 
    return bower(config.path.bower);
});

gulp.task("icons", function() { 
    return gulp.src(config.icons.input) 
            .pipe(gulp.dest(config.icons.output)); 
});

gulp.task("js", function(){
    return gulp.src(config.script.input)
        .pipe(concat(config.script.output.filename))
        .pipe(uglify())
        .pipe(gulp.dest(config.script.output.dir))
        .pipe(livereload());
});

gulp.task("scss", function() { 
    return sass(
            config.scss.input,
            {
                style: "expanded", 
                loadPath: config.scss.include,
                sourcemap: true
            }
        ) 
        .pipe(prefix("last 1 version", "> 1%", "ie 8", "ie 7"))
        .pipe(gulp.dest(config.scss.output))
          .pipe(livereload()); 
});

gulp.task("copy", function(){
    var files =config.copy.files;
    files.forEach(function(item){
        gulp.src(item.input)
            .pipe(gulp.dest(item.output))
            .pipe(livereload());
    })
});

// Rerun the task when a file changes
 gulp.task("watch", function() {
     livereload.listen();
    config.scss.watch.forEach(function(path){
        gulp.watch(path, ["scss"]); 
    });
    config.script.watch.forEach(function(path){
        gulp.watch(path, ["js"]); 
    });
});

  gulp.task(
    "default",
    [
        "bower",
        "icons",
        "js",
        "scss",
        "copy",
        "watch"
    ]);
