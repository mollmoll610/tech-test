@extends('layouts.app')

@section('title', 'Thank you')

@section('content')
    <h1 class="mb-4 text-2xl font-bold">Thanks, {{ $customer['first_name'] }}!</h1>
    <p class="mb-4">We've received your details:</p>

    <dl class="space-y-2">
        <div>
            <dt class="font-medium">Name</dt>
            <dd>{{ $customer['first_name'] }} {{ $customer['last_name'] }}</dd>
        </div>
        <div>
            <dt class="font-medium">Email</dt>
            <dd>{{ $customer['email'] }}</dd>
        </div>
        <div>
            <dt class="font-medium">Phone</dt>
            <dd>{{ $customer['phone'] }}</dd>
        </div>
        <div>
            <dt class="font-medium">Date of birth</dt>
            <dd>{{ $customer['date_of_birth'] }}</dd>
        </div>
        <div>
            <dt class="font-medium">Marketing</dt>
            <dd>{{ $customer['marketing_consent'] ? 'Yes' : 'No' }}</dd>
        </div>
    </dl>

    <a href="{{ route('home') }}" class="mt-6 inline-block text-blue-600 underline">Back to the form</a>
@endsection