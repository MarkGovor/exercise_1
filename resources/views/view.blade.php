@extends('layouts.app')

@section('title', $car->title)
@section('description', $car->title)
@section('keywords', $car->title . ' ' . $car->from_made . ' - ' . $car->to_made)
@section('image', env('APP_URL') . Storage::url($car->image))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-header">Просто вывод машин</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Машина</th>
                                <th>Фото</th>
                                <th>Дата производства</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>{{$car->title}}</td>
                                    <td><img src="{{ Storage::url($car->image)}}" alt="{{ $car->title }}" width="100"></td>
                                    <td> {{$car->from_made}} - {{$car->to_made}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a title="xxx Share mypage.com xxx"
                           href="http://www.facebook.com/sharer.php? u={{url()->current()}}" target="_blank">
                            Share facebook</a>
                        <br>
                        <a href="https://twitter.com/share"
                           class="twitter-share-button"
                           data-lang="ru"
                           data-url="{{url()->current()}}">Tweet</a>
                        <br>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

                        <!-- Put this script tag to the <head> of your page -->
                        <script type="text/javascript" src="https://vk.com/js/api/share.js?95" charset="windows-1251"></script>

                        <!-- Put this script tag to the place, where the Share button will be -->
                        <script type="text/javascript"><!--
                            document.write(VK.Share.button(false,{type: "link", text: "Поделиться"}));
                            --></script>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
