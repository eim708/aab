<!DOCTYPE html>
<html>
    <head>
        <title>Learn CI</title>
    </head>
    <body>
        <h1>Welcome <?= $this->session->userdata('username') ?></h1>
        <a href="<?= site_url('home/logout') ?>">Logout</a>    

<script type="text/javascript"  
            src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.  
            min.js"></script>  
            <script type="text/javascript"  
               src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquer  
               y-ui.min.js"></script>  
               <script type="text/javascript">  
                  $(document).ready(function() {  
                     $("#categoryDrp").change(function(){  
                     /*dropdown post *///  
                     $.ajax({  
                        url:"<?php echo base_url();?>index.php/Site/get_subcategory",  
                        data: {id: $(this).val()},  
                        type: "POST",  
                        success:function(data){  
                            $("#subcategoryDrp").html(data);  
                        }  
                        });  
                  });  
            });  
</script>  

<body>  
    <!--category dropdown-->  
    <?php 
        echo form_dropdown('categoryDrp', $groups,'','class="required" id="categoryDrp"'); ?>  
      <br />  
      <br />  
      
      <!--subcategory dropdown-->  
      <select name="subcategoryDrp" id="subcategoryDrp">  
         <option value="">Select</option>  
      </select>  
      <br />  
</body>  

    </body>
</html>