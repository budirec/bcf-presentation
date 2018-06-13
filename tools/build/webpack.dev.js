const HotModuleReplacementPlugin = require('webpack').HotModuleReplacementPlugin;
const DefinePlugin = require('webpack').DefinePlugin;

const commonConfig = require('./webpack.common');
const { fixedPath } = require('./utils');

const devConfig = {
  output: {
    filename: '[name].js',
    path: fixedPath('.dev'),
  },
  plugins: Array.prototype.concat(commonConfig.plugins, [
    new HotModuleReplacementPlugin(),
    new DefinePlugin({
      'process.env.NODE_ENV': JSON.stringify('development')
    })
  ]),
  devtool: 'inline-source-map',
  mode: 'development',
  devServer: {
    contentBase: fixedPath('.dev'),
    compress: true,
    port: 3000,
    hot: true,
    publicPath: '',
    index: '/index.html',
  },
  watch: true,
  watchOptions: {
    aggregateTimeout: 300,
    ignored: ['node_modules'],
    poll: 1000
  },
}

module.exports = Object.assign({}, commonConfig, devConfig);
