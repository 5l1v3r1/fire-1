<?php

class User {
    private $name; // string
    private $username; // string
    private $email; // string
    private $password; // string
    private $last_password_change; // date
    private $password_expiry_date; // date
    private $password_inactive; // bool
    private $force_password_change; // bool
    private $days_to_change_password; // int
    private $account_expiry_date; // date
    private $home_directory; // string
    private $bandwidth_limit; // float - limita a velocidade de download
    private $download_limit; // float - limita a quantidade de arquivos
    private $last_login; // date

    // fazer uma função para recuperar senha, criando uma nova de forma aleatória e exigir que o cara troque no primeiro acesso.
}