<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function all()
    {
        $category = Category::orderBy('jenis', 'ASC')->get();
        $response = [
            'message' => 'List category order by jenis',
            'data' => $category,
        ];
        return response()->json($response, Response::HTTP_OK); //symfony sudah menyediakan code2 response yg banyak
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis' => 'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $category = Category::create($request->all());
            $response = [
                'message' => 'Category created',
                'data' => $category,
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
        try{
            $category = Category::findOrFail($id);
            $category->delete();
            $response = [
                'message' => 'Category deleted',
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
            'jenis' => 'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $category = Category::findOrFail($id);
            $category->update($validator);
            $response = [
                'message' => 'Category has been updated',
                'data' => $category,
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed ' . $e->errorInfo
            ]);
        }
    }
}