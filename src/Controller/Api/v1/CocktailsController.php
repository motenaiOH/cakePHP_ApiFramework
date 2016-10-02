<?php
/**
 * Created by PhpStorm.
 * User: Usuário
 * Date: 01/10/2016
 * Time: 15:57
 */

namespace App\Controller\Api\v1;


class CocktailsController extends AppController{
    public $paginate = [
        'page' => 1,
        'limit' => 5,
        'maxLimit' => 15,
        'sortWhitelist' => [
            'id', 'name'
        ]
    ];
}