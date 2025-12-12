<?PHP

namespace App\Util;

use \PDO;
use \PDOException;

class Connection{
    private static ?PDO $conn = null;

    public static function getConnection(): PDO{

        if(self::$conn == null){
            try{
                $opcoes =  array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                );
             $strConn = "mysql:host=" . Config::DB_HOST . ";dbname=" . Config::DB_NAME;
                self::$conn = new PDO($strConn, Config::DB_USER, Config::DB_PASSWORD, $opcoes);
            } catch(PDOException $e) {
                echo "Erro ao conectar na base de dados.<br>";
                print_r($e);
            }
        }
        return self::$conn;
    }
}
?>