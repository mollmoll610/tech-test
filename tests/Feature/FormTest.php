<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class FormTest extends TestCase
{
    public function test_valid_submission_calls_api_and_shows_thanks(): void
   {
       Http::fake(['*' => Http::response([], 200)]);

       $this->post(route('submit'), [
           'first_name' => 'Test',
           'last_name' => 'User',
           'email' => 'test@example.com',
           'phone' => '07123 456789',
           'date_of_birth' => '1990-01-01',
           'marketing_consent' => '1',
       ])->assertRedirect(route('success'));

       Http::assertSent(fn ($request) =>
           $request->hasHeader('Authorization', 'Bearer ' . config('services.customer_api.token'))
           && $request['email'] === 'test@example.com'
           && $request['marketing_consent'] === true
       );
   }

   public function test_api_failure_returns_to_form_with_input(): void
   {
       Http::fake(['*' => Http::response([], 500)]);

       $this->from(route('home'))->post(route('submit'), [
           'first_name' => 'Test',
           'last_name' => 'User',
           'email' => 'test@example.com',
           'phone' => '07123 456789',
           'date_of_birth' => '1990-01-01',
       ])->assertRedirect(route('home'))
         ->assertSessionHas('error')
         ->assertSessionHasInput('first_name', 'Test');
   }

   public function test_invalid_submission_does_not_call_api(): void
   {
       Http::fake();

       $this->post(route('submit'), [])->assertSessionHasErrors();

       Http::assertNothingSent();
   }
}
