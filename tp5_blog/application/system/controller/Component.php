<?php

namespace app\system\controller;

use think\Controller;
use Think\Db;

class Component extends Controller
{
    public function uploader(){
        $file = request()->file( 'file' );
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move( ROOT_PATH . 'public' . DS . 'uploads' );
        if ( $info ) {
            $data = [
                'name'       => input( 'post.name' ),
                'filename'   => $info->getFilename(),
                'path'       => 'public/uploads/' . $info->getSaveName(),
                'extension'  => $info->getExtension(),
                'createtime' => time(),
                'size'       => $info->getSize(),
            ];
            $url = 'http://'.$_SERVER['HTTP_HOST'].'/';
            $data['path'] = str_replace("\\","/",$data['path']);
            db('attachment')->insert($data);
            $json = json_encode( [ 'valid' => 1 , 'message' => $url . $data['path'] ] );
        }else{
            // 上传失败获取错误信息
            $json = json_encode(['valid'=>0,'message'=>$file->getError()]);
        }
        die($json);
    }
    public function filesLists(){
        $db   = db('attachment')
            ->whereIn( 'extension' , explode( ',' , strtolower( input( "post.extensions" ) ) ) )
            ->order( 'id desc' );
        $Res  = $db->paginate( 10 );
        $data = [];
        $url = 'http://'.$_SERVER['HTTP_HOST'].'/';
        if ( $Res->toArray() ) {
            // dump($Res->toArray());die;
            foreach ( $Res as $k => $v ) {
                $data[ $k ][ 'createtime' ] = date( 'Y/m/d' , $v[ 'createtime' ] );
                $data[ $k ][ 'size' ]       = $v[ 'size' ];
                $data[ $k ][ 'url' ]        = $url . $v[ 'path' ];
                $data[ $k ][ 'path' ]       = $url . $v[ 'path' ];
                $data[ $k ][ 'name' ]       = $v[ 'name' ];
            }
        }
        die(json_encode( [ 'valid'=>1,'data' => $data , 'page' => $Res->render() ? : '' ] )) ;

    }
}
