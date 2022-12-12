<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'main_data');

class DB_con
{

    function __construct() {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        }
    }
    // prefix
    // public function insert($idpfix, $nameprefix)
    // {   
    //     $result = mysqli_query($this->dbcon, "INSERT INTO neprefix(idpfix,nameprefix) VALUES('$idpfix','$nameprefix')");
    //     return $result;
    // }
    public function fetchdata()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM neprefix");
        return $result;
    }
    public function fetchonerecord($idpfix)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM neprefix WHERE idpfix = '$idpfix'");
        return $result;
    }
    public function update($idpfix, $nameprefix)
    {
        $result = mysqli_query($this->dbcon, "UPDATE neprefix SET 
                nameprefix = '$nameprefix'
                WHERE idpfix = '$idpfix'
            ");
        return $result;
    }
    public function delete($idpfix)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM neprefix WHERE idpfix = '$idpfix'");
        return $deleterecord;
    }


    // unit
    // public function insertunit($idunit, $unitt)
    // {
    //     $result = mysqli_query($this->dbcon, "INSERT INTO unitdb(idunit,unitt) VALUES('$idunit','$unitt')");
    //     return $result;
    // }
    public function fetchdataunit()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM unitdb");
        return $result;
    }
    public function fetchonerecordunit($idunit)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM unitdb WHERE idunit = '$idunit'");
        return $result;
    }
    public function updateunit($idunit, $unitt)
    {
        $result = mysqli_query($this->dbcon, "UPDATE unitdb SET 
                unitt = '$unitt'
                WHERE idunit = '$idunit'
            ");
        return $result;
    }
    public function deleteunit($idunit)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM unitdb WHERE idunit = '$idunit'");
        return $deleterecord;
    }

    // typeemp

    // public function inserttpemp($idte, $demp)
    // {
    //     $result = mysqli_query($this->dbcon, "INSERT INTO typeemp(idte,demp) VALUES('$idte','$demp')");
    //     return $result;
    // }
    public function fetchdatatpemp()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM typeemp");
        return $result;
    }
    public function fetchonerecordtpemp($idte)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM typeemp WHERE idte = '$idte'");
        return $result;
    }
    public function updatetpemp($idte, $demp)
    {
        $result = mysqli_query($this->dbcon, "UPDATE typeemp SET 
                demp	= '$demp'
                WHERE idte = '$idte'
            ");
        return $result;
    }
    public function deletetpemp($id)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM typeemp WHERE idte = '$id'");
        return $deleterecord;
    }


    // typemandq

    // public function inserttmq($idtmq, $tmq)
    // {
    //     $result = mysqli_query($this->dbcon, "INSERT INTO tmqdb(idtmq,tmq) VALUES('$idtmq','$tmq')");
    //     return $result;
    // }
    public function fetchdatatmq()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tmqdb");
        return $result;
    }
    public function fetchonerecordtmq($idtmq)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tmqdb WHERE idtmq = '$idtmq'");
        return $result;
    }
    public function updatetmq($idtmq, $tmq)
    {
        $result = mysqli_query($this->dbcon, "UPDATE tmqdb SET 
                tmq	 = '$tmq'
                WHERE idtmq = '$idtmq'
            ");
        return $result;
    }
    public function deletetmq($idtmq)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM tmqdb WHERE idtmq = '$idtmq'");
        return $deleterecord;
    }


    // customer
    // public function insertctm($idctm, $prefixctm, $fnamectm, $lnamectm, $emailctm, $phonectm)
    // {
    //     $result = mysqli_query($this->dbcon, "INSERT INTO ctm(idctm,prefixctm,fnamectm,lnamectm,emailctm,phonectm) VALUES(
    //         '$idctm', 
    //         '$prefixctm',
    //         '$fnamectm',
    //         '$lnamectm',
    //         '$emailctm',
    //         '$phonectm'
    //         )");
    //     return $result;
    // }
    public function fetchdatactm()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM ctm");
        return $result;
    }
    public function fetchonerecordctm($idctm)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM ctm WHERE idctm = '$idctm'");
        return $result;
    }
    public function updatectm($idctm, $prefixctm, $fnamectm, $lnamectm, $emailctm, $phonectm)
    {
        $result = mysqli_query($this->dbcon, "UPDATE ctm SET 
                prefixctm    = '$prefixctm',
                fnamectm	 = '$fnamectm',
                lnamectm	 = '$lnamectm',
                emailctm	 = '$emailctm',
                phonectm	 = '$phonectm'
                WHERE idctm = '$idctm'
            ");
        return $result;
    }
    public function deletectm($idctm)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM ctm WHERE idctm = '$idctm'");
        return $deleterecord;
    }

    //employee

    public function insertemp($idemp, $prefixemp, $fnameemp, $lnameemp, $phoneemp, $addressemp, $tyemp, $stemp)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO emp(idemp,prefixemp,fnameemp,lnameemp,phoneemp,addressemp,tyemp,stemp) VALUES(
            '$idemp',
            '$prefixemp',
            '$fnameemp',
            '$lnameemp',
            '$phoneemp',
            '$addressemp',
            '$tyemp',
            '$stemp'	
            )");
        return $result;
    }
    public function fetchdataemp()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM emp");
        return $result;
    }
    public function fetchonerecordemp($idemp)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM emp WHERE idemp = '$idemp'");
        return $result;
    }
    public function updateemp($idemp, $prefixemp, $fnameemp, $lnameemp, $phoneemp, $addressemp, $tyemp, $stemp)
    {
        $result = mysqli_query($this->dbcon, "UPDATE emp SET 
                prefixemp    = '$prefixemp',
                fnameemp	 = '$fnameemp',
                lnameemp	 = '$lnameemp',
                phoneemp	 = '$phoneemp',
                addressemp	 = '$addressemp',
                tyemp        = '$tyemp',
                stemp        = '$stemp'
                WHERE idemp =  '$idemp'
            ");
        return $result;
    }
    public function deleteemp($idemp)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM emp WHERE idemp = '$idemp'");
        return $deleterecord;
    }

    //mande

    // public function insertmande($idmande, $mande, $mandeqty, $mandeunit, $tmqmande)
    // {
    //     $result = mysqli_query($this->dbcon, "INSERT INTO mandedb(idmande,mande,mandeqty,mandeunit,tmqmande) VALUES('$idmande','$mande','$mandeqty','$mandeunit','$tmqmande')");
    //     return $result;
    // }
    public function fetchdatamande()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM mandedb");
        return $result;
    }
    public function fetchonerecordmande($idmande)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM mandedb WHERE idmande = '$idmande'");
        return $result;
    }
    public function updatemande($idmande, $mande, $mandeqty, $mandeunit, $tmqmande)
    {
        $result = mysqli_query($this->dbcon, "UPDATE mandedb SET 
                mande	 = '$mande',
                mandeqty  = '$mandeqty',
                mandeunit = '$mandeunit',
                tmqmande = '$tmqmande'
                WHERE idmande = '$idmande'
            ");
        return $result;
    }
    public function deletemande($idmande)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM mandedb WHERE idmande = '$idmande'");
        return $deleterecord;
    }

    //partner

    // public function insertptn($idptn, $prefixptn, $fnameptn, $lnameptn, $phoneptn, $cnameptn)
    // {
    //     $result = mysqli_query($this->dbcon, "INSERT INTO ptn(idptn,prefixptn,fnameptn,lnameptn,phoneptn,cnameptn) VALUES(
    //         '$idptn',
    //         '$prefixptn',
    //         '$fnameptn',
    //         '$lnameptn',
    //         '$phoneptn',
    //         '$cnameptn'
    //         )");
    //     return $result;
    // }
    public function fetchdataptn()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM ptn");
        return $result;
    }
    public function fetchonerecordptn($idptn)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM ptn WHERE idptn = '$idptn'");
        return $result;
    }
    public function updateptn($idptn, $prefixptn, $fnameptn, $lnameptn, $phoneptn, $cnameptn)
    {
        $result = mysqli_query($this->dbcon, "UPDATE ptn SET 
           prefixptn = '$prefixptn',
           fnameptn = '$fnameptn',
           lnameptn = '$lnameptn',
           phoneptn = '$phoneptn',
           cnameptn = '$cnameptn'
                WHERE idptn = '$idptn'
            ");
        return $result;
    }
    public function deleteptn($idptn)
    {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM ptn WHERE idptn = '$idptn'");
        return $deleterecord;
    }
}
