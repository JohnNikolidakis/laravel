@extends('layouts.app')

@section('content')
<style>
canvas {
  background-color: blue; 
  width: 100%;
  height: auto;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<canvas id="canvas" width="300" height="300">
				Sorry, your browser doesn't support the &lt;canvas&gt; element.
			</canvas>
		</div> <!-- /col-md-4 -->
		<div class="col-md-4">
			<p>item 1: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div> <!-- /col-md-4 -->
		<div class="col-md-4">
			<p>item 2: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div> <!-- /col-md-4 -->
	</div> <!-- /row -->
</div>
@endsection