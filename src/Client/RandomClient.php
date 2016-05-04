<?php
/**
 * File RandomClient.php
 */

namespace Tebru\Random\Client;

use Tebru\Retrofit\Annotation\GET;
use Tebru\Retrofit\Annotation\Query;
use Tebru\Retrofit\Annotation\Returns;

/**
 * Interface RandomClient
 *
 * @author Nate Brunette <n@tebru.net>
 */
interface RandomClient
{
    /**
     * Get a random number
     *
     * @param int $min
     * @param int $max
     * @param int $base
     * @param int $num
     * @param int $col
     * @param string $format
     * @param string $rnd
     * @return string
     *
     * @GET("/integers")
     * @Query("min")
     * @Query("max")
     * @Query("base")
     * @Query("num")
     * @Query("col")
     * @Query("format")
     * @Query("rnd")
     * @Returns("raw")
     */
    public function getRandomNumber(int $min, int $max, int $base = 10, int $num = 1, int $col = 1, string $format = 'plain', string $rnd = 'new');
}
