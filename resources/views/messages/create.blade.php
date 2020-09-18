@extends('layouts.app')

@section('content')
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Create message
            </div>
            <div class="card-body">

                <form>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Select recipients</label>
                        <select class="custom-select" multiple>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" id="body" rows="3"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
