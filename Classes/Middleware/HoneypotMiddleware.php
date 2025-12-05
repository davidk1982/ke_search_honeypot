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
use TYPO3\CMS\Core\Http\Stream;

/**
 * Class HoneypotMiddleware
 * @package DavidKohr\KeSearchHoneypot\Middleware
 */
class HoneypotMiddleware implements MiddlewareInterface, LoggerAwareInterface {

    use LoggerAwareTrait;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface {

        // Check both GET and POST for ke_search form submissions
        $method = $request->getMethod();
        
        if ($method === 'POST') {
            $params = $request->getParsedBody();
        } elseif ($method === 'GET') {
            $params = $request->getQueryParams();
        } else {
            return $handler->handle($request);
        }
        
        $kesearchParams = $params["tx_kesearch_pi1"] ?? null;
        
        // Check if this is a ke_search form submission
        if (!is_array($kesearchParams)) {
            return $handler->handle($request);
        }

        // Check if sword parameter exists
        $hasSword = array_key_exists('sword', $kesearchParams);
        
        if (!$hasSword) {
            // No sword parameter at all - allow navigation
            return $handler->handle($request);
        }

        // Honeypot field MUST be present when searching
        if (!array_key_exists('__hp', $kesearchParams)) {
            // Bot that doesn't render the form or follow links properly
            $body = new Stream('php://temp', 'rw');
            $body->write('Forbidden');
            return new Response($body, 403);
        }

        // Honeypot field must be empty
        $honeypot = $kesearchParams["__hp"];
        
        if (!empty($honeypot)) {
            $body = new Stream('php://temp', 'rw');
            $body->write('Forbidden');
            return new Response($body, 403);
        }

        return $handler->handle($request);
    }
}
