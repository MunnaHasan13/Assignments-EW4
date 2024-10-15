@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>View Data</h2>
        <table class="table mt-2">
            <thead>
                <tr>
                    <th> Name </th>
                    <th> Email </th>
                    <th> Phone </th>
                    <th> Address </th>
                    <th> Created At </th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td> {{$contact->name}} </td>
                    <td> {{$contact->phone}} </td>
                    <td> {{$contact->email}} </td>
                    <td> {{$contact->address}} </td>
                    <td> {{$contact->created_at->format('Y-m-d')}} </td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('contact.index') }}" class="btn btn-secondary"> Back </a>
    </div>
@endsection


