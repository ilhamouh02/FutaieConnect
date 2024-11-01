<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\Prise;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['status', 'paymentMethod', 'user', 'prise'])->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $statuses = Status::all();
        $paymentMethods = PaymentMethod::all();
        $users = User::all();
        $prises = Prise::all();
        return view('orders.create', compact('statuses', 'paymentMethods', 'users', 'prises'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date_Commande' => 'required|date',
            'date_Paiement' => 'required|date',
            'date_Livraison' => 'required|date',
            'id_Connexion' => 'required|string|max:100',
            'password_Connexion' => 'required|string|max:255',
            'id_demande' => 'required|exists:FTC_status,id_demande',
            'id_Paiement' => 'nullable|exists:FTC_payment_methods,id_Paiement',
            'id_utilisateur' => 'required|exists:FTC_users,id_utilisateur',
            'id_Prise' => 'nullable|exists:FTC_prises,id_Prise',
        ]);

        Order::create($validated);
        return redirect()->route('orders.index')->with('success', 'Commande créée avec succès.');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $statuses = Status::all();
        $paymentMethods = PaymentMethod::all();
        $users = User::all();
        $prises = Prise::all();
        return view('orders.edit', compact('order', 'statuses', 'paymentMethods', 'users', 'prises'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'date_Commande' => 'required|date',
            'date_Paiement' => 'required|date',
            'date_Livraison' => 'required|date',
            'id_Connexion' => 'required|string|max:100',
            'password_Connexion' => 'required|string|max:255',
            'id_demande' => 'required|exists:FTC_status,id_demande',
            'id_Paiement' => 'nullable|exists:FTC_payment_methods,id_Paiement',
            'id_utilisateur' => 'required|exists:FTC_users,id_utilisateur',
            'id_Prise' => 'nullable|exists:FTC_prises,id_Prise',
        ]);

        $order->update($validated);
        return redirect()->route('orders.index')->with('success', 'Commande mise à jour avec succès.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Commande supprimée avec succès.');
    }
}