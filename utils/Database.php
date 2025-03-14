<?php
include_once 'Log.php';

class Database
{
    private static ?PDO $PDO = null;
    private static bool $connectionFailed = false;

    public static function select(string $query, array $bind = []): array
    {
        if (self::$PDO === null) {
            throw new Exception('Database connection is null');
        }
        $stm = self::$PDO->prepare($query);
        foreach ($bind as $key => $value) {
            $stm->bindValue($key, $value);
        }
        $stm->execute();
        return $stm->fetchAll();
    }

    public static function connect(array $config, bool $retry = false): ?PDO
    {
        if (self::$PDO !== null) {
            return self::$PDO;
        }
        if (!self::$connectionFailed || $retry) {
            try {
                self::$PDO = new PDO(
                    "$config[driver]:host=$config[host];dbname=$config[dbname]",
                    $config['user'],
                    $config['password'], [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                ]);
            } catch (PDOException $e) {
                self::$connectionFailed = true;
                Log::errlog($e, 'log/database.log');
            }
        }
        return self::$PDO;
    }

    public static function isConnected(): bool
    {
        return self::$PDO !== null;
    }

    public static function query(string $query, array $bind = []): void
    {
        if (self::$PDO === null) {
            throw new Exception('Database connection is null');
        }
        $stm = self::$PDO->prepare($query);
        foreach ($bind as $key => $value) {
            $stm->bindValue($key, $value);
        }
        $stm->execute();
    }
}