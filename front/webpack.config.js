module.exports = {
	// モード値を production に設定すると最適化された状態で、
	// development に設定するとソースマップ有効でJSファイルが出力される
	mode: "development",

	// メインのJS
	entry: {
		"common/common": "./src/js/common/common.js",
		// "top": "./src/js/slick.min.js",
		// "top/top": "./src/js/top/top.js",
	},
  output: {
		path: __dirname,
		filename: "[name].bundle.js",
	},
}
