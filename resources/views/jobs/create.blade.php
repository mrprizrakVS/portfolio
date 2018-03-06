@extends('layouts.app')

@section('title', 'Оформлення замовлення')

@section('content')





    <form class="form-group" id="new_order" method="POST" action="/jobs/store">
        {!! csrf_field() !!}
                    <div class="form-group">
                    <label for="inputText">Title job:</label>
                    <input type="text" id="title" name="title" value="{{old('title')}}"  class="form-control" placeholder="Title job" required >
                </div>
        <div class="form-group">
                    <label for="inputText">Description job:</label>
                    <input type="text" id="description" name="description" value="{{old('description')}}"  class="form-control" placeholder="Description job" required >
                </div>

        <button class="btn btn-lg btn-primary btn-block add_button" name="new_job" id="new_category" type="submit">Add</button>
    </form>


    @endsection