
<html>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Office Meal Count</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url() ?>assets/images/info_favIcon.png">
    <script type="text/javascript" src="<?php echo base_url()?>assets/JS/jquery.min.js"></script>
    <script type="text/javascript">
        
//        $(function(){
//            $("#sign").click(function(){
//            var userEmail = $('#userID').val();
//            var password = $('#password').val();
//            alert(userEmail);
//            $.ajax(
//                        {
//                            type: 'POST',
//                            data: {userEmail: userEmail,password:password},
//                            url: '<?php echo base_url(); ?>.'Login/checkLogin'',
//                            success: function (response) {
//                                if (response == true){
//                                    alert("Successfully Login");
//                                };
//                            }
//                        });
//        });
//        });
//    
    </script>

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/admin.css" />
    <body>
        <h2 style="color: red;"><?php echo $this->session->flashdata('Message')?></h2>

        <form id="loginform" method="post" action="<?php echo base_url();?>Login/checkLogin">
            
            <input type="text" name="userEmail"  class="input" placeholder="E-mail" /> 
            <input type="password" name="userPassword" class="input" placeholder="Password" />
            <input type="submit" class="loginbutton " id="sign" value="SIGN IN" />
        </form>

    </body>
</html>
