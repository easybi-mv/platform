<?php

namespace Oro\Bundle\ApiBundle\Processor\Shared;

use Oro\Bundle\ApiBundle\Config\Extra\MaxRelatedEntitiesConfigExtra;
use Oro\Bundle\ApiBundle\Processor\Context;
use Oro\Component\ChainProcessor\ContextInterface;
use Oro\Component\ChainProcessor\ProcessorInterface;

/**
 * Sets the maximum number of related entities that can be retrieved.
 */
class SetDefaultMaxRelatedEntities implements ProcessorInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContextInterface $context)
    {
        /** @var Context $context */

        if (!$context->hasConfigExtra(MaxRelatedEntitiesConfigExtra::NAME)) {
            $context->addConfigExtra(
                new MaxRelatedEntitiesConfigExtra($this->getDefaultRelatedEntitiesLimit())
            );
        }
    }

    /**
     * @return int
     */
    protected function getDefaultRelatedEntitiesLimit()
    {
        return 100;
    }
}
