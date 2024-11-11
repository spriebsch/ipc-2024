<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
                'spriebsch\\ipc\\carrier' => '/Carrier.php',
                'spriebsch\\ipc\\cell' => '/Cell.php',
                'spriebsch\\ipc\\cruiser' => '/Cruiser.php',
                'spriebsch\\ipc\\hitshotresult' => '/HitShotResult.php',
                'spriebsch\\ipc\\ship' => '/Ship.php'
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ . $classes[$cn];
        }
    },
    true,
    false
);
// @codeCoverageIgnoreEnd
