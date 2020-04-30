module.exports = {
    options: {
        stripBanners: true
    },
    css_frontend: {
        src: [
            "public/assets/compiled/css/bootstrap.css",
            "public/assets/compiled/css/font-awesome.css",
            "public/assets/compiled/css/jquery-ui.css",
            "public/assets/compiled/css/jquery.timepicker.css",
            "public/assets/compiled/css/jquery-ui-theme.css"
            // "src/KP/LearningBundle/Resources/public/css/*.css"
        ],
        dest: "public/assets/compiled/css/bundled_frontend.css"
    },
    js_frontend: {
        src: [
            "public/assets/compiled/js/jquery.js",
            "public/assets/compiled/js/jquery-ui.js",
            "public/assets/compiled/js/jquery.timepicker.js",
            "public/assets/compiled/js/bootstrap.js"
            // "src/KP/LearningBundle/Resources/public/js/*.js"
        ],
        dest: "public/assets/compiled/js/bundled_frontend.js"
    },
    css_admin: {
        src: [
            "public/assets/compiled/css/bootstrap.css",
            "public/assets/compiled/css/font-awesome.css",
            "public/assets/compiled/css/jquery-ui.css",
            "public/assets/compiled/css/jquery-ui-theme.css",
            "public/assets/compiled/css/jquery.jgrowl.css"
            // "src/KP/LearningBundle/Resources/public/css/*.css"
        ],
        dest: "public/assets/compiled/css/bundled_admin.css"
    },
    js_admin: {
        src: [
            "public/assets/compiled/js/jquery.js",
            "public/assets/compiled/js/jquery-ui.js",
            "public/assets/compiled/js/jquery.jgrowl.js",
            "public/assets/compiled/js/bootstrap.js"
            // "src/KP/LearningBundle/Resources/public/js/*.js"
        ],
        dest: "public/assets/compiled/js/bundled_admin.js"
    }
}
