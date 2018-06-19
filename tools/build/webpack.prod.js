const ClosureCompilerPlugin = require('webpack-closure-compiler');
const DefinePlugin = require('webpack').DefinePlugin;
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

const commonConfig = require('./webpack.common');
const { projectPath } = require('./utils');

const devConfig = {
  output: {
    filename: '[name].[hash].js',
    path: projectPath('.dist'),
  },
  plugins: Array.prototype.concat(commonConfig.plugins, [
    new ClosureCompilerPlugin({ concurrency: 3 }),
    new UglifyJsPlugin({ sourceMap: true }),
    new DefinePlugin({
      'process.env.NODE_ENV': JSON.stringify('production')
    }),
    new MiniCssExtractPlugin({
      filename: 'assets/css/[name].[hash].css',
    })
  ]),
  module: {
    rules: Array.prototype.concat(commonConfig.module.rules, [
      {
        test: /\.(c|sa|sc)ss$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            query: {
              importLoaders: 1,
            }
          }
        ]
      },
    ])
  },
  devtool: 'source-map',
  mode: 'production',
  optimization: {
    minimizer: [],
    splitChunks: {
      cacheGroups: {
        "styles-compiled": {
          name: "styles",
          test: module =>
            module.nameForCondition && /\.(s?css|vue)$/.test(module.nameForCondition()) && !/^javascript/.test(module.type),
          chunks: "initial",
          minChunks: 1,
          enforce: true
        }
      }
    }
  },
}

module.exports = Object.assign({}, commonConfig, devConfig);
