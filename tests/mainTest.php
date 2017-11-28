<?php
/**
 * test
 */

class mainTest extends PHPUnit_Framework_TestCase{

	/**
	 * ファイルシステムユーティリティ
	 */
	private $fs;

	/**
	 * setup
	 */
	public function setup(){
		$this->fs = new \tomk79\filesystem();
	}

	/**
	 * 遅延発生のテスト
	 */
	public function testMain(){
		$time = time();

		// トップページを実行
		$output = $this->passthru( ['php', __DIR__.'/testdata/standard/.px_execute.php' , '/'] );
		// var_dump($output);

		$this->assertTrue( gettype($output) == gettype('') );
		$this->assertTrue( $time + 5 <= time() );
	}//testMain()

	/**
	 * 遅延が発生しないテスト
	 */
	public function testNoDelay(){
		$time = time();

		// コンフィグ情報を取得
		$output = $this->passthru( ['php', __DIR__.'/testdata/standard/.px_execute.php' , '/?PX=config'] );
		// var_dump($output);

		$this->assertTrue( gettype($output) == gettype('') );
		$this->assertTrue( $time + 2 > time() );
	}//testNoDelay()


	/**
	 * クリーニング
	 */
	public function testCleaning(){
		// 後始末
		$output = $this->passthru( ['php', __DIR__.'/testdata/standard/.px_execute.php' , '/?PX=clearcache'] );
	}//testCleaning()



	/**
	 * コマンドを実行し、標準出力値を返す
	 * @param array $ary_command コマンドのパラメータを要素として持つ配列
	 * @return string コマンドの標準出力値
	 */
	private function passthru( $ary_command ){
		set_time_limit(180); // Windowsのtestがタイム・アウトするため追加
		$cmd = array();
		foreach( $ary_command as $row ){
			$param = '"'.addslashes($row).'"';
			array_push( $cmd, $param );
		}
		$cmd = implode( ' ', $cmd );
		ob_start();
		passthru( $cmd );
		$bin = ob_get_clean();
		return $bin;
	}// passthru()

}
