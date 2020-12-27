<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class Newstest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function   AddNews()
    {
        $response = $this->get("/AddNews");
        $response = $this->post("/AddNews/submit");
    }
}
