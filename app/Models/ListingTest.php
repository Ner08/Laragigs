<?php

namespace App\Models;

class Listing
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => '
              Andrej Dragojevic is an incredible self-paced curriculum that consists of the
            best resources for learning programming on the web! It was an invaluable resource on my path to a becoming a software developer.'
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => '
            Andrej Dragojevic is an incredible self-paced curriculum that consists of the
             best resources for learning programming on the web! It was an invaluable resource on my path to a becoming a software developer.'
            ]
            ,
            [
                'id' => 3,
                'title' => 'Listing Three',
                'description' => '
            Andrej Dragojevic is an incredible self-paced curriculum that consists of the
             best resources for learning programming on the web! It was an invaluable resource on my path to a becoming a software developer.'
            ]
        ];
    }

    public static function find($id)
    {
        $listings = self::all();

        foreach ($listings as $listing) {
            if ($listing["id"] == $id) {
                return $listing;
            }
        }
    }
}
