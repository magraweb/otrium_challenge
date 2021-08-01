<?php
 
 $webArray =   [
    '/reports/turn-over-per-brand' => [
        'request-method' => 'GET',
        'action' => 'turnOverPerBrandAction',
        'controller' => 'Reports\\TurnOverReports\\TurnOverReportsController',
    ],

    '/reports/turn-over-per-day' => [
        'request-method' => 'GET',
        'action' => 'turnOverPerDayAction',
        'controller' => 'Reports\\TurnOverReports\\TurnOverReportsController',
    ],

    '/reports/turn-over-per-day-per-brand' => [
        'request-method' => 'GET',
        'action' => 'turnOverPerDayPerBrandAction',
        'controller' => 'Reports\\TurnOverReports\\TurnOverReportsController',
    ]

    ];

return $webArray;
