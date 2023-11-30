<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
        {
            Response::macro('soap', function ($data) {
                // Construct your SOAP response XML here (this is a placeholder)
                $xml = '<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:ns="urn:example">
                            <soap:Header/>
                            <soap:Body>
                                <response>' . $data['message'] . '</response>
                            </soap:Body>
                        </soap:Envelope>';

                return response($xml)->header('Content-Type', 'application/xml');
            });
        }
}
