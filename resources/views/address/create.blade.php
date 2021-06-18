@extends('layouts.master')
@section('title','Adres Ekleme')
@section('content')
    <div class="section">
        <!--Basic Form-->
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="card-panel">
                        <h4 class="header2">Adres Ekle</h4>
                        <div class="row">
                            <form class="col s12" method="POST" action="{{route('address.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="input-field col s12">
                                        <select name="people_id">
                                            <option value="" disabled selected>Seçiniz</option>
                                            @forelse($persons as $person)
                                                <option value="{{$person->id}}">{{$person->name}}</option>
                                            @empty
                                            @endforelse

                                        </select>
                                        <label>Kişi</label>
                                        @error('people_id')
                                        <span style="color: red;font-size: .75rem;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="address" class="materialize-textarea" cols="3" rows="5"
                                                  name="address"></textarea>
                                        <label for="name">Adres</label>
                                        @error('address')
                                        <span style="color: red;font-size: .75rem;">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="post_code" type="text" name="post_code">
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
                                                <option value="{{$country->id}}">{{$country->name}}</option>
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
            @json($countries).forEach((element) => {
                if (element.id == $(this).val()) {
                    element.cities.forEach((item) => {
                        $('#city_name').append('<option value="'+item.id+'">'+item.name+'</option>');
                    });
                }
            });


        });
    </script>

@endsection


