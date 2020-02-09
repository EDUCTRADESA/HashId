<?php

declare(strict_types=1);

namespace Pgs\HashIdBundle\Service;

use Symfony\Component\HttpKernel\Event\ControllerEvent;

class DecodeControllerParameters extends AbstractDecodeControllerParameters
{
    public function decodeControllerParameters(ControllerEvent $event): void
    {
        $controller = $event->getController();
        $parametersProcessor = $this
            ->getParametersProcessorFactory()
            ->createControllerDecodeParametersProcessor(...$controller);

        $this->processRequestParameters($event, $parametersProcessor);
        $this->processRequestParametersWithParamConverter($event);
    }
}
