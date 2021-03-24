<?php
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');
require_once("../required/function.php");

if (isset($_POST["import"]))
{
    $class1 = data_input($_POST['class']);
    $subject1 = data_input($_POST['subject']);
    // $session1 = data_input($_POST['session1']);
    // $term1 = data_input($_POST['term1']);
    $date = data_input($_POST['date']);
    $time = data_input($_POST['time']);
    $teacher = data_input($_POST['teacher']);
    
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $reg_no = "";
                if(isset($Row[0])) {
                    $reg_no = mysqli_real_escape_string($connect,$Row[0]);
                }
                
                $session = "";
                if(isset($Row[1])) {
                    $session = mysqli_real_escape_string($connect,$Row[1]);
                }

                $term = "";
                if(isset($Row[2])) {
                    $term = mysqli_real_escape_string($connect,$Row[2]);
                }

                $subject = "";
                if(isset($Row[3])) {
                    $subject = mysqli_real_escape_string($connect,$Row[3]);
                }

                $test = "";
                if(isset($Row[4])) {
                    $test = mysqli_real_escape_string($connect,$Row[4]);
                }

                $exam = "";
                if(isset($Row[5])) {
                    $exam = mysqli_real_escape_string($connect,$Row[5]);
                }

                $total = "";
                if(isset($Row[6])) {
                    $total = mysqli_real_escape_string($connect,$Row[6]);
                }

                $grade = "";
                if(isset($Row[7])) {
                    $grade = mysqli_real_escape_string($connect,$Row[7]);
                }
                
                if (!empty($reg_no) || !empty($session) || !empty($term) || !empty($subject) || !empty($test) || !empty($exam) || !empty($total) || !empty($grade)) {
                    $query = "insert into results(reg_no,session,term,subject,test,exam,total,grade) 
                    values('".$reg_no."','".$session."','".$term."','".$subject."','".$test."','".$exam."','".$total."','".$grade."')";
                    $result = mysqli_query($connect, $query);
                }}
                    if (!empty($result)) {
                        $query1 = "insert into result_upl (class,subject,session,term,tutor_id,date,time) 
                        values('".$class1."','".$subject1."','".$session."','".$term."','".$teacher."','".$date."','".$time."')";
                        $result1 = mysqli_query($connect, $query1);
                        ?>

                        <div class="alert alert-success">
                            <strong>Success!</strong> The result has been uploaded successfully!
                        </div>
            
                        <?php
                    } else { ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong> There was a problem uploading the result!
                        </div>
                        <?php
                    }
             
        
         }
  }
  else
  {?>
    <div class="alert alert-warning">
        <strong>Error!</strong> Invalid File Type. Upload Excel File!
    </div>
    <?php 
  }
}
?>