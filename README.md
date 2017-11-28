# px2-vain-interval
Pickles 2 の処理に無駄な遅延を発生させる、テスト用のプラグインです。


## 導入方法 - Setup

Pickles 2 をセットアップします。

`composer.json` と同階層に移動し、次のコマンドを実行します。

```
$ composer require tomk79/px2-vain-interval
```

次に、`px-files/config.php` に設定を記述します。

```
$conf->funcs->before_output = [
	// 無意味な遅延
	'tomk79\pickles2\vainInterval\main::exec(5)'
];
```

この例では、 `before_output` (出力の直前)のタイミングで遅延を発生させますが、
その他すべてのタイミング `before_sitemap`、 `before_content`、 `processor` でも同様に遅延を発生させることができます。

発生させる遅延の長さは、引数に指定します。 整数値型で、単位は秒です。


## 更新履歴 - Change log

### tomk79/px2-vain-interval 1.0.0 (2017年11月28日)

- 初版リリース。


## ライセンス - License

MIT License


## 作者 - Author

- Tomoya Koyanagi <tomk79@gmail.com>
- website: <http://www.pxt.jp/>
- Twitter: @tomk79 <http://twitter.com/tomk79/>
