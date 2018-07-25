const CleanWebpackPlugin = require('clean-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const VueLoaderPlugin = require('vue-loader').VueLoaderPlugin;

const { projectPath } = require('./utils');

module.exports = {
  entry: {
    'assets/scripts/main': './src/main.ts',
  },
  context: projectPath(),
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
      root: projectPath(),
    }),
    new VueLoaderPlugin(),
    new HtmlWebpackPlugin({
      template: './www/index.html'
    }),
  ],
  module: {
    rules: [
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
          }
        }
      },
      {
        test: /\.(png|jpg|jpeg|gif|eot|ttf|woff|woff2|svg|svgz)(\?.+)?$/,
        use: [{
          loader: 'url-loader',
          options: {
            limit: 10000
          }
        }]
      },
    ]
  },
}
