<?php
/**
 * Created by PhpStorm.
 * User: Usuário
 * Date: 02/10/2016
 * Time: 10:39
 */

namespace App\Controller\Api\v1;

use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;

class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['add', 'token','refresh_token']);
    }

    public function add()
    {
        $this->Crud->on('afterSave', function (Event $event) {
            if ($event->subject()->created) {
                $this->set('data', [
                    'id' => $event->subject->entity->id,
                    'token' => JWT::encode(
                        [
                            'sub' => $event->subject->entity->id,
                            'exp' => time() + $this->expirationTime
                        ],
                        Security::salt())
                ]);
                $this->Crud->action()->config('serialize.data', 'data');
            }
        });
        return $this->Crud->execute();
    }

    public function token(){
        $user = $this->Auth->identify();
        if (!$user) {
            throw new UnauthorizedException('Invalid username or password');
        }

        $this->set([
            'success' => true,
            'data' => [
                'token' => JWT::encode([
                    'sub' => $user['id'],
                    'exp' =>  time() + $this->expirationTime
                ],
                    Security::salt())
            ],
            '_serialize' => ['success', 'data']
        ]);
    }

    public function refresh_token(){

    }

}