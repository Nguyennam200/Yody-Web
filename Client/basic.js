
$(document).ready(function () {
    var toScroll = 0, width_list_max = 0, width_max_show = 0;
    var id_box = "";
    $('.item-teamproduct-show').hide();
    const btn_tittle = document.querySelectorAll('.tittle-list-item-show');
    btn_tittle.forEach(function(button){
        button.addEventListener("click", function(e){
            btn_tittle.forEach(function(button){
                var id_button = button.id;
                $('#'+id_button).removeClass('show-tittle');
            });
            $('.item-teamproduct-show').hide();
            var id_button_click = button.id;
            id_box = button.id;
            $('#'+id_button_click).addClass('show-tittle');
            $('.'+id_button_click).show();
            toScroll = 0;
            width_max_show = $('.'+id_box).width();
            width_list_max = $('.'+id_box+' .box-show-item').width();
            width_list_max = $('.'+id_button_click+' .arrow-left').prop('disabled', true);
            if(width_list_max<width_max_show){
                width_list_max = $('.'+id_button_click+' .arrow-right').prop('disabled', true);
            }
        });
    });
    $('#open_cate1').click();
    
    function up_box(id_box, id_button){
        width_max_show = $(id_box).width();
        width_list_max = $(id_box+' .box-show-item').width();
        $(id_box+' .arrow-left').prop('disabled', false);
        if (width_list_max - toScroll - width_max_show > width_max_show) {
            toScroll += width_max_show;
        } else {
            toScroll += width_list_max - width_max_show;
            $(id_button).prop('disabled', true);
        }
        $(id_box).scrollLeft(toScroll);
        console.log(toScroll);
    }
    function back_box(id_box, id_button){
        width_max_show = $(id_box).width();
        width_list_max = $(id_box+' .box-show-item').width();
        $(id_box+' .arrow-right').prop('disabled', false);
        if (toScroll - width_max_show > 0) {
            toScroll -= width_max_show;
        } else {
            toScroll = 0;
            $(id_button).prop('disabled', true);
        }
        $(id_box).scrollLeft(toScroll);
        console.log(toScroll);
    }
    $('.open_cate1 .arrow-right').click(function (e) {
        up_box('.open_cate1',this);
    });

    $(".open_cate1 .arrow-left").click(function (e) {
        back_box('.open_cate1',this);
    });
    $('.open_cate2 .arrow-right').click(function (e) {
        up_box('.open_cate2',this);
    });

    $(".open_cate2 .arrow-left").click(function (e) {
        back_box('.open_cate2',this);
    });
    $('.open_cate3 .arrow-right').click(function (e) {
        up_box('.open_cate3',this);
    });

    $(".open_cate3 .arrow-left").click(function (e) {
        back_box('.open_cate3',this);
    });

    
    // phóng to ảnh
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

    // đóng hộp zoom ảnh
    $('#zoom_img_all').click(function (e) { 
        $('#zoom_img_all').hide();
        $('body').css('overflow-y', 'auto');
        $('#zoom_img_all img').attr('src', '../images/images_display/loader.gif');
    });

    // định dạng tiền JS
    function price_Fomat(price){
        var tm = price.toLocaleString('vi-VN', {
            style: 'currency',
            currency: 'VND'
        });
        var tmm = tm.replace(/\./g,",");
        return tmm;
    }

    // định dạng % JS
    function percent_Format(number){
        var pt = number.toLocaleString('en-US', {
            style: 'percent',
            minimumFractionDigits: 2,
        });
        return pt;
    }

    // tạo hiệu ứng load và chuyển form nếu gắn link
    function load_Display(link,time_up,next){
        $('#zoom_img_all').show();
        $('body').css('overflow-y', 'hidden');
        setTimeout(()=>{
            $('#zoom_img_all').hide();
            $('body').css('overflow-y', 'auto');
            if(next!=0){
                if(link=='')    window.location = window.location;
                else window.location = link;
            }
        },time_up);
    }

    // load form khi lưu form dữ liệu
    function load_Form(id_form,time_up,button_onclick){
        $('#zoom_img_all').show();
        $('body').css('overflow-y', 'hidden');
        setTimeout(()=>{
            $('#zoom_img_all').hide();
            $('body').css('overflow-y', 'auto');
            $(id_form).attr('action', $(button_onclick).attr('formaction'));
            $(id_form).submit();
        },time_up);
    }

    // load form khi lọc dữ liệu
    function load_Formsearch( id_form, time_up, button_onclick, txtsearch){
        $('#zoom_img_all').show();
        $('body').css('overflow-y', 'hidden');
        setTimeout(()=>{
            $('#zoom_img_all').hide();
            $('body').css('overflow-y', 'auto');
            $(id_form).attr('action', $(button_onclick).attr('formaction')+"?txtsearch="+txtsearch);
            $(id_form).submit();
        },time_up);
    }

    // tạo hộp thông báo
    function messageBox(title,content,icon,link,time_setup){
        $('#zoom_img_all').show();
        $('body').css('overflow-y', 'hidden');
        setTimeout(()=>{
            $('#zoom_img_all').hide();
            $('body').css('overflow-y', 'auto');
            Swal.fire({
                title: `<span style=\"font-size: 30px;\">${title}</span>`,
                width: '600px',
                html: `<span style=\"font-size: 18px;\">${content}</span>`,
                icon: `${icon}`,
                confirmButtonColor: '#3085d6',
                confirmButtonText: '<span style=\"font-size: 18px\">OK</span>',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    load_Display(link,time_setup,next);
                }
            });
            load_Display(link,time_setup,next);
        },time_setup);
    }
    
    // tạo hộp câu hỏi
    function questionBox(content,link,time_setup){
        $('#zoom_img_all').show();
        $('body').css('overflow-y', 'hidden');
        setTimeout(()=>{
            $('#zoom_img_all').hide();
            $('body').css('overflow-y', 'auto');
            Swal.fire({
                title: `<span style=\"font-size: 30px;\">Thông báo</span>`,
                width: '600px',
                html: `<span style=\"font-size: 18px;\">${content}</span>`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: '<span style=\"font-size: 18px\">Đồng ý</span>',
                cancelButtonColor: '#d33',
                cancelButtonText: '<span style=\"font-size: 18px\">Không đồng ý</span>',
            }).then((result) => {
                if (result.isConfirmed) {
                    load_Display(link,time_setup,1);
                }
            });
        },time_setup);
    }

    // chức năng ẩn hiện mật khẩu
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

});