<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    public function create()
    {
        return view('index');
    }

    public function store(StoreCustomerRequest $request)
    {
        $customer = $request->validated();
        $customer['marketing_consent'] = $request->boolean('marketing_consent');

        try {
            Http::withToken(config('services.customer_api.token'))
                ->acceptJson()
                ->timeout(10)
                ->post(config('services.customer_api.url'), $customer)
                ->throw();
        } catch (HttpClientException $e) {
            Log::error('Customer API request failed', ['message' => $e->getMessage()]);

            return back()
                ->withInput()
                ->with('error', 'Sorry, something went wrong sending your details. Please try again.');
        }

        return redirect()
            ->route('success')
            ->with('customer', $customer);
    }

    public function thanks()
    {
        $customer = session('customer');

        if (! $customer) {
            return redirect()->route('home');
        }

        return view('thanks', ['customer' => $customer]);
    }

}
