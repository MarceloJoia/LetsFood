<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;

class OrderRepository implements OrderRepositoryInterface
{
    protected $entity;

    public function __construct(Order $order)
    {
        $this->entity = $order;
    }


    /**
     * Cadastrar a Ordem no BataBase
     */
    public function createNewOrder(
        string $identify,
        float $total,
        string $status,
        int $tenantId,
        string $comment = '',
        $clientId = '',
        $tableId = ''
    ) {
        $data = [
            'identify' => $identify,
            'total' => $total,
            'status' => $status,
            'tenant_id' => $tenantId,
            'comment' => $comment,
        ];

        if ($clientId) $data['client_id'] = $clientId;
        if ($tableId) $data['table_id'] = $tableId;

        $order = $this->entity->create($data);

        return $order;
    }


    public function getOrderByIdentify(string $identify)
    {
        return $this->entity
                    ->where('identify', $identify)
                    ->first();
    }


    //Quais produtos foram comprados nesse pedido
    public function registerProductsOrder(int $orderId, array $products)
    {
        $orderProducts = [];
        foreach ($products as $product) {
            $orderProducts[$product['id']] = [
                'qty' => $product['qty'],
                'price' => $product['price'],
            ];
        }

        $order = $this->entity->find($orderId);
        $order->products()->attach($orderProducts);

        // $orderProducts = [];
        // foreach ($products as $product) {
        //     array_push($orderProducts, [
        //         'order_id' => $orderId,
        //         'product_id' => $product['id'],
        //         'qty' => $product['qty'],
        //         'price' => $product['price'],
        //     ]);
        // }
        // DB::table('order_product')->insert($orderProducts);
    }

    /**
     * Consultar todas as ordens do Cliente
     */
    public function getOrdersByClientId(int $idClient)
    {
        $orders = $this->entity
                    ->where('client_id', $idClient)
                    ->paginate();

        return $orders;
    }
}
