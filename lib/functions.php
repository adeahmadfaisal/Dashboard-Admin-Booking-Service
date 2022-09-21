<?php
include('conn.php');
/**
 * 
 */
class Login extends Koneksi
{
    
    function __construct()
    {
        parent::__construct();
    }

    public function FSession()
    {
        session_start();
        
        if (!empty($_SESSION) && $_SESSION['login'] != 'valid')
        {
            session_destroy();
            header('location: login.php');
        }

        if (empty($_SESSION))
        {
            session_destroy();
            header('location: login.php');
        }
    }

    public function Loginauth($username, $password) 
    {
        $password   = md5($password);

        $query      = "SELECT * FROM employee WHERE name ='$username' AND password='$password';"; 

        if ($result = $this->conn->query($query))
        {
            if ($result->num_rows > 0)
            {
                $row = $result->fetch_assoc(); 
                
                    session_start();

                    $_SESSION['username']   = $username;
                    $_SESSION['id']         = $row['id_karyawan'];
                    $_SESSION['login']      = 'valid';
                    $_SESSION['level']      = $row['level'];
                
                return true;
            }
            return false;
        }else
            return false;

    }

    public function logout()
    {
        //function start lagi
        session_start();

        //cek apakah session terdaftar
        if(session_is_registered('username')){

        //session terdaftar, saatnya logout
            session_unset();
            session_destroy();
        }
        else{

        //variabel session salah, user tidak seharusnya ada dihalaman ini. Kembalikan ke login
            header( "Location:../login.php" );
        }
    }
}

/**
 * 
 */
class Crud extends Koneksi
{
    
    function __construct()
    {
        parent::__construct();
    }

    public function Readvalidasi($booking_id)
    {
        $query  = "SELECT 
                    customer.name, mycar.car_id, booking_service.booking_id, booking_service.date, booking_service.hour, booking_service.type_service, booking_service.problem, booking_service.status 
                    FROM booking_service 
                    JOIN customer
                    ON booking_service.customer_id=customer.customer_id
                    JOIN mycar
                    ON customer.customer_id=mycar.cutomer_id  WHERE booking_service.booking_id='$booking_id' 
                    GROUP BY  booking_service.booking_id DESC
                ";
        
            if ($hasil  = $this->conn->query($query))
            {
                $rows   = array();

                    while ($row = $hasil->fetch_assoc()) {
                        $rows[] = $row;
                    }

                return $rows;
            }
            else 
            {
                return false;    
            }

    }
    public function Readvalidasiall()
    {
        $query  = "SELECT 
                    customer.name, mycar.car_id, booking_service.booking_id, booking_service.date, booking_service.hour, booking_service.type_service, booking_service.problem, booking_service.status 
                    FROM booking_service 
                    JOIN customer
                    ON booking_service.customer_id=customer.customer_id
                    JOIN mycar
                    ON customer.customer_id=mycar.cutomer_id
                    GROUP by booking_service.booking_id DESC
                ";
        
            if ($hasil  = $this->conn->query($query))
            {
                $rows   = array();

                    while ($row = $hasil->fetch_assoc()) {
                        $rows[] = $row;
                    }

                return $rows;
            }
            else 
            {
                return false;    
            }

    }
    public function Readdata($table, $id, $id_value){
        
        if(is_null($id) && is_null($id_value)) 
        
            {
                $query  = "SELECT * FROM $table";
            } 

        else 

            {
                $query  = "SELECT * FROM $table WHERE $id='$id_value'  ORDER by $id DESC";

            }

            
        if($hasil  = $this->conn->query($query)) 

            {
                $rows = array();

                while ($row = $hasil->fetch_assoc()) {
                    $rows[]  = $row;
                }

                return $rows;
            }
        else
            {
                return false;
            }

    }
    public function Create($table, $data){
        $id       = implode(", ", array_keys($data));
        $values   = implode(", ", array_values($data));
        $query    = "INSERT INTO $table ($id) values ($values)";
        $hasil    = $this->conn->query($query);

        if ($hasil) {
            return true;
        }
        else {
            return false;
        }
    }    
    public function Update($table, $data, $id, $id_value)
    {
        $query   = "UPDATE $table SET ";
        $query  .= implode(',', $data);
        $query  .= " WHERE $id='".$id_value."'";
        $hasil   = $this->conn->query($query);
        
            if($hasil)
            {
                return true;
            } 
            else 
            {
                return false;
            }
    }
    public function Delete($table, $id, $id_value){
        $query  = "DELETE FROM $table WHERE $id='$id_value'";
        $hasil  = $this->conn->query($query);

            if($hasil)
            {
                return true;
            }
            else
            {
                return false;
            }
    }
    public function getcar($carid){
        $query  = "SELECT * FROM car WHERE car_id='$carid'";
        $hasil  = $this->conn->query($query);

        if($hasil)
            {
                
                $rows   = array();

                    while ($row = $hasil->fetch_assoc()) {
                        $rows[] = $row;
                    }

                return $rows;
            } 
        else
            {
                return false;
            }

    }

    public function sendMessage($isicontent,$isiheading) {

         $content   = array(
            "en"    => $isiheading  
        );
        $headings   = array(
            "en"    => $isicontent
         );

        $hashes_array = array();
    
        array_push($hashes_array, array(
            "id" => "like-button",
            "text" => "Like",
            "icon" => "default_icon"
        ));
    
        $fields = array(
            'app_id' => "2c0672f1-7b82-4758-be47-ed03f1f505c1",
            'included_segments' => array(
                'All'
            ),
            'data' => array(
                "foo" => "bar"
            ),
            'headings' => $headings,
            'contents' => $content,
            'web_buttons' => $hashes_array
        );
            
            $fields = json_encode($fields);
            print("\nJSON sent:\n");
            print($fields);
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Authorization: Basic ZDI1NTJhYmItMDdjNi00NzlhLTkwN2QtYjQ1YzQyMGZmNWVi'
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            
            $response = curl_exec($ch);
            curl_close($ch);
            
            return $response;

    }

    public function Readchart($id_value){
        $query  = "SELECT * FROM booking_service WHERE status='$id_value'";

            

            
        if($hasil  = $this->conn->query($query)) 

            {
                $hasil = mysqli_num_rows($hasil);
                

                return $hasil;
            }
        else
            {
                return false;
            }

    }
}



?>