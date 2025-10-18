@extends('layouts.main')
@section("content")
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: green;
    }
    .circle{
        height: 200px;
        width: 200px;
        border-radius: 50%;
        background-color: red;
        margin: 50px auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<div class='circle'></div>
@endsection
