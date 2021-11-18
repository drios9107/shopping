@extends('..layouts.app')

@section('content')
<template>
  
    <div class="flex-center position-ref full-height">
           <div class="content">
               @auth
                   <shoes-list-component></shoes-list-component>
               @endauth
          </div>
    </div>
    
    </template>
@endsection