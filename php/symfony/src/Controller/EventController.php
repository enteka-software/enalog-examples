<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use EnaLog\EnaLogClient;
use EnaLog\EnaLogEventException;

class EventController
{
    #[Route('/hello-world')]
    public function helloWorld(): JsonResponse
    {
        try {
            $enalog = new EnaLogClient('api-token-goes-here');

            $enalog->pushEvent([
                'project' => 'test-project',
                'name' => 'hello-from-php',
                'tags' => ['hello', 'world'],
                'meta' => ['php' => 'test'],
                'user_id' => '1234'
            ]);
        } catch (EnaLogEventException $e) {
            print($e);
        }

        return new JsonResponse(
            array('hello' => 'world')
        );
    }
}
