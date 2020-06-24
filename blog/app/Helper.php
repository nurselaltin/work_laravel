<?php

function is_active($url, $className = 'active'){

    return request()->is($url) ? $className : null ;
}
