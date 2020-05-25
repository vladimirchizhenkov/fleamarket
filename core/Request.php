<?php

namespace core;

class Request {

    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';

    private $get;
    private $post;
    private $server;
    private $files;
    private $cookie;
    private $session;

    public function __construct($get, $post, $server, $files, $cookie, $session)
    {
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
        $this->files = $files;
        $this->cookie = $cookie;
        $this->session = $session;
    }

    public function get($key = null)
    {
        if (isset($key)) return $this->get[$key];

        return null;
    }

    public function isPost() : bool
    {
        return $this->server['REQUEST_METHOD'] === self::METHOD_POST;
    }

    public function isGet() : bool
    {
        return $this->server['REQUEST_METHOD'] === self::METHOD_GET;
    }
}