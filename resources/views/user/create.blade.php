@extends('layouts/app')

@section('content')
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Create user
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('user.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="type_select">Select type</label>
                        <select class="custom-select" name="type-select" id="#type_select">
                            <option value="1">Student</option>
                            <option value="2">Teacher</option>
                            <option value="3">Staff</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="firstname">First name</label>
                        <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First name">
                    </div>
                    <div class="form-group">
                        <label for="firstname">Last name</label>
                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="form-submit"></label>
                        <input type="submit" id="form-submit" value="Store">
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
