@extends('layouts.master')
@section('title','Adres Güncelleme')
@section('content')
    <div class="section">
        <!--Basic Form-->
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="card-panel">
                        <h4 class="header2">Adres Güncelleme</h4>
                        <div class="row">
                            <form class="col s12" method="POST" action="{{route('address.update',$address)}}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="people_id" value="{{$address->people_id}}">
                                <div class="row">
                                    <label for="people_id">Kişi</label>
                                    <div class="input-field col s12">
                                        <div class="input-field col s12">
                                            <input id="people_id"
                                                   type="text"
                                                   value="{{$address->person->name}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="address" class="materialize-textarea" cols="3" rows="5"
                                                  name="address">{{$address->getRawOriginal('address')}}</textarea>
                                        <label for="name">Adres</label>
                                        @error('address')
                                        <span style="color: red;font-size: .75rem;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="post_code" type="text" name="post_code"
                                               value="{{$address->post_code}}">
                                        <label for="post_code">Posta Kodu</label>
                                        @error('post_code')
                                        <span style="color: red;font-size: .75rem;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Ülke</label>
                                    <div class="input-field col s12">
                                        <select name="country_name" id="country_name" class="browser-default">
                                            <option value="" disabled selected>Seçiniz</option>
                                            @forelse($countries as $country)
                                                <option
                                                    value="{{$country->id}}"
                                                    {{$country->id == $address->country_name? 'selected' : null}}>
                                                    {{$country->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('country_name')
                                        <span style="color: red;font-size: .75rem;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Şehir</label>
                                    <div class="input-field col s12">
                                        <select name="city_name" id="city_name" class="browser-default">
                                            @forelse($address->country->cities as $city)
                                                <option
                                                    value="{{$city->id}}"
                                                    {{$city->id == $address->city_name ? 'selected' : null}}>
                                                    {{$city->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('city_name')
                                        <span style="color: red;font-size: .75rem;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn cyan waves-effect waves-light right" type="submit"
                                                name="action">Kaydet
                                            <i class="mdi-content-send right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('page_js')
    <script>
        $('#country_name').on('change', function () {
            $('#city_name').empty();
            @json($countries).
            forEach((element) => {
                if (element.id == $(this).val()) {
                    element.cities.forEach((item) => {
                        $('#city_name').append('<option value="' + item.id + '">' + item.name + '</option>');
                    });
                }
            });


        });
    </script>

@endsection


