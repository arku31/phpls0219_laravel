<?php
/**
 * Created by PhpStorm.
 * User: private
 * Date: 14.03.19
 * Time: 19:26
 */

namespace App\Services;


class BookService
{
    public function getRandomBookNumber()
    {
        return rand(0, 99);
    }
}