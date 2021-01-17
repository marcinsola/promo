<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use App\Exceptions\ProductNotFound;
use Illuminate\Validation\ValidationException;

class ProductsController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function create(Request $request): JsonResponse
    {
        try {
            $product = $this->productService->create($request->all());

            return new JsonResponse($product, 201);
        } catch (ValidationException $e) {
            return new JsonResponse([
                $e->validator->errors()
            ], 400);
        } catch (ProductNotFound $e) {
            return new JsonResponse([
                'error' => $e->getMessage(),
            ], 404);
        }
    }

    public function search(Request $request)
    {
        /*
            Nie zdążyłem dopytać przed weekendem, dlatego przyjąłem konwencję odnośnie tego, jak powinien wyglądać request:
            {
                value_name (eg. "colors", "size"): ["value1", "value2", "value3"],
                etc. ...
            }
        */
        try {
            $result = $this->productService->search($request->all());

            return new JsonResponse([
                'count' => count($result),
                'result' => $result,
            ], 200);
        } catch (ValidationException $e) {
            return new JsonResponse([
                $e->validator->errors()
            ], 400);
        }
    }
}
