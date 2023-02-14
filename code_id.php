<?php

    $con = mysqli_connect('localhost', 'root' , '' , 'test');
    if(!$con) mysqli_connect_errno();

    $GLOBALS['maxIdLength']= 4;
    $GLOBALS['id'] = '0';

    // Query last id from Datbase
    $sql = "SELECT id FROM pro ORDER BY id DESC LIMIT 1";
    $query = $con->query($sql);
    $result = $query->fetch_assoc();

    if($result['id']) {
        $GLOBALS['id'] = $result['id'];
    }

    function increaseId($id) {
        $matchId = preg_replace('/[^0-9]/' , '' , $id);
        $convertStringToInt = (int)$matchId;

        $concatIdWithString = (string)($convertStringToInt + 1);

        $round = 0;
        while($round < $GLOBALS['maxIdLength'] - strlen($concatIdWithString)){
            $concatIdWithString = '0' . $concatIdWithString;
            $round+=1;
        }

        return 'P'. $concatIdWithString;
    }

    echo (increaseId($GLOBALS['id']));
?>