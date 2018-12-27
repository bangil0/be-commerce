<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <?php $settings = \DB::table('cms_settings')->get(); ?>
    <title>{{$settings[9]->content}}</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{asset('$settings[11]->content')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('essence')}}/css/core-style.css">
    <link rel="stylesheet" href="{{asset('essence')}}/style.css">
    <link rel="stylesheet" href="{{asset('css')}}/print.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

</head>