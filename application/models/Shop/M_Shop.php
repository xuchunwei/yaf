<?php
/**
 *  Author: xuchunwei
 *  Date: 2016-02-27
 */

class M_Shop extends M_Model{
	
	function __construct(){
		$this->table = TB_PREFIX.'shop';
		parent::__construct();
	}

    /**
     * 获得信息.
     *
     * @param int $id 记录id
     *
     * @return array $info
     */
    public function getInfo($id){
		$where = ['id' => $id, 'status' => 1];
		$info  = $this->Where($where)->SelectOne();
		return $info;
	}

    /**
     * 获得店名字.
     *
     * @param int $id id
     *
     * @return array $info
     */
    public function getNameById($id){
        $field = ['name'];
        $info  = $this->SelectByID($id, $field);
        return $info;
    }

    /**
     * 获得店名字.
     *
     * @param  int $id id
     *
     * @return array $info
     */
    public function getName($id){
        $where = ['id' => $id];
        $field = ['name'];
        $info  = $this->Field($field)->Where($where)->SelectOne();
        return $info;
    }

    /**
     * sql查询.
     *
     * @param string $sql sql语句
     *
     * @return bool|null
     */
    public function getInfoBySql($sql){
        $info  = $this->Query($sql);
        return $info;
    }

    /**
     * 获得所有记录.
     *
     * @param string $where 条件.
     *
     * @return array $allInfo
     */
    public function getAll($where = ''){
        $allInfo  = $this->where($where)->Select();
        return $allInfo;
    }

    /**
     * 获得所有记录.
     *
     * @param string $where 条件.
     *
     * @return int $count
     */
    public function count($where = ''){
        $count  = $this->where($where)->Total();
        return $count;
    }

    /**
     * 修改.
     *
     * @param int $id id
     * @param array $param kv
     *
     * @return mixed  影响行号
     */
    public function edit($id, $param){
        return $this->UpdateByID($param, $id);
    }

    /**
     * 修改.
     *
     * @param array $param kv
     * @param array $where kv
     *
     * @return mixed  影响行号
     */
    public function editByWhere($param, $where){
        return $this->where($where)->Update($param);
    }

    /**
     * 添加.
     *
     * @param array $param kv
     *
     * @return  Null|Id $info
     */
    public function add($param){
        $info  = $this->Insert($param);
        return $info;
    }

    /**
     * 批量添加.
     *
     * @param array $params 二维数组
     *
     * @return Null|id $info
     */
    public function addList($params){
        $info  = $this->MultiInsert($params);
        return $info;
    }

    /**
     * 删除.
     *
     * @param int $id
     *
     * @return int $info 影响行数
     */
    public function del($id){
        $info  = $this->DeleteByID($id);
        return $info;
    }

    /**
     * 删除.
     *
     * @param array $where 条件.
     *
     * @return int $info 影响行数
     */
    public function delByWhere($where){
        //$this->beginTransaction();
        $info  = $this->where($where)->Delete();
//        if ($info) {
//            $this->commit();
//        } else {
//            $this->rollback();
//        }
        return $info;
    }

}