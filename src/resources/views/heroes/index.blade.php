@extends('layouts.app')

@section('content')
        <div class="container">
           <div class="row">
               <div class="col-12">
                   @foreach( $heroes as $hero )
                       <div class="col-md-6 text-center mydiv">
                           @if(Auth::user() && Auth::user()->id == $hero->user_id)
                           <div class="post_edit"><a style="text-decoration: none; float:left;" href="{{ url('heroes/'.$hero->id.'/edit') }}">Edit</a></div>
                           <div class="delete_edit"><a style="text-decoration: none;" href="{{ url('heroes/delete', $hero->id) }}" onclick="event.preventDefault();
                                   document.getElementById('delete-form').submit();" >Delete</a></div>
                               <form id="delete-form" action="{{ route('heroes.destroy', $hero->id) }}" method="POST" style="display: none;">
                                   {{ csrf_field() }}
                                   {{ method_field('DELETE') }}
                               </form>
                           @endif
                           <h2 class="">{{ $hero->nickname }}</h2>
                           <a style="text-decoration: none" href="{{ url("heroes/{$hero->id}") }}">
                           <img class="post_image" src="{{ asset("images/$hero->image") }}" style="width: 100%" alt="">
                           </a>
                       </div>
                   @endforeach
                </div>
           </div>
            <div class="row">
                <div class="col-12 text-center">
                    {{ $heroes->links() }}
                </div>
            </div>
        </div>
@endsection
