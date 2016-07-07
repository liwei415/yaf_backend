<?php

namespace tutorial\php;

error_reporting(E_ALL);

require_once __DIR__.'/../../../../../../library/Thrift/ClassLoader/ThriftClassLoader.php';

use Thrift\ClassLoader\ThriftClassLoader;

$GEN_DIR = realpath(dirname(__FILE__)).'/gen-php';

$loader = new ThriftClassLoader();
$loader->registerNamespace('Thrift', '../../../../../../library');
$loader->registerDefinition('rpc\sms\post', $GEN_DIR);
$loader->register();

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\THttpClient;
use Thrift\Transport\TBufferedTransport;
use Thrift\Exception\TException;

try {
    $socket = new THttpClient('d.inux.xyz', 80, '/rpc/sms');

    $transport = new TBufferedTransport($socket, 1024, 1024);
    $protocol = new TBinaryProtocol($transport);
    $client = new \rpc\sms\post\PostClient($protocol);

    $req = new \rpc\sms\post\Request();
    $req->version = '2.1.2';
    $req->method = 'post';
    $req->source = 'pc';

    $req->data = new \rpc\sms\post\RequestData();
    $req->data->ophone = '13999999999';
    $req->data->iphone = '13888888888';
    $req->data->content = 'sbsb';
    $req->data->channel = '2';

    $rst = $client->run($req);
    var_dump($rst);

    $transport->close();

} catch (TException $tx) {
    print 'TException: '.$tx->getMessage()."\n";
}

?>
