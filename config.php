<?php declare(strict_types=1);
/**
 * Looking Glass Configuration
 * make commands configurable
 */

// 原有基础 UI 配置
const LG_TITLE = 'Looking Glass';
const LG_LOGO = '<h2 style="color: #000000;">Company Looking Glass</h2>';
const LG_LOGO_DARK = '<h2 style="color: #ffffff;">Company Looking Glass</h2>';
const LG_LOGO_URL = 'https://github.com/hybula/lookingglass/';
const LG_THEME = 'auto';
const LG_CHECK_LATENCY = true;
const LG_CSS_OVERRIDES = false;
const LG_CUSTOM_HEAD = false;

// 节点信息
const LG_LOCATION = 'Hangzhou, China';
const LG_MAPS_QUERY = 'Hangzhou, China';
const LG_FACILITY = 'Wulian Data Center';
const LG_FACILITY_URL = 'https://www.peeringdb.com/net/41110';
const LG_IPV4 = '1.1.1.1';
const LG_IPV6 = '2001:4860:4860::8888';

// --- 新增：i18n 配置 ---
const LG_DEFAULT_LANG = 'zh';

// --- 新增：BIRD Socket 配置 ---
const LG_BIRD_SOCKET = '/var/run/bird.ctl';

// --- 整合与扩展：命令执行配置 ---
// 我们保留原有的 LG_METHODS 逻辑，但将其映射到具体的命令执行链
const LG_COMMANDS = [
    'ping' => [
        'bin'     => '/bin/ping',
        'args'    => '-c 4 -W 2 {{HOST}}',
        'type'    => 'text',
        'enabled' => true
    ],
    'ping6' => [
        'bin'     => '/bin/ping6',
        'args'    => '-c 4 -W 2 {{HOST}}',
        'type'    => 'text',
        'enabled' => true
    ],
    'mtr' => [
        'bin'     => '/usr/bin/mtr',
        'args'    => '--gqs -c 1 -rw {{HOST}}',
        'type'    => 'text',
        'enabled' => true
    ],
    'mtr6' => [
        'bin'     => '/usr/bin/mtr',
        'args'    => '-6 --gqs -c 1 -rw {{HOST}}',
        'type'    => 'text',
        'enabled' => true
    ],
    'bgp' => [
        'bin'     => '/usr/sbin/birdc',
        'args'    => '-r -s {{SOCKET}} "show route for {{HOST}} all"',
        'type'    => 'bgp_table',
        'enabled' => true
    ],
    'fping' => [
        'bin'     => '/usr/bin/fping',
        'args'    => '-C 5 -q {{HOST}}',
        'type'    => 'text',
        'enabled' => true
    ],
    // 将原有的 iperf3 整合进来
    'iperf3_incoming' => [
        'bin'     => '/usr/bin/iperf3',
        'args'    => '-4 -c {{HOST}} -p 5201 -P 4',
        'type'    => 'text',
        'enabled' => true
    ],
    'iperf3_outgoing' => [
        'bin'     => '/usr/bin/iperf3',
        'args'    => '-4 -c {{HOST}} -p 5201 -P 4 -R',
        'type'    => 'text',
        'enabled' => true
    ]
];

// Define the methods that can be used by visitors to test it out;
const LG_METHODS = [
    LookingGlass::METHOD_BGP,
    LookingGlass::METHOD_PING,
    LookingGlass::METHOD_PING6,
    LookingGlass::METHOD_MTR,
    LookingGlass::METHOD_MTR6,
    LookingGlass::METHOD_TRACEROUTE,
    LookingGlass::METHOD_TRACEROUTE6,
    LookingGlass::METHOD_IPERF3,
];

// 原有业务逻辑块开关
const LG_BLOCK_NETWORK = true;
const LG_BLOCK_LOOKINGGLASS = true;
const LG_BLOCK_SPEEDTEST = true;
const LG_BLOCK_CUSTOM = false;

// 其他原有配置保持不变...
const LG_LOCATIONS = [
    'Hangzhou' => 'https://lg.hgh.wlstack.com',
];
const LG_SPEEDTEST_FILES = [
    '100M' => 'https://lg.hgh.wlstack.com/100mb.test',
];
const LG_TERMS = false;
