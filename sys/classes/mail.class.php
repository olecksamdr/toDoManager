<?php

class Mail {
	static function sendOfMail($to, $title, $content){
        $EOL = "\r\n";
        $headers = "From: \"toDoManager\" <toDo@{$_SERVER['HTTP_HOST']}>$EOL";
        $headers .= "Subject: $title$EOL";
        $headers .= "Mime-Version: 1.0$EOL";
        $headers .= "Content-Type: text/html; charset=\"utf-8\"$EOL";
        return mail($to, '=?utf-8?B?' . base64_encode($title) . '?=', $content, $headers);
    }
}