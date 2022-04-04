# WordPress template
WordPress site template
PHP + Sass + Browser-Sync + Webpack + Babel

# Requirement version
gulp v4.0.2
node v12.13.1, v14.18.1
npm v6.12.1

# Usage
cd front
## Install package
yarn
or
npm init -y
npm i
## Start local server and watch
yarn gulp
or
npx gulp

# Other
git commit時のフックで、prettierがJSファイルを対象に動きます。
新規にJSファイルを追加するときは、webpack.config.jsに記述してください。
webp画像はhtaccessで一括で読み込ませます。
ローカル環境は`Xampp(Mamp)`で動かす想定です。
コードの体裁を保つため、`EditorConfig`をエディタに入れてください。
https://qiita.com/naru0504/items/82f09881abaf3f4dc171
