<?php


namespace App\Http\Controllers;


use Symfony\Component\HttpFoundation\JsonResponse;

class StaffController
{
    public function create(): JsonResponse
    {
        return JsonResponse::fromJsonString('heyyy');
    }
}
