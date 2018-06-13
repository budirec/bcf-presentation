const { resolve } = require('path');

module.exports = {
  fixedPath: function fixedPath(path) {
    let root = [__dirname, '..', '..'];
    if (!!path && path.length) {
      let dirPath = Array.prototype.concat(root, path.split('/')).join('/');
      return resolve(dirPath);
    }
    return resolve(root.join('/'));
  },
};
