@extends('layouts/app')
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col"><?= __('First name') ?></th>
        <th scope="col"><?= __('Last name')?></th>
        <th scope="col"><?= __('Email')?></th>
        <th scope="col"><?= __('Type')?></th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1 ?>
    @foreach($users as $user)
        <tr>
            <th>{{$i++}}</th>
            <th>{{$user->firstname}}</th>
            <th>{{$user->lastname}}</th>
            <th>{{$user->email}}</th>
            <th>{{$user->getTable()}}</th>
        </tr>
    @endforeach
    </tbody>
</table>

