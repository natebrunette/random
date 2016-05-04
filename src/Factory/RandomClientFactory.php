<?php
/**
 * File RandomClientFactory.php
 */

namespace Tebru\Random\Factory;

use Exception;
use GuzzleHttp\Client;
use InvalidArgumentException;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Tebru\Random\Client\RandomClient;
use Tebru\Random\Subscriber\ResponseSubscriber;
use Tebru\Retrofit\Adapter\Rest\RestAdapter;
use Tebru\Retrofit\Exception\RetrofitException;
use Tebru\Retrofit\HttpClient\Adapter\Guzzle\GuzzleV6ClientAdapter;

/**
 * Class RandomClientFactory
 *
 * @author Nate Brunette <n@tebru.net>
 */
class RandomClientFactory
{
    /**
     * Create a new random client
     *
     * @return RandomClient
     * @throws InvalidArgumentException
     * @throws Exception
     * @throws RetrofitException
     */
    public static function make()
    {
        $clientAdapter = new GuzzleV6ClientAdapter(new Client());
        $logger = new Logger('random');
        $logger->pushHandler(new StreamHandler(ROOT . '/var/log/random.log'));

        $adapter = RestAdapter::builder()
            ->setBaseUrl('https://random.org')
            ->setClientAdapter($clientAdapter)
            ->setLogger($logger)
            ->addSubscriber(new ResponseSubscriber())
            ->build();

        return $adapter->create(RandomClient::class);
    }
}
