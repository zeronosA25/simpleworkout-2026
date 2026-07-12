<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Pexels API Configuration
    |--------------------------------------------------------------------------
    |
    | Pexels provides free stock photos via their REST API.
    | Register at https://www.pexels.com/api to get your API key.
    | Rate limit: 200 requests/hour, 20,000 requests/month.
    |
    */

    'api_key' => env('PEXELS_API_KEY'),

    'default_per_page' => env('PEXELS_PER_PAGE', 9),

    'default_locale' => env('PEXELS_LOCALE', 'id-ID'),

];
