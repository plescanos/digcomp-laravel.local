<?php

namespace Tests\Feature;

use App\Http\Controllers\DSIController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DSITest extends TestCase
{
    public function test_calculo_dsi()
    {
        $dsi = DSIController::calcular_dsi(11, 6);
        $this->assertEquals(1.8, $dsi);
    }
}
