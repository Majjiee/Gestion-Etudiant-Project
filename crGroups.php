<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="MonStyle.css">
    <title>Administrator</title>
</head>
<body>
    <?php 
        include('conn.php');
        include('class.php');
        $cn=new Connection();
        $cn->selectDatabase('MyPhpDb');
        $f= new Fillier('Info');
        $a=new Annes('prem');
        $g=new Group('h', 'o', 'l');
        
    ?>
   <header>
    <img src="" alt="" id="H1li1">
   <div id="Hdiv1">
        <ul>
            <li id="H1li2"><h1>Welcome</h1></li>
        </ul>
    </div>
    <div id="Hdiv2">
    <ul>
            <li id="H2li1"><a href="">My Profil</a></li>
            <li id="H2li1"><a href="">Logout</a></li>
        </ul>
    </div>
   </header>
   <section id="BigSec" style="height:31vw">
        <section id="Sec1">
            <div class="S1div">
                <div id="S1div11">Students</div>
                
    <ul>
        <li><a href="AddStud.php">Add Student</a></li>
        <li><a href="DelStud.php">Delete Student</a></li>
        <li><a href="ListStud.php">List of Students</a></li>
    </ul>
</div>
            <div class="S1div">
            <div class="S1div">
                <div id="S1div21">Administraition</div>
                <ul>
                <a href="MajGroups.php"><li onclick="">Groups</li></a>
                </ul>
            </div>
        </section>

<section id="Sec3">
<!-- <button onclick="toggleInput()">Add Student to Group</button> -->
<form method="POST" action="index.php">
                    <label for="infoInput">Id Student</label>
                    <input type="text" id="infoInput" name="idstddd">
                    <label for="GrpInput">Id Group</label>
                    <select id="GrpInput" name="GrpInput">
                        <?php
                            $Grps = $g->GetGrp('Groups', $cn->conn, $FilId, $AId);
                            foreach ($Grps as $Grp) {
                                echo "<option value=\"$Grp\">$Grp</option>";
                            }
                        ?>
                    </select>
            <input onclick="" type="submit" class="btn btn-primary" name="FillAnn" id="FillAnn" value="Add student to groupe">
</form> 
             <?php 
             if($_SERVER["REQUEST_METHOD"]=="POST"){
                $selectedId=$_POST['idstddd'];
                $selectedgR=$_POST['GrpInput'];
               
                if(!empty($selectedId) && !empty($selectedgR)){
                   g->GrpInsert('Etudiant', $cn->conn, $selectedId, $selectedgR);
                   header("Location: index.php");
        exit();
                }
            }
             ?>
</section></section>
   <footer>MajRaj</footer> 
</body>
</html>
