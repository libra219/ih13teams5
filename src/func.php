<?php

namespace ih13teams5;

/** 
 * h
 * htmlspecialcharsの圧縮関数
 * ENT_QUOTES シングルクォーテーション、ダブルクォーテーション共に変換
 * @param string $str 変換する元文字列
 * @return string 変換後の文字列
 */
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}


/**
 * get処理を便利化したクラス
 * 
 * 
 */
class GetState
{
    /**
     * 配列に対応したh関数
     * @param array|string $data 変換する元文字列
     * @return array|string 変換後の配列、文字列
     */
    function arrayhtml($data)
    {
        if (is_array($data)) {//データが配列の場合
            return array_map([$this,'arrayhtml'],$data);
        } else {//データが配列ではない場合
            return h($data);
        }
    }
    // classの外に書くと動かない関数、TODO:要修正

    /**
     * Getメソッド
     * 取得できれば値を返し、できなければfalseを返す。
     * 
     * @param string $str 取得するキー
     * @return string|false 未取得時falseを返す。
     */
    public function Get($str)
    {
        return (!empty($_GET[$str])) ? $_GET[$str] : false ;
    }

    /**
     * HTMLエンティティ化してGETするメソッド
     * 
     * @param string $str 取得するキー
     * @return string|false 正しく取得できればエンティティ化して取得、取得できなければfalseを返す。
     */
    public function hGet($str)
    {
        return $h = (!empty($_GET[$str])) ? arrayhtml($_GET[$str]) : false ;
    } 

    /**
     * GetをIntにして返すメソッド
     * 
     * @param string $str 取得するキー
     * @return Int|false 型に変換して返す。数値でなければfalseを返す。
     */
    public function IntGet($str)
    {
        if(!is_numeric($this->Get($str)))
        {
            return false;
        }
        return (int)$this->Get($str);
    }

    public function RawDataGet()
    {
        # code...
        return (!empty($_GET)) ? $_GET : false ;
    }

}

/**
 * post処理を便利化したクラス
 * 
 * 
 */
class PostState
{
    public function Post($str = '')
    {
        return (!empty($_POST[$str])) ? $_POST[$str] : false ;
    } 

    public function IntPost($str)
    {
        // Int型に変換して返す。数値でなければfalseを返す。
        if(!is_numeric($this->Post($str)))
        {
            return false;
        }
        return (int)$this->Post($str);
    }
}
