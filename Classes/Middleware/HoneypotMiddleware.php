<?php

declare(strict_types=1);

namespace DavidKohr\KeSearchHoneypot\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use GuzzleHttp\Psr7\Response;

/**
 * Class HoneypotMiddleware
 * @package DavidKohr\KeSearchHoneypot\Middleware
 */
class HoneypotMiddleware implements MiddlewareInterface, LoggerAwareInterface {

    use LoggerAwareTrait;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface {

        $queryParams = $request->getQueryParams();
        $formSubmited = $queryParams["tx_kesearch_pi1"] ?? null;
        $honeypot = $queryParams["tx_kesearch_pi1"]["__hp"] ?? null;

        if ((isset($formSubmited) && (!isset($honeypot)) || !empty($honeypot))) {
            return new Response('403');
        }

        return $handler->handle($request);
    }
}
