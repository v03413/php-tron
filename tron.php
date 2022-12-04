<?php

use IEXBase\TronAPI\Tron;

require_once "./vendor/autoload.php";

$tron = new Tron();

// 设置你的账户地址
$tron->setAddress('TNQWMu3o4QqxwEw3TQT6AAZ4iNTb2p0000');

// 设置你的账户私钥
$tron->setPrivateKey('8c3d79bf157bf305b1be88c66fac3c40d7c44a11dd51c27c3a2c49fab02ae52b');

// 获取TRX余额
$balance = $tron->getBalance(null, true);

echo sprintf("Trx余额：%s\n", $balance);

// Trx转账
$to     = 'TNQWMu3o4QqxwEw3TQT6AAZ4iNTb2p0001'; // 转账目标地址
$amount = 10; // 转账数量

// 执行操作，之后返回一个数组，数组里面包含详细的交易信息，但并不一定代表一定交易成功
// 本操作的本质是将这个交易进行签名并且打包上链，至于成功与否要看最后在链上的确认情况
$result = $tron->sendTrx($to, $amount);

// USDT 常用操作
$contract = $tron->contract('TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t'); // Tether USDT，这里不能修改

// 获取USDT余额
$balance = $contract->balanceOf();

// USDT 转账
$to     = 'TNQWMu3o4QqxwEw3TQT6AAZ4iNTb2p0002'; // 转账目标地址
$amount = 1.25;  // 转账数量

// 执行转账操作
$result = $contract->transfer($to, $amount);



