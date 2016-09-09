<?php
/**
 * Created by PhpStorm.
 * User: xuchunwei
 * Date: 16/2/26
 * Time: 下午3:38
 */

class ShopController extends BasicController {

    private $m_shop;

    private function init(){

        // $this->verifySign();
        $this->m_shop = $this->load('Shop/Shop');
    }

    public function cacheAction(){
        $result = Helper::loadComponent('Cache')->test();
        Helper::response(['data' => $result]);
    }

    // get http://yaf.com/Shop/Shop/info/id/12
    // post http://yaf.com/Shop/Shop/info/      {id:2}
    public function infoAction(){
        $id = intval($this->getPost('id'));
        if(!$id){
            $this->response('ERR_MISSING');
        }
        //$info = $this->m_shop->getInfo($id);
        //$info = $this->m_shop->getNameById($id);
        //$info = $this->m_shop->getName($id);
        //$info = $this->m_shop->getAll();
        //$info = $this->m_shop->getAll(['city' => 4]);
        //$info = $this->m_shop->getAll('id < 4 and city > 4');
        //$info = $this->m_shop->getAll(['city'=>1, 'updatedAt'=>1453882064]);
        //$info = $this->m_shop->count();
        //$info = $this->m_shop->count('id < 4 and city > 4');
        //$info = $this->m_shop->count(['city' => 4]);

        $sql = 'select * from cpx_shop';
        $info = $this->m_shop->getInfoBySql($sql);

        $rep['code'] = 1;
        $rep['msg'] = 'ok';
        $rep['data'] = $info;

        Helper::response($rep);
    }

    // http://yaf.com/Shop/Shop/update/  {id:1,name:'test'}
    public function updateAction(){
        $id = intval($this->getPost('id'));
        $param['name'] = $this->getPost('name');  //默认对name进行字符串过滤   getPost('name', false) 不过滤
        $param['updatedAt'] = CUR_TIMESTAMP;

        //$result = $this->m_shop->edit($id, $param);
        //$result = $this->m_shop->editByWhere($param, ['id' => 1]);
        //$result = $this->m_shop->editByWhere($param, 'id > 17');
        //$result = $this->m_shop->editByWhere($param, 'id > 14 and province = 11');
        $result = $this->m_shop->editByWhere($param, ['province' => 11, 'city' =>13]);

        $rep['code'] = 1;
        $rep['msg'] = 'ok';
        $rep['data'] = $result;

        Helper::response($rep);
    }

    // http://yaf.com/Shop/Shop/add/
    public function addAction(){

        $param['name'] = $this->getPost('name');  //默认对name进行字符串过滤   getPost('name', false) 不过滤
        $param['province'] = $this->getPost('province');
        $param['city'] = $this->getPost('city');
        $param['createdAt'] = CUR_TIMESTAMP;
        $param['updatedAt'] = CUR_TIMESTAMP;

        //$result = $this->m_shop->add($param);
        $result = $this->m_shop->addList([['name'=>'aa','createdAt' => 123, 'updatedAt' => 456], ['name'=>'bb','createdAt' => 123, 'updatedAt' => 456]]);

        $rep['code'] = 1;
        $rep['msg'] = 'ok';
        $rep['data'] = $result;

        Helper::response($rep);
    }

    // http://yaf.com/Shop/Shop/del/
    public function delAction(){

        $id = $this->getPost('id');

        //$result = $this->m_shop->del($id);
        //$result = $this->m_shop->delByWhere(['id' => 22]);
        $result = $this->m_shop->delByWhere('id > 18');

        $rep['code'] = 1;
        $rep['msg'] = 'ok';
        $rep['data'] = $result;

        Helper::response($rep);
    }
}