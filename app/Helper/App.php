<?php

use App\Models\Rate;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Geocode\Country;

function isNestedArray($array): bool
{
    if (!is_array($array)) {
        return false; // Not an array
    }

    foreach ($array as $element) {
        if (is_array($element)) {
            return true; // Found a nested array
        }
    }

    return false; // No nested array found
}


if (!function_exists('createCode')) {
    function createCode()
    {
        return rand(1000, 9999);
    }
}

if (!function_exists('isNestedArray')) {
    function isNestedArray($array): bool
    {
        if (!is_array($array)) {
            return false; // Not an array
        }

        foreach ($array as $element) {
            if (is_array($element)) {
                return true; // Found a nested array
            }
        }

        return false; // No nested array found
    }
}


if (!function_exists('v_image')) {
    function v_image($ext = null): string
    {
        return ($ext === null) ? 'mimes:jpg,jpeg,png,gif,bmp' : 'mimes:' . $ext;
    }
}

//if (!function_exists('generateQrCode')) {
//    function generateQrCode($data = null, $size = 30): string
//    {
//        $base = '';
//        if ($data) {
//            $image = time() . '.svg';
//
//            QrCode::size($size)
//                ->format('svg')
//                ->generate($data, $image);
//
//            $base = svgToBase64($image);
//            unlink($image);
//        }
//        return '<img src="' . $base . '"/>';
//    }
//}
//


if (!function_exists('resolveLang')) {
    function resolveLang($name)
    {
        if (is_array($name)) {
            $result = $name[app()->getLocale()];
            if (!$result) {
                $result = $name[(app()->getLocale() === 'en') ? 'ar' : 'en'];
            }

            return $result;
        }

        return $name;
    }
}



if (!function_exists('getFileDir')) {
    function getFileDir(): string
    {
        return (app()->getLocale() === 'en') ? '' : 'rtl.';
    }
}

if (!function_exists('userRoot')) {
    function userRoot()
    {
        return User::find(1);
    }
}

if (!function_exists('activeMenu')) {

    function activeMenu($index, ...$name): string
    {

        foreach ($name as $item) {
            if (request()->segment($index) == $item) {
                return 'menu-item-active';
            }
        }

        return "";
    }
}


if (!function_exists('errorMessage')) {
    function errorMessage($message = null)
    {
        $message = _trans('admin/dashboard.something_error') . '' . (true ? " : $message" : '');

        return request()->expectsJson()
            ? response()->json(['message' => $message], 400)
            : redirect()->back()->with(['status' => 'error', 'message' => $message]);
    }
}

if (!function_exists('successMessage')) {
    function successMessage($message = 'success')
    {
        return request()->expectsJson()
            ? response()->json(['message' => $message])
            : redirect()->back()->with(['status' => 'success', 'message' => $message]);
    }
}


if (!function_exists('utf8_strrev')) {
    function utf8_strrev($str = null): ?string
    {
        if ($str) {
            preg_match_all('/./us', $str, $ar);
            return join('', array_reverse($ar[0]));
        }
        return null;

    }
}

function svgToBase64($filepath)
{
    if (file_exists($filepath)) {

        $filetype = pathinfo($filepath, PATHINFO_EXTENSION);

        if ($filetype === 'svg') {
            $filetype .= '+xml';
        }

        $get_img = file_get_contents($filepath);
        return 'data:image/' . $filetype . ';base64,' . base64_encode($get_img);
    }
}


if (!function_exists('resolveDateTime')) {
    function resolveDateTime($date, $time): Carbon
    {
        try {
            if (is_null($date)) {
                $date = carbon()->now()->toDateString();
            }

            $date = new DateTime($date . ' ' . $time);
        } catch (Exception $ex) {
            $time = date('H:i', mktime(0, 0, $time));
            $date = new DateTime($date . ' ' . $time);
        }

        $new_time = $date->format('Y-m-d H:i');

        return Carbon::parse($new_time);
    }
}

if (!function_exists('diffInMinutesHelper')) {
    function diffInMinutesHelper($start_time, $end_time)
    {
        $interval = $start_time->diff($end_time);
        $hours = $interval->format('%h');
        $minutes = $interval->format('%i');
        return $hours * 60 + $minutes;
    }
}

