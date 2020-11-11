<?php

namespace App\Repositories\Contracts;

interface EvaluationRepositoryInterface
{
    public function newEvaluationOrder(int $idOrder, int $idClient, array $evaluation);
    public function getEvaluationsByOrder(int $idOrder);
    public function getEvaluationsByClient(int $idClient);
    public function getEvaluationsById(int $id);//recupera uma avaliação espessífica
    public function getEvaluationsByClientIdByOrderId(int $idOrder, int $idClient);//recupera uma avaliação espessífica
}
