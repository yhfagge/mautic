<?php

/*
 * @copyright   2019 Mautic, Inc. All rights reserved
 * @author      Mautic, Inc.
 *
 * @link        https://mautic.com
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace MauticPlugin\IntegrationsBundle\Tests\Event;

use MauticPlugin\IntegrationsBundle\Event\MauticSyncFieldsLoadEvent;

class MauticSyncFieldsLoadEventTest extends \PHPUnit_Framework_TestCase
{
    public function testWorkflow()
    {
        $objectName = 'object';
        $fields = [
            'fieldKey' => 'fieldName',
        ];

        $newFieldKey = 'newFieldKey';
        $newFieldValue = 'newFieldValue';

        $event = new MauticSyncFieldsLoadEvent($objectName,$fields);
        $this->assertSame($objectName, $event->getObjectName());
        $this->assertSame($fields, $event->getFields());
        $event->addField($newFieldKey, $newFieldValue);
        $this->assertSame(
            array_merge($fields, [$newFieldKey => $newFieldValue]),
            $event->getFields()
        );
    }
}
