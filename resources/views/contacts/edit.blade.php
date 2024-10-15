
@extends('layouts.app')
@section('content')

    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Edit Contact Details</h3>
                <form action="{{ route('contact.update', $contact->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name"> Name </label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $contact->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email"> Email </label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $contact->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone"> Phone </label>
                        <input type="number" class="form-control" id="phone" name="phone"
                            value="{{ $contact->phone }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address"> Address </label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ $contact->address }}" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary"> Update Product </button>
                </form>
            </div>
        </div>
    </div>

@endsection

