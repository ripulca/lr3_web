<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BaseController
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function renderTemplate(string $view, $params = []): Response
    {
        $viewDir = __DIR__ . '/../../public/views/';

        if (!file_exists($viewDir . $view)) {
            throw new \Exception("View '{$view}' not found");
        }

        ob_start();
        require_once $viewDir . $view;
        $content = ob_get_clean();
        return new Response($content);
    }
}