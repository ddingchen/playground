<?php

namespace Tests\Unit;

use App\SortUtil;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SortUtilTest extends TestCase
{
    
    public function test_it_can_sort_in_bubble_sort_way()
    {
        $util = new SortUtil();

        $numbers = $this->sortedNumbers();
        shuffle($numbers);

        $this->assertEquals($this->sortedNumbers(), $util->bubbleSort($numbers));
    }

    private function sortedNumbers()
    {
        return range(0, 9);
    }
}
