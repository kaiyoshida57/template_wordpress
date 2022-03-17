module.exports = {
	env: {
		node: true, // nodeの環境変数を追加
		browser: true,
		commonjs: true,
		es2020: true,
	},
	extends: ['eslint:recommended'],
	parserOptions: {
		ecmaVersion: 11,
	},
	rules: {},
};
