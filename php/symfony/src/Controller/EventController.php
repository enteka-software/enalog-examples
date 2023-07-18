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
            $enalog = new EnaLogClient('7WDHDRRS2IZR1PAQ9JOC54X3');

            $enalog->pushEvent([
                'project' => 'samnewby-dev',
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
