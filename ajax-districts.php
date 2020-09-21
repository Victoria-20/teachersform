<?php

    require_once 'includes/db.php';

    if(isset($_GET['id']) && isset($_GET['type']))
    {
        //
            $id = $_GET['id'];
            $type = $_GET['type'];
        //
        if($type=="counties")
        {
            $sql = "SELECT * FROM ug_counties WHERE dID='{$id}' ORDER BY countyName ASC";
            $qry = query($sql);
            @$countyOptions .= "<option value='' disabled selected>Select a County</option>";
            while($row = mysqli_fetch_array($qry))
            {
            
                $cid = $row['cID'];
                $countyName = $row['countyName'];
        
                @$countyOptions .= "<option value='{$cid}'>{$countyName}</option>";
            }
            
            echo $countyOptions;
        }
        elseif($type =="subcounties")
        {
            $sql = "SELECT * FROM ug_subcounties WHERE cID='{$id}' ORDER BY subCountyName ASC";
            $qry = query($sql);
            @$subCountyOptions .= "<option value='' disabled selected>Select a Sub County</option>";
            while($row = mysqli_fetch_array($qry))
            {
            
                $cid = $row['subID'];
                $subCountyName = $row['subCountyName'];
        
                @$subCountyOptions .= "<option value='{$cid}'>{$subCountyName}</option>";
            }
            echo $subCountyOptions;
        }
        //
        elseif($type =="parishes")
        {
            $sql = "SELECT * FROM ug_parishes WHERE subID='{$id}' ORDER BY parishName ASC";
            $qry = query($sql);
            @$Options .= "<option value='' disabled selected>Select a Parish</option>";
            while($row = mysqli_fetch_array($qry))
            {
            
                $_id = $row['parID'];
                $parishName = $row['parishName'];
                @$Options .= "<option value='{$_id}'>{$parishName}</option>";
            }
            echo $Options;
        }
        //
        elseif($type =="villages")
        {
            $sql = "SELECT * FROM ug_villages WHERE parID='{$id}' ORDER BY villageName ASC";
            $qry = query($sql);
            @$Options .= "<option value='' disabled selected>Select a Village</option>";
            while($row = mysqli_fetch_array($qry))
            {
            
                $_id = $row['vID'];
                $villageName = $row['villageName'];
        
                @$Options .= "<option value='{$_id}'>{$villageName}</option>";
            }
            echo $Options;
        }
    }
    
?>