<?php
    require_once "header.php";
    
    ?>
   
   
    <div class="main2">
        <div class="bar">
        <i class="fas fa-table"></i>     ตาราง EDIT ข้อมูลสินค้า
            
        </div>

        <?php


    ?>
    <br><div class="table1">
    <div class="row">
                <div class="col-lg-12">

                    <!--Simple table example -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i> แก้ไขข้อมูล

                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form name="form1" id="myform1" action="?update=true&id=<?php echo $_REQUEST['id'];?>" method="post" onsubmit="return chk_error();" enctype="multipart/form-data">

									                  <?php 
									                    $sql = $conn->query("select * from product where Pro_ID = '$_REQUEST[id]'")or die (mysqli_error());
									                    $show = $sql->fetch_assoc ();
									                    ?>

                                    <div class="form-group col-lg-4">
                                    <img src="../img/<?php echo $show['Pro_IMG'];?>" width=130 height=120>
                                    <br>

                                    <label>รูปสินค้า</label>
                                    <div class="form-group has-feedback">
                                      <input type="file"  id="file" name="file" class="file">
                                    </div>
                                    </div>

                                    <div class="form-group col-lg-4">
                                    <label>ชื่อสินค้า</label>
                                    
                                    <div class="form-group has-feedback">
                                    <input name="name" type="text" class="form-control css-require" value="<?php echo $show['Pro_Name'];?>">
                                    </div>
                                    </div>
                                    

                                    <div class="form-group col-lg-12">
                                    <label>รายละเอียดสินค้า</label>
                                    
                                    <div class="form-group has-feedback">
                                    <textarea name="detail" class="form-control css-require" rows="7"><?php echo str_replace('<br />',"",$show['Pro_Detail']);?></textarea>
                                    </div>
                                    </div>


                                    <div class="form-group col-lg-2">
                                    <label>จำนวนสินค้า</label>
                                    
                                    <div class="form-group has-feedback">
                                    <input name="amount" type="text" class="form-control css-require" value="<?php echo $show['Pro_Amount'];?>">
                                    </div>
                                    </div>

                                    <div class="form-group col-lg-3">
                                    <label>ราคา (บาท)</label>
                                    
                                    <div class="form-group has-feedback">
                                    <input name="price" type="text" class="form-control css-require" value="<?php echo $show['Pro_Price'];?>">
                                    </div>
                                    </div>
                                    
                                    <div class="clearfix"></div>

                                    <div class="form-group col-lg-2">
                                    <label>จำนวนที่ขายได้</label>
                                    
                                    <div class="form-group has-feedback">
                                    <input name="buy" type="text" disabled class="form-control css-require"  value="<?php echo $show['Pro_Buy'];?>">
                                    </div>
                                    </div>

                                    <div class="form-group col-lg-2">
                                    <label>Date Create</label>
                                    
                                    <div class="form-group has-feedback">
                                    <input name="buy" type="text" disabled class="form-control css-require"  value="<?php echo $show['Pro_Date'];?>">
                                    </div>
                                    </div>
                                    


                                    <div class="clearfix"></div>


									<div class="col-lg-12 form-group">
									<input name="" type="submit" class="btn btn-primary panel-info" value="ยืนยัน">
									<input name="" type="reset" class="btn btn-danger panel-info" value="ยกเลิก">

									</div>

									</form>

                                </div>

                            </div>

	
    </div>
   
    </div>
    </div>

</body>
</html>
   <?php

//update data
if(isset($_GET['update'])){

  //check data ซ้ำ โดย check ตามชื่อฟิลด์ที่กำหนด ถ้า ซ้ำกันจะไม่สามารถแก้ไขข้อมูลได้
  $sql = $conn->query("select * from product where Pro_Name = '$_REQUEST[name]' && Pro_ID != '$_REQUEST[id]'")or die (mysqli_error());
  if($sql->num_rows>0){
  
  //function check data ซ้ำ จะมี alert ขึ้นมา ตามเงื่อนไข
  Chk_Duplicate ($sql);
  
  }
  else {
  
  $detail = nl2br($_REQUEST['detail']);
  
  $file = strrchr($_FILES['file']['name'], "."); //ตัดนามสกุลไฟล์เก็บไว้
  $filename = (Date("dmy_His").$file); //ตั้งเป็น วันที่_เวลา.นามสกุล
  $folder = "../img/"; // path folder
  $width = 0;// ความกว้างของภาพ
  $height = 0;// ความยาวของภาพ        
  
  if($file){
  
  Upload_File ($filename,$folder,$width,$height);
  
  //แก้ไขข้อมูลลง table ที่กำหนด โดยให้ชื่อฟิลด์ใน table ใน db = ค่าที่รับมา โดยข้อมูลที่แก้จะเปลี่ยนแปลงตาม id ของ รายการนั้น
  $sql = $conn->query("update product set Pro_IMG = '$filename',Pro_Name = '$_REQUEST[name]',Pro_Detail = '$detail',Pro_Price = '$_REQUEST[price]',Pro_Amount = '$_REQUEST[amount]' where Pro_ID = '$_REQUEST[id]'")or die (mysqli_error());
  
  }
  
  else {
  
  //แก้ไขข้อมูลลง table ที่กำหนด โดยให้ชื่อฟิลด์ใน table ใน db = ค่าที่รับมา โดยข้อมูลที่แก้จะเปลี่ยนแปลงตาม id ของ รายการนั้น
  $sql = $conn->query("update product set Pro_Name = '$_REQUEST[name]',Pro_Detail = '$detail',Pro_Price = '$_REQUEST[price]',Pro_Amount = '$_REQUEST[amount]' where Pro_ID = '$_REQUEST[id]'")or die (mysqli_error());
  
  }
  
  //function check แก้ไขข้อมูล จะมี alert ขึ้นมา ตามเงื่อนไข
  Chk_Update($sql,'แก้ไขข้อมูลเรียบร้อย','adindex.php');
  }
  
  }
?>
 <?php
        mysqli_close($conn);
    ?>


<script>
    var dropdown = document.getElementsByClassName("dropdown");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>