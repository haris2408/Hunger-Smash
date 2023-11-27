
<?php
    session_start();
    require('fpdf/fpdf.php');
    $pdf= new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('arial','','14');
    $ordrid=$_SESSION['currorder'];
    $pdf->cell(40,10,'ORDER#'.$ordrid,0,1,'C');

    $pdf->cell(40,10,'Dish ID',1,0,'C');
    $pdf->cell(50,10,'Dish Name',1,0,'C');
    $pdf->cell(40,10,'Price',1,0,'C');
    $pdf->cell(40,10,'Quantity',1,1,'C');

    $conn=mysqli_connect("localhost","root","","rsm");
        if($conn->connect_error)
        {
            die("connection failed". $conn->connect_error);
        }
    
        $q="select l.dish_id, d.D_name,d.price,l.quantity from dishes d JOIN listofitems l on d.Dish_id = l.dish_id where l.order_num='$ordrid'";
        $result = mysqli_query($conn,$q);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $pdf->cell(40,10,$row["dish_id"],0,0,'C');
                $pdf->cell(50,10,$row["D_name"],0,0,'C');
                $pdf->cell(40,10,$row["price"],0,0,'C');
                $pdf->cell(40,10,$row["quantity"],0,1,'C');
            }
        }
        $total=$_SESSION['total'];
        $paid=$_SESSION['paid'];
        $return=$_SESSION['return'];
        
        $pdf->cell(40,10," ",0,1,'C');

        $pdf->cell(40,10," ",0,0,'C');
        $pdf->cell(50,10," ",0,0,'C');
        $pdf->cell(40,10," ",0,0,'C');
        $pdf->cell(40,10,"Total: ". $total,1,1,'C');

        $pdf->cell(40,10," ",0,0,'C');
        $pdf->cell(50,10," ",0,0,'C');
        $pdf->cell(40,10," ",0,0,'C');
        $pdf->cell(40,10,"Paid: ". $paid,1,1,'C');

        $pdf->cell(40,10," ",0,0,'C');
        $pdf->cell(50,10," ",0,0,'C');
        $pdf->cell(40,10," ",0,0,'C');
        $pdf->cell(40,10,"Returned: ". $return,1,1,'C');
        $conn->close();
    $pdf->Output();
?>