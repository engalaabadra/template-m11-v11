@extends('layouts.dashboard.master')
@section('content')
    <div class="py-12">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($methods as $method)
                <tr>
                    <td>{{ $method->name }}</td>
                    <td>{{ $method->status }}</td>
                    <td>
                        <a href="{{route('dashboard.payment-methods.edit',$method->id)}}">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
@endsection
