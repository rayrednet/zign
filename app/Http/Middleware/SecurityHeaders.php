<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    // Enumerate unwanted headers
    private $unwantedHeaders = ['X-Powered-By', 'server', 'Server'];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('Content-Security-Policy', "default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval'; style-src 'self' https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/ 'unsafe-inline'; img-src 'self' * data:; font-src 'self' data: ; connect-src 'self'; media-src 'self'; frame-src 'self' platform.twitter.com github.com *.youtube.com *.vimeo.com; object-src 'none'; base-uri 'self'; report-uri ");
        $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');


        return $response;
    }
        /**
     * @param $headerList
     */
    private function removeUnwantedHeaders($headerList)
    {
        foreach ($headerList as $header)
            header_remove($header);
    }
}
