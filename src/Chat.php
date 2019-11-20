<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface {

    private $clients;

    public function __construnct() {
        $this->clients = array();
    }

    public function onOpen(ConnectionInterface $conn) {
       // echo $conn;
     //  foreach ($_SERVER as $header => $value) {
      /////  echo "$header: $value <br />\n";
   // } 

        $this->clients[] = $conn;

//echo  $this->clients[0];
       // $conn->$http_response_header->get_Headers();
	//	$headers = $conn->httpRequest->$http_response_header;
		//$ip = (string)$conn->WebSocket->request->getHeader('Cookie');
		//echo $ip;
        echo "New client :)\n";



        //echo "Connection {$conn->resourceId} has disconnected\6";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        echo $msg;
      //  echo "\n"

        foreach($this->clients as $client) {
            if ($client != $from) {
                $client->send($msg);
            }
        }

    }

    public function onClose(ConnectionInterface $conn) {

        //$this->clients->detach($conn);
       // echo "Connection {$conn->resourceId} has disconnected\n";
        echo "\n client closed :(\n";

    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo $e->getMessage();
    }
}




/*
public function onMessage(ConnectionInterface $from, $msg) {
    $numRecv = count($this->clients) - 1;
    echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
        , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');
    foreach ($this->clients as $client) {
        $data = json_decode($msg,true);
        $port = $data['port'];
        $code = json_encode($from);
        if ($port == $client->resourceId) {
            $client->send($msg);
        }
    }
}
    */