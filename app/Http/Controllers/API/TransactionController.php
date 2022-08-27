<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    public function all()
    {
        $transaction = Transaction::orderBy('tanggal_transaksi', 'ASC')->get();
        $response = [
            'message' => 'List transaksi order by date',
            'data' => $transaction,
        ];
        return response()->json($response, Response::HTTP_OK); //symfony sudah menyediakan code2 response yg banyak
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'products_id' => 'required',
            'jumlah' => 'required',
            'tanggal_transaksi' => 'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $transaction = Transaction::create($request->all());
            $response = [
                'message' => 'Transaction created',
                'data' => $transaction,
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
            $transaction = Transaction::findOrFail($id);
            $transaction->delete();
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
            'products_id' => 'required',
            'jumlah' => 'required',
            'tanggal_transaksi' => 'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $transaction = Transaction::findOrFail($id);
            $transaction->update($validator);
            $response = [
                'message' => 'Transaction has been updated',
                'data' => $transaction,
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed ' . $e->errorInfo
            ]);
        }
    }
}