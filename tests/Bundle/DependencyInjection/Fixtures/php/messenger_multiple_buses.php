<?php

$container->loadFromExtension('framework', array('serializer' => true));

$container->loadFromExtension(
    'messenger',
    [
        'default_bus' => 'messenger.bus.commands',
        'buses'       => [
            'messenger.bus.commands' => null,
            'messenger.bus.events'   => [
                'middleware' => [
                    ['with_factory' => ['foo', true, ['bar' => 'baz']]],
                    'allow_no_handler',
                ],
            ],
            'messenger.bus.queries'  => [
                'default_middleware' => false,
                'middleware'         => [
                    'route_messages',
                    'allow_no_handler',
                    'call_message_handler',
                ],
            ],
        ],
    ]
);
