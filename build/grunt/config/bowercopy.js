module.exports = {
    options: {
        srcPrefix: "public/bower_components",
        destPrefix: "public/assets/compiled"
    },
    scripts: {
        files: {
            "js/jquery.js": "jquery/jquery.js",
            "js/jquery-ui.js": "jquery-ui/jquery-ui.js",
            "js/jquery.jgrowl.js": "jGrowl/jquery.jgrowl.js",
            "js/bootstrap.js": "bootstrap/dist/js/bootstrap.js",
            "js/jquery.timepicker.js": "jquery-timepicker-wvega/jquery.timepicker.js"
        }
    },
    stylesheets: {
        files: {
            "css/bootstrap.css": "bootstrap/dist/css/bootstrap.css",
            "css/jquery.jgrowl.css": "jGrowl/jquery.jgrowl.css",
            "css/jquery.timepicker.css": "jquery-timepicker-wvega/jquery.timepicker.css",
            "css/font-awesome.css": "font-awesome/css/font-awesome.css"
        }
    },
    jqueryui: {
        options: {
            copyOptions: {
                process: function (content) {
                    return content.replace(new RegExp("images/", 'g'), "../images/jquery-ui/");
                }
            }
        },
        files: {
            "css/jquery-ui-theme.css": "jquery-ui/themes/flick/theme.css",
            "css/jquery-ui.css": "jquery-ui/themes/flick/jquery-ui.css"
        }
    },
    images: {
        files: {
            "images/jquery-ui/": "jquery-ui/themes/flick/images"
        }
    },
    fonts: {
        files: {
            "fonts": [
                "font-awesome/fonts",
                "bootstrap/fonts"
            ]
        }
    }
};