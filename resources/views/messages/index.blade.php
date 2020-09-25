@extends('layouts.app')
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col"><?= __('Title') ?></th>
        <th scope="col"><?= __('Recipients count')?></th>
        <th scope="col"><?= __('Sent')?></th>
        <th scope="col"><?= __('Actions')?></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($messages as $key => $message)
          <tr>
              <th>{{$key+1}}</th>
              <th>{{$message->subject}}</th>
              <th>{{count($message->recipients)}}</th>
              <th>{{$message->sent ? 'yes' : 'no'}}</th>
              <th>
                  <a href="#" class="btn btn-success" >Edit</a>
                  <a href="#" class="btn btn-danger">Delete</a>
                  <a href="#" class="btn btn-primary">Send</a></th>
          </tr>
        @endforeach
    </tbody>
</table>
