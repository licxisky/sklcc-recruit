@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-edit"></i> Recruit /
                    @if($recruit->id)
                        Edit #{{$recruit->id}}
                    @else
                        Create
                    @endif
                </h1>
            </div>

            @include('common.error')

            <div class="panel-body">
                @if($recruit->id)
                    <form action="{{ route('recruits.update', $recruit->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('recruits.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    
                <div class="form-group">
                    <label for="user_id-field">User_id</label>
                    <input class="form-control" type="text" name="user_id" id="user_id-field" value="{{ old('user_id', $recruit->user_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="file_id-field">File_id</label>
                    <input class="form-control" type="text" name="file_id" id="file_id-field" value="{{ old('file_id', $recruit->file_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="group_id-field">Group_id</label>
                    <input class="form-control" type="text" name="group_id" id="group_id-field" value="{{ old('group_id', $recruit->group_id ) }}" />
                </div>

                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-link pull-right" href="{{ route('recruits.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection