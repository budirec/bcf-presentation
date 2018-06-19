const HotModuleReplacementPlugin = require('webpack').HotModuleReplacementPlugin;
const DefinePlugin = require('webpack').DefinePlugin;

const commonConfig = require('./webpack.common');
const { projectPath } = require('./utils');

const devConfig = {
  output: {
    filename: '[name].js',
    path: projectPath('.dev'),
  },
  plugins: Array.prototype.concat(commonConfig.plugins, [
    new HotModuleReplacementPlugin(),
    new DefinePlugin({
      'process.env.NODE_ENV': JSON.stringify('development')
    }),
  ]),
  module: {
    rules: Array.prototype.concat(commonConfig.module.rules, [
      {
        test: /\.(c|sa|sc)ss$/,
        use: [
          'vue-style-loader',
          'css-loader',
          'sass-loader',
        ]
      },
    ])
  },
  devtool: 'inline-source-map',
  mode: 'development',
  devServer: {
    contentBase: projectPath('.dev'),
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
