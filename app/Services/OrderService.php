<?php

namespace App\Services;

use App\Repositories\Contracts\{
    OrderRepositoryInterface,
    ProductRepositoryInterface,
    TableRepositoryInterface,
    TenantRepositoryInterface,
};

use Illuminate\Http\Request;

class OrderService
{
    protected $orderRepository, $tenantRepository, $tableRepository, $productRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        TenantRepositoryInterface $tenantRepository,
        TableRepositoryInterface $tableRepository,
        ProductRepositoryInterface $productRepository

    ) {
        $this->orderRepository = $orderRepository;
        $this->tenantRepository = $tenantRepository;
        $this->tableRepository = $tableRepository;
        $this->productRepository = $productRepository;
    }
    /**
     * Retorna todos os pedidos do cliente
     */
    public function orderByClient()
    {
        $idClient = $this->getClientIdByOrder();//Pega o id do Usuário

        return $this->orderRepository->getOrdersByClientId($idClient);
    }

    public function getOrderByIdentify(string $identify)
    {
        return $this->orderRepository->getOrderByIdentify($identify);
    }



    public function createNewOrder(array $order)
    {
        //dd($order['products']);
        $productsOrder = $this->getProductsByOrder($order['products'] ?? []);

        $identify = $this->getIdentifyOrder();
        $total = $this->getTotalOrder($productsOrder);
        $status = 'open';
        $tenantId = $this->getTenantIdByOrder($order['token_company']);
        $comment = isset($order['comment']) ? $order['comment'] : '';
        $clientId = $this->getClientIdByOrder();
        $tableId = $this->getTableIdByOrder($order['table'] ?? '');

        $order = $this->orderRepository->createNewOrder(
            $identify,
            $total,
            $status,
            $tenantId,
            $comment,
            $clientId,
            $tableId
        );

        $this->orderRepository->registerProductsOrder($order->id, $productsOrder);

        return $order;
    }

    /**
     * Metodo que gera  o Identificador
     */
    private function getIdentifyOrder(int $qtyCaraceters = 8)
    {
        $smallLetters = str_shuffle('vafqreeydnfhvimvofpkansfsrqwk');

        $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
        $numbers .= 1234567890;

        //$specialCharacters = str_shuffle('!@#$%*-');
        //$characters = $smallLetters.$numbers.$specialCharacters;
        $characters = $smallLetters.$numbers;

        $identify = substr(str_shuffle($characters), 0, $qtyCaraceters);

        if ($this->orderRepository->getOrderByIdentify($identify)){
            $this->getIdentifyOrder($qtyCaraceters + 1);
        }

        return $identify;
    }


    /**
     * Get products format
     */
    private function getProductsByOrder(array $productsOrder) : array
    {
        $products = [];
        foreach($productsOrder as $productOrder){
            //dd($productOrder['qty']);
            $product = $this->productRepository->getProductByUuid($productOrder['identify']);
            //dd($product);
            array_push($products, [
                'id' => $product->id,
                'qty' => $productOrder['qty'],
                'price'=> $product->price,
            ]);
        }
        //dd($products);
        return $products;
    }

    /**
     * Metodo retorna o Valor Total
     */
    private function getTotalOrder(array $products): float
    {
        $total = 0;

        foreach ($products as $product) {
            $total += ($product['price'] * $product['qty']);
        }

        return (float) $total;
    }


    // Retorna um unico Tenant desse Pedido
    private function getTenantIdByOrder(string $uuid)
    {
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        return $tenant->id;
    }


    // Retorna Table desse Pedido
    private function getTableIdByOrder(string $uuid = '')
    {
        if ($uuid) {
            $table = $table = $this->tableRepository->getTableByUuid($uuid);

            return $table->id;
        }

        return '';
    }


    // Retorna client
    private function getClientIdByOrder()
    {
        return auth()->check() ? auth()->user()->id : '';
    }
}
