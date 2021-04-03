<?php


namespace App\Services\Test;


class TestService
{
    private TestRepository $testRepository;

    public function __construct(TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    public function getData()
    {
        return $this->testRepository->getData().'-> '.'TestService';
    }
} // TestService.