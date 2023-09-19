
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<?php
    include('connect.php');
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    session_start();
    class data{
        // xử lý tài khoản
            function Login($username,$password){ // đăng nhập
                global $con;
                $sql = "SELECT* FROM account WHERE UserName = '$username' AND Password = '$password'";
                return mysqli_query($con,$sql)->num_rows;
            }
            function Register($username, $password){  // đăng ký tài khoản mới
                global $con;
                $sql = "INSERT INTO account(UserName,Password)
                        VALUES('$username','$password')";
                return mysqli_query($con,$sql);
            }
            function Load_User_Information($username){   // load thông tin cá nhân của tài khoản
                global $con;
                $sql = "SELECT* FROM user_information WHERE UserName = '$username'";
                return mysqli_query($con,$sql)->fetch_array();
            }
            function load_Accout($username){ // load thông tin của tài khoản
                global $con;
                $sql = "SELECT* FROM account WHERE UserName = '$username'";
                return mysqli_query($con,$sql)->fetch_array();
            }
            function checkUsername_existAcccount($username){ // kiểm tra sự tồn tại của tên tài khoản
                global $con;
                $sql = "SELECT* FROM account WHERE UserName = '$username'";
                $check = mysqli_query($con,$sql)->num_rows;
                return $check;
            }
            function chang_Password($username,$newpassword){   // đổi mật khẩu tài khoản
                global $con;
                $sql = "UPDATE account SET Password = '$newpassword' WHERE UserName = '$username'";
                return mysqli_query($con,$sql);
            }
            function chang_User_information($name, $phoneNumber, $email, $address, $avatar, $username){  //thay đổi thông tin cá nhân của tài khoản
                global $con;
                $sql = "UPDATE user_information 
                        SET Name = '$name', PhoneNumber = '$phoneNumber', Email = '$email', Address = '$address', Avatar = '$avatar' 
                        WHERE UserName = '$username'";
                return mysqli_query($con,$sql);
            }
            function Load_shopping_cart($username){  // load có sản phẩm có trong giỏ hàng của tài khoản
                global $con;
                $sql = "SELECT* FROM shopping_cart WHERE UserName = '$username'";
                return mysqli_query($con,$sql);
            }
            function Load_shopping_cart_Item($username,$idProduct){  // chi tiết thông tin sản phẩm trong giỏ hàng
                global $con;
                $sql = "SELECT* FROM shopping_cart WHERE UserName = '$username' AND ID_Product = $idProduct";
                return mysqli_query($con,$sql)->fetch_array();
            }
            function Load_allReceipt($username){  // load tất cả đơn hàng đã đặt của tìa khoản
                global $con;
                $sql = "SELECT* FROM receipt WHERE UserName = '$username'";
                return mysqli_query($con,$sql);
            }
            function Load_Receipt($username,$receipt_code){    // load chi tiết đơn hàng đã đặt
                global $con;
                $sql = "SELECT* FROM receipt WHERE UserName = '$username' AND Receipt_code = '$receipt_code'";
                return mysqli_query($con,$sql)->fetch_array();
            }
            function Load_wallet_history($username){  //load tất cả lịch sử biến động số dư ví tiền của tài khoản
                global $con;
                $sql = "SELECT* FROM wallet_history WHERE UserName = '$username'";
                return mysqli_query($con,$sql);
            }
            function Load_wallet_history_Item($username,$id_wallet_history){  // load chi tiết biến động số dư ví tiền
                global $con;
                $sql = "SELECT* FROM wallet_history WHERE UserName = '$username' ID = $id_wallet_history";
                return mysqli_query($con,$sql)->fetch_array();
            }
            function Update_Wallet($username,$money){  // cập nhật số dư ví tiền
                global $con;
                $sql = "UPDATE user_information SET wallet = $money WHERE UserName = '$username'";
                return mysqli_query($con,$sql);
            }


        // xử lý danh mục
            function setCategoryToID($id_category){ // load thông tin danh mục thông qua ID
                global $con;
                $sql = "SELECT* FROM category WHERE ID = $id_category";
                return mysqli_query($con,$sql)->fetch_array();
            }
            function setCategoryToClassify($id_classify){ // load thông tin danh mục của phân mục
                global $con;
                $sql = "SELECT* FROM classify WHERE ID = $id_classify";
                $id_category = mysqli_query($con,$sql)->fetch_array()['ID_category'];
                $sql = "SELECT* FROM category WHERE ID = $id_category";
                return mysqli_query($con,$sql)->fetch_array();
            }
            function load_allclassifyofCategory($id_category){ // load tất cả phân mục của danh mục
                global $con;
                $sql = "SELECT* FROM classify WHERE ID_category = $id_category";
                return mysqli_query($con,$sql);
            }
            function loadAllcategory(){  // load tất cả danh mục tồn tại
                global $con;
                $sql = "SELECT* FROM category";
                return mysqli_query($con,$sql);
            }


        // xử lý phân mục
            function setClassifyToID($id_classify){   // load thông tin phân mục thông qua ID
                global $con;
                $sql = "SELECT* FROM classify WHERE ID = $id_classify";
                return mysqli_query($con,$sql)->fetch_array();
            }



        // xử lý sản phẩm
            function setProductToID($idProduct){   // load thông tin sản phẩm thông qua ID
                global $con;
                $sql = "SELECT* FROM product WHERE ID_Product = $idProduct";
                return mysqli_query($con,$sql)->fetch_array();
            }
            function loadAllproduct(){   // load toàn bộ sản phẩm có trong kho shop
                global $con;
                $sql = "SELECT* FROM product WHERE Total > 0";
                return mysqli_query($con,$sql);
            }
            public function loadAllproductlimited($limit,$start){  // load số lượng sản phẩm theo giới hạn
                global $con;
                $sql = "SELECT* FROM product WHERE Total > 0 LIMIT $limit OFFSET $start";
                return mysqli_query($con,$sql);
            }
            public function loadAllproductTocategory($category){  // load tất cả sản phẩm theo danh mục
                global $con;
                $sql = "SELECT* FROM product WHERE Total > 0 AND category = $category";
                return mysqli_query($con,$sql);
            }
            public function loadAllproductTocategorylimited($category,$limit,$start){  // load số lượng sản phẩm theo giới hạn theo phân mục
                global $con;
                $sql = "SELECT* FROM product WHERE Total > 0 AND category = $category LIMIT $limit OFFSET $start";
                return mysqli_query($con,$sql);
            }
            public function loadAllproductToclassify($classify){   // load tất cả sản phẩm theo danh mục
                global $con;
                $sql = "SELECT* FROM product WHERE Total > 0 AND classify = $classify";
                return mysqli_query($con,$sql);
            }
            public function loadAllproductToclassifylimited($classify,$limit,$start){   // load số lượng sản phẩm theo giới hạn theo phân mục
                global $con;
                $sql = "SELECT* FROM product WHERE Total > 0 AND classify = $classify LIMIT $limit OFFSET $start";
                return mysqli_query($con,$sql);
            }
            public function loadAllproductTochangeName($txtsearch){   // load tất cả sản phẩm theo danh mục
                global $con;
                $sql = "SELECT* FROM product WHERE Total > 0 AND Name LIKE '%$txtsearch%'";
                return mysqli_query($con,$sql);
            }
            public function loadAllproductTochangeNamelimited($txtsearch,$limit,$start){   // load số lượng sản phẩm theo giới hạn theo phân mục
                global $con;
                $sql = "SELECT* FROM product WHERE Total > 0 AND Name LIKE '%$txtsearch%' LIMIT $limit OFFSET $start";
                return mysqli_query($con,$sql);
            }



        
    }
    class account{
        private string $username, $password;

        public function getUsername(){
            return $this->username;
        }
        public function getPassword(){
            return $this->password;
        }
        
        public function setAccount($username){
            $getdata = new data();
            $load_account = $getdata->load_Accout($username);
            $this->username = $load_account['UserName'];
            $this->password = $load_account['Password'];
        }
        public function Login($username,$password){
            $getdata = new data();
            $checkAccount = $getdata->Login($username,$password);
            if($checkAccount==1){
                setcookie("username", $username, time()+3600*24*30);
                $_SESSION['username'] = $username;
                return true;
            }else{
                return false;
            }
        }

        public function Logout(){
            setcookie("username", "", time()-60);
            session_destroy();
        }

        public function Register($username,$password){
            $getdata = new data();
            $check = $getdata->checkUsername_existAcccount($username);
            if($check==0)   return $getdata->Register($username,$password);
            else return false;
        } 

        public function chang_Password($newpassword){
            $getdata = new data();
            return $getdata->chang_Password($this->username,$newpassword);
        }

        public function Load_shopping_cart(){
            $getdata = new data();
            return $getdata->Load_shopping_cart($this->username);
        }

        public function Load_Receipt(){
            $getdata = new data();
            return $getdata->Load_allReceipt($this->username);
        }

        public function Load_wallet_history(){
            $getdata = new data();
            return $getdata->Load_wallet_history($this->username);
        }
    }

    class wallet_history{
        private string $gift, $content, $time_up;		
        private int $price;

        public function getPrice(){
            return $this->price;
        }
        public function getGift(){
            return $this->gift;
        }
        public function getContent(){
            return $this->content;
        }
        public function getTime_up(){
            return $this->time_up;
        }
        public function setWallet_history($username,$id_wallet_history){
            $getdata = new data();
            $load_wallet_history = $getdata->Load_wallet_history_Item($username,$id_wallet_history);
            $this->price = $load_wallet_history['Price'];
            $this->gift = $load_wallet_history['Gift'];
            $this->content = $load_wallet_history['Content'];
            $this->time_up = $load_wallet_history['Time_up'];
        }
    }

    class user_information{
        private string $name, $phoneNumber, $email, $address, $avatar, $username;		
        private int $wallet;

        public function getName(){
            return $this->name;
        }
        public function getPhoneNumber(){
            return $this->phoneNumber;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getAddress(){
            return $this->address;
        }
        public function getAvatar(){
            return $this->avatar;
        }
        public function getWallet(){
            return $this->wallet;
        }
        public function setUser_information($username){
            $getdata = new data();
            $load_User_Information = $getdata->Load_User_Information($username);
            $this->name = $load_User_Information['Name'];
            $this->phoneNumber = $load_User_Information['PhoneNumber'];
            $this->email = $load_User_Information['Email'];
            $this->address = $load_User_Information['Address'];
            $this->avatar = $load_User_Information['Avatar'];
            $this->wallet = $load_User_Information['wallet'];
            $this->username = $username;

        }

        public function Update_Wallet($money){
            $getdata = new data();
            return $getdata->Update_Wallet($this->username,$this->wallet+$money);
        }

        function chang_User_information($name, $phoneNumber, $email, $address, $avatar){
            $getdata = new data();
            return $getdata->chang_User_information($name,$phoneNumber,$email,$address,$avatar,$this->username);
        }
    }

    class shopping_cart_Item{
        private string $image, $nameProduct;
        private int $priceProduct, $quantityProduct;

        public function getImage(){
            return $this->image;
        }
        public function getNameProduct(){
            return $this->nameProduct;
        }
        public function getPriceProduct(){
            return $this->priceProduct;
        }
        public function getQuantityProduct(){
            return $this->quantityProduct;
        }
        public function totalPrice(){
            return $this->priceProduct*$this->quantityProduct;
        }
        public function setshopping_cart_Item($username,$idProduct){
            $getdata = new data();
            $load_shopping_cart_Item = $getdata->Load_shopping_cart_Item($username,$idProduct);
            $product = new Product();
            $product->setProductToID($load_shopping_cart_Item['ID_Product']);
            $this->image = $product->getImage();
            $this->nameProduct = $product->getName();
            $this->priceProduct = $product->getPrice();
            $this->quantityProduct = $load_shopping_cart_Item['quantity'];
        }
    }

    class category{
        private int $id;
        private string $name_category;
        public function getID(){
            return $this->id;
        }
        public function getNamecategory(){
            return $this->name_category;
        }
        public function setCategoryToID($id_category){
            $getdata = new data();
            $category = $getdata->setCategoryToID($id_category);
            $this->id = $category['ID'];
            $this->name_category = $category['Name'];
        }
        public function setCategory($category){
            $this->id = $category['ID'];
            $this->name_category = $category['Name'];
        }
        public function setCategoryToclassify($id_classify){
            $getdata = new data();
            $category = $getdata->setCategoryToClassify($id_classify);
            $this->id = $category['ID'];
            $this->name_category = $category['Name'];
        }
        public function loadAllcategory(){
            $getdata = new data();
            return $getdata->loadAllcategory();
        }
        public function load_allclassifyofCategory($id_category){
            $getdata = new data();
            return $getdata->load_allclassifyofCategory($id_category);
        }
    }
    class classify{
        private int $id, $id_category;
        private string $name_classify;
        public function getID(){
            return $this->id;
        }
        public function getIDcategory(){
            return $this->id_category;
        }
        public function getNameclassify(){
            return $this->name_classify;
        }
        public function setClassify($classify){
            $this->id = $classify['ID'];
            $this->id_category = $classify['ID_category'];
            $this->name_classify = $classify['Name'];
        }
        public function setClassifyToID($id_classify){
            $getdata = new data();
            $classify = $getdata->setClassifyToID($id_classify);
            $this->id = $classify['ID'];
            $this->id_category = $classify['ID_category'];
            $this->name_classify = $classify['Name'];
        }
    }

    class Product{
        private string $nameProduct, $image, $back_side_image, $textdescribe;
        private int $id, $category, $classify, $price, $total;

        public function getID(){
            return $this->id;
        }
        public function getName(){
            return $this->nameProduct;
        }
        public function getCategory(){
            return $this->category;
        }
        public function getClassify(){
            return $this->classify;
        }
        public function getPrice(){
            return $this->price;
        }
        public function getTotal(){
            return $this->total;
        }
        public function getImage(){
            return $this->image;
        }
        public function getBack_side_image(){
            return $this->back_side_image;
        }
        public function getTextdescribe(){
            return $this->textdescribe;
        }
        public function setProduct($load_Product){
            $this->id = $load_Product['ID'];
            $this->nameProduct = $load_Product['Name'];
            $this->category = $load_Product['category'];
            $this->classify = $load_Product['classify'];
            $this->image = $load_Product['image'];
            $this->back_side_image = $load_Product['back_side_image'];
            $this->total = $load_Product['Total'];
            $this->price = $load_Product['Price'];
            $this->textdescribe = $load_Product['textdescribe'];
        }
        public function setProductToID($idProduct){
            $getdata = new data();
            $load_Product = $getdata->setProductToID($idProduct);
            $this->id = $load_Product['ID'];
            $this->nameProduct = $load_Product['Name'];
            $this->category = $load_Product['category'];
            $this->classify = $load_Product['classify'];
            $this->image = $load_Product['image'];
            $this->back_side_image = $load_Product['back_side_image'];
            $this->total = $load_Product['Total'];
            $this->price = $load_Product['Price'];
            $this->textdescribe = $load_Product['textdescribe'];
        }
        public function loadAllproduct(){
            $getdata = new data();
            return $getdata->loadAllproduct();
        }
        public function loadAllproductlimited($limit,$start){
            $getdata = new data();
            return $getdata->loadAllproductlimited($limit,$start);
        }
        public function loadAllproductTocategory($category){
            $getdata = new data();
            return $getdata->loadAllproductTocategory($category);
        }
        public function loadAllproductTocategorylimited($category,$limit,$start){
            $getdata = new data();
            return $getdata->loadAllproductTocategorylimited($category,$limit,$start);
        }
        public function loadAllproductToclassify($classify){
            $getdata = new data();
            return $getdata->loadAllproductToclassify($classify);
        }
        public function loadAllproductToclassifylimited($classify,$limit,$start){
            $getdata = new data();
            return $getdata->loadAllproductToclassifylimited($classify,$limit,$start);
        }
        public function loadAllproductTochangeName($txtsearch){
            $getdata = new data();
            return $getdata->loadAllproductTochangeName($txtsearch);
        }
        public function loadAllproductTochangeNamelimited($txtsearch,$limit,$start){
            $getdata = new data();
            return $getdata->loadAllproductTochangeNamelimited($txtsearch,$limit,$start);
        }
    }

    class Receipt{
        private string $receipt_code, $consignee_information, $list_of_products, $Time_receipt, $Note, $payment_methods, $status, $Time_complete;
        private int $preferential_value, $total_value;

        public function getReceipt_code(){ // mã đơn hàng
            return $this->receipt_code;
        }
        public function getConsignee_information(){ //thông tin người nhận: họ tên, sđt, email, địa chỉ
            return $this->consignee_information;
        }
        public function getList_of_products(){ //các sản phẩm, số lượng và giảm giá của sản phẩm khi sale
            return $this->list_of_products;
        }
        public function getTime_receipt(){ // thời gian đặt đơn hàng
            return $this->Time_receipt;
        }
        public function getNote(){ // ghi chú đơn hàng
            return $this->Note;
        }
        public function getPayment_methods(){ // phương thức thanh toán
            return $this->payment_methods;
        }
        public function getStatus(){ // trạng thái thể hiện tiến trình của đơn hàng
            return $this->status;
        }
        public function getTime_complete(){ // thời gian kết thức đơn
            return $this->Time_complete;
        }
        public function getPreferential_value(){ // giá trị giảm giá (<=100 tính theo phần trăm)(>100 tính theo đơn vị tiền) 
            return $this->preferential_value;
        }
        public function getTotal_value(){ // Tổng giá thanh toán của đơn hàng
            return $this->total_value;
        }
        public function setDonhang($username,$receipt_code){
            $getdata = new data();
            $Load_Receipt = $getdata->Load_Receipt($username,$receipt_code);
            $this->receipt_code = $Load_Receipt['Receipt_code'];
            $this->consignee_information = $Load_Receipt['consignee_information'];
            $this->list_of_products = $Load_Receipt['list_of_products'];
            $this->Time_receipt = $Load_Receipt['Time_receipt'];
            $this->Note = $Load_Receipt['Note'];
            $this->payment_methods = $Load_Receipt['payment_methods'];
            $this->status = $Load_Receipt['status'];
            $this->Time_complete = $Load_Receipt['Time_complete'];
            $this->preferential_value = $Load_Receipt['Preferential_value'];
            $this->total_value = $Load_Receipt['Total_value'];
        }
    }

    function get_an_element($min, $max){
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }
    function ramdom_Code($length){
        $code = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited
        for ($i=0; $i < $length; $i++) {
            $code .= $codeAlphabet[get_an_element(0, $max-1)];
        }
        return $code;
    }
    function price_Fomat($price){
        return number_format($price,0,'.',',')."<sup style=\"font-size: 12px; text-decoration: underline;\">đ<sup>";
    }
    function percent_Format($number){
        return "$number<sup style=\"font-size: 12px\"> %<sup>";
    }
    function editString($str){// chỉnh sửa chuỗi: bỏ dấu, bỏ khoảng cách, viết thường
        if(!$str) return false;
        $unicode = array('a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
                            'd'=>'đ',
                            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
                            'i'=>'í|ì|ỉ|ĩ|ị',
                            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
                            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
                            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
                        );
        foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
        return str_replace(" ","",strtolower($str));
    }
    function messageBox($title, $content, $icon, $link, $time_setup){
        if($time_setup==0){
            echo"<script>
                    $(document).ready(function (e) { 
                        $('#zoom_img_all').show();
                        $('body').css('overflow-y', 'hidden');
                        load_Display('$link',$time_setup,1);
                    });
                </script>";
        }else{
            echo"<script>
                    $(document).ready(function (e) { 
                        $('#zoom_img_all').show();
                        $('body').css('overflow-y', 'hidden');
                        setTimeout(()=>{
                            $('#zoom_img_all').hide();
                            $('body').css('overflow-y', 'auto');
                            Swal.fire({
                                title: '<span style=\"font-size: 30px;\">$title</span>',
                                width: '600px',
                                html: '<span style=\"font-size: 18px;\">$content</span>',
                                icon: '$icon',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: '<span style=\"font-size: 18px\">OK</span>',
                            }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                    load_Display('$link',$time_setup,1);
                                }
                            });
                            load_Display('$link',$time_setup,1);
                        },$time_setup);
                    });
                </script>";
        }
    }
?>
<script>
    function price_Fomat(price){
        var tm = price.toLocaleString('vi-VN', {
            style: 'currency',
            currency: 'VND'
        });
        var tmm = tm.replace(/\./g,",");
        return tmm;
    }

    function percent_Format(number){
        var pt = number.toLocaleString('en-US', {
            style: 'percent',
            minimumFractionDigits: 2,
        });
        return pt;
    }
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
    
    function questionBox(title,content,icon,link,time_setup){
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
</script>
