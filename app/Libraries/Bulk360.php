<?php
class bulk360{
    var $user   = 'API_KEY';
    var $pass   = 'API_SECRET';
    var $from   = '66688';
    var $to;
    var $text;

    var $url    = 'https://sms.360.my/gw/bulk360/v3_0/send.php';

    function __construct() {
        $this->user = urlencode($this->user);
        $this->pass = urlencode($this->pass);

        $this->url = $this->url . "?user=$this->user&pass=$this->pass&from=$this->from";
    }

    function sendsms($to, $text) {
        $this->url = $this->url . "&to=".$to."&text=".rawurlencode($text);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $sentResult = curl_exec($ch);
        if ($sentResult == FALSE) {
            echo 'Curl failed for sending sms to crm.. '.curl_error($ch);
        }
        curl_close($ch);

        echo 'sentResult = ' . $sentResult;
    }
}

?>