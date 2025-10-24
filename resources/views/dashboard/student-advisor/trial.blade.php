@extends('layouts.dashboard')
@section('title','Form Trial Students ')

@section('content')

<div class="row">
    <div class="col m-2 p-2">
        <div class="form-group">
            <form action="{{ route('student-advisor.trial.save') }}" method="POST">
                <!--TODO :: Design form insert-->
                <h1>Hello susan here</h1>
            </form>
        </div>
    </div>
</div>

@endsection