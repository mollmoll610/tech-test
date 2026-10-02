## how to run the solution

Run as usual, using Composer run dev.
Ensure you have your values set up in the .env file under:
- CUSTOMER_API_URL -> the webhook site URL below
- CUSTOMER_API_TOKEN -> the token listed in the README

## decisions or assumptions

- The token lives in .env and is read through config/services.php to keep raw credentials protected.
- validation rules -> I added field-specific messages for clearer messages for invalid formats and required fields.  I added friendly attribute names so default validation messages will use nicer customer facing labels.
- the API call is within a single request in the controller. It uses ::withToken(), a 10s time out and ->throw() to ensure any error responses are handled with an easy to read message and keep ahold of the input.
- once request success, the user is reidrected to the thank you page, also preventing any resubmission on refresh, and the data is flashed to the session so any refreshing afterwards just redirects back to the fresh form.
- any errors or failures get logged without holding any personal data, or the token.

## your webhook.site URL
https://webhook.site/04c21e1f-02c0-4e8d-9af0-a527a5482080

## anything I didn't get to, or would do differently with more time