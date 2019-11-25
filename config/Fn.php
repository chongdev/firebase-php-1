<?php

// namespace Fn;

class Fn
{
    public static function http_response(string $url, string $method="GET", array $params=[],int $wait = 3)
    {
        $time = microtime(true);
        $expire = $time + $wait;

        if( strtolower($method)=='get' && !empty($params) ){
            $url .= '?' . http_build_query($params);
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        // curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_VERBOSE, TRUE);

        if( strtolower($method)=='post' && !empty($params) ){
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Accept: */*",
            
            'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImY1OTY0NjMxMDE0Njk4MjgyZjQ0YjBjY2MwYWEzOGI2YWZiMjFjNTIzODhiODQ0OTdmYjUwMzRmZTU3YzkyZDlkYTZkZGZmNTk2YTc4ZWEyIn0.eyJhdWQiOiI1IiwianRpIjoiZjU5NjQ2MzEwMTQ2OTgyODJmNDRiMGNjYzBhYTM4YjZhZmIyMWM1MjM4OGI4NDQ5N2ZiNTAzNGZlNTdjOTJkOWRhNmRkZmY1OTZhNzhlYTIiLCJpYXQiOjE1NzQ0MTA4MTAsIm5iZiI6MTU3NDQxMDgxMCwiZXhwIjoxNjA2MDMzMjEwLCJzdWIiOiI3Iiwic2NvcGVzIjpbXX0.RvX_k3uo7zR1q2y3tMhrrX9fcpJcwJbImYMvikwQ4NA-5A1GOhee7MfDU-HU9GCOnxA0RgPMbfwKroBSvmX_TQxr9uB0siadSmNwY-f6qxbznvP_oP9s4h0iRx7iGvLuMV6H1kEKttOqqVGJxKKilNzRuX39JzzeXYk4_vOM4rjdHDNS-_yLjR4WmN047ShIRwq-Ks70Uz60IPGDxy8EHJKCX8mn1j_5Unl9p99rniTnNND6T3a4VfEFNPpICi9a7JwJu5FCDqLN9ApPQBB3GR1vOkmMFyVstb3JA0MS5626MniNP705XwkdsIJlUy7jwaRowPmxKbY-ySAw-DGZrSGVzh0mLO8FS2aukueuiIgEdzCcxRJzpvoQPjIkXOuqIuPeKh-gAjWkxfs6_T35eWJe7lMz0lnmaxFAutMvNWZmkhT3xMl031lvdi-r2EGrz5i0InN8aZGYx_JXXp6OJMt93MJttmGesKYwIcdLQqURrXKrWZ448304zd_Oj9o9YfDz1898YpiSViVes8sWuAqhFN7k6N_O_9xKeKjqsFz6JsqmI88lr7eoKUAHeAstfylrM6DHtFf7IR62FNIR259VJjvjCYgZM-ylFodm1kdorss34Bj_WQVvMhRHjjy2A2bkPnroenoJsL0OKfw6J4VLDNZua4aoZUeF1xc9VYw',

            'Content-Type: application/json; charset=utf-8'
        ]);


        $response = curl_exec($ch);
        $err = curl_error($ch);
        // $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if( $err ){
            return false;
        }
        else{
            return $response;
        }
    }
}
