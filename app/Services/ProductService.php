<?php

namespace App\Services;

use App\Models\Product;
use App\Filters\ProductFilterInterface;
use App\Http\ApiClients\PromoApiClient;
use App\Validators\ProductValidatorInterface;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ProductService extends BaseService
{
    private ProductValidatorInterface $validator;
    private ProductFilterInterface $filter;
    private PromoApiClient $apiClient;

    public function __construct(
        ProductRepositoryInterface $repository,
        ProductValidatorInterface $validator,
        ProductFilterInterface $filter,
        PromoApiClient $apiClient
    ) {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->filter = $filter;
        $this->apiClient = $apiClient;
    }

    public function create(array $data): Product
    {
        $validatedData = $this->validator->validate($data, __FUNCTION__);
        $apiData = $this->apiClient->fetchProductData($validatedData['product_id']);

        return $this->repository->create(
            array_merge($validatedData, $apiData)
        );
    }

    public function search(array $data): Collection
    {
        return $this->filter->filter(
            $this->validator->validate($data, __FUNCTION__)
        );
    }
}
