@extends('layouts.app')
@section('content')
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script>
        $(document).ready(function()
		{
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			$.ajaxSetup({data:{_token: CSRF_TOKEN}});
            $(".postbutton").click(function()
			{
                $.post('postajax',
				{message:$(".getinfo").val()},
				function (data)
				{
					$(".writeinfo").append(data.msg+"<br>");
				},
				"JSON");
            });
		});
    </script>
</head>
<body>
    <input class="getinfo"></input>
    <button class="postbutton">Post</button>
    <div class="writeinfo"></div>
</body>
@endsection