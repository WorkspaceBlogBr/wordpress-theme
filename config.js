var root = __dirname,
  app = root.concat('/app'),
  dist = root.concat('/dist');

module.exports = {
  files: {
    assets: [
      app.concat('/*/**'),
      '!'+app.concat('/styles/*'),
      '!'+app.concat('/styles')
    ],
    css: {
      from: app.concat('/styles/*.less'),
      to: 'style.css'
    },
    dest: dist.concat('/**'),
    php: app.concat('/*.php')
  },
  paths: {
    dist: dist
  },

  jade: {
    pretty: true
  },

  info: {
    'Theme Name': 'Workspace.blog.br',
    'Theme URI': 'http://workspace.blog.br',
    'Author': 'Fernando Falci',
    'Author URI': 'http://falci.me/',
    'Description': 'Tema exclusivo para o Workspace.blog.br',
    'Version': '1.0',
    'Tags': 'workspace',
    'Text Domain': 'workspace'
  }
};
