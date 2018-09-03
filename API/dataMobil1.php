<?php

 
require_once("connection.php");
class JsonDisplayMarker {
    function getMarkers(){
        //buat koneksinya
        $connection = new Connection();
        $conn = $connection->getConnection();
 
        //buat responsenya
        $response = array();
 
        $code = "code";
        $message = "message";
 
        try{
            //tampilkan semua data dari mysql
            $queryMarker = "SELECT * FROM car";
            $getData = $conn->prepare($queryMarker);
            $getData->execute();
 
            $result = $getData->fetchAll(PDO::FETCH_ASSOC);
 
            foreach($result as $data){
                array_push($response,
                    array(
                        'id_car'=>$data['id_car'],
                        'name_car'=>$data['name_car'],
                        'capacity'=>$data['capacity'],
						'years' =>$data['years'],
						'id_admin' =>$data["id_admin"],
						'image' => $data["image"])
                    );
            }
        }catch (PDOException $e){
            echo "Failed displaying data".$e->getMessage();
        }
 
        //buatkan kondisi jika berhasil atau tidaknya
        if($queryMarker){
            echo json_encode(
                array("data"=>$response,$code=>1,$message=>"Success")
            );
        }else{
            echo json_encode(
                array("data"=>$response,$code=>0,$message=>"Failed displaying data")
            );
        }
 
 
    }
}
 
$location = new JsonDisplayMarker();
$location->getMarkers();