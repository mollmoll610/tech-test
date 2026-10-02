@extends('layouts.app')

@section('title', 'Your details')

@section('content')
    <h1 class="mb-4 text-2xl font-bold">Your details</h1>

    @if (session('error'))
        <div role="alert" class="mb-4 rounded bg-red-100 p-3 text-red-800">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('submit') }}" class="space-y-4">
        @csrf

        <div>
            <label for="first_name" class="block font-medium">First name</label>
            <input id="first_name" name="first_name" type="text"
                   value="{{ old('first_name') }}" required
                   @error('first_name') aria-invalid="true" aria-describedby="first_name_error" @enderror
                   class="w-full rounded border p-2">
            @error('first_name')
                <p id="first_name_error" class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="last_name" class="block font-medium">Last name</label>
            <input id="last_name" name="last_name" type="text"
                   value="{{ old('last_name') }}" required
                   @error('last_name') aria-invalid="true" aria-describedby="last_name_error" @enderror
                   class="w-full rounded border p-2">
            @error('last_name')
                <p id="last_name_error" class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block font-medium">Email address</label>
            <input id="email" name="email" type="email"
                   value="{{ old('email') }}" required
                   @error('email') aria-invalid="true" aria-describedby="email_error" @enderror
                   class="w-full rounded border p-2">
            @error('email')
                <p id="email_error" class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="phone" class="block font-medium">Phone number</label>
            <input id="phone" name="phone" type="tel"
                   value="{{ old('phone') }}" required
                   @error('phone') aria-invalid="true" aria-describedby="phone_error" @enderror
                   class="w-full rounded border p-2">
            @error('phone')
                <p id="phone_error" class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="date_of_birth" class="block font-medium">Date of birth</label>
            <input id="date_of_birth" name="date_of_birth" type="date"
                   value="{{ old('date_of_birth') }}" max="{{ now()->subDay()->toDateString() }}" required
                   @error('date_of_birth') aria-invalid="true" aria-describedby="date_of_birth_error" @enderror
                   class="w-full rounded border p-2">
            @error('date_of_birth')
                <p id="date_of_birth_error" class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="flex items-center gap-2">
                <input type="checkbox" name="marketing_consent" value="1"
                       @checked(old('marketing_consent'))>
                I'm happy to receive marketing emails
            </label>
            @error('marketing_consent')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-white">Submit</button>
    </form>
@endsection