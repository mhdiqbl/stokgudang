<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function all()
    {
        $product = Product::orderBy('nama_barang', 'ASC')->get();
        $response = [
            'message' => 'List product order by name',
            'data' => $product,
        ];
        return response()->json($response, Response::HTTP_OK); //symfony sudah menyediakan code2 response yg banyak
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'string|required',
            'stok' => 'required',
            'categories_id' => 'exists:categories,id'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $product = Product::create($request->all());
            $response = [
                'message' => 'Product created',
                'data' => $product,
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed ' . $e->errorInfo
            ]);
        }
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        try{
            $product->delete();
            $response = [
                'message' => 'Product deleted',
            ];
            return response()->json($response, Response::HTTP_OK);
        }catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed ' . $e->errorInfo
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'string|required',
            'stok' => 'required',
            'categories_id' => 'exists:categories,id'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $product = Product::findOrFail($id);
            $product->update($validator);
            $response = [
                'message' => 'Product has been updated',
                'data' => $product,
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed ' . $e->errorInfo
            ]);
        }
    }
}