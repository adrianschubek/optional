<?php
/**
 * Copyright (c) 2020. Adrian Schubek
 * https://adriansoftware.de
 */

namespace adrianschubek\Support;

function optional($val, callable $fun = null)
{
    if ($fun === null) {
        return new Optional($val);
    }

    if ($val !== null) {
        return $fun($val);
    }

    return null;
}