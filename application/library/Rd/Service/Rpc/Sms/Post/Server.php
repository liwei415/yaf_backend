<?php
namespace Rd\Service\Rpc\Sms\Post;
use Thrift\ClassLoader\ThriftClassLoader;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TPhpStream;
use Thrift\Transport\TBufferedTransport;

require_once realpath(dirname(__FILE__)) . '/gen-php/rpc/sms/post/Post.php';
require_once realpath(dirname(__FILE__)) . '/gen-php/rpc/sms/post/Types.php';

class Server {

    public function run() {

        $handler = new \Rd\Service\Rpc\Sms\Post\Handler();
        $processor = new \rpc\sms\post\PostProcessor($handler);

        $transport = new TBufferedTransport(new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W));
        $protocol = new TBinaryProtocol($transport, true, true);

        $transport->open();
        $processor->process($protocol, $protocol);
        $transport->close();
    }


}
