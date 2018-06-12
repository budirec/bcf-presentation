const { resolve } = require('path');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const VueLoaderPlugin = require('vue-loader').VueLoaderPlugin;

let srcConfig = {
  entry: {
    '/assets/scripts/main': './src/main.ts',
  },
  output: {
    filename: '[name].js',
    path: fixedPath('.dev')
  },
  context: fixedPath(),
  resolve: {
    alias: {
      'vue$': 'vue/dist/vue.esm.js',
    },
    extensions: [
      '.vue',
      '.tsx',
      '.ts',
      '.js',
      '.json',
    ]
  },
  devtool: 'inline-source-map',
  plugins: [
    new VueLoaderPlugin(),
    new CleanWebpackPlugin(['.dev', '.dist'], {
      root: '.'
    }),
    new HtmlWebpackPlugin({
      template: './www/index.html'
    })
  ],
  module: {
    rules: [
      {
        test: /\.(c|sa|sc)ss$/,
        use: [
          'vue-style-loader',
          'css-loader',
          'sass-loader',
        ]
      },
      {
        test: /\.ts$/,
        exclude: /(node_modules)/,
        use: {
          loader: 'ts-loader',
          options: {
            appendTsSuffixTo: [/\.vue$/],
          }
        }
      },
      {
        test: /\.vue$/,
        exclude: /(node_modules)/,
        use: {
          loader: 'vue-loader',
          options: {
            esModule: true,
            loaders: {
              scss: [
                'vue-style-loader',
                'css-loader',
                'sass-loader'
              ],
              sass: [
                'vue-style-loader',
                'css-loader',
                'sass-loader?indentedSyntax'
              ]
            }
          }
        }
      },
    ]
  },
  watch: true,
  watchOptions: {
    aggregateTimeout: 300,
    ignored: ['node_modules'],
    poll: 1000
  },
  mode: 'development'
}

function fixedPath(path) {
  let root = [__dirname];
  if (!!path && path.length) {
    let dirPath = Array.prototype.concat(root, path.split('/')).join('/');
    return resolve(dirPath);
  }
  return resolve(root.join('/'));
}

module.exports = srcConfig;
