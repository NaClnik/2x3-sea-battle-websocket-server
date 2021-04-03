<?php


namespace App\Controllers;


use App\Services\Test\TestService;
use Core\Base\Abstracts\WebSocketController;

class TestController extends WebSocketController
{
    private TestService $testService;

    public function __construct(TestService $testService)
    {
        $this->testService = $testService;
    } // __construct.

    public function index()
    {
        $this->webSocketDataBundle->getConnection()->send(json_encode($this->webSocketDataBundle->getData()));
    } // index.

    public function second($id)
    {
        $this->webSocketDataBundle->getConnection()->send($id);
    } // index2.

    public function service()
    {
        $this->webSocketDataBundle->getConnection()->send($this->testService->getData());
    } // service.
} // TestController.