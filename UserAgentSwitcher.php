<?php
/**
 * Created by PhpStorm.
 * Project: user-agent-switcher
 * @author: Evgeny Pynykh bpteam22@gmail.com
 */

namespace bpteam\UserAgentSwitcher;

use bpteam\BigList\JsonList;

class UserAgentSwitcher extends JsonList {

    function __construct($type = 'desktop') {
        $this->path = __DIR__ . '/useragent_list';
        $this->open($type);
    }

}