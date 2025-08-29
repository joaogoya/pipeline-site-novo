const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const autoprefixer = require('autoprefixer'); // <--- AQUI MUDOU
const concat = require('gulp-concat');
const postcss = require('gulp-postcss'); // <--- NOVO

// Defina os caminhos dos arquivos aqui
// Certifique-se de que os caminhos correspondem à estrutura do seu tema
const paths = {
  styles: {
    src: './assets/template/scss/**/*.scss',
    dest: './assets/dist/template/css/'
  },
  scripts: {
    src: './assets/template/js/**/*.js',
    dest: './assets/dist/template/js/'
  }
};

// Tarefa para processar SASS e CSS
function styles() {
  return gulp.src(paths.styles.src)
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([ autoprefixer() ])) // <--- AQUI MUDOU
    .pipe(cleanCSS({compatibility: 'ie11'}))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest(paths.styles.dest));
}

// Tarefa para processar JavaScript
function scripts() {
  return gulp.src(paths.scripts.src)
    .pipe(uglify())
    .pipe(concat('main.js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest(paths.scripts.dest));
}

// Tarefa para monitorar mudanças nos arquivos
function watch() {
  gulp.watch(paths.styles.src, styles);
  gulp.watch(paths.scripts.src, scripts);
}

// Tarefa padrão (executa tudo e inicia o monitoramento)
const build = gulp.series(gulp.parallel(styles, scripts), watch);

// Exporta as tarefas para que possam ser executadas via terminal
exports.styles = styles;
exports.scripts = scripts;
exports.watch = watch;
exports.default = build;