@extends('mail.layout')

<div class="text-center">
    <h1>Вам скоро привезут вот это заказали в магазине:</h1>
   <ul>
    @foreach($goods as $good)
    <li> {{ $good->good[0]->name }}   ( {{ $good->price }}$ ) </li>
    <br>      
    @endforeach
   </ul>
</div>