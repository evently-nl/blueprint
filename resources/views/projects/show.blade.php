@extends('common.template')

@section('heading')
    {{ $project->name }}
@stop

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">Description</div>
  <div class="panel-body">
    {{ $project->description }}
  </div>
</div>
  
<div class="panel panel-default">
  <div class="panel-heading">Upload file</div>
  <div class="panel-body">




  <form class="form-inline" method="post" action="{{ route('uploadProjectFile', ['id' => $project->id]) }}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <input type="file" class="form-control-file" name="upload">
  </div>
  <button type="submit" class="btn btn-primary">Upload</button>
  
</form>
  </div>
</div> 
<div class="panel panel-default">
  <div class="panel-heading">Files</div>
  <div class="panel-body">


<table class="table">
            <thead>
            <tr>
                <th>
                    File
                    </th>
                    <th>
                    Uploaded at
                    </th>
                    <th>
                    Download
                    </th>
                    </tr>
                </thead>
                <tbody>
        @foreach($files as $file)
                        <tr>
                            <td>{{ $file->name }}</td>
                            <td>{{ $file->created_at }}</td>
                           
                            <td>
                                <a href="{{ route('downloadProjectFile', ['id' => $file->id]) }}">Download</a>
                            </td>
                        </tr>
        @endforeach
        </tbody>

        
</table>
{{ $files->links() }}
  </div>
</div>

@stop
