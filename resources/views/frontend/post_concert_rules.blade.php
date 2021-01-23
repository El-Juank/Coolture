@extends('layouts.base')

@section('seoTitle')
    | {{ __('lang.post_rules_title') }}
@endsection

@section('content')
    <section id="post-rules">
        <div class="container generic-container" data-aos="fade-up">

            <div class="section-header">
                <h2>{{ __('lang.post_rules_title') }}</h2>
            </div>
            <p>{{ __('lang.post_rules_intro') }}</p>

            <p>{{ __('lang.post_rules_list_title') }}<strong>{{ __('lang.post_rules_list_title_strong') }}</strong>:</p>
            <ul>
                <li>{{ __('lang.post_rules_list_item1') }}</li>
                <li>{{ __('lang.post_rules_list_item2') }}</li>
                <li>{{ __('lang.post_rules_list_item3') }}</li>
                <li>{{ __('lang.post_rules_list_item4') }}</li>
                <li>{{ __('lang.post_rules_list_item5') }}</li>
                <li>{{ __('lang.post_rules_list_item6') }}</li>
                <li>{{ __('lang.post_rules_list_item7') }}</li>
                <li>{{ __('lang.post_rules_list_item8') }}</li>
                <li>{{ __('lang.post_rules_list_item9') }}</li>
                <li>{{ __('lang.post_rules_list_item10') }}</li>
                <li>{{ __('lang.post_rules_list_item11') }}</li>
                <li>{{ __('lang.post_rules_list_item12') }}</li>
                <li>{{ __('lang.post_rules_list_item13') }}</li>
            </ul>
        </div>
    </section>

    <script type="text/javascript">
        setTimeout(function() {
            $("#header").addClass("header-fixed");
        }, 1);

    </script>
@endsection
