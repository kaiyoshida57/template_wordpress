# WordPress template
WordPress site template
PHP + Sass + Webpack + Babel
# Requirement version
gulp v4.0.2
node v12.13.1
npm v6.12.1
# Usage
npm init -y

npm i
## start local server and watch
npx gulp

# other
git commit時のフックで、prettierがJSファイルを対象に動きます。
新規にJSファイルを追加するときは、webpack.config.jsに記述してください。
ローカル環境はXampp(Mamp)で動かす想定です
