@extends('layouts.app')

@section('content')
<style>
	.resize
	{
		width: 100%;
		height: auto;
		position:absolute;
	}
	
	canvas
	{
	  width: 100%;
	  height: auto;
	}
</style>
<body>
	<div class="container ml-0">
		<div class="row">
			<div class="col-2">
				Max Capacity:
			</div>
			<div class="col-2">
				<input type="number" name="capacity">
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-2">
				Current capacity:
			</div>
			<div class="col-2">
				<input type="number" name="now">
			</div>
		</div>
		<div class="row mt-3">
		    <button type="button" id="refresh" class="btn btn-primary mb-3">Refresh</button>
		</div>
	</div>
	<div class="container ml-0" {{$c=0}}>
		@foreach($bins as $bin)
		<div class="row" style="height:250px">
				<div class="col-md-3">
					<img src="img/garbage_bin.png" class="resize img-fluid" id="garb">
					<canvas id="myCanvas_{{$c}}" width="313px" height="234px" class="resize"></canvas>
					<canvas id="placeholder_canvas_{{$c}}" width="313px" height="234px"  class="resize"></canvas>
					<script>
						$(document).ready(function()
						{
							create_perc({{$bin->max_capacity}}, {{$bin->cur_capacity}});
						});
					</script>
				</div>
			</div {{$c++}}>
		@endforeach
	</div>
    <script>
		var cap_perc, c =-1;
		function check_val(cur,max) //Function to check if value is within wanted parameters
		{
			cur = parseInt(cur);
			max = parseInt(max);
			if((cur>max) || (cur<0))
			{
				alert("Invalid Current Volume");
				return false;
			}
			else
				return true;
		}
        $("#refresh").click(function()
        {
			create_perc();
		});
		
		function create_perc(cap_max, cap_now)
		{
			c++;
			flag = true;
            //var cap_max = $("input[name='capacity']").val();
            //var cap_now = $("input[name='now']").val();
            cap_perc = (cap_now*100)/cap_max; //Percentage of capacity
			if(check_val(cap_now,cap_max)) //If value is valid
			{
				var maxy = 163; //Set variables for path
				var maxx = 303;
				var left_x,right_x;
				var txtperc = ((cap_perc*maxy)/100).toFixed();
				var canvas = document.getElementById("myCanvas_"+c);
				var ctx = canvas.getContext("2d");
				var placeholder_canvas = document.getElementById("placeholder_canvas_"+c);
				var placeholder_ctx = placeholder_canvas.getContext("2d");
				placeholder_ctx.beginPath(); //Create invisible canvas
				placeholder_ctx.lineJoin="miter";
				placeholder_ctx.moveTo(23,197);
				placeholder_ctx.lineTo(291,197);
				placeholder_ctx.lineTo(298,63);
				placeholder_ctx.lineTo(308,52);
				placeholder_ctx.lineTo(308,34);
				placeholder_ctx.lineTo(5,34);
				placeholder_ctx.lineTo(5,52);
				placeholder_ctx.lineTo(16,63);
				placeholder_ctx.lineTo(23,197);
				placeholder_ctx.closePath();
				placeholder_ctx.globalAlpha=0.0;
				placeholder_ctx.lineWidth = 0;
				placeholder_ctx.stroke();
				var perc = 197-txtperc;
				//Find where on the x axis the top should be
				for(var i=5; i<308; i++) //Check every point from left to right
				{
					if(placeholder_ctx.isPointInPath(i,perc))
					{
						left_x = i;
						break;
					}
				}
				for(var i=308; i>5; i--) //Check right to left
				{
					if(placeholder_ctx.isPointInPath(i,perc))
					{
						right_x = i;
						break;
					}
				}
				ctx.beginPath(); //Create actual path
				ctx.lineJoin="miter";
				ctx.moveTo(23,198);
				ctx.lineTo(291,198);
				if(perc<190) //Turn the line if percentage is high enough
					ctx.lineTo(293,190);
				if(perc<62)
					ctx.lineTo(298,63);
				if(perc<52)
					ctx.lineTo(308,52);
				if(perc<34)
				{
					ctx.lineTo(308,34);
					ctx.lineTo(5,34);
					perc=34;
				}
				else if(perc>198)
					perc=198;
				else
				{
					ctx.lineTo(right_x,perc);
					ctx.lineTo(left_x,perc);
				}
				if(perc<52) //Turn again on the opposite side
					ctx.lineTo(5,52);
				if(perc<62)
					ctx.lineTo(16,63);
				if(perc<190)
					ctx.lineTo(20,190);
				ctx.lineTo(23,198);
				ctx.closePath();
				if(perc>150) //Increase opacity as volume increases
					ctx.globalAlpha=0.4;
				else if(perc>102)
					ctx.globalAlpha=0.5;
				else if(perc>63)
					ctx.globalAlpha=0.6;
				else 
					ctx.globalAlpha=0.7;
				ctx.lineWidth = 0;
				ctx.fillStyle = "#608000";
				ctx.fill();
				ctx.font= "bold 30px Arial"; //Create percentage text
				ctx.fillStyle = "#000000";
				ctx.textAlign = "center";
				var txt_height;
				cap_perc= cap_perc.toFixed();
				if(cap_perc<0)
					cap_perc=0;
				else if(cap_perc>100)
					cap_perc=100;
				if(cap_perc < 15)
					txt_height=196;
				else
					txt_height=(perc+txtperc/2)+10;
				if(cap_perc==100)
					ctx.fillText("FULL",canvas.width/2,txt_height);
				else if (cap_perc==0)
					ctx.fillText("EMPTY",canvas.width/2,txt_height);
				else
					ctx.fillText(cap_perc+" %",canvas.width/2,txt_height);
			}
		}
    </script>
</body>
@endsection