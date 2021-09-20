<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:vn="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com=:office:office" style="color-scheme: light dark;
    supported-color-schemes:light dark; height: 100% !important; width: 100% !important; -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%; margin: 0 auto; padding: 0;">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width" />
    <!-- Forcing=
 initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting" />
    <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <meta name="format-detection" content="telephone=no,address=no,email=no,date=no,url=no" />
    <!-- Tell iOS not to automatically link certain text strings. -->
    <meta name="color-scheme" content="light" />
    <meta name="supported-color-schemes" content="light" />
    <title>Firstmile Email Notification</title>
    <style>
         :root {
            color-scheme: light dark;
            supported-color-schemes: light dark;
        }

        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }

        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        /* What it does: Centers email on Android 4.4 */

        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }
        /* What it does: forces Samsung Android mail clients to use the ent=
ire viewport */

        #MessageViewBody,
        #MessageWebViewDiv {
            width: 100% !important;
        }

        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        th {
            font-weight: normal;
        }

        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }

        a {
            text-decoration: none;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        a[x-apple-data-detectors],
        /* iOS */

        .unstyle-auto-detected-links a,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        .im {
            color: inherit !important;
        }

        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }

        img.g-img+div {
            display: none !important;
        }
        /* What it does: Removes right gutter in Gmail iOS app: https://git=
hub.com/TedGoas/Cerberus/issues/89  */
        /* Create one of these media queries for each additional viewport s=
ize you'd like to fix */
        /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */

        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
            u~div .email-container {
                min-width: 320px !important;
            }
        }
        /* iPhone 6, 6S, 7, 8, and X */

        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            u~div .email-container {
                min-width: 375px !important;
            }
        }
        /* iPhone 6+, 7+, and 8+ */

        @media only screen and (min-device-width: 414px) {
            u~div .email-container {
                min-width: 414px !important;
            }
        }
    </style>

    <style>
        /* What it does: Hover styles for buttons */

        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }

        .button-td-primary:hover,
        .button-a-primary:hover {
            background: #be242b !important;
            border-color: #be242b !important;
        }
        /* Media Queries */

        @media screen and (max-width: 600px) {
            .email-container {
                width: 100% !important;
                margin: auto !important;
            }
            /* What it does: Forces table cells into full-width rows. */
            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }
            /* And center justify these ones. */
            .stack-column-center {
                text-align: center !important;
            }
            /* What it does: Generic utility class for centering. Useful fo=
r images, buttons, and nested tables. */
            .center-on-narrow {
                text-align: center !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }
            table.center-on-narrow {
                display: inline-block !important;
            }
            /* What it does: Adjust typography on small screens to improve =
readability */
            .email-container p {
                font-size: 17px !important;
            }
        }
    </style>
</head>

