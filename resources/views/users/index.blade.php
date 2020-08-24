@extends('layouts.app')
@section('title', 'Users')
@section('content')
    <div class="row">
        <div class="col-xs-12">
        	<div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Data Administrator</h3>
	              <a href="{{route('users.add')}}" class="btn btn-default pull-right">Tambah Administrator</a>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="datapost" class="table table-bordered table-striped">
	                <thead>
	                <tr>
	                  <th>No</th>
	                  <th>Nama</th>
	                  <th>Email</th>
	                  <th>Proses</th>
	                </tr>
	                </thead>
	                <tbody>
	                	@foreach($users as $r)
	                		<tr>
	                			<td>{{$loop->iteration}}</td>
	                			<td>{{$r->name}}</td>
	                			<td>{{$r->email}}</td>
	                			<td>
	                				<a href="{{ route('users').'/'.$r->id }}/edit" class="badge bg-default">edit</a>
	                				<form method="post" action="{{ route('users').'/'.$r->id }}" style="display:inline">
	                					@method('DELETE')
	                					@csrf
	                				<button type="submit" class="badge bg-red" onclick="return confirm('Apakan anda yakin?')" style="border: none;">hapus</button>
	                				</form>
	                			</td>
	                		</tr>
	                	@endforeach
	                </tbody>
	              </table>
	            </div>
	        </div>
        </div>
    </div>
@endsection