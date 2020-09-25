@extends('layouts.app')

@section('content')
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Create message
            </div>
            <div class="card-body">

                <form method="post" action="{{ route('message.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="formGroupExampleInput">Select recipients</label>
                        <select class="custom-select" name="user_select[]"multiple>
                            @foreach($users as $key => $collection)
                                <optgroup label="{{$key}}">
                                @foreach($collection as $user)
                                    <option value="{{$user->id .','.$user->email .','. $collection->getQueueableClass()}}">{{$user->firstname.' '.$user->lastname}}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" class="form-control" id="body" rows="3"></textarea>
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
