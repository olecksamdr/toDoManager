<?php
class Telegram{
    public $token;
    
    const BASE_API_URL = 'https://api.telegram.org/bot';
 
    public function setWebHook($hookUrl){
        return $this->sendPost('setWebHook', ['url' => $hookUrl]);
    }

    public function getUpdates(){
        $data = file_get_contents($this->buildUrl('getUpdates'));
        return json_decode($data, true);
    }

    public function sendMessage($chatId, $message, $params = []){
        if(!is_array($params)) {
            $params = array();
        }
 
        $params['chat_id'] = $chatId;
        $params['text'] = strip_tags($message); // Telegram не понимает html-тегов
 
        $url = $this->buildUrl('sendMessage').'?'.http_build_query($params);
 
        $data = file_get_contents($url);
        return json_decode($data, true);
    }
 
    private function sendPost($methodName, $data = []){
        $result = null;
        
        if(is_array($data)){
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, $this->buildUrl($methodName));
            curl_setopt($ch,CURLOPT_POST, count($data));
            curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($data));
            $result = curl_exec($ch);
            curl_close($ch);
        }
        
        return $result;
        
    }
 
    private function buildUrl($methodName){
        return self::BASE_API_URL.$this->token.'/'.$methodName;
    }
    
}
?>