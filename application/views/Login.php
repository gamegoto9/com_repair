<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/img/favicon.png">
  <title>Clean Zone</title>
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Raleway:300,200,100" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet" type="text/css">

  <link href="<?php echo base_url('assets/login/css/bootstrap.min.css');?>" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url('assets/login/css/font-awesome/css/font-awesome.min.css');?>">
    <!--if lt IE 9script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
  -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/css/jquery.nanoscroller/css/nanoscroller.css');?>">
  <link href="<?php echo base_url('assets/login/css/style.css');?>" rel="stylesheet">
</head>
<body class="texture">
  <div id="cl-wrapper" class="login-container">
    <div class="middle-login">
      <div class="block-flat">
        <div class="header">
          <h3 class="text-center">Durable Articles</h3>
        </div>
        <div>
          <form style="margin-bottom: 0px !important;" class="form-horizontal" name="form_data" id="form_data">
            <div class="content">
              <h4 class="title">Login Access</h4>
              <div class="form-group">
                <div class="col-sm-12">
                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" placeholder="Username" class="form-control" name="name" id="name">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input  type="password" placeholder="Password" class="form-control" name="sex" id="sex">
                  </div>
                </div>
              </div>
            </div>
            <div class="foot">

              <button data-dismiss="modal" type="button" class="btn btn-primary" id="btn_save">Log me in</button>

              <button data-dismiss="modal" type="button" class="btn btn-danger" id="btn_register" onclick="showModal2();">Register</button>
            </div>
          </form>
        </div>
      </div>
      <div class="text-center out-links"><a href="#">© 2017 Your Company</a></div>
    </div>
  </div>



  <!-- Modal -->
  <div class="modal fade" id="modalShow2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-admin" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel"></h4>
        </div>
        <div class="modal-body">


          <div id="div_show2">

          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" onclick="save_regis();">บันทึก</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>

        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="<?php echo base_url('assets/login/js/jquery.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/login/js/jquery.nanoscroller.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/login/js/cleanzone.js');?>"></script>
  <script src="<?php echo base_url('assets/login/js/bootstrap.min.js');?>"></script>
  <script src="<?php echo base_url('assets/login/js/voice-recognition.js');?>"></script>

  <!-- bootboxjs -->
  <script src="<?php echo base_url('assets/js/bootbox.min.js'); ?>"></script>

  <!--pnotify-->
  <link href="<?php echo base_url('assets/pnotify/jquery.pnotify.default.icons.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/pnotify/jquery.pnotify.default.css') ?>" rel="stylesheet">
  <script src="<?php echo base_url('assets/pnotify/jquery.pnotify.js') ?>"></script>


  <script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();

        $("#btn_save").click(function() {



          var faction = "<?php echo site_url('/comrepair/check_login'); ?>";
          var fdata = $("#form_data").serialize();

          

          $.ajax({
            type: 'POST',
            url: faction,
                data: fdata, // or JSON.stringify ({name: 'jonas'}),
                success: function(jdata) {
                 if (jdata.is_successful) {

                  $.pnotify({
                    title: 'แจ้งให้ทราบ!',
                    text: jdata.msg,
                    type: 'success',
                    opacity: 1,
                    history: false

                  });



                  $(window.location).attr('href', '<?php echo site_url('/comrepair/home'); ?>');
                } else {

                  $.pnotify({
                    title: 'เตือน!',
                    text: jdata.msg,
                    type: 'error',
                    opacity: 1,
                    history: false
                  });
                }

              },

              dataType: 'json'
            });

          return false;


        });


      });

    function showModal2() {
   
      $('#div_show2').load('register/');
      $('#modalShow2').modal('show');
    }




    function save_regis(){


    var formData = new FormData($('#form_regis')[0]);

    $.ajax({
      url: "insert_regis",
      type: 'POST',
      data: formData,
      mimeType: "multipart/form-data",
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        //now get here response returned by PHP in JSON fomat you can parse it using JSON.parse(data)

        var posts = JSON.parse(data);
        console.log(posts);


        if (posts.is_successful) {
          $.pnotify({
            title: 'แจ้งให้ทราบ!',
            text: posts.msg,
            type: 'success',
            opacity: 1,
            history: false
          });

          $('#form_regis').trigger('reset');
          $('#modalShow2').modal('hide');

        } else {

          $.pnotify({
            title: 'เตือน!',
            text: posts.msg,
            type: 'error',
            opacity: 1,
            history: false
          });

         
        }


      },
      error: function(jqXHR, textStatus, errorThrown) {
        //handle here error returned
      }
  });

  return false;
}


  </script>
</body>
</html>