if (!function_exists('dateFormat')) {
    function dateFormat($date, $format = 'y-m-d'): string
    {
        return !is_numeric($date)
            ? Jenssegers\Date\Date::parse($date)->format($format)
            : '----';
    }
}

if (!function_exists('timeFormat')) {
    function timeFormat($time): ?string
    {
        if ($time == null) {
            return null;
        }

        return Jenssegers\Date\Date::parse($time)->format('h:i:s');
    }
}

if (!function_exists('resolveLang')) {
    function resolveLang($name)
    {
        if (is_array($name)) {
            $result = $name[getLang()];
            if (!$result) {
                $result = $name[(getLang() === 'en') ? 'ar' : 'en'];
            }

            return $result;
        }
        return $name;
    }
}

if (!function_exists('getFileDir')) {
    function getFileDir(): string
    {
        return (getLang() === 'en') ? '' : 'rtl.';
    }
}

if (!function_exists('unKnownError')) {
    function unKnownError($message = null)
    {
        $message = _trans('admin/dashboard.something_error') . '' . (env('APP_DEBUG') ? " : $message" : '');

        return request()->expectsJson()
            ? response()->json(['message' => $message], 400)
            : redirect()->back()->with(['status' => 'error', 'message' => $message])->withInput(request()->all());
    }
}

if (!function_exists('resolvePhoto')) {
    function resolvePhoto($image = null, $type = 'none')
    {
        $result = ($type == 'admin'
            ? asset('dashboard_assets/media/avatar.png')
            : asset('assets/images/logo/logo_footer.png'));

        if (is_null($image)) {
            return $result;
        }

        if (Str::startsWith($image, 'http')) {
            return $image;
        }

        return Storage::exists($image)
            ? Storage::url($image)
            : $result;

    }
}
if (!function_exists('resolveLogo')) {
    function resolveLogo($logo)
    {
        if ($logo === null) {

            return asset('dashboard_assets/logo.png');
        }
        return Storage::disk('public')->exists($logo)
            ? Storage::disk('public')->url($logo)
            : asset('dashboard_assets/logo.png');
    }
}
if (!function_exists('getLang')) {
    function getLang(): string
    {
        return app()->getLocale();
    }
}

if (!function_exists('primaryID')) {
    function primaryID($id = null)
    {
        $user = $id ? User::find($id) : auth()->user();
        if (!empty($user)) {
            return $user->parent_id ?? $user->id;
        }
    }
}

if (!function_exists('Primary')) {
    function Primary()
    {
        return auth()->user()->parent_id ? User::find(auth()->user()->parent_id) : auth()->user();
    }
}

if (!function_exists('isRoot')) {
    function isRoot(): bool
    {
        return false;
//        return auth()->id() == 1 && is_null(auth()->user()->parent_id);
    }
}

if (!function_exists('getPermissions')) {

    function getPermissions($user)
    {
        return $user->roles->map(function ($role) {
            return $role->permissions;
        })->collapse();
    }
}

if (!function_exists('active')) {

    function active(...$items): string
    {
        $className = '';

        foreach ($items as $item) {
            if (request()->is("*/$item") || request()->is("*/$item/*")) {
                $className = 'menu-item-active';
                break;
            }
        }
        return $className;
    }
}

if (!function_exists('inputError')) {

    function inputError($name)
    {
        if (session('errors')) {

            return session('errors')->has($name) ? 'is-invalid' : '';
        }
    }
}

if (!function_exists('msgError')) {

    function msgError($name)
    {
        if (session('errors')) {

            return session('errors')->has($name) ? session('errors')->first($name) : '';
        }
    }
}

if (!function_exists('carbon')) {

    function carbon(): \Illuminate\Support\Carbon
    {
        return new \Illuminate\Support\Carbon;
    }
}

if (!function_exists('is_base64')) {
    function is_base64($s): bool
    {
        return (bool)preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $s);
    }
}

if (!function_exists('shortModelName')) {
    function shortModelName($key): string
    {
        $arr = [
            'CarModel' => 'cars',
        ];

        return $arr[$key] ?? $key;
    }
}

