@extends('layouts.app')

@section('content')
<div class="container mt-2">

    <h1> All Contacts </h1>

    <form action="{{ route('contact.index') }}" method="GET">
    <input type="text" name="search" placeholder="Search by name or email">
    <button type="submit"> Search </button>
    </form>

    <table class="table table-striped">
    <thead>
        <tr>
            <th> <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'name', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc']) }}"> Name </a> </th>
            <th> Email </th>
            <th> Phone </th>
            <th> Address </th>
            <th> <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'created_at', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc']) }}"> Created At </a> </th>
            <th> Actions </th>
        </tr>
    </thead>

    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td> {{ $contact->name }} </td>
            <td> {{ $contact->email }} </td>
            <td> {{ $contact->phone }} </td>
            <td> {{ $contact->address }} </td>
            <td> {{ $contact->created_at->format('Y-m-d') }} </td>
            <td>
                <a href="{{ route('contact.show', $contact->id) }}"> View |</a>
                <a href="{{ route('contact.edit', $contact->id) }}"> Edit |</a>
                <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"> Delete </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
