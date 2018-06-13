const ClosureCompilerPlugin = require('webpack-closure-compiler');
const DefinePlugin = require('webpack').DefinePlugin;
const UglifyJsPlugin = require('uglifyjs-webpack-plugin')

const commonConfig = require('./webpack.common');
const { fixedPath } = require('./utils');

const devConfig = {
  output: {
    filename: '[name].[hash].js',
    path: fixedPath('.dist'),
  },
  plugins: Array.prototype.concat(commonConfig.plugins, [
    new ClosureCompilerPlugin({ concurrency: 3 }),
    new UglifyJsPlugin({ sourceMap: true }),
    new DefinePlugin({
      'process.env.NODE_ENV': JSON.stringify('production')
    })
  ]),
  devtool: 'source-map',
  mode: 'production',
}

module.exports = Object.assign({}, commonConfig, devConfig);
