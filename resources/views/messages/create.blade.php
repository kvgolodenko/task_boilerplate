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
                            <?php $label = '';?>
                            @foreach($users as $user)
                                <?php if ($user->getTable() !== $label) { ?>
                                <optgroup label="{{$user->getTable()}}">
                                <?php $label = $user->getTable() ?>
                                <?php } ?>
                                    <option
                                        <?php
                                        if ( count($selectedUsers->where('email','=', $user->email)) > 0 ) { echo 'selected';}
                                        ?>
                                        value="{{$user->id .','.$user->email .','. $user->getTable()}}">
                                        {{$user->firstname.' '.$user->lastname}}
                                    </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject" value="{{$subject ?? ''}}">
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" class="form-control" id="body" rows="3">{{$body ?? ''}}</textarea>
                    </div>
                    <input type="hidden" name="model_id" value="{{ $id ?? '' }}">
                    <div class="form-group">
                        <label for="form-submit"></label>
                        <input type="submit" id="form-submit" value="Store">
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
