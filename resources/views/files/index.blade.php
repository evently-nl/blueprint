@extends('common.template')

@section('heading')
    Files
@endsection

@section('content')

    <div class="box box-primary">
        <div class="box-body no-padding">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Uploaded</th>
                        <th>Mime</th>
                        <th>Project</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($files as $file)
                        <tr>
                            <td>{{ $file->name }}</td>
                            <td>{{ $file->created_at }}</td>
                            <td>{{ $file->mime }}</td>
                            <td><a href="/projects/{{$file->project->id  }}">{{ $file->project->name }}</a></td>
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
@endsection
