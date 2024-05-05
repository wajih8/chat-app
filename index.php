<?php
require("config.php");
session_start();
if(!isset($_SESSION["id"])or $_SESSION["id"]==null){
    header("Location:login.html");
}
function serch($t,$id){
    foreach($t as $row){
        if($id==$row["id"]){
            return $row["name"];
        }
    }
    return null;

}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>chat</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <form action="login.php" method="post">
      
        <div class="chat">
            <div class="cont"id="sas">
            <?php
                $sec="SELECT * FROM `users`;";
                $t=mysqli_fetch_all(mysqli_query($con,$sec),MYSQLI_ASSOC);
                $sql="SELECT * FROM `chat` ORDER BY`date` DESC ";
                $res=mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($res)){
                    $sa=$row["date"];
                    $ss=strtotime($row["date"]);
                    
                    if(date("y")!=date("y",$ss)){
                        $amm="y:".date("y",$ss)." /m:".date("m",$ss)." /d:".date("d",$ss)." | ".substr($sa,11,5);
                    }
                    elseif(date("m")!=date("m",$ss)){
                        $amm="m:".date("m",$ss)."/ d:".date("d",$ss)." | ".substr($sa,11,5);
                    }
                    elseif(date("d")!=date("d",$ss)){
                        $amm="d:".date("d",$ss)." | ".substr($sa,11,5);
                    }
                    else{
                        $amm=substr($sa,11,5);
                    }
                    if ($row["senderid"]==$_SESSION["id"]){
                        
                        echo "<div class='mcontainer'>
                                    <div class='muptxt'><span class='brs'>".serch($t,$row["senderid"])."</span></div>
                                        <div class='mmsgconta'>
                                            <div class='mmessage'><span class='brs'>".$row["message"]."</span></div>
                                                        </div>
                                            <div class='mdatete'>".$amm."</div>
                                        </div>
                            
                        ";
                    }else{
                        echo "<div class='container'>
                                    <div class='uptxt'><span class='brs'>".serch($t,$row["senderid"])."</span></div>
                                        <div class='msgconta'>
                                            <div class='message'><span class='brs'>".$row["message"]."</span></div>
                                                        </div>
                                            <div class='datete'>".$amm."</div>
                                        </div>
                            
                        ";
                    }
                }
                
                
                ?>
    
            
            </div>
            <div class="sends">
                <input name="mess">
                <button name="sbt" type="submit">submit</button>
                <button type="button" onclick="sas()">clear</button>
            </div>
        </div>
              
                
    </form>
    <script>
        
            function sas() {
        document.getElementById("sas").innerHTML = "";
        
        }
    </script>
  </body>
</html>

