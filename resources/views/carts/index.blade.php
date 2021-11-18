@extends('..layouts.app')

@section('content')
<template>
  
    <div class="flex-center position-ref full-height">
           <div class="content">
                @auth
                    <carts-list-component></carts-list-component>
                @endauth
          </div>
    </div>
    
    </template>
@endsection