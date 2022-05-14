<!DOCTYPE html>
<html class="bg-black">

<head>
    <meta charset="UTF-8">
    <title>HTVC configuration</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{ URL::to('/') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('/') }}/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('/') }}/assets/css/jquery.gritter.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('/') }}/assets/css/schoex.css" rel="stylesheet" type="text/css" />

</head>

<body class="bg-black">

    <div class="form-box" id="login-box">
        <div class="header">Installation</div>
        <form action="{{ URL::to('/install') }}" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="body bg-gray">
                @if ($errors->any())
                    <h4 style='color:red;'>{{ $errors->first() }}</h4>
                @endif

                @if ($currStep == 'welcome')
                    <center>Thank you for choosing phoenix Inc for your school administration.
                        <br />
                        Please follow the next steps to complete Phoenix installation
                    </center>
                    <br />
                    <input type="hidden" name="nextStep" value="1">
                    <button type="submit" class="btn bg-olive btn-block">Start installation</button>
                @endif
                @if ($currStep == '1')
                    <div class="form-group">
                        <center><b>Database Connection</b></center>
                    </div>

                    <?php
                    if (isset($dbError)) {
                        echo '<div class="form-group" style="color:red;">Database connection failed</div>';
                    } else {
                        echo '<div class="form-group" style="color:green;">Database connection success</div>';
                    }
                    ?>

                    <div class="form-group">
                        <center><b>Permissions Tests</b> <br /> The following folders needs write permissions</center>
                    </div>

                    <div class="form-group" style="color:green;">
                        <?php
                        if (isset($success)) {
                            while ([$key, $value] = each($success)) {
                                echo $value . ': <b>Success</b> <br/>';
                            }
                        }
                        ?>
                    </div>
                    <div class="form-group" style="color:red;">
                        <?php
                        if (isset($perrors)) {
                            while ([$key, $value] = each($perrors)) {
                                echo $value . ': <b>Failed</b> <br/>';
                            }
                        }
                        ?>
                    </div>
                    @if ($nextStep == '1')
                        <input type="hidden" name="nextStep" value="1">
                        <button type="submit" class="btn bg-olive btn-block">Recheck</button>
                    @endif
                    @if ($nextStep == '2')
                        <input type="hidden" name="nextStep" value="2">
                        <button type="submit" class="btn bg-olive btn-block">Next Step</button>
                    @endif
                @endif

                @if ($currStep == '2')
                    <div class="form-group">
                        <center><b>Administrator details</b></center>
                    </div>

                    <?php
                    if (isset($installErrors)) {
                        echo '<div class="form-group" style="color:red;">';
                        while ([$key, $value] = each($installErrors)) {
                            echo $value . '<br/>';
                        }
                        echo '</div>';
                    }
                    ?>
                    <div class="form-group">
                        <input type="text" name="fullName" class="form-control" placeholder="Fullname *" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username *" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="E-mail address *" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password *" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="repassword" class="form-control" placeholder="Re Password *" />
                    </div>

                    <div class="form-group">
                        <center><b>Site settings</b></center>
                    </div>

                    <div class="form-group">
                        <input type="text" name="siteTitle" class="form-control" placeholder="Site Title *" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="systemEmail" class="form-control"
                            placeholder="System e-mail address *" />
                    </div>

                    <input type="hidden" name="nextStep" value="3">
                    <button type="submit" class="btn bg-olive btn-block">Next Step</button>
                @endif

                @if ($currStep == '3')
                    <div class="form-group">
                        <center><b>Thank You for installing phoenix</b></center>
                    </div>
                    <a href="<?php echo URL::to('/'); ?>" class="btn bg-olive btn-block">Start using Phoenix</a>
                @endif
            </div>
            <div class="footer">
                <a href="/" target="_BLANK" class="btn bg-olive btn-block"> By Vincent Khamala</a>
            </div>
        </form>
    </div>

    <script src="{{ URL::to('/') }}/assets/js/jquery.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/js/bootstrap.min.js" type="text/javascript"></script>
</body>

</html>
