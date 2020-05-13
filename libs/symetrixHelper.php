<?php

/**
 * Helps converting Symetrix volume levels
 * @param String $inputLevel defines the source of volume level
 * @param Int $level the level that needs to be converted
 * 
 * @return Int the converted volume level
 * 
 */

function symetrix_CalculateVolumeLevel (String $inputLevel, $level) {
    $delta = 65535 / 100;
    $inputLevel = strtolower ($inputLevel);

    switch ($inputLevel) {
        case 'symetrix':
            // Symetrix: 0 - 65535
            $value = ((float)$level / (float)$delta);
            return round ($value);
            break;
        case 'symcon':
            // 0 - 100
            $value = ($level * $delta);
            return round ($value);
            break;
    }
}