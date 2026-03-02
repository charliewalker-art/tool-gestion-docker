<?php

namespace App\Model;

use PDO;
use PDOException;

class Database
{
    /**
     * Retourne une instance PDO configurée.
     *
     * Modifie les paramètres de connexion ici si nécessaire.
     *
     * @return PDO
     */
    /**
     * Retourne une instance PDO configurée.
     *
     * Les paramètres peuvent être fournis ou lus depuis des constantes/
     * variables d'environnement. Cela évite de garder les valeurs en dur
     * dans le code et permet de les réutiliser ailleurs.
     *
     * @param array|null $config [
     *     'host' => string,
     *     'dbname' => string,
     *     'user' => string,
     *     'pass' => string,
     *     'charset' => string
     * ]
     * @return PDO
     */
    public static function getConnection(array $config = null): PDO
    {
        // valeurs par défaut
        $default = [
            'host'    => '127.0.0.1',
            'dbname'  => 'task_manager',
            'user'    => 'root',
            'pass'    => '',
            'charset' => 'utf8mb4',
        ];

        // fusionner les paramètres donnés avec les défauts
        $cfg = $config ? array_merge($default, $config) : $default;

        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=%s',
            $cfg['host'],
            $cfg['dbname'],
            $cfg['charset']
        );

        try {
            $pdo = new PDO($dsn, $cfg['user'], $cfg['pass'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
            return $pdo;
        } catch (PDOException $e) {
            // en production on cacherait ce message
            die('Connexion à la base de données échouée : ' . $e->getMessage());
        }
    }
}
