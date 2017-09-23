<?php

namespace Chatkunna;



use Pusher\Pusher;

class Chatkunna
{
    private $pusher;
    private $userId;
    private $event;

    public function __construct($auth_key, $secret, $app_id, $cluster = null)
    {
        /** Set default value for testing. */
        $this->userId = 'my-channel';
        $this->event = 'my-event';

        $options = array(
            'encrypted' => true
        );

        if ($cluster != null) {
            $options['cluster'] = $cluster;
        }
        $this->pusher = new Pusher(
            $auth_key,
            $secret,
            $app_id,
            $options
        );
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setEvent($event)
    {
        $this->event = $event;
    }

    public function sendMessageToUser($to_user_id, $message)
    {
        $this->pusher->trigger($to_user_id, $this->event, array('message' => $message));
    }

    public function sendMessageToMultiUser($to_users_id, $message)
    {
        foreach ($to_users_id as $user_id) {

            $this->pusher->trigger($user_id, $this->event, array('message' => $message));

        }
    }

}