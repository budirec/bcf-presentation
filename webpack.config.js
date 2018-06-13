const envConfig = process.env.NODE_ENV === 'production' ? 'prod' : 'dev';
module.exports = require(`./tools/build/webpack.${envConfig}`);
