<?php

use Illuminate\Support\Facades\Storage;

if(!function_exists('arsort_by_date_key')){
    function arsort_by_date_key (&$array, $key) {
        $sorter = array();
        $ret = array();

        reset($array);

        foreach ($array as $ii => $va) {
            $sorter[$ii] = strtotime($va[$key]);
        }

        arsort($sorter);

        $index_counter = 0;
        foreach ($sorter as $ii => $va) {
            $ret[$index_counter]=$array[$ii];

            $index_counter++;
        }

        $array = $ret;
    }
}

if(!function_exists('asort_by_date_key')){
    function asort_by_date_key (&$array, $key) {
        $sorter = array();
        $ret = array();

        reset($array);

        foreach ($array as $ii => $va) {
            $sorter[$ii] = strtotime($va[$key]);
        }

        asort($sorter);

        $index_counter = 0;
        foreach ($sorter as $ii => $va) {
            $ret[$index_counter]=$array[$ii];

            $index_counter++;
        }

        $array = $ret;
    }
}

/**
 * -- Google Calendar's API --
 */
if(!function_exists('g_calendar_get_client')){
    function g_calendar_get_client()
    {
        $client = new Google_Client();
        $client->setApplicationName('Payroll Calendar');
        $client->setScopes(Google_Service_Calendar::CALENDAR_READONLY);
        $client->setAuthConfig('google_calendar_auth/service_account_credentials.json');
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');
        
        return $client;
    }
}

if(!function_exists('g_calendar_get_holidays')){
    function g_calendar_get_holidays($start, $end)
    {
        $res = [];

        $client = g_calendar_get_client();
        
        $service = new Google_Service_Calendar($client);

        // Print the next 10 events on the user's calendar.
        $calendarId = 'id.indonesian#holiday@group.v.calendar.google.com';
        $optParams = array(
            'orderBy' => 'startTime',
            'singleEvents' => true,
            'timeMin' => date('c', strtotime($start)),
            'timeMax' => date('c', strtotime($end)),
        );

        $results = $service->events->listEvents($calendarId, $optParams);
        $events = $results->getItems();

        if (empty($events)) {
        } else {
            foreach ($events as $event) {
                $start = $event->start->dateTime;
                if (empty($start)) {
                    $start  = $event->start->date;
                    $end    = $event->end->date;
                }
                array_push($res, [
                    'name'  => $event->getSummary(),
                    'date'  => $start
                ]);
            }
        }

        return json_encode([
            'code'          => 200,
            'redirect_url'  => '',
            'data'          => $res
        ]);
    }
}

/**
 * -- Holiday's API --
 */
if(!function_exists('get_holidays')){
    function get_holidays($country_id, $year)
    {
        $API_KEY    = "be9dec92-ed17-42c3-a08a-8e485309e2b9";
        $url        = "https://holidayapi.com/v1/holidays";

        $params = [
            'country'   => $country_id,
            'year'      => $year,
            'language'  => 'id',
            'key'       => $API_KEY
        ];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url . '?' . http_build_query($params));
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        // curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response);
    }
}

?>