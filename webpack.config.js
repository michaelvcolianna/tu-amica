const project_configuration = require("./project.config"),
  path = require("path"),
  webpack = require("webpack"),
  CopyPlugin = require("copy-webpack-plugin"),
  VueLoaderPlugin = require("vue-loader/lib/plugin"),
  MiniCssExtractPlugin = require("mini-css-extract-plugin");

let webpack_configuration = {
  entry: [
    "@babel/polyfill",
    project_configuration.theme.path +
      project_configuration.source.path +
      project_configuration.source.scripts.path +
      project_configuration.source.scripts.build.entry,
    // project_configuration.theme.path +
    //   project_configuration.source.path +
    //   project_configuration.source.sass.path +
    //   "main.scss"
  ],
  output: {
    filename: "main.build.js",
    path: path.resolve(
      __dirname,
      project_configuration.theme.path + project_configuration.asset.path
    ) // NOTE: All the paths to the various other assets ORIGINATE here
  },
  resolve: {
    alias: {
      jquery: "jquery/dist/jquery.js",
      _: "lodash",
      project_config: path.resolve( 
        __dirname,
        "project.config.json"
       )
    },
    modules: [
      path.resolve(
        __dirname,
        project_configuration.theme.path +
          project_configuration.source.path +
          project_configuration.source.scripts.path +
          "components"
      ),
      path.resolve(
        __dirname,
        project_configuration.theme.path +
          project_configuration.source.path +
          project_configuration.source.scripts.path +
          "models"
      ),
      path.resolve(
        __dirname,
        project_configuration.theme.path +
          project_configuration.source.path +
          project_configuration.source.scripts.path +
          "modules"
      ),
      path.resolve(
        __dirname,
        project_configuration.theme.path +
          project_configuration.source.path +
          project_configuration.source.scripts.path +
          "vendor"
      ),
      path.resolve(__dirname, "node_modules")
    ]
  },
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader"
        }
      },
      {
        test: /\.(s*)css$/,
        use: [
          {
            loader: "style-loader"
          },
          {
            loader: MiniCssExtractPlugin.loader
          },
          {
            loader: "css-loader"
          },
          {
            loader: "sass-loader",
            options: {
              sourceMap: true
            }
          }
        ]
      },
      {
        test: /\.(png|jpe?g|gif|svg)$/,
        use: [
          {
            loader: "file-loader",
            options: {
              name: "./images/[name].[ext]"
            }
          }
        ]
      },
      {
        test: /\.(woff(2)?|ttf|eot)(\?v=\d+\.\d+\.\d+)?$/,
        use: [
          {
            loader: "file-loader",
            options: {
              name: "[name].[ext]",
              publicPath: "./fonts/",
              outputPath: "fonts/"
            }
          }
        ]
      },
      {
        test: /\.vue$/,
        loader: "vue-loader"
      }
    ]
  },

  plugins: [
    new VueLoaderPlugin(),
    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
      "window.jQuery": "jquery",
      _: "_",
      ProjectConfig: "project_config"
    }),
    new MiniCssExtractPlugin({
      filename: "main.build.css"
    }),
    new CopyPlugin([
      {
        from:
          project_configuration.theme.path +
          project_configuration.source.path +
          project_configuration.source.images.path,
        to: project_configuration.asset.images.path
      }
    ]),
  ]
};

module.exports = (environment, argument_variables) => {
  // console.log( ">>>>>" );
  // settings for development mode
  if (argument_variables.mode === "development") {
    webpack_configuration.devtool = "source-map";
    webpack_configuration.watch = true;
  }

  // settings for production mode
  /*
  if (argument_variables.mode === "production") {
    // stuff
  }
  */

  return webpack_configuration;
};
