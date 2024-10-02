<?php

declare(strict_types=1);

/**
 * @return array<string,string>
 * @comment Just for seeding the database
 */
return [
    'display_name' => [
        'admin' => 'Administrator',
        'mode' => 'Moderator',
        'newe' => 'Newbie',
        'nefu' => 'New Full User',
        'fuus' => 'Full User',
        'grus' => 'Great User',
        'gous' => 'Gold User',
        'suus' => 'Super User',
    ],
    'description' => [
        'admin' => 'General site administrator, no daily points limit',
        'mode' => 'Maintains order and peace on the site, can give up to 100 points',
        'newe' => 'New user, has available up to 10 points',
        'nefu' => 'New user with all permissions, can give up to 45 points',
        'fuus' => 'User with all permissions, can give up to 55 points',
        'grus' => 'Great User with all permissions, can give up to 65 points',
        'gous' => 'Gold User, can give up to 75 points',
        'suus' => 'Super User, can give up to 85 points',
    ],
];
