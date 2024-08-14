<?php
interface AuthObserver{
    function update(Auth $auth, string $event);
}
class Auth
{
    const EVENT_LOGIN = "login";
    const EVENT_LOGOUT = "logout";

    private $observers = [];
    function login()
    {
        $this->notify(self::EVENT_LOGIN);
    }
    function logout()
    {
        $this->notify(self::EVENT_LOGOUT);
    }
    function attach(AuthObserver $observer)
    {
        $this->observers[spl_object_hash($observer)] = $observer;
    }
    function detach(AuthObserver $observer)
    {
        unset($this->observers[spl_object_hash($observer)]);
    }
    function notify(string $event)
    {
        foreach ($this->observers as $observer) {
            $observer->update($this, $event);
        }
    }
}