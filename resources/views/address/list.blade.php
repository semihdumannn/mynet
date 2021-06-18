@extends('layouts.master')
@section('title',$name ?? '' .'Adres Listesi')
@section('page_css')
    <link href="{{ asset('cms/js/plugins/prism/prism.css') }}" type="text/css" rel="stylesheet"
          media="screen,projection">
    <link href="{{ asset('cms/js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet"
          media="screen,projection">
    <link href="{{ asset('cms/js/plugins/data-tables/css/jquery.dataTables.min.css') }}" type="text/css"
          rel="stylesheet" media="screen,projection">
    <link href="{{ asset('cms/js/plugins/chartist-js/chartist.min.css') }}" type="text/css" rel="stylesheet"
          media="screen,projection">
@endsection

@section('content')
    <div class="section">
        <!--DataTables example-->
        <div id="table-datatables">
            <h4 class="header">{{ $name?? '' }} Adres Listesi</h4>
            <div class="row">

                <div class="col s12 m12 l12">
                    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                        <thead>
                        <tr>
                            @if(empty($name))
                            <th>Kişi</th>
                            @endif
                            <th>Adres</th>
                            <th>Posta Kodu</th>
                            <th>Ülke</th>
                            <th>Şehir</th>
                            <th>İşlemler</th>

                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            @if(empty($name))
                                <th>Kişi</th>
                            @endif
                            <th>Adres</th>
                            <th>Posta Kodu</th>
                            <th>Ülke</th>
                            <th>Şehir</th>
                            <th>İşlemler</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        @forelse($addresses as $address)
                            <tr>
                                @if(empty($name))
                                    <td>{{$address->person->name}}</td>
                                @endif
                                <td>{{$address->address}}</td>
                                <td>{{$address->post_code}}</td>
                                <td>{{$address->country->name}}</td>
                                <td>{{$address->city->name}}</td>
                                <td>
                                    <a href="{{route('address.edit',$address)}}"><i class="mdi-editor-mode-edit"></i></a>

                                    <a href="{{route('address.destroy',$address->id)}}" data-method="DELETE" data-confirm="Silmek İstediğinize Eminmisiniz?"><i class="mdi-navigation-cancel" style="color: darkred"></i></a>
                                </td>
                            </tr>
                        @empty
                            <div id="card-alert" class="card orange lighten-5">
                                <div class="card-content orange-text">
                                    <p>WARNING : Adres Bulunamadı</p>
                                </div>
                                <button type="button" class="close orange-text" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_js')
    <!-- data-tables -->
    <script type="text/javascript" src="{{asset('cms/js/plugins/data-tables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('cms/js/plugins/data-tables/data-tables-script.js')}}"></script>
    <script src="{{asset('cms/js/delete.js')}}"></script>
    <!-- chartist -->
    <script type="text/javascript" src="{{asset('cms/js/plugins/chartist-js/chartist.min.js')}}"></script>
    <script type="text/javascript">
        /*Show entries on click hide*/
        $(document).ready(function () {
            $(".dropdown-content.select-dropdown li").on("click", function () {
                var that = this;
                setTimeout(function () {
                    if ($(that).parent().hasClass('active')) {
                        $(that).parent().removeClass('active');
                        $(that).parent().hide();
                    }
                }, 100);
            });
        });
    </script>
@endsection


