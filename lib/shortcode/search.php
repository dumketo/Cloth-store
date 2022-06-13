<?php
function search_box(){
    ob_start(); ?>
    <style>
        .openBtn { padding: 16px 0;border: 0; background: transparent; margin: 0 auto; display: block; }
        .overlay { height: 100%;width: 100%;display: none;position: fixed;z-index: 999;top: 0;left: 0;background-color: rgb(0,0,0);background-color: rgba(0,0,0, 0.9); }
        .overlay-content { position: relative;top: 46%;width: 80%;text-align: center;margin-top: 30px;margin: auto; }
        .overlay .closebtn { position: absolute;top: 20px;right: 45px;font-size: 60px;cursor: pointer;color: white; }
        .overlay .closebtn:hover { color: #ccc; }
        .overlay input[type=text] { padding: 15px;font-size: 17px;border: none;float: left;width: 80%;background: white; }
        .overlay input[type=text]:hover { background: #f1f1f1; }
        .overlay button { float: left;width: 20%;padding: 15px;background: #ddd;font-size: 17px;border: none;cursor: pointer; } 
        .overlay button:hover { background: #bbb; }
    </style>
    <div id="myOverlay" class="overlay">
        <span class="closebtn" onclick="closeSearch()" title="Close Overlay">x</span>
        <div class="overlay-content">
            <?php aws_get_search_form( true ); ?>
        </div>
    </div>
    <button class="openBtn" onclick="openSearch()"><img src="http://dumketo.liveblog365.com/wp-content/uploads/2022/06/search.png" alt="Search" class="img-fluid d-block mx-auto"></button>
    <script>
        function openSearch() {
          document.getElementById("myOverlay").style.display = "block";
        }
        function closeSearch() {
          document.getElementById("myOverlay").style.display = "none";
        }
    </script>
<?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode( 'search_box', 'search_box' );