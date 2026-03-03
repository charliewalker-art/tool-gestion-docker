<?php

namespace App\Model;

use PDO;
use PDOException;

class Database
{
    public static function getConnection(array $config = null): PDO
    {
        $default = [
            'host'    => 'db',
            'dbname'  => 'tool_gestion',
            'user'    => 'charlie',
            'pass'    => 'charlie1234',
            'charset' => 'utf8mb4',
        ];

        $cfg = $config ? array_merge($default, $config) : $default;

        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=%s',
            $cfg['host'],
            $cfg['dbname'],
            $cfg['charset']
        );

        // Retry: attend que MySQL soit prêt
        $attempts = 15;     // 15 essais
        $delayMs  = 500;    // 0.5s entre essais (≈ 7.5s max)

        for ($i = 1; $i <= $attempts; $i++) {
            try {
                return new PDO($dsn, $cfg['user'], $cfg['pass'], [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            } catch (PDOException $e) {
                if ($i === $attempts) {
                    die('Connexion à la base de données échouée : ' . $e->getMessage());
                }
                usleep($delayMs * 1000);
            }
        }

        // Ne devrait jamais arriver
        die('Connexion à la base de données échouée : inconnue');
    }
}