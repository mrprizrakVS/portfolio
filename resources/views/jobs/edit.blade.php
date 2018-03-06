@extends('layouts.app')

@section('title', 'Оформлення замовлення')

@section('content')





    <form class="form-group" id="new_order" method="POST" action="/jobs/update/{{$job->id}}">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
                    <div class="form-group">
                    <label for="inputText">Recruiters :</label><br>
                        <select name="recruiter_id" >
                   @foreach($recruiters as $recruiter)
                            <option value="{{$recruiter->id}}" {!! $recruiter->id == $job->recruiter_id ? 'selected' : '' !!} >{{$recruiter->fullName()}}</option>
                       @endforeach
                        </select>
                </div>
                    <div class="form-group">
                    <label for="inputText">Title job:</label>
                    <input type="text" id="title" name="title" value="{{$job->title}}"  class="form-control" placeholder="Title job" required >
                </div>
        <div class="form-group">
                    <label for="inputText">Description job:</label>
            <textarea id="description" name="description"   class="form-control" placeholder="Description job" required >{{$job->description}}</textarea>
                </div>

        <button class="btn btn-lg btn-primary btn-block add_button" name="new_job" id="new_job" type="submit">Edit</button>
    </form>


    @endsection