<?php
/**
 * px2-vain-interval CORE class
 */
namespace tomk79\pickles2\vainInterval;

/**
 * px2-vain-interval CORE class
 */
class main{

	/**
	 * entry method
	 * @param object $px Picklesオブジェクト
	 * @param object $options プラグイン設定
	 */
	public static function exec( $px, $options = null ){
		if(is_int($options)){
			sleep($options);
		}
		return true;
	}

}
