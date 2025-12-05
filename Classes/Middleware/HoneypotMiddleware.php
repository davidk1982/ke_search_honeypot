<?php

declare(strict_types=1);

namespace DavidKohr\KeSearchHoneypot\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use TYPO3\CMS\Core\Http\Response;

/**
 * Class HoneypotMiddleware
 * @package DavidKohr\KeSearchHoneypot\Middleware
 */
class HoneypotMiddleware implements MiddlewareInterface, LoggerAwareInterface {

    use LoggerAwareTrait;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface {

        // Only check POST requests (form submissions)
        if ($request->getMethod() !== 'POST') {
            return $handler->handle($request);
        }

        $parsedBody = $request->getParsedBody();
        $kesearchParams = $parsedBody["tx_kesearch_pi1"] ?? null;
        
        // Check if this is a ke_search form submission
        if (!is_array($kesearchParams)) {
            return $handler->handle($request);
        }

        // Check honeypot field
        $honeypot = $kesearchParams["__hp"] ?? null;
        
        // If honeypot field is missing or filled, it's spam
        if (!isset($honeypot) || !empty($honeypot)) {
            return new Response(403);
        }

        return $handler->handle($request);
    }
}