if (!function_exists('updateDotEnv')) {
    function updateDotEnv($key, $newValue)
    {
        $path = base_path('.env');

        if (is_bool($newValue)) {
            $newValue = $newValue ? 'true' : 'false';
        }

        if (str_contains(file_get_contents($path), "\n" . $key . '=')) {
            $contents = array_values(array_filter(explode("\n", file_get_contents($path))));
            foreach ($contents as $content) {
                if (str_starts_with($content, $key . '=')) {
                    $delim = '';
                    if (str_contains($content, '"') || str_contains($newValue, ' ') || str_contains($newValue, '#')) {
                        $delim = '"';
                    }
                    file_put_contents(
                        $path, str_replace(
                            $content,
                            $key . '=' . $delim . $newValue . $delim,
                            file_get_contents($path)
                        )
                    );
                }
            }
        } else if (str_contains($newValue, ' ') || str_contains($newValue, '#')) {
            File::append($path, $key . '="' . $newValue . '"' . "\n");

        } else {
            File::append($path, $key . '=' . $newValue . "\n");
        }
    }
}

if (!function_exists('isModuleEnabled')) {
    function isModuleEnabled($moduleName): bool
    {
        $enabledModules = Module::allEnabled();
        foreach ($enabledModules as $module) {
            if (strtolower($module) === strtolower($moduleName)) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('writeTranslation')) {
    function writeTranslation($line, $lang = 'en'): bool
    {
        $content = file(lang_path("$lang/dashboard.php"));
        $lines = array();

        $string = file_get_contents(lang_path("$lang/dashboard.php"));

        if (strpos($string, $line) !== FALSE) {
            return true;
        }

        foreach ($content as $row) {
            $lines[] = $row;
            if (strpos($row, "return [") !== FALSE || strpos($row, "return array(") !== FALSE) {
                $lines[] = $line;
            }
        }

        file_put_contents(lang_path("$lang/dashboard.php"), $lines);

        return true;
    }
}

if (!function_exists('handleTrans')) {
    function handleTrans($trans = '', $return = null)
    {
        if (empty($trans)) {
            return '---';
        }

        $key = Str::snake($trans);

        if ($return == null) {
            $return = $trans;
        }

        return Str::startsWith(__("dashboard.$key"), 'dashboard.') ? $return : __("dashboard.$key");
    }
}

if (!function_exists('handleTransNew')) {
    function handleTransNew($trans = '', $return = null)
    {
        if (empty($trans)) {
            return '---';
        }

        if ($return == null) {
            $return = $trans;
        }

        return Str::startsWith(__("dashboard.$trans"), 'dashboard.') ? $return : __("dashboard.$trans");
    }
}

if (!function_exists('backslashHelper')) {
    function backslashHelper($string)
    {
        $replace_text = str_replace('\\\\', '\\', $string);
        return str_replace('\\', '\\\\', $replace_text);

    }
}

if (!function_exists('backslashHelper')) {
    function backslashHelper($string)
    {
        $replace_text = str_replace('\\\\', '\\', $string);
        return str_replace('\\', '\\\\', $replace_text);

    }
}

if (!function_exists('handelHashPass')) {
    function handelHashPass($string)
    {
        $filter_pass = \Str::before(\Str::after($string, '$/'), '/$');
        return preg_replace('/%-(.*?)-%/', '', $filter_pass);
    }
}

if (!function_exists('handleLength')) {
    function handleLength($maxLength = null): array
    {
        return [10, 25, 50, 100];
    }
}

if (!function_exists('getBaseUrl')) {
    function getBaseUrl($url = null): string
    {
        return ltrim(parse_url($url)['path'], '/');
    }
}

if (!function_exists('sendMessage')) {
    function sendMessage($content, $number = null)
    {
        if (!$number) {
            return true;
        }

        if (env('MESSAGE_ENABLE', false)) {
            $result = Http::post("https://api.yamamah.com/SendSMS", [
                "Code" => env('SMS_CODE', ''),
                "Message" => $content,
                "NotSendIfHaveInvaildMobileNumber" => true,
                "Password" => env('SMS_PASSWORD', ''),
                "RecepientNumber" => phoneHandler($number),
                "Tagname" => env('SMS_TAG_NAME', ''),
                "Username" => env('SMS_USER_NAME', ''),
                "SendDateTime" => 0,
                "EnableDR" => true,
                "VariableList" => "",
            ]);

            return $result->status();
        }
    }
}

if (!function_exists('sendWebMessage')) {
    function sendWebMessage($content, $number = null)
    {
        if (!$number) {
            return true;
        }

        if (env('MESSAGE_ENABLE', false)) {
            $result = Http::post("https://api.yamamah.com/SendSMS", [
                "Code" => env('SMS_CODE', ''),
                "Message" => $content,
                "NotSendIfHaveInvaildMobileNumber" => true,
                "Password" => env('SMS_PASSWORD', ''),
                "RecepientNumber" => phoneHandler($number),
                "Tagname" => env('SMS_TAG_NAME', ''),
                "Username" => env('SMS_USER_NAME', ''),
                "SendDateTime" => 0,
                "EnableDR" => true,
                "VariableList" => "",
            ]);

            return $result->status();
        }

        return true;
    }
}

if (!function_exists('phoneHandler')) {
    function phoneHandler($phoneNumber): string
    {
        $phone = str_replace('+', '', $phoneNumber);
        $phone = str_replace('-', '', $phone);
        $phone = str_replace(' ', '', $phone);

        if (Str::startsWith($phone, '00')) {
            $phone = Str::replaceFirst('00', '', $phone);
        }

        if (Str::startsWith($phone, '01') && strlen(trim($phone)) == 11) {
            $phone = Str::replaceFirst('0', '20', $phone);
        } elseif (Str::startsWith($phone, '0')) {
            $phone = Str::replaceFirst('0', '966', $phone);
        }

        return "+$phone";
    }
}

if (!function_exists('handleDays')) {
    function handleDays($code, $lang = true)
    {
        $days = [
            '1' => 'Saturday',
            '2' => 'Sunday',
            '3' => 'Monday',
            '4' => 'Tuesday',
            '5' => 'Wednesday',
            '6' => 'Thursday',
            '7' => 'Friday',
        ];

        if ($code === 0){
            return $days;
        }


        return $days[$code] ? ($lang ? handleTrans(strtolower($days[$code])) : $days[$code]) : null;
    }
}

if (!function_exists('calcDiscount')) {
    function calcDiscount($price, $discount)
    {
        return ($discount != 0)
            ? round($price * ($discount / 100), 2) : 0;
    }
}

if (!function_exists('remove_empty_lines')) {
    function remove_empty_lines($string): string
    {
        return preg_replace('/^[ \t]*[\r\n]+/m', '', $string);
    }
}


/**
 * @throws Exception
 */
if (!function_exists('detectModelPath')) {
    function detectModelPath($type): string
    {
        return "App\\Models\\" . Str::ucfirst($type);
    }
}

/**
 * @throws Exception
 */
if (!function_exists('prepareModelType')) {
    function prepareModelType($model): string
    {
        return strtolower(Arr::last(explode('\\',$model)));
    }
}

/**
 * @throws Exception
 */
if (!function_exists('getAvgRate')) {
    function getAvgRate($rates): array|float|int
    {
        $avg_rate = 0;
        $sum_rate = 0;
        if ($rates) {
            foreach ($rates as $rat) {
                $sum_rate += $rat->rating;
                $avg_rate = $sum_rate / count($rates);
            }
        }
        return [
            'avg_rate' => round($avg_rate),
            'rate_count' => count($rates),
        ];
    }
}

/**
 * @throws Exception
 */
if (!function_exists('handleRate')) {
    /**
     * @param $type
     * @param $id
     * @return array|float|int
     */
    function handleRate($type, $id): array|float|int
    {
        if ($type == 'service'){
            $services = \App\Models\Service::where('provider_id',$id)->pluck('id')->toArray();
            return getAvgRate(Rate::where('rateable_type', detectModelPath($type))->whereIn('rateable_id', $services)->get());
        }else {
           return getAvgRate(Rate::where(['rateable_type'=>detectModelPath($type),'rateable_id'=>$id])->get());
        }

   }
}

