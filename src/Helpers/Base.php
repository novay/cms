<?php 

use Composer\InstalledVersions;

if(!function_exists('themes')) {
    function themes() {
        $composerLockPath = base_path('composer.lock');
        $composerData = json_decode(\File::get($composerLockPath), true);

        $themes = [];
        foreach ($composerData['packages'] as $package) {
            if (str_starts_with($package['name'], 'nue-template/')) {

                $themeDir = base_path('vendor/' . $package['name']);
                $themeJsonPath = $themeDir . '/theme.json';

                if (\File::exists($themeJsonPath)) {
                    $themeData = json_decode(\File::get($themeJsonPath), true);

                    $themes[str_replace('nue-template/', '', $package['name'])] = [
                        'name' => $themeData['name'] ?? $package['name'],
                        'description' => $themeData['description'] ?? 'No description provided',
                        'author' => $themeData['author'] ?? 'Unknown',
                        'screenshot' => $themeData['screenshot'] ?? 'screenshot.png'
                    ];
                }
            }
        }

        return $themes;
    }
}

if(!function_exists('active_theme')) {
    function active_theme() {
        return settings()->group('cms')->get('theme', config('cms.theme'));
    }
}

if (!function_exists('timezones')) {
    function timezones() {
        $timezones = timezone_identifiers_list();
        $formattedTimezones = [];

        foreach ($timezones as $timezone) {
            $now = new DateTime('now', new DateTimeZone('UTC'));

            $timezoneObject = new DateTimeZone($timezone);
            $offset = $timezoneObject->getOffset($now);

            $hours = intdiv($offset, 3600);
            $minutes = abs($offset % 3600 / 60);
            $formattedOffset = sprintf('%+03d:%02d', $hours, $minutes);

            $formattedTimezones[$timezone] = "($formattedOffset) $timezone";
        }

        return $formattedTimezones;
    }
}


if(!function_exists('highlightDiff')) {
    function highlightDiff($old, $new) {
        $output = '';
        $length = max(strlen($old), strlen($new));

        for ($i = 0; $i < $length; $i++) {
            $oldChar = $old[$i] ?? '';
            $newChar = $new[$i] ?? '';

            if ($oldChar !== $newChar) {
                $output .= '<span class="bg-yellow-200">' . ($newChar ?: '') . '</span>';
            } else {
                $output .= $newChar;
            }
        }

        return $output;
    }
}

function beautifyTrace($trace) {
    if (is_string($trace)) {
        $trace = json_decode($trace, true); // Decode jika berbentuk JSON
    }

    // Jika setelah decode, tetap bukan array, kembalikan error
    if (!is_array($trace)) {
        return 'Invalid trace format';
    }

    // Lanjutkan seperti biasa jika $trace adalah array
    $output = '<div class="beautifier-stacktrace">';
    foreach ($trace as $index => $traceLine) {
        $output .= '<span class="beautifier-stacktrace-line">';
        $output .= '<span class="beautifier-stacktrace-line-number">#' . $index . '</span>';
        if (isset($traceLine['file'])) {
            $output .= '<a class="beautifier-file" href="javascript:" data-href="idelink://' 
                    . urlencode($traceLine['file']) . '">' 
                    . htmlspecialchars($traceLine['file']) 
                    . ' <span class="beautifier-line-number">(' 
                    . $traceLine['line'] . '):</span></a>';
        }
        if (isset($traceLine['function'])) {
            $output .= '<span class="beautifier-stacktrace-line-function">'
                    . htmlspecialchars($traceLine['function']) . '()</span>';
        }
        $output .= '</span>';
    }
    $output .= '</div>';
    return $output;
}
