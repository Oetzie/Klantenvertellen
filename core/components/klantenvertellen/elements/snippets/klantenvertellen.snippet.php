<?php
/**
 * Klantenvertellen
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

$class = $modx->loadClass('KlantenVertellenSnippet', $modx->getOption('klantenvertellen.core_path', null, $modx->getOption('core_path') . 'components/klantenvertellen/') . 'model/klantenvertellen/snippets/', false, true);

if ($class) {
    $instance = new $class($modx);

    if ($instance instanceof KlantenVertellenSnippet) {
        return $instance->run($scriptProperties);
    }
}

return '';