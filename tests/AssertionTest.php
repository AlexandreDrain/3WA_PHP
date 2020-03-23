<?php

namespace tests;

use PHPUnit\Framework\TestCase;


class AssertionTest extends TestCase {

    public function testDirectory()
    {
        $this->assertDirectoryExists(ROOT_DIR."/app");
        $this->assertDirectoryExists(ROOT_DIR."/app/3WA_PHP");
    }

}