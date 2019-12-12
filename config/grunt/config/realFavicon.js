module.exports = {
    favicons: {
        src: "TODO: Path to your master picture",
        dest: "TODO: Path to the directory where to store the icons",
        options: {
            iconsPath: "/public/images/favicon/",
            html: ["TODO: List of the HTML files where to inject favicon markups"],
            design: {
                ios: {
                    pictureAspect: "backgroundAndMargin",
                    backgroundColor: "#ffffff",
                    margin: "14%",
                    assets: {
                        ios6AndPriorIcons: true,
                        ios7AndLaterIcons: true,
                        precomposedIcons: true,
                        declareOnlyDefaultIcon: true
                    }
                },
                desktopBrowser: {},
                windows: {
                    pictureAspect: "noChange",
                    backgroundColor: "#2b5797",
                    onConflict: "override",
                    assets: {
                        windows80Ie10Tile: true,
                        windows10Ie11EdgeTiles: {
                            small: true,
                            medium: true,
                            big: true,
                            rectangle: true
                        }
                    }
                },
                androidChrome: {
                    pictureAspect: "shadow",
                    themeColor: "#ffffff",
                    manifest: {
                        name: "ongdb.ro",
                        display: "standalone",
                        orientation: "notSet",
                        onConflict: "override",
                        declared: true
                    },
                    assets: {
                        legacyIcon: true,
                        lowResolutionIcons: false
                    }
                },
                safariPinnedTab: {
                    pictureAspect: "blackAndWhite",
                    threshold: 65.625,
                    themeColor: "#5bbad5"
                }
            },
            settings: {
                scalingAlgorithm: "Mitchell",
                errorOnImageTooSmall: false
            }
        }
    }
};