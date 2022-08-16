<?php

namespace Tests\Feature;

use Tests\RefreshDatabase;

use Tests\TestCase;

abstract class BaseTest extends TestCase
{
    use RefreshDatabase;

    protected function log($data){
        fwrite(STDERR, print_r($data, TRUE));
    }

}
