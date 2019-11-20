<?php
use Ratchet\Server\IpBlackList;
    use Ratchet\Server\IoServer;
    use Ratchet\Http\HttpServer;
    use Ratchet\WebSocket\WsServer;
    use MyApp\Chat;
    
    require dirname(__DIR__) . '/vendor/autoload.php';
    

    //$blackList = new IpBlackList(new MyChat);
    //$blackList->blockAddress('74.125.226.46');



    $server = IoServer::factory( new HttpServer(  new WsServer( new Chat() )),
                                8080
                                );
    
    $server->run();//run my web socket 
    //this func is void 
