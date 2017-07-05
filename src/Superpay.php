<?php

namespace Nowpics\Superpay;

use Unirest\Request as Http;
use Unirest\Request\Body as HttpBody;

class Superpay
{
    public $url;
    public $codigo;
    public $login;
    public $senha;

    public function __construct($url, $codigo, $login, $senha)
    {
        $this->url = $url;
        $this->codigo = $codigo;
        $this->login = $login;
        $this->senha = $senha;
    }

    public function transaction($transacao, $checkout, $itensDoPedido, $dadosCobranca, $dadosEntrega)
    {
        $headers = [
            'Content-Type' => 'application/json',
            'usuario'      => json_encode([
                'login' => config('superpay.login'),
                'senha' => config('superpay.senha')
            ])
        ];

        $body = HttpBody::json([
            'transacao'     => $transacao,
            'checkout'      => $checkout,
            'itensDoPedido' => $itensDoPedido,
            'dadosCobranca' => $dadosCobranca,
            'dadosEntrega'  => $dadosEntrega
        ]);

        $response = Http::post(rtrim(config('superpay.url'), '/') . '/transacao', $headers, $body);

        dd($response);
    }
}