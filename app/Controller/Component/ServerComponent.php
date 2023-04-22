<?php

class ServerComponent extends Component {

    static function server() {
        $Router = Router::url('/', true);
        if ($Router == "https://192.168.2.4/sentsoft_gh/") {
            $server = "http://192.168.2.4";
        }
        if ($Router == "https://localhost/sentsoft_gh/") {
            $server = "http://192.168.2.4";
        }
        if ($Router == "https://127.0.0.1/sentsoft_gh/") {
            $server = "http://127.0.0.1";
        }
        if ($Router == "https://sentsoft.net/sentsoft/") {
            $server = "https://sentsoft.net";
        }
        if ($Router == "https://sentsoft.net/sentsoft_gh/") {
            $server = "https://sentsoft.net";
        }
        return $server;
    }

}

?>