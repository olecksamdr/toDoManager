<?php
class User {
    protected $_update = array();
    protected $_data = array();
    protected $db;
    function __construct($id_or_arrayToCache = false){
        $this->db = DB::connect();
        if ($id_or_arrayToCache === false) {
            $this->guest_init();
        } elseif (is_array($id_or_arrayToCache)) {
            $this->_usersFromCache($id_or_arrayToCache);
            $this->guest_init();
        } else {
            $this->_user_init($id_or_arrayToCache);
        }
    }
    public function userUpdate($ipp, $email){
        $sqlForUpdate = "UPDATE `users` SET `ipp` = ?, `email` = ? WHERE `id` = ? LIMIT 1";
        $userUpdate = DB::connect()->prepare($sqlForUpdate);
        $userUpdate->execute(Array($ipp, $email, $this->id));
        return $userUpdate;
    }
    function getCustomData($fields = array()){
        $data = array();
        $default = array('id');
        $skip = array('password');
        $options = array_merge($default, $fields);

        foreach ($options as $key) {
            if (in_array($key, $skip)) {
                continue;
            }
            $data[$key] = $this->$key;
        }
        return $data;
    }
    protected function _user_init($id) {

        $users = $this->_usersFromCache($id);
        if (array_key_exists($id, $users))
            $this->_data = $users[$id];
    }

    protected function _usersFromCache($get_users_by_id){
        static $cache = array();
        $get_users_by_id = array_unique((array)$get_users_by_id);

        $users_from_mysql = array();
        $users_return = array();

        foreach ($get_users_by_id AS $id_user) {
            if (array_key_exists($id_user, $cache))
                $users_return[$id_user] = $cache[$id_user];
            else
                $users_from_mysql[] = (int)$id_user;
        }

        if ($users_from_mysql) {
            if (!isset($get_user_res)) {
                $get_user_res = $this->db->prepare("SELECT * FROM `users` WHERE `id` IN (?)");
            }
            $get_user_res->execute(Array(implode(',', $users_from_mysql)));

            while ($user_data = $get_user_res->fetch()) {
                $id_user = $user_data['id'];
                $users_return[$id_user] = $cache[$id_user] = $user_data;
            }
        }

        return $users_return;
    }

    function __get($n){
        switch ($n) {
            case 'ipp' :
                return $this->_data ['ipp'];
            case 'email' :
                return $this->_data ['email'];
            default :
                return !isset($this->_data [$n]) ? false : $this->_data [$n];
        }
    }
    public function __set($n, $v){
        if (empty($this->_data ['id']))
            return;

        if (isset($this->_data [$n])) {
            $this->_data [$n] = $v;
            $this->_update [$n] = $v;
        } else {
            trigger_error(__('Поле "%s" не существует', $n));
        }
    }
    public function save_data(){
        if ($this->_update) {
            $sql = array();
            foreach ($this->_update as $key => $value) {
                $sql[] = "`" . $key . "` = " . DB::connect()->quote($value);
            }
            DB::connect()->query("UPDATE `users` SET " . implode(', ', $sql) . " WHERE `id` = '" . $this->_data ['id'] . "' LIMIT 1");
            $this->_update = array();
        }
    }
    function __destruct(){
        $this->save_data();
    }
}
?>