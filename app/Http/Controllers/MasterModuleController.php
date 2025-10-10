<?php

namespace App\Http\Controllers;

use App\Services\MasterModuleService\MasterModuleService;
use Illuminate\Http\Request;

class MasterModuleController extends Controller
{
    private $service;

    public function __construct(
        MasterModuleService $service
    ) {
        $this->service = $service;
    }

    public function store(Request $request)
    {
        $request->validate([

        ]);
    }
}
