<?php

App::uses('Controller', 'Controller');

class AppController extends Controller
{

    public $components = array(
        'Session', 'Server',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'Welcomes', 'action' => 'home'),
            'logoutRedirect' => array('controller' => 'Users', 'action' => 'login'),
            'authorize' => 'Controller'
        )
    );
    public $helpers = array('Html', 'Form', 'Session');
    public $uses = array('Menu', 'SubMenu', 'MenusUser');

    public function beforeFilter()
    {
        $Router = Router::url('/', true);
        $system = "sentsoft_gh";
        //usuario habilitado en sentsoft//
        $token = null;
        //si viene un token nuevo por get//
        if (isset(explode("/", $_SERVER["REQUEST_URI"])[2])) {
            if (explode("/", $_SERVER["REQUEST_URI"])[2] == "Users") {
                if (isset(explode("/", $_SERVER["REQUEST_URI"])[3])) {
                    if (explode("/", $_SERVER["REQUEST_URI"])[3] == "login") {
                        if (isset(explode("/", $_SERVER["REQUEST_URI"])[4])) {
                            $token = (explode("/", $_SERVER["REQUEST_URI"])[4]);
                        }
                    }
                }
            }
        }
        //si viene un token nuevo por get//
        if ($this->Session->read('Auth.User.id') != null) {
            if ($token == null) {
                $token = $this->Session->read('Auth.Token.token');
            }
            $url = ServerComponent::server() . "/sentsoft/Apps/session_external/token/$token/$system";
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array("Accept: application/json"));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($curl);
            $datasearch = json_decode($data, true);
            curl_close($curl);
            if ($datasearch == null) {
                $this->Session->destroy();
                return $this->redirect($this->Auth->logout());
            }
            if ($_SERVER["REQUEST_URI"] == "/sentsoft_gh/") {
                return $this->redirect(array('controller' => 'Welcomes', 'action' => 'home'));
            }
        }
        //usuario habilitado en sentsoft//
        $this->set('menu_items', $this->_menu($this->Session->read('Auth.User.id')));
        $this->set('Router', $Router);
        $this->Auth->allow('login', 'checkUser', 'android');
    }

    function _menu($user_id = null)
    {
        $Menu = array();
        $MenusUserIds = array();
        $submenus = array();
        $MenusUser = $this->MenusUser->find('all', array(
            'recursive' => -1,
            'conditions' => array(
                'MenusUser.user_id' => $user_id
            )
        ));
        if ($MenusUser != null) {
            foreach ($MenusUser as $keyMenusUser => $valueMenusUser) {
                $MenusUserIds[] = $valueMenusUser["MenusUser"]["menu_id"];
                if ($valueMenusUser["MenusUser"]["sub_menu_id"] != null) {
                    $submenus[] = $valueMenusUser["MenusUser"]["sub_menu_id"];
                }
            }
        }
        if ($MenusUserIds != null) {
            $this->Menu->Behaviors->load('Containable');
            $Menu = $this->Menu->find('all', array(
                'recursive' => -1,
                'conditions' => array(
                    'Menu.id' => $MenusUserIds,
                    'Menu.active' => 1
                ),
                'contain' => array(
                    'SubMenu' => array(
                        'conditions' => array(
                            'SubMenu.id' => $submenus,
                            'SubMenu.controller !=' => NULL,
                        ),
                    )
                )
            ));
        }
        return array("Menu" => $Menu);
    }

    public function isAuthorized($user)
    {
        if (isset($user['Rol']['rol']) && $user['Rol']['rol'] === 'admin') {
            return true;
        }
        return true;
    }
}