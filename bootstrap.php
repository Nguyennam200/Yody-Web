<!-- <link rel="stylesheet" href="../Bootstrap/css/bootstrap-fileupload.min.css"> -->

<!-- <link rel="stylesheet" href="../Bootstrap/css/bootstrap-social.css"> -->

<link rel="stylesheet" href="../Bootstrap/css/custom.css">

<link rel="stylesheet" href="../Bootstrap/css/bootstrap.css">

<link rel="stylesheet" href="../Bootstrap/css/font-awesome.css">

<!-- <link rel="stylesheet" href="../Bootstrap/css/error.css"> -->

<!-- <link rel="stylesheet" href="../Bootstrap/css/invoice.css"> -->

<!-- <link rel="stylesheet" href="../Bootstrap/css/prettyPhoto.css"> -->

<!-- <link rel="stylesheet" href="../Bootstrap/css/pricing.css"> -->

<!-- <link rel="stylesheet" href="../Bootstrap/css/wizard/jquery.steps.css"> -->

<!-- <link rel="stylesheet" href="../Bootstrap/css/wizard/normalize.css"> -->

<!-- <link rel="stylesheet" href="../Bootstrap/css/wizard/wizardMain.css"> -->

<!-- <script src="../Bootstrap/js/bootstrap-fileupload.js"></script> -->

<script src="../Bootstrap/js/bootstrap.js"></script>

<script src="../Bootstrap/js/custom.js"></script>

<!-- <script src="../Bootstrap/js/galleryCustom.js"></script> -->

<!-- <script src="../Bootstrap/js/jquery-1.10.2.js"></script> -->

<!-- <script src="../Bootstrap/js/jquery.metisMenu.js"></script> -->

<!-- <script src="../Bootstrap/js/jquery.mixitup.min.js"></script> -->

<!-- <script src="../Bootstrap/js/jquery.prettyPhoto.js"></script> -->

<!-- <script src="../Bootstrap/js/wizard/jquery.cookie-1.3.1.js"></script> -->

<!-- <script src="../Bootstrap/js/wizard/"></script> -->

<!-- <script src="../Bootstrap/js/wizard/modernizr-2.6.2.min.js"></script> -->

<script>
    const eye_password = document.querySelectorAll(".btn_eye_password");
    $('.btn_eye_password').css('color','#ccc');
    eye_password.forEach(function(button,index){
        button.addEventListener("click", function(e){
            var btnItem = e.target;
            var box_password = btnItem.parentElement;
            var id_input = box_password.querySelector("input").id;
            var id_button = button.id;
            var class_listbutn = button.classList;
            class_listbutn.forEach(function(element){
                if(element == 'fa-eye-slash'){
                    $('#'+id_button).removeClass('fa-eye-slash'); 
                    $('#'+id_button).addClass('fa-eye');
                    $('#'+id_button).css('color','#555'); 
                    $('#'+id_input).attr('type', 'text');
                }
                if(element == 'fa-eye'){
                    $('#'+id_button).removeClass('fa-eye'); 
                    $('#'+id_button).addClass('fa-eye-slash');
                    $('#'+id_button).css('color','#ccc'); 
                    $('#'+id_input).attr('type', 'password');
                }
            });
        });
    });

    $('#zoom_img_all').hide();
    const image_link = document.querySelectorAll("img");
    image_link.forEach(function(button,index){
        button.addEventListener("click", function(e){
            var id_img = button.id;
            var img_src = $('#'+id_img).attr('src');
            $('#zoom_img_all').show();
            $('body').css('overflow-y', 'hidden');
            setTimeout(()=>{
                $('#zoom_img_all img').css({ 'max-width': '100%','max-height': '100%',});
                $('#zoom_img_all img').attr('src', img_src);
            },1000);
        });
    });
    
    $('#zoom_img_all').click(function (e) { 
        $('#zoom_img_all').hide();
        $('body').css('overflow-y', 'auto');
        $('#zoom_img_all img').attr('src', '../images/images_display/loader.gif');
    });
</script>
<style>
 /* nền trình duyệt */
*{
    margin: 0;
    padding: 0;
    outline: none;
}

*::-webkit-scrollbar {
    width: 3px;
    background-color: #F5F5F5;
}

*::-webkit-scrollbar-thumb {
    background-color: #929090;
    border-radius: 15px;
}

*::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(148, 146, 146, 0.3);
    background-color: #F5F5F5;
}

/* model loading back-ground */
.image_zoom_all{
    width: 100%;
    height: 100%;
    overflow: hidden;
    position: fixed;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0;
    margin: 0;
    background-color: rgba(43, 38, 38, 0.795);
    z-index: 1000;
}

.image_zoom_all img{
    min-width: 50px;
    min-height: 50px;
    max-width: 100%;
    max-height: 100%;
    padding: 0 !important;
    margin: 0 !important;
}

/* login form */
.logo_form{
    width: 100%;
    height: auto;
    text-align: center;
}

.logo_form .main_logo_form{
    margin: auto;
    padding-top: 20px;
}

.main_logo_form .left_logo_form{
    max-width: 600px;
    height: auto;
    margin: auto;
}

.main_logo_form .left_logo_form img{
    width: 600px;
    height: auto;
    background-color: red;
    border-radius: 25px;
    float: left;
}

.main_logo_form .left_logo_form span{
    max-width: 600px;
    height: auto;
    font-size: 24px;
}

.main_logo_form .right_logo_form{
    width: 600px;
    height: auto;
    border: 1px solid;
    border-radius: 15px;
    background-color: #fff;
    margin: auto;
}

.main_logo_form .right_logo_form .form-group{
    width: 100%;
    height: 50px;
    padding: 0 5%;
    margin-top: 25px;
    display: flex !important; 
    justify-content: space-between;
    align-items: center;
}

.main_logo_form .right_logo_form .form-group span{
    width: 10% !important;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.main_logo_form .right_logo_form .form-group input{
    width: 90% !important;
    height: 50px;
    border: 1px solid #ccc;
    padding: 10px;
    color: #555;
    border-radius: 0 5px 5px 0 !important;
}

.main_logo_form .right_logo_form .form-group button{
    width: 100% ;
    height: 100%;
    background-color: #1877f2;
    border-radius: 5px;
    font-size: 24px;
    color: #fff;
}

.btn_eye_password{
    position: absolute !important;
    width: 10% !important;
    height: 50px;
    border: none;
    padding: 10px;
    right: 5%;
    background-color: unset !important;
    z-index: 5;
}

.input-group-addon:not(:first-child):not(:last-child), .input-group-btn:not(:first-child):not(:last-child), .input-group .form-control:not(:first-child):not(:last-child) {
    border-radius: 0 5px 5px 0 !important;
}

.main_logo_form .right_logo_form .form-group a{
    width: 100%;
    height: 100%;
    font-size: 24px;
}

.main_logo_form .right_logo_form hr{
    width: 90%;
    height: 1px;
    background-color: rgb(179, 165, 165);
    margin: -15px auto;
    margin-bottom: 10px;
}

.forget_password{
    font-size: 18px;
    margin: 0 30%;
}

.main_logo_form .right_logo_form  .button_register{
    min-width: 100px;
    width: 60%;
    min-height: 50px;
    background-color: #42b72a;
    border-radius: 5px;
    font-size: 24px;
    color: #fff;
    border: none;
    margin-bottom: 10px;
}

/* register_form */
.back_ground_register{
    width: 100%;
    height: 100%;
    position: fixed;
    padding-top: 50px;
    overflow-y: auto;
    z-index: 5;
    background-color: #e2e2e2ec;
    overflow-y: auto !important;
    top: 0;
}

.register_form{
    width: 500px;
    height: auto;
    background-color: #fff;
    margin: auto;
    border: 1px solid;
    border-radius: 15px;
}

.register_form h1{
    width: 85%;
    margin-left: 5%;
    font-weight: bold;
    float: left;
}

.register_form h4{
    width: 95%;
    margin-left: 5%;
    float: left;
}

.register_form hr{
    width: 100%;
}

.button_close_form{
    max-width: 10%;
    height: auto;
    position: relative;
    border: none;
    background-color: unset;
    font-size: 30px;
    top: 0;
    right: 0;
}

.register_form .form-group{
    width: 100%;
    height: 50px;
    padding: 0 5%;
    margin-top: 25px;
}

.register_form .form-group input{
    width: 100%;
    height: 100%;
}

.register_form .form-group span{
    width: 40px;
}

.register_form  .button_register{
    width: 60%;
    min-height: 50px;
    background-color: #42b72a;
    border-radius: 5px;
    font-size: 24px;
    color: #fff;
    margin: -10px 20%;
    border: none;
}

/* home_page */
.header{
    width: 100%;
    height: auto;
}
.header_main{
    position: relative;
    max-width: 1370px;
    height: 50px;
    display: flex;
    justify-content: space-between;
    margin: auto;
    position: relative;
}
.header_main .header_logo{
    position: relative;
    width: 150px;
    height: 50%;
    border: none;
    background-color: unset;
    float: left;
}
.header_main .header_logo img{
    width: 100%;
    height: 100%;
}
.header_main .header_main_box_search{
    position: absolute;
    display: flex;
    width: 90%;
    height: 15px;
    top: 40px;
    left: 50%;
    border-radius: 15px;
    transform: translate(-50%, -50%);
    background-color: #cf2e2e;
    color: #fff;
}
.header_main .header_main_box_search input{
    width: 90%;
    height: 100%;
    border: none;
    background-color: unset;
    padding: 2px 0 2px 15px;
    font-size: 10px;
    border-radius: 15px 0 0 15px;
}
.header_main .header_main_box_search input::placeholder{
    color: #fff;
}
.header_main .header_main_box_search button{
    width: 10%;
    height: 100%;
    border: none;
    background-color: unset;
    font-size: 10px;
    border-radius: 0 15px 15px 0;
}
.header_main .header_main_box_user{
    position: relative;
    max-width: 120px;
    height: 50%;
    float: left;
}
.header_main .header_main_box_user .header_main_box_user_menu{
    width: 25px;
    height: 25px;
    border: 1px solid #000;
    border-radius: 50%;
    margin: 2.5px 5px;
}
.header_main .header_main_box_user .header_main_box_user_menu img{
    width: 100%;
    height: 100%;
    border-radius: 50%;
}
.header_main .header_main_box_user .header_main_box_user_listfunction{
    width: 150px;
    height: 110px;
    background-color: #fff;
    position: absolute;
    border-radius: 5px;
    box-shadow: 0 0 0 1px gainsboro;
    top: 50px;
    right: 3px;
    overflow-x: hidden;
    overflow-y: auto;
    padding: 5px;
}
.header_main .header_main_box_user .header_main_box_user_listfunction li{
    width: 100%;
    height: 20px;
    color: #1877f2;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-left: 10px;
    font-size: 10px;
    cursor: pointer;
}
.header_main .header_main_box_user .header_main_box_user_listfunction li:hover{
    background-color: aqua;
}
.header_main .header_main_box_user .header_main_box_user_listfunction li:hover{
    color: #929090;
}
.header_bottom{
    max-width: 1360px;
    width: 100%;
    height: 25px;
    margin: auto;
}
.header_bost{
    position: fixed;
    top: 0;
    background-color: #ffff;
    z-index: 10;
}
.header_bottom .button_model_menu{
    width: 25px;
    height: 25px;
    position: absolute;
    border: none;
    background-color: unset;
    margin-left: 20px;
}
.library_tittle{
    width: 100%;
    min-height: 50px;
    font-size: 12px;
}
.library_tittle .library_tittle_item{
    width: 100%;
    min-height: 25px;
    text-align: center;
    color: #333;
}
.click_item{
    color: #a2a9af;
    cursor: pointer;
}
.click_item:hover{
    color: #333;
}
.wrapper{
    width: 100%;
    height: auto;
    display: flex;
    justify-content: center;
}
.wrapper .wrapper_inner{
    height: auto;
    display: grid;
    margin: auto;
    padding: 5px;
    grid-auto-rows: minmax(270px, auto);
    gap: 10px 10px;
    background-color: #1111;
}
.wrapper_inner_Item{
    width: 260px;
    height: auto;
    border-radius: 5px;
    background-color: #ccc;
    padding-bottom: 60px;
    position: relative;
}
.wrapper_inner_Item img{
    width: 260px;
    height: 250px;
    padding: 10px;
    border-radius: 5px;
}
.wrapper_inner_Item .box_tittle_product{
    width: 100%;
    height: auto;
    padding: 0 10px 10px;
}
.wrapper_inner_Item .box_tittle_product .box_tittle_product_category{
    width: 100%;
    height: auto;
    font-size: 18px;
    text-transform: uppercase;
    font-weight: bold;
}
.wrapper_inner_Item .box_tittle_product .box_tittle_product_name{
    width: 100%;
    height: auto;
    font-size: 16px;
}
.wrapper_inner_Item .box_tittle_product .box_tittle_product_price{
    width: 90%;
    height: 30px;
    font-size: 18px;
    position: absolute;
    bottom: 40px;
}
.wrapper_inner_Item .box_tittle_product .box_tittle_product_price .box_tittle_product_price_item1{
    width: 100%;
    height: 100%;
    font-size: 16px;
    text-decoration: line-through;
}
.wrapper_inner_Item .box_tittle_product .box_tittle_product_price .box_tittle_product_price_item2{
    width: 100%;
    height: 100%;
    font-size: 16px;
    color: red;
    margin-left: 5px;
}
.wrapper_inner_Item .box_tittle_product .box_tittle_product_buy{
    width: 50%;
    height: 30px;
    font-size: 16px;
    color: #fff;
    background-color: red;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    text-transform: uppercase;
    font-weight: bold;
    position: absolute;
    bottom: 10px;
}
.wrapper_inner_Item .box_tittle_product .box_tittle_product_buy:hover{
    background-color: #cf2e2e;
}
@media screen and (min-width: 500px){
    .header_main .header_logo{
        width: 200px;
        height: 100%;
        float: left;
    }
    .header_main .header_logo img{
        padding: 5% 0 5% 25%;
    }
    .header_main .header_main_box_search{
        position: relative;
        max-width: 800px;
        height: 30px;
        border-radius: 15px;
        margin-right: 30px;
        top: 10px;
        left: 30px;
        transform: translate(0, 0);
        float: left;
    }
    .header_main .header_main_box_search input{
        max-width: 770px;
        padding: 5px 0 5px 15px;
    }
    .header_main .header_main_box_search button{
        min-width: 30px;
    }
    .header_main .header_main_box_user{
        position: relative;
        max-width: 200px;
        height: 50px;
        display: flex;
    }
    .header_main .header_main_box_user .header_main_box_user_menu{
        width: 40px;
        height: 40px;
        margin: 5px 10px;
        float: left;
    }
    .header_main .header_main_box_user .header_main_box_user_listfunction{
        width: 300px;
        height: 250px;
        background-color: #fff;
        position: absolute;
        border-radius: 5px;
        box-shadow: 0 0 0 1px gainsboro;
        top: 50px;
        right: 5px;
        overflow-x: hidden;
        overflow-y: auto;
        padding: 5px;
    }
    .header_main .header_main_box_user .header_main_box_user_listfunction li{
        width: 100%;
        height: 50px;
        color: #1877f2;
        font-size: 24px;
    }
    .header_bottom{
        height: 50px;
    }
    .header_bottom .button_model_menu{
        width: 50px;
        height: 50px;
    }
    .library_tittle{
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 18px;
    }
    .library_tittle .library_tittle_item{
        min-height: 50px;
        text-align: center;
    }
    .left_item{
        margin-left: 10px;
    }
    .right_item{
        margin-right: 10px;
        font-size: 12px;
    }
}
@media screen and (min-width:820px){
    .library_tittle .library_tittle_item{
        width: auto;
    }
    .left_item{
        margin-left: 50px;
    }
    .right_item{
        margin-right: 50px;
        font-size: 18px;
    }
}
@media screen and (min-width:270px){
    .wrapper .wrapper_inner{
        grid-template-columns: repeat(1,260px);
    }
}
@media screen and (min-width:540px){
    .wrapper .wrapper_inner{
        grid-template-columns: repeat(2,260px);
    }
}
@media screen and (min-width:810px){
    .wrapper .wrapper_inner{
        grid-template-columns: repeat(3,260px);
    }
}
@media screen and (min-width:1080px){
    .wrapper .wrapper_inner{
        grid-template-columns: repeat(4,260px);
    }
}
@media screen and (min-width: 1360px){
    .wrapper .wrapper_inner{
        grid-template-columns: repeat(5,260px);
    }
}
.model_menu{
    position: fixed;
    z-index: 50;
    width: 100%;
    height: 100%;
    display: flex;
    background-color: #9999;
    font-size: 5px;
    top: 0;
    left: 0;
}
.model_menu .model_menu_list{
    width: 35%;
    height: 100%;
    background-color: #202020;
}
.model_menu .model_menu_list .box_search_model{
    width: 100%;
    height: 20%;
    background-color: #aaa;
    display: flex;
    align-items: center;
    justify-content: center;
}
.model_menu .model_menu_list .box_search_model .box_search_model_form{
    width: 80%;
    height: 30%;
    background-color: #333;
    border-radius: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
}
.model_menu .model_menu_list .box_search_model .box_search_model_form input{
    width: 80%;
    height: 100%;
    background-color: unset;
    padding: 5px;
    border: none;
    border-radius: 25px 0 0 25px;
}
.model_menu .model_menu_list .box_search_model .box_search_model_form input::placeholder{
    color: #fff;
}
.model_menu .model_menu_list .box_search_model .box_search_model_form button{
    width: 20%;
    height: 100%;
    background-color: unset;
    border: none;
    border-radius: 0 25px 25px 0;
}

.model_menu .model_menu_list .box_list_menu_model{
    width: 100%;
    height: 80%;
    background-color: #202020;
    list-style: none;
    position: relative;
    overflow-x: hidden;
    overflow-y: auto;
}
.model_menu .model_menu_list .box_list_menu_model::-webkit-scrollbar{
    width: 1px;
}
.model_menu .model_menu_nonebg{
    width: 65%;
    height: 100%;
}
.model_menu .model_menu_nonebg button{
    position: absolute;
    width: 5%;
    height: 10%;
    font-size: 200%;
    background-color: unset;
    border: none;
    right: 0;
    top: 0;
    color: #fff;
}
.arrow {
    float: right;
}
.fa.arrow.open_model:before {
    content: "\f107";
}
.fa.arrow.close_model:before {
    content: "\f104";
}
.box_list_menu_model li{
    width: 100%;
    height: auto;
    color: #ffff;
    border-bottom: 1px solid #aaa;
}
.box_list_menu_model li .box_menu_item_model{
    position: relative;
    width: 100%;
    background-color: #202020;
}
.box_list_menu_model li .box_menu_item_model > div{
    position: absolute;
    width: 100%;
    height: 100%;
    padding: 5%;
    background-color: #202020;
    display: flex;
    align-items: center;
    cursor: pointer;
}
.box_list_menu_model li div span, .box_list_menu_model_second li span{
    font-size: 200%;
    margin-right: 5%;
}
.box_list_menu_model li button{
    position: absolute;
    z-index: 5;
    top: 12.5%;
    right: 5%;
    width: 12%;
    height: 75%;
    font-size: 150%;
    border: none;
    background-color: unset;
    color: #aaa;
    border-radius: 50%;
}
.box_list_menu_model li div:hover,.model_menu .model_menu_list .box_list_menu_model li div:hover > div{
    background-color: #000;
}
.box_list_menu_model li button:hover{
    background-color: #aaa;
    color: #fff;
}
.active_model ul{
    position: absolute;
    z-index: 0;
    width: 90%;
    height: auto;
    margin-left: 10%;
    list-style: none;
    animation: backwards 1s ease;
}
.active_model ul li{
    width: 100%;
    padding: 5%;
    border-bottom: none !important;
    border-top: 1px solid #aaa;
}
.active_model ul li:hover{
    background-color: #000;
}
@media screen and (min-width: 500px) {
    .model_menu{
        font-size: 10px;
    }
    .model_menu .model_menu_list .box_search_model .box_search_model_form input{
        padding: 10px;
    }
}
@media screen and (min-width: 1000px) {
    .model_menu{
        font-size: 18px;
    }
    .model_menu .model_menu_list .box_search_model .box_search_model_form input{
        padding: 15px;
    }
}
@media screen and (min-width: 1500px) {
    .model_menu{
        font-size: 24px;
    }
    .model_menu .model_menu_list .box_search_model .box_search_model_form input{
        padding: 20px;
    }
}
@media screen and (min-width: 2700px) {
    .model_menu{
        font-size: 36px;
    }
    .model_menu .model_menu_list .box_search_model .box_search_model_form input{
        padding: 25px;
    }
    .model_menu .model_menu_list .box_search_model .box_search_model_form{
        border-radius: 50px;
    }
    .model_menu .model_menu_list .box_search_model .box_search_model_form input{
        border-radius: 50px 0 0 50px;
    }
    .model_menu .model_menu_list .box_search_model .box_search_model_form input{
        border-radius: 0 50px 50px 0;
    }
}
@media screen and (min-width: 4000px) {
    .model_menu{
        font-size: 70px;
    }
    .model_menu .model_menu_list .box_search_model .box_search_model_form input{
        padding: 50px;
    }
    .model_menu .model_menu_list .box_search_model .box_search_model_form{
        border-radius: 80px;
    }
    .model_menu .model_menu_list .box_search_model .box_search_model_form input{
        border-radius: 80px 0 0 80px;
    }
    .model_menu .model_menu_list .box_search_model .box_search_model_form button{
        border-radius: 0 80px 80px 0;
    }
}
</style>