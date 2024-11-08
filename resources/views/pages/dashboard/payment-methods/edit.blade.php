@extends('layouts.dashboard.master')
@section('content')
    <div class="py-12">
        <form action="{{ route('dashboard.payment-methods.update', $method->id) }}">
            @csrf
            @method('PUT')
            <fieldset>
                <legend>Basic Information</legend>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-controle" value="{{ $method->name }}">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="active" {{ $method->status == 'active' ? 'selected' : 'not selected'}}>Active</option>
                        <option value="active" {{ $method->status == 'inactive' ? 'selected' : 'not selected'}}>InActive</option>
                    </select>
                </div>
                <button type='submit' class="btn btn-primary"> Update </button>
            </fieldset>
            <fieldset>
                <legend>Options</legend>
                @foreach($options as $key => $options)
                    <div class="form-group">
                        <label for="name">{{ $options['label'] }}</label>
                        <input type="text" name="options[{{$key}}]" id="{{$key}}" class="form-control" value="{{ $method->options[$key]}} ">
                    </div>
                @endforeach
            </fieldset>
        </form>
    </div>
@endsection
