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
        echo "New Connection\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        echo $msg;
      //  echo "\n"

        foreach($this->clients as $client) {
            //if ($client != $from) {
                $client->send($msg);
           // }
        }

    }

    public function onClose(ConnectionInterface $conn) {

        //$this->clients->detach($conn);
       // echo "Connection {$conn->resourceId} has disconnected\n";
        echo "\n Connection closed\n";

    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo $e->getMessage();
    }
}
/*
echo array object
foreach ($results as $result) {
    echo $result->type; 
    echo "<br>";
    */