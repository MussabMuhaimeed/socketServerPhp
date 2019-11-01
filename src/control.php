<?php
namespace control;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class admin implements MessageComponentInterface {

    private $clients;

    public function __construnct() {
        $this->clients = array();
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients[] = $conn;
       /* foreach($this->clients as $client) //loop on clints
        {
            if ($client == $from) {
                $client->send("ready");//ready clients on server 
            }
        }*/
		//$headers = (string)$conn->httpRequest->getHeaders();
		//$ip = (string)$conn->WebSocket->request->getHeader('X-Forwarded-For');
		//echo $headers;
        echo "New Connection";
    }

    public function onMessage(ConnectionInterface $from, $msg) {

        foreach($this->clients as $client) //loop on clints
        {
          /*  if($client !=$from and $client==$to)
            {
                $client->send($upload);
            }*/
            if ($client != $from) {
                $client->send($msg);
            }
        }

    }

    public function onClose(ConnectionInterface $conn) {
       /* foreach($this->clients as $client) //loop on clints
        {
            if ($client == $from) {
                $client->send("baye");//leave client server
            }
        }*/
        echo "Connection closed";

    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo $e->getMessage();
        //preview erorr on serve if have erorr on connection client with serve
    }
}
