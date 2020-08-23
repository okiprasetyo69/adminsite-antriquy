<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Aktivasi Akun AntriQhuy</title>
        <style type="text/css">
            body {margin: 0; padding: 0px; min-width: 100%!important;}
            img {height: auto;}
            p {margin: 5px;}
            .content {padding: 30px; width: 100%; max-width: 600px;}
            .header {padding: 40px 30px 20px 30px; border-bottom: 3px solid #F8F9FB;}
            .innerpadding {padding: 30px 30px 30px 30px;}
            .borderbottom {border-bottom: 1px solid #f2eeed;}
            .subhead {font-size: 15px; color: #ffffff; font-family: sans-serif; letter-spacing: 10px;}
            .h1, .h2, .bodycopy {font-family: sans-serif;}
            .h1 {color: #ffffff; font-size: 30px; line-height: 35px; font-weight: bold;}
            .h2 {padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;}
            .bodycopy {font-size: 14px; line-height: 20px;}
            .button {text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;}
            .button a {color: #ffffff; text-decoration: none;}
            .footer {padding: 20px 30px 15px 30px;}
            .footercopy {font-family: sans-serif; font-size: 14px; color: #ffffff;}
            .footercopy a {color: #ffffff; text-decoration: underline;}
            .buttonwrapper {border-radius: 30px;}
            .link {color: #05837F; text-decoration: none;}

            @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
                body[yahoo] .hide {display: none!important;}
                body[yahoo] .buttonwrapper {background-color: transparent!important;}
                body[yahoo] .button {padding: 0px!important;}
                body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
                body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;}
            }
        </style>
    </head>

    <body yahoo bgcolor="#f6f8f1">
        <table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td bgcolor="#ffffff" class="header" align="center">
                            <table class="col425" align="center" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 425px;">  
                                <tr>
                                <td height="70">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td class="h1" align="center" style="padding: 5px 0 0 0;">
                                            <img src="{{ asset('img/antriqhuy/icon.png') }}" style="width: 20%;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="h1" align="center" style="padding: 5px 0 0 0;">
                                            
                                        </td>
                                    </tr>
                                    </table>
                                </td>
                                </tr>
                            </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="innerpadding">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="h2">
                                        Hai {{ @$fullname }},
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bodycopy" width="100%">
                                        <p>Terimakasih sudah melakukan registrasi di AntriQhuy, saat ini</p>
                                        <p>kami perlu memverifikasi alamat email Anda agar Anda dapat</p>
                                        <p>melakukan proses selanjutnya. Silahkan klik tombol dibawah ini</p>
                                        <p>untuk melakukan aktivasi.</p>
                                    </td>
                                </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td style="padding: 20px 0 0 0;">
                                        <table class="buttonwrapper" align="center" bgcolor="#05837F" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                            <td class="button" align="center" height="45">
                                                <a href="{{ @$redirect }}">Aktivasi</a>
                                            </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            </td>
                        </tr>
                        
                                        
                        <tr>
                            <td class="innerpadding bodycopy">
                                <p>Atau tempelkan tautan berikut ke browser anda</p>
                                <p><a class="link" href="{{ @$redirect }}">{{ @$redirect }}</a></p>

                                <br><br>
                                
                                <p>Terimakasih,</p>
                                <p>AntriQhuy</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>