module.exports = {
	root: true,
	env: {
		amd: true, //registers globals for define and require
		browser: true,
		commonjs: true,
		es2020: true,
	},
	extends: ['eslint:recommended', 'prettier'],
	parserOptions: {
		ecmaVersion: 11,
	},
	rules: {},
};
