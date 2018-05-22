@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Questions</div>

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if(count($groups))
                @foreach($groups as $group)
                <div class="">
                    <h3>{{ $group->name }}<small>({{ $group->description }})</small></h3>
                    @if(isset($group->recruits[0]))
                    <label class="label label-info pull-right">Uploaded</label>
                    @endif
                    <div>
                        {{ $group->question }}
                    </div>
                    <div>
                        <form action="{{ route('recruits.upload') }}" id="form-id-{{ $group->id }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="hidden" name="group_id" value="{{ $group->id }}">
                            <input type="file" name="file" value="Submit" onchange="document.getElementById('form-id-{{ $group->id }}').submit();">
                        </form>
                    </div>
                </div>
                @if(!$loop->last)
                <hr>
                @endif
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
