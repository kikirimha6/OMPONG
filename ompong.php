<?php
date_default_timezone_set('Asia/Jakarta');
include "function.php";
echo color("green","💵              Auto Regist-Claim              💵\n");
echo color("green","💵                Author : OMPONG                💵\n");
echo color("green","💵          ".date('[d-m-Y] [H:i:s]')."            💵\n");
echo color("green","💵         Tulis nomer dengan awalan 62        💵\n");
function change(){
        ulang:
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        echo color("green","(®) Enter Number: ");
        $no = trim(fgets(STDIN));
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$no.'","signed_up_country":"ID"}'.$proxy;
        $register = request("/v5/customers", $proxy, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo color("yellow","(®) OTPnya udah dikirim...")."\n";
        otp:
        echo color("green","(®) Otp: ");
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
        $verif = request("/v5/customers/phone/verify", null, $data1);
        if(strpos($verif, '"access_token"')){
        echo color("green","(®) Registrasi Berhasil...");
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        $live = "token.txt";
        $fopen = fopen($live, "a+");
        $fwrite = fwrite($fopen,"\n".$token."\n");
        echo "\n".color("green","(®) Pencet Enter ya ... ");
        $pilihan = trim(fgets(STDIN));
        if($pilihan == "y" || $pilihan == "1"){
        claim:
        echo color("green","===========<Bismillah>===========");
        reff:
        $data = '{"referral_code":"G-CVNN2Q5"}';    
        $claim = request("/customer_referrals/v1/campaign/enrolment", $token, $data);
        $message = fetch_value($claim,'"message":"','"');
        if(strpos($claim, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green","+] Message: ".$message);
        goto gofood;
        sleep(5);
        }else{
        echo "\n".color("yellow","-] Message: ".$message);
        }
        gofood:
        sleep(15);
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD2206"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green","Message: ".$message);
        goto gocar;
        }else{
        echo "\n".color("red"," Message: ".$message);
	gocar:
        echo "\n".color("white"," CLAIM B.. ");
        echo "\n".color("white"," Please wait");
        for($a=1;$a<=3;$a++){
        echo color("white",".");
        sleep(15);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PESANGOFOOD2206"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai.')){
        echo "\n".color("green","Message: ".$message);
        goto gofood;
        }else{
        echo "\n".color("white"," Message: ".$message);
        echo "\n".color("white"," CLAIM C..");
        echo "\n".color("white"," Please wait");
        for($a=1;$a<=3;$a++){
        echo color("white",".");
        sleep(15);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD2206"}');
        $message = fetch_value($code1,'"message":"','"');
        echo "\n".color("white"," Message: ".$message);
        echo "\n".color("white"," VOCER COLI.");
        echo "\n".color("white"," Please wait");
        for($a=1;$a<=3;$a++){
        echo color("white",".");
        sleep(15);
        }
        sleep(3);
        $boba09 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD2206"}');
        $messageboba09 = fetch_value($boba09,'"message":"','"');
        echo "\n".color("white"," Message: ".$messageboba09);
        sleep(3);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=10&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        $voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
        $voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
        $voucher7 = getStr1('"title":"','",',$cekvoucher,"7");
        $voucher8 = getStr1('"title":"','",',$cekvoucher,"8");
        $voucher9 = getStr1('"title":"','",',$cekvoucher,"9");
        $voucher10 = getStr1('"title":"','",',$cekvoucher,"10");
        echo "\n".color("nevy","!] Total voucher ".$total." : ");
        echo "\n".color("green","01. ".$voucher1);
        echo "\n".color("green","02. ".$voucher2);
        echo "\n".color("green","03. ".$voucher3);
        echo "\n".color("green","04. ".$voucher4);
        echo "\n".color("green","05. ".$voucher5);
        echo "\n".color("green","06. ".$voucher6);
        echo "\n".color("green","07. ".$voucher7);
        echo "\n".color("green","08. ".$voucher8);
        echo "\n".color("green","09. ".$voucher9);
        echo "\n".color("green","10. ".$voucher10);
        $expired1 = getStr1('"expiry_date":"','"',$cekvoucher,'1');
        $expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
        $expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
        $expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
        $expired5 = getStr1('"expiry_date":"','"',$cekvoucher,'5');
        $expired6 = getStr1('"expiry_date":"','"',$cekvoucher,'6');
        $expired7 = getStr1('"expiry_date":"','"',$cekvoucher,'7');
        $expired8 = getStr1('"expiry_date":"','"',$cekvoucher,'8');
        $expired9 = getStr1('"expiry_date":"','"',$cekvoucher,'9');
        $expired10 = getStr1('"expiry_date":"','"',$cekvoucher,'10');
         setpin:
         echo "\n".color("green","(®) Pencet 1 ya.. ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" || $pilih1 == "1"){
         //if($pilih1 == "y" && strpos($no, "628")){
         echo color("green","========( Pinmu ojo lali = 124578 )========")."\n";
         $data2 = '{"pin":"124578"}';
         $getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid, $proxy);
         echo "Otp pin: ";
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid, $proxy);
         echo "\n".color("green","(®) Claim Voucher?: y/n ");
        $pilihan2 = trim(fgets(STDIN));
        if($pilihan2 == "y" || $pilihan2 == "1"){
         goto claim;
         }else if($pilihan2 == "g" || $pilihan2 == "G"){
         die();
         }else if($pilih1 == "g" || $pilih1 == "G"){
         die();
         }else{
         echo color("red","(®) Salah Pencet Boss!!!\n");
         }
         }
         }
         }
         }else{
         goto setpin;
         }
         }else{
         echo color("green","(®) Otp ne salah mas...");
         echo"\n==================================\n\n";
         echo color("green","(®) Lebokno neh mas...\n");
         goto otp;
         }
         }else{
         echo color("green","Nomere wes kedaftar bosku!!!");
         echo "\nBaleni neh a mas? (y/g): ";
         $pilih = trim(fgets(STDIN));
         if($pilih == "y" || $pilih == "Y"){
         echo color("green","==============Daftar Ulang Boskuu...==============\n");
         goto ulang;
         }else{
         echo color("green","==============Daftar Ulang Boskuu...==============\n");
         goto ulang;
         }
        }
       }
         echo change()."\n"; ?>
