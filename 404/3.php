<style type="text/css">
    *,
    *:before,
    *:after { box-sizing: border-box }
    body { background: -webkit-linear-gradient(315deg, #282430 0%, #100e12 100%); background: linear-gradient(135deg, #282430 0%, #100e12 100%); min-height: 100vh; font-family: 'Lato', sans-serif; }
    .table-cell { vertical-align: middle; }
    h1 { font-family: 'Lato', sans-serif; font-weight: 100; font-size: 40vmin; text-align: center; line-height: 30vh; margin: 6vh 0 10vh 0; color: rgba(255, 255, 255, 0.7); text-shadow: 1px 2px 5px rgba(0, 0, 0, 0.5); }
    h2 { font-weight: 100; color: rgba(255, 255, 255, 0.7); text-align: center; line-height: 1.5em; font-size: 2.5vmin; }
    header { width: 100%; padding-top: 30px; }
    .holder { width: 100%; padding: 20px; margin: 0 auto; text-align: center; }
    .holder a{color: #fff;text-decoration: none;}
    .holder a:hover, .holder a:focus{color: #000;text-decoration: none;outline: none;}
    .container { margin: 0 auto; width: 100%; max-width: 1190px; position: relative; padding: 0 30px; }
    button { mix-blend-mode: screen; -webkit-appearance: none; outline: none; border: 2px solid #fff; background: transparent; color: #fff; padding: 20px 60px; font-size: 2vmin; letter-spacing: 0.25vmin; margin: 3vh 0; -webkit-transition: all 0.2s; transition: all 0.2s; opacity: 0.85;cursor: pointer; }
    button:hover { background-color: #fff; color: #000; }
    .tl-logo { opacity: 0.7;cursor: pointer;text-align: center; display: block; margin: 15px 0; }
    .tl-logo:before,
    .tl-logo:after { position: absolute; display: block; content: ''; height: 0; width: 0.28em; border: 0.12em solid #000; border-left: 0; border-bottom: 0; box-sizing: border-box; top: 50%; margin-top: -0.18em; left: 50%; margin-left: -0.3em; -webkit-transform: scale(0, 1); transform: scale(0, 1); -webkit-transform-origin: 0% 0%; transform-origin: 0% 0%; -webkit-transition: height 0.2s ease-in, -webkit-transform 0.1s 0.2s ease-out; transition: height 0.2s ease-in, -webkit-transform 0.1s 0.2s ease-out; transition: height 0.2s ease-in, transform 0.1s 0.2s ease-out; transition: height 0.2s ease-in, transform 0.1s 0.2s ease-out, -webkit-transform 0.1s 0.2s ease-out; }
    .tl-logo:after { border: 0.12em solid #000; border-right: 0; border-top: 0; left: auto; right: 50%; top: auto; bottom: 50%; margin-bottom: -0.18em; margin-right: -0.3em; -webkit-transform-origin: 100% 100%; transform-origin: 100% 100%; }
    .tl-logo.hover:before,
    .tl-logo.hover:after { height: 0.36em; -webkit-transform: scale(1, 1); transform: scale(1, 1); -webkit-transition: height 0.2s 0.1s ease-out, -webkit-transform 0.1s ease-in; transition: height 0.2s 0.1s ease-out, -webkit-transform 0.1s ease-in; transition: height 0.2s 0.1s ease-out, transform 0.1s ease-in; transition: height 0.2s 0.1s ease-out, transform 0.1s ease-in, -webkit-transform 0.1s ease-in; }
    .tl-logo.hover { -webkit-transform: rotate(180deg); transform: rotate(180deg); -webkit-transition: -webkit-transform 0.5s ease; transition: -webkit-transform 0.5s ease; transition: transform 0.5s ease; transition: transform 0.5s ease, -webkit-transform 0.5s ease; }
</style>
<script type="text/javascript">
// ----- On render -----
    jQuery(document).ready(function($){
        setTimeout(function(){
        $('#logo').addClass('hover');
        }, 300);
    });
</script>

<header>
    <div class="container">
        <div id="logo" class="tl-logo">
            <?php 
            global $dumketo;
            $logo = $dumketo["logo"]["url"];
            $alt_text = get_the_title( $dumketo['logo']['id'] ); 
            ?>
            <a href='<?php echo esc_url( home_url( '/' ) ); ?>' >
                <?php echo do_shortcode( '[img img_name="'.$logo.'" format="" alt="'.$alt_text.'" class="img-responsive center-block logo"  ]' ) ?>
            </a>
        </div>
    </div>
</header>
<div class="table mainbox">
    <div class="table-cell">
        <div class="holder">
            <h2>Page not found</h2>
            <h1>404</h1>
            <h2>Sorry, there's nothing to see here.</h2>
            <a href="<?php echo home_url(); ?>">
                <button>GO HOME</button>
            </a>
        </div>
    </div>
</div>