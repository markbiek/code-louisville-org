@extends('layout')
@section('title', 'Hire')

@section('content')

    @include('components.nav', [ 'home' => false ])

    <section id="employers" class="content background-white p2-top p4-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <section id="why" class="m2-bottom">
                        <h3 class="p1-top m0" @include('edit', ['key' => 'hire_why_title'])>{!! $hire_why_title !!}</h3>
                        <hr>
                        <div @include('edit', ['key' => 'hire_why_desc'])>{!! $hire_why_desc !!}</div>
                    </section>
                    <section id="partners" class="m2-top m2-bottom">
                        <hr>
                        <h3 class="m0" @include('edit', ['key' => 'hire_partners_title'])>{!! $hire_partners_title !!}</h3>
                        <hr>
                        <div class="gallery" @include('edit', ['key' => 'hire_partners_images'])>{!! $hire_partners_images !!}</div>
                    </section>
                    <section id="questions" class="faqs m2-top m2-bottom">
                        <hr>
                        <h3 class="m0" @include('edit', ['key' => 'hire_questions_title'])>{!! $hire_questions_title !!}</h3>
                        <hr>
                        <div @include('edit', ['key' => 'hire_questions_desc'])>{!! $hire_questions_desc !!}</div>
                    </section>
                    <hr>
                    <h3 class="form-title" id="form">Learn more</h3>
                    <section class="employer-form inset">
                        @if(Session::has('success'))
                            <div class="inset">
                                <p class="m0"><span class="fa fa-check success"></span> Thank you for your interest in Code Louisville. We&rsquo;ll be in contact soon.</p>
                            </div>
                        @else
                            <validator name="employer">
                                <form method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>
                                                <p>Name</p>
                                                <input type="text" name="name" v-validate:name="['required']">
                                            </label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>
                                                <p>Email address</p>
                                                <input type="text" name="email" v-validate:email="['required','email']">
                                            </label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>
                                                <p>Organization</p>
                                                <input type="text" name="organization" v-validate:organization="['required']">
                                            </label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>
                                                <p>Involvement</p>
                                                <select name="involvement">
                                                    <option value="Looking for talent">Looking for talent</option>
                                                    <option value="Willing to provide mentors">Willing to provide mentors</option>
                                                    <option value="Willing to host in employer space">Willing to host in employer space</option>
                                                    <option value="Willing to sponsor events">Willing to sponsor events</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>
                                                <p>Message</p>
                                                <textarea name="message" v-validate:message="['required']"></textarea>
                                            </label>
                                        </div>
                                    </div>
                                    <div v-if="$employer.valid">
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <button type="submit" class="button button-block pink">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </validator>
                        @endif
                    </section>
                </div>
                <div class="col-sm-3">
                    <nav class="subnav" data-spy="affix" data-offset-top="83" data-offset-bottom="753">
                        <h1 class="m0">{{ $title }}</h1>
                        <ul class="nav">
                            <li><a href="#why">Why partner?</a></li>
                            <li><a href="#partners">Partners</a></li>
                            <li><a href="#questions">FAQs</a></li>
                            <li><a href="#form">Learn more</a></li>
                            <li><a href="/hire/graduates" class="button pink"><i class="fa fa-graduation-cap"></i><span>Grad List</span><span>Graduate List</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('vue')

    @include('components.vue')

    <script>
        new Vue({
            el: '#employers',
            methods: {
                onReset: function () {
                    this.$resetValidation()
                }
            }
        })
    </script>

@endsection
