<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header"> 
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> 
      <span class="sr-only">Toggle nav</span> 
      <span class="icon-bar"></span> 
      <span class="icon-bar"></span> 
      <span class="icon-bar"></span> 
      </button> 
      <a class="navbar-brand" href="#">
      <img src="<?=BASE_URL?>cms/logo.png" class="img-responsive">
      </a> 
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="/cms/updates.php">სიახლეები</a></li>
        <li><a href="/cms/gallery.php">გალერეა</a></li>
        <li>
            <a class="btn" data-toggle="modal" data-target="#MarkSold">
                მონიშნე გაყიდულად
            </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/cms/sign-out.php">გასვლა</a></li>
      </ul>
    </div>
  </div>
</nav>

<!--Mark apartment as sold-->
<div class="modal fade" id="MarkSold" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">მონიშნე ბინა გაყიდულად</h4>
            </div>
            <div class="modal-body">
                <div>მონიშნე ბელიაშვილის ბინა გაყიდულად</div><br>
                <label for="floor" style="margin: 10px">
                    სართული:
                    <input id="floor" name="floor" type="number" max="22" min="2">
                </label>
                <label for="ap_num" style="margin: 10px">
                    ბინის ნომერი:
                    <input id="ap_num" name="ap_num" type="number" max="15" min="1">
                </label>
                <label><input type="button" value="მონიშნე გაყიდულად" onclick="markSold()"></label>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    function markSold(){
        const floor = document.getElementById("floor").value;
        const ap_num = document.getElementById("ap_num").value;
        if(!floor || !ap_num || floor < 3 || floor > 22 || ap_num < 1 || ap_num > 15) {
            window.alert("გთხოვთ შეიყვანოთ ბინის სართული და ნომერი სწორად!");
            return;
        }
        jQuery.ajax({
            type: "POST",
            url: '/cms/method_list.php',
            dataType: 'json',
            data: {name: 'markApartmentSold', arguments:{floor: floor, number : ap_num}},
            success : function(data){
                if(data["result"])
                    window.alert("ბინა მონიშნულია გაყიდულად.");
                else
                    window.alert("ბინის გაყიდულად მონიშვნა შეუძლებელია");
            },
            error: data => {
                console.log(data);
                window.alert("ბინის გაყიდულად მონიშვნა შეუძლებელია!");
            }
        });

    }
</script>