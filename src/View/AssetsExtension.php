<?php

namespace ByTIC\Assets\View;

use Nip\View\Extensions\AbstractExtension;
use Nip\View\View;
use Nip\View\ViewInterface;

/**
 * Class AssetsExtension
 * @package ByTIC\Assets\View
 */
class AssetsExtension extends AbstractExtension
{
    /**
     * @param ViewInterface|MethodsOverloadingTrait|HasMethodsTrait|View $view
     * @return void
     */
    public function register(ViewInterface $view)
    {
        $view->getCallPipelineBuilder()->add(new HelpersPipelineStage());
        HelpersCollection::getInstance()->setEngine($view);

        $view->addMethod('getHelper', function ($name) {
            return HelpersCollection::getInstance()->getHelper($name);
        });

        $view->addMethod('hasHelper', function ($name) {
            return HelpersCollection::getInstance()->hasHelper($name);
        });
    }
}
