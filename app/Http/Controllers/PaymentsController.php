<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Models\User;
use App\Http\Requests\StorePaymentsRequest;
use App\Http\Requests\UpdatePaymentsRequest;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Получение заявок на выплату
     */
    public function index()
    {
        $payments = Payments::all();

        return response()->json($payments);
    }

    /**
     * Изменение статуса заявки на выплату
     */
    public function change(Request $request)
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
     */
    public function create(Request $request)
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