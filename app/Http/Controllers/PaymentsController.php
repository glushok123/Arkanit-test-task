<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Models\User;
use App\Http\Requests\StorePaymentsRequest;
use App\Http\Requests\UpdatePaymentsRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PaymentsController extends Controller
{
    /**
     * Получение заявок на выплату
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $payments = Payments::all();

        return response()->json($payments);
    }

    /**
     * Изменение статуса заявки на выплату
     * 
     * @param Request $request
     */
    public function change(Request $request): JsonResponse
    {
        if (! backpack_auth()->check()) {
            return abort(404);
        }

        $payment = Payments::find($request->id);
        $payment->status = $request->status;
        $payment->save();

        return response()->json([
            'success' => true,
            'message' => 'Статус заявки № ' . $payment->id . ' изменен на "' . $payment->status .'"',
        ]);
    }

    /**
     * Добавление заявки на выплату
     * 
     * @param Request $request
     */
    public function create(Request $request): JsonResponse
    {
        Payments::create([
            'login' => $request->login,
            'requisites' => $request->requisites,
            'amount' => (int) $request->amount,
            'currency' => $request->currency,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Заявка успешно сохранена' ,
        ]);
    }
}