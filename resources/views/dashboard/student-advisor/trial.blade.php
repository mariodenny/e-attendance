@extends('layouts.dashboard')
@section('title','Form Trial Students ')

@section('content')

<div class="row">
    <div class="col m-2 p-2">
        <div class="form-group">
            <form action="{{ route('student-advisor.trial.save') }}">
                <!--TODO :: Design form insert-->
            </form>
        </div>
    </div>
</div>

@endsection