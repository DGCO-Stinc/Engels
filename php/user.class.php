<?php
require_once("dbh.inc.php");

class User
{
    private $dbc;

    public function __construct()
    {
        
        $DATA = new DATA(); // probably something here..
        $pdo = $DATA->connect();
        $this->dbc = $pdo;
    }

//    private function preparequery($sql, array $args)
//    {
//        $stmt = $this->dbc->prepare($sql);
//        $stmt->execute($args);
//    }

    public function is_loggedin()
    {
        if(isset($_SESSION['user_ID']))
        {
            return true;
        }else
        {
            return false;
        }
    }
    public function getUserID()
    {
        return $_SESSION['user_ID'];
    }

    public function login($uname,$pass)
    {
        $uname = strtolower(filter_var($uname,FILTER_SANITIZE_STRING));
        $pass = md5(filter_var($pass,FILTER_SANITIZE_STRING));
        $sql = "SELECT userID, pass FROM eng_user WHERE username = ?";

        $stmt = $this->dbc->prepare($sql);
        $stmt->execute(array($uname));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if($data['pass'] = $pass)
        {
            $_SESSION['user_ID'] = $data['userID'];
            echo "success";
        }else
        {
            echo "failed";
        }

    }

    public function register($uname,$pass)
    {
        
        $uname = strtolower(filter_var($uname,FILTER_SANITIZE_STRING)); // grab ajax input
        $pass = md5(filter_var($pass,FILTER_SANITIZE_STRING));

        $sql = "SELECT userID FROM eng_user WHERE username = ?"; // make a list of users that match later input

        $stmt = $this->dbc->prepare($sql);
        $stmt->execute(array($uname)); // execute sql statement to compare $uname with list.

        if($stmt->rowCount() > 0) // check if there is an item returned, if so, a username already exists
        {
            echo "failed";
        }else // username not found, can register
        {
            $sql = "INSERT INTO eng_user (username, pass) VALUES (?,?)"; // 

            $stmt = $this->dbc->prepare($sql);
            $stmt->execute(array($uname,$pass));
            echo "success";
        }
    }

    public function getUserItems()
    {
        if($this->is_loggedin())
        {
            $uid = $_SESSION['user_ID'];

            $sql = "SELECT * FROM eng_money WHERE userID = ? ORDER BY money_type ASC, money_name  ASC";

            $stmt = $this->dbc->prepare($sql);
            $stmt->execute(array($uid));

            if($stmt->rowCount()>0)
            {
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $json = [];
                foreach($data as $row)
                {
                    $json += 
                    [
                        $row['moneyID']=>[
                            "type"=>$row['money_type'],
                            "name"=>$row['money_name'],
                            "amnt"=>$row['money_amount'],
                            "timetable"=>$row['money_spreadType']
                        ]
                    ];
                }
                echo json_encode($json);
            }else
            {
                echo "no-items";
            }
        }
    }

    public function getUserIncomes()
    {
        if($this->is_loggedin())
        {
            $uid = $_SESSION['user_ID'];

            $sql = "SELECT * FROM eng_money WHERE userID = ? AND money_type = 0 ORDER BY money_type ASC, money_name  ASC";

            $stmt = $this->dbc->prepare($sql);
            $stmt->execute(array($uid));

            if($stmt->rowCount()>0)
            {
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $json = [];
                foreach($data as $row)
                {
                    $json += 
                    [
                        $row['moneyID']=>[
                            "name"=>$row['money_name'],
                            "amnt"=>$row['money_amount'],
                            "timetable"=>$row['money_spreadType']
                        ]
                    ];
                }
                echo json_encode($json);
            }else
            {
                echo "no-items";
            }
        }
    }

    public function getUserExpenses()
    {
        if($this->is_loggedin())
        {

            $sql = "SELECT * FROM eng_money WHERE userID = ? AND money_type = 1 ORDER BY money_type ASC, money_name  ASC";

            $stmt = $this->dbc->prepare($sql);
            $stmt->execute(array($this->getUserID()));

            if($stmt->rowCount()>0)
            {
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $json = [];
                foreach($data as $row)
                {
                    $json += 
                    [
                        $row['moneyID']=>[
                            "name"=>$row['money_name'],
                            "amnt"=>$row['money_amount'],
                            "timetable"=>$row['money_spreadType']
                        ]
                    ];
                }
                echo json_encode($json);
            }else
            {
                echo "no-items";
            }
        }
    }

    public function storeUserItem($name,$amnt,$type,$sprd)
    {
        if($this->is_loggedin())
        {
            $name = filter_var($name,FILTER_SANITIZE_STRING);
            $amnt = (float) filter_var($amnt,FILTER_SANITIZE_STRING);
            $type = filter_var($type,FILTER_SANITIZE_NUMBER_INT);
            $sprd = filter_var($sprd,FILTER_SANITIZE_NUMBER_INT);

            $sql = "INSERT INTO eng_money (userID,money_name,money_amount,money_type,money_spreadType) VALUES (?,?,?,?,?)";

            $stmt = $this->dbc->prepare($sql);
            $stmt->execute(array($this->getUserID(),$name,$amnt,$type,$sprd));
        }
    }


}