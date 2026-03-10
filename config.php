<?php
/**
 * Looking Glass Configuration
 * make commands configurable
 */
return [
    'default_lang' => 'zh', // 默认语言
    'bird_socket'  => '/var/run/bird.ctl', // BIRD Socket 路径

    'commands' => [
        'ping' => [
            'bin'    => '/bin/ping',
            'args'   => ' {{HOST}}',
            'type'   => 'text',
            'enabled'=> true
        ],
        'mtr' => [
            'bin'    => '/usr/bin/mtr',
            'args'   => '-n {{HOST}}',
            'type'   => 'text',
            'enabled'=> true
        ],
        'fping' => [
            'bin'    => '/usr/bin/fping',
            'args'   => '-C 100 {{HOST}}',
            'type'   => 'text',
            'enabled'=> true
        ],
        'bgp' => [
            'bin'    => '/usr/sbin/birdc',
            'args'   => '-r -s {{SOCKET}} "show route for {{HOST}} all"',
            'type'   => 'bgp_table',
            'enabled'=> true
        ]
    ]
];
