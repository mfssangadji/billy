@extends('layouts.app')
@section('title', 'Crypto')
@section('content')
    <div class="box box-default">
      <div class="box-body">
        <div class="callout callout" style="background-color: #F9F9F9">
          <h4>File Preview</h4>
          <p>Preview file content to @if($int == 1) decryption @else encryption @endif</p>
        </div>
        <div class="row">
		  <div class="col-md-12">
		      <form role="form" method="post" action="{{url('crypto/'.$int.'/'.$uploaded->id)}}" enctype="multipart/form-data">
		        @csrf
		        <div class="box-body">

		          <input type="hidden" name="int" value="{{$int}}">
		          <input type="hidden" name="id" value="{{$uploaded->id}}">
		          <div class="form-group @error('plaintext') has-error @enderror">
		            <label for="plaintext">Plaintext</label>
		            @if($int==0)
		            	<textarea class="form-control" readonly style="resize:none" rows="3">{{$uploaded->plaintext}}</textarea>
		            @else
		            	<div id="result">
			            	{{$uploaded->plaintext}}
			            </div>
		            @endif
		          </div>

		          <div class="form-group @error('key') has-error @enderror">
		            <label for="key">Key</label>
		            <input type="text" name="key" readonly class="form-control" value="<?php echo implode('', $sp_key); ?>">
		          </div>

		          

		          <div class="form-group @error('plaintext') has-error @enderror">
		            <label for="plaintext">@if($int == 1) Decryption @else Encryption @endif</label>
		            <div id="result">
		            	<?php
		            		echo $result;
		            	?>
		            </div>
		          </div>

		        </div>
		        <!-- /.box-body -->
		        <?php
		        	$link = ($int == 0 ? "encrypt" : "decrypt");
		        ?>
		        <div class="box-footer">
		          <button type="buttn" class="btn btn-default" onclick="self.history.back()">
		          		Kembali
		          </button>
		          @if($int==0)
			          <a href="/uploads/{{$link.'/'.$encrypted->file}}" class="btn btn-primary" target="_blank">
			          		Download
			          </a>
		          @else
			          <a href="/uploads/{{$link.'/'.$decrypted->file}}" class="btn btn-primary" target="_blank">
			          		Download
			          </a>
		          @endif
		        </div>
		      </form>
	      </div>
    </div>
    <!-- /.box -->
@endsection