module.exports = {
	root: true,
	env: {
		amd: true, //registers globals for define and require
		node: true, // nodeの環境変数を追加
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
