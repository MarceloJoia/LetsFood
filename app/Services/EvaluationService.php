<?php

namespace App\Services;

use App\Repositories\Contracts\{
    EvaluationRepositoryInterface,
    OrderRepositoryInterface,
};


class EvaluationService
{
    protected $evaluationRepository, $orderRepository;

    public function __construct(
        EvaluationRepositoryInterface $evaluation,
        OrderRepositoryInterface $orderRepository
    ) {
        $this->evaluationRepository = $evaluation;
        $this->orderRepository = $orderRepository;
    }


    public function createNewEvaluation(string $identifyOrder, array $evaluation)
    {
        $clientId = $this->getIdClient();//recupera Id Cliente
        $order = $this->orderRepository->getOrderByIdentify($identifyOrder);//recupera id da order

        return $this->evaluationRepository->newEvaluationOrder($order->id, $clientId, $evaluation);
    }

    /**
     * Recupera o Id do Clienet
     */
    private function getIdClient()
    {
        return auth()->user()->id;
    }
}
