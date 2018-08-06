@extends('layouts.app')

@section('content')









    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                      <!--
<list-users></list-users>
                        -->


                    <div id="app" dark>

                        <v-app>
                         <h1>Hello</h1>


                            <router-view></router-view>

                        </v-app>

                    </div>


                </div>
            </div>
        </div>
    </div>


@endsection
