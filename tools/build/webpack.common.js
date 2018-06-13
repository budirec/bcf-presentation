const CleanWebpackPlugin = require('clean-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const VueLoaderPlugin = require('vue-loader').VueLoaderPlugin;

const { fixedPath } = require('./utils');

module.exports = {
  entry: {
    'assets/scripts/main': './src/main.ts',
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
  plugins: [
    new CleanWebpackPlugin(['.dev', '.dist'], {
      root: fixedPath(),
    }),
    new VueLoaderPlugin(),
    new HtmlWebpackPlugin({
      template: './www/index.html'
    }),
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
}
