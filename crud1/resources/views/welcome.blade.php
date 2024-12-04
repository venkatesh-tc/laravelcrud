@extends('layouts.app')
 <!-- Assuming you have a main layout file -->

@section('contact')

<div class="container mt-5">
            <form method="POST" action="/addcontact">
                @csrf
                <div class="form-group mb-2">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputPassword1">Phone Number</label>
                    <input type="text" class="form-control" name="phone" placeholder="Phone">
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>

@endsection