<body width="100%" style="mso-line-height-rule: exactly; background-color: #FBFCFC; height: 100% !important; width:
    100% !important; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; margin: 0 auto; padding:
    0;" bgcolor="#FBFCFC">
    <center role="article" aria-roledescription="email" lang="en" style="width: 100%; background-color:
        #FBFCFC; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">


        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important; border-spacing: 0 !important; border-collapse:collapse !important;
            table-layout: fixed !important; margin: 0 auto;" class="email-container">

            <tbody>
                <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
                    <td style="text-align: center; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;
                        mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; padding: 20px 0;" align="center">
                        <img src="https://www.img.in.th/images/4b2a4c62d5ee19b399e562824b8f5f7f.png" width="200" height="50" alt="Thanks For Choosing Firstmile!" border="0" style="height: auto; font-family: sans-serif; font-size: 15px; line-height: 15px; color:
                            #555555; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;
                            -ms-interpolation-mode: bicubic;" />
                    </td>
                </tr>

                <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
                    <td style="background-color: #ffffff; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;
                        mso-table-lspace: 0pt !important;mso-table-rspace: 0pt !important;" bgcolor="#ffffff">
                        <img src="https://images.ctfassets.net/oqcgx0hzeqgm/o=kfCNHOSJN9urJ0ljW9Oz/1a5e37777ae0006b646fae326e14e1e5/1200x600.png" width="600" height="" alt="" border="0" style="width: 100%; max-width:600px; height: auto;
                            background-color: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 15px;
                            color: #555555; display: block; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;
                            -ms-interpolation-mode:bicubic; margin: auto;" class="g-img" />
                    </td>
                </tr>

                <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
                    <td style="background-color: #ffffff; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;
                        mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important;" bgcolor="#ffffff">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%; mso-table-lspace: 0pt
                            !important; mso-table-rspace: 0pt !important; border-spacing: 0 !important;
                            border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto;">
                            <tbody>
                                <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
                                    <td style="font-family: sans-serif; font-size: 15px; line-height: 20px; color:
                                        #555555; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;
                                        mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important; padding:
                                        15px;">
                                        <h1 style="font-size: 25px; line-height:30px; color: #333333; font-weight:
                                            normal; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; margin:
                                            0 0 10px;">Hey Administrator,</h1>
                                        <p>Automatically process to backup database,</p>
                                        <p>
                                            Assuming that this timestamp is in
                                            <b>{{
                                                \Carbon\Carbon::parse($backup->created_at, 'UTC')->diffForHumans();
                                            }}</b><br/>
                                            <b>GMT:</b>
                                            {{
                                               \Carbon\Carbon::parse($backup->created_at, 'UTC')->locale('th')->isoFormat('MMMM Do YYYY, h:mm:ss a');
                                            }}
                                        </p>
                                        <p>
                                            <b>Your time zone:</b>
                                            {{
                                                \Carbon\Carbon::parse($backup->created_at, 'UTC')->locale('th');
                                            }}
                                            <b>Relative:</b>
                                            {{
                                                \Carbon\Carbon::parse($backup->created_at, 'UTC')->locale('th')->isoFormat('MMMM Do YYYY, h:mm:ss a');
                                            }}
                                        </p>
                                        <p>
                                            @if($backup->status == "success")
                                            <b>***Status</b> <span style="color: green;">SUCCESS</span><br/>
                                            @else
                                            <b>***Status</b> <span style="color: red;">FAILURE : {{ $backup->message }}</span><br/>
                                            @endif
                                            <b>***Attachment</b> plaese dowload following link below.
                                        </p>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </td>
                </tr>

            </tbody>
        </table>

        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important; border-spacing: 0 !important; border-collapse:collapse !important;
            table-layout: fixed !important; margin: 0 auto;" class="email-container">

            <tbody>
                <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">

                    <td style="font-family: sans-serif; font-size: 12px; line-height: 15px; text-align: center;
                        color: #888888; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace:
                        0pt !important; mso-table-rspace: 0pt !important; padding: 20px;">

                        <div style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">

                            <div style="-ms-text-size-adjust: 100%;
                                -webkit-text-size-adjust: 100%; padding: 5px;">

                                <div style="text-align: left; -ms-text-size-adjust:
                                    100%; -webkit-text-size-adjust: 100%;">
                                    <a href="https://email.learn.Firstmile.com= /e/c/eyJlbWFpbF9pZCI6ImRnT3J3QVNyd0FRQUFBRjdjeDZMU3JYckZSd2I1UDFDejhNPSIsIm=
                                        hyZWYiOiJodHRwczovLy5tYWlsZ3VuLmNvbSIsImludGVybmFsIjoiYWJjMDA0MjhkOTU5Z=GJmODQ5IiwibGlua19pZCI6M30/e7f07ba7247e7ca9d81970432839cf5d5fb42fd3515b8e77=
                                        7650bf85116da703" style="line-height: inherit; -ms-text-size-adjust: 100%;
                                        -webkit-text-size-adjust: 100%; text-decoration: none;" target="_blank">
                                        <img width="135" alt="Firstmile" src="https://www.img.in.th/images/4b2a4c62d5ee19b399e562824b8f5f7f.png" border="0" align="left" style="outline: none; text-decoration: none; clear: both;
                                            display: b=lock !important; height: auto; float: none; width: 100%;
                                            max-width: 135px;line-height: inherit; -ms-text-size-adjust: 100%;
                                            -webkit-text-size-adjust:100%; -ms-interpolation-mode: bicubic; margin: 0
                                            auto; border: none;" title="Firstmile" />
                                    </a><br style="-ms-text-size-adjust: 100%;
                                        -webkit-text-size-adjust: 100%;" />
                                    <p style="-ms-text-size-adjust: 100%;
                                        -webkit-text-size-adjust: 100%; margin: 0;"><span style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust:
                                            100%;">Firstmile, Inc.</span=>
                                    </p>
                                    <p style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; margin:
                                        0;"><span style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust:
                                            100%;">Bangkok, Thailand</span></p>
                                    <p style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; margin:
                                        0;"><span style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust:
                                            100%;"><br style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust:
                                                100%;" />Since you&#39;re a Firstmile customer, we send you emails from
                                            time to time with product updates, webinar invites, onboarding help, and
                                            import
                                            ant info about your account. You can find out more about how we process per
                                            sonal data in our <span style="-ms-text-size-adjust: 100%;
                                                -webkit-text-size-adjust: 100%;"><a style="color: #4b6cb7;
                                                    -ms-text-size-adjust: 100%;webkit-text-size-adjust: 100%;
                                                    text-decoration: none;"
                                                    href="https://www.privacypolicygenerator.info/live.php?token=IxqB9zivk8xj5xKEJhxq7xPnrATrTgXg">Privacy
                                                    Policy</a>.</span> If you no longer wish to receive these emails, you can</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>

    </center>

</body>

</html>
