@extends('layouts.base')

@section('seoTitle')
    | {{ __('lang.post_concert_title') }}
@endsection

@section('content')
    <div class="container">
        <div class="container generic-container" data-aos="fade-up">
            <div class="text-center mt-5">
                <div class="section-header">
                    <h2>{{ __('lang.post_concert_title') }}</h2>
                </div>
                <div class="row">
                    <div class="col-lg-7 mx-auto">
                        <div class="card mt-2 mx-auto p-4 bg-light">
                            <div class="card-body bg-light">
                                <div class="container">
                                    <form id="contact-form" action="{{ route('rumours.store') }}" method="post"
                                        class="post-rumour mt-3">
                                        @csrf
                                        {{-- ID de l'usuari --}}
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                                        <div class="controls">
                                            <div class="row">
                                                <div class="col-9">
                                                    {{-- Títol del rumor
                                                    --}}
                                                    <div class="form-group">
                                                        <label class="pull-left"
                                                            for="form_title">{{ __('lang.form_title') }} *</label>
                                                        <input id="form_title" type="text" name="title" class="form-control"
                                                            placeholder="{{ __('lang.write_title') }}" required="required"
                                                            data-error="{{__('lang.error_input_email')}}">
                                                    </div>
                                                </div>
                                                {{-- Si es visible o no
                                                --}}
                                                <div class="col-3 align-self-center">
                                                    <div class="pull-left">
                                                        <input type="hidden" name="IsVisible" value="0" />
                                                        <label for="IsVisible">{{ __('lang.visible') }}</label>
                                                        <input id="IsVisible" type="checkbox" name="IsVisible" value="1" />
                                                        <label for="IsVisible"></label>
                                                    </div>
                                                </div>

                                                {{-- Veracitat
                                                --}}
                                                <div class="col-md-12">
                                                    <label class="pull-left"
                                                        for="formControlRange">{{ __('lang.veracity') }}</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="row align-items-center">
                                                            <div class="col-1 p-0">
                                                                <i class="fa fa-frown-o color-corp"
                                                                    style="font-size: 35px;"></i>
                                                            </div>
                                                            <div class="col-10 p-0">
                                                                <input type="range" min="0" max="100" value=""
                                                                    class="form-control-range" id="formControlRange"
                                                                    name="OwnTrust">
                                                            </div>
                                                            <div class="col-1 p-0">
                                                                <i class="fa fa-smile-o color-corp"
                                                                    style="font-size: 35px;"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Rumor en si --}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="pull-left"
                                                            for="form_description">{{ __('lang.rumour_form') }}</label>
                                                        <textarea id="form_description" name="description"
                                                            class="form-control"
                                                            placeholder="{{ __('lang.rumour_placeholder') }}" rows="4"
                                                            required="required"
                                                            data-error="{{ __('lang.ruour_error') }}"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12"> <input type="submit"
                                                        class="btn btn-coolture btn-send btn-block "
                                                        value="{{ __('lang.post_rumour') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            setTimeout(function() {
                $("#header").addClass("header-fixed");
            }, 1);

        </script>
    @endsection
