@extends('layouts.master')

@section('title')
    Message Dashboad
@endsection

@section('css')
    <style>
        .chat-conversation {
            max-height: 630px;
            overflow-y: auto;
        }

        .chat-input-container {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: white;
            padding: 10px;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        }

        #loader {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            /* Ensures the loader is on top of other elements */
        }

        .active-user {
            background-color: #0C768A;
            border: 0.2px solid #0C768A;
        }

        .chat-message {
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
            max-width: 70%;
        }

        .message-sent {
            background-color: #dcf8c6;
            align-self: flex-end;
            text-align: right;
        }

        .message-received {
            background-color: #ffffff;
            align-self: flex-start;
            text-align: left;
        }

        .chat-message img {
            border-radius: 50%;
        }
        .custom-audio-container {
            background-color: #4E9DEF; /* Change this to any color you want */
            padding: 10px;
            border-radius: 5px;
            width: fit-content;
            display: inline-block;
        }
        
    </style>
@endsection

@section('page-title')
    Message Dashboad
@endsection

@section('body')

    <body data-sidebar="colored">
    @endsection

    @section('content')
        <div class="d-lg-flex mb-4">
            <div class="chat-leftsidebar me-4">
                <div class="card mb-0">
                    <div class="chat-leftsidebar-nav">
                        <ul class="nav nav-pills nav-justified bg-light-subtle">
                            <li class="nav-item">
                                <a href="#chat" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                    <i class="ri-message-2-line font-size-20"></i>
                                    <span class="mt-2 d-none d-sm-block">Chat</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#group" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="fab fa-facebook-f font-size-20"></i>
                                    <span class="mt-2 d-none d-sm-block">Facebook</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#instagram" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                    <i class="ri-message-2-line font-size-20"></i>
                                    <span class="mt-2 d-none d-sm-block">Instagram</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content pt-4">
                    <div class="tab-pane show active" id="chat">
                        <div>
                            <h5 class="font-size-14 mb-3">Recent</h5>
                            <ul class="list-unstyled chat-list" data-simplebar id="chat-list" style="max-height: 500px;">
                                @forelse ($leaddata as $lead)
                                    <li id="chat-user-{{ $lead['_id'] }}">
                                        <a href="#" class="mt-0 chat-user" data-id="{{ $lead['_id'] }}"
                                            data-name="{{ $lead['first_name'] }} {{ $lead['last_name'] }}"
                                            data-phone="{{ $lead['country_code'] }}{{ $lead['phone'] }}">
                                            <div class="d-flex">
                                                <div class="user-img online align-self-center me-3">
                                                    <img src="{{ URL::asset('build/images/users/avatar-4.jpg') }}"
                                                        class="rounded-circle avatar-xs" alt="avatar-2">
                                                    <!--<span class="user-status"></span>-->
                                                </div>
                                                <div class="flex-1 overflow-hidden">
                                                    <h5 class="text-truncate font-size-14 mb-1">{{ $lead['first_name'] }}
                                                        {{ $lead['last_name'] }}</h5>
                                                    <p class="text-truncate mb-0">{{ $lead['country_code'] }}{{ $lead['phone'] }}</p>
                                                </div>
                                                <div class="font-size-11">
                                                    {{-- <a href="tel:+{{ $lead['phone'] }}" class="">
                                                        <i class="fas fa-phone"></i> <!-- Font Awesome phone icon -->
                                                    </a> --}}
                                                </div>

                                            </div>
                                        </a>
                                    </li>
                                @empty
                                    <p>No data found.</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="group">
                    <h5 class="font-size-14 mb-2">Facebook Chat</h5>
                    <ul class="list-unstyled chat-list" data-simplebar style="max-height: 650px;">
                        <li>
                            <a href="#" class="mt-0">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            J
                                        </span>
                                    </div>

                                    <div class="flex-1">
                                        <h5 class="font-size-14 mb-0">
                                            Jan Nowak</h5>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            N
                                        </span>
                                    </div>

                                    <div class="flex-1">
                                        <h5 class="font-size-14 mb-0">Nelly González</h5>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            B
                                        </span>
                                    </div>

                                    <div class="flex-1">
                                        <h5 class="font-size-14 mb-0">Bruno Matteo</h5>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            A
                                        </span>
                                    </div>

                                    <div class="flex-1">
                                        <h5 class="font-size-14 mb-0">A H</h5>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="mb-0">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            T
                                        </span>
                                    </div>

                                    <div class="flex-1">
                                        <h5 class="font-size-14 mb-0">Tisha Giordano Dasilva</h5>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="mb-0">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            A
                                        </span>
                                    </div>

                                    <div class="flex-1">
                                        <h5 class="font-size-14 mb-0">Ana Stella</h5>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="mb-0">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            V
                                        </span>
                                    </div>

                                    <div class="flex-1">
                                        <h5 class="font-size-14 mb-0">Vishal Kumar</h5>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="mb-0">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            A
                                        </span>
                                    </div>

                                    <div class="flex-1">
                                        <h5 class="font-size-14 mb-0">Ana Stella</h5>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane" id="instagram">
                    <h5 class="font-size-14 mb-2">Instagram Chat</h5>
                    <ul class="list-unstyled chat-list" data-simplebar style="max-height: 380px;">
                        <li>
                            <a href="#" class="mt-0">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            J
                                        </span>
                                    </div>

                                    <div class="flex-1">
                                        <h5 class="font-size-14 mb-0">
                                            Jan Nowak</h5>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            N
                                        </span>
                                    </div>

                                    <div class="flex-1">
                                        <h5 class="font-size-14 mb-0">Nelly González</h5>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            B
                                        </span>
                                    </div>

                                    <div class="flex-1">
                                        <h5 class="font-size-14 mb-0">Bruno Matteo</h5>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            A
                                        </span>
                                    </div>

                                    <div class="flex-1">
                                        <h5 class="font-size-14 mb-0">A H</h5>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="mb-0">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            T
                                        </span>
                                    </div>

                                    <div class="flex-1">
                                        <h5 class="font-size-14 mb-0">Tisha Giordano Dasilva</h5>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="mb-0">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            A
                                        </span>
                                    </div>

                                    <div class="flex-1">
                                        <h5 class="font-size-14 mb-0">Ana Stella</h5>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-100 user-chat mt-4 mt-sm-0 card mb-0">
                <div class="card-body">
                    <div class="pb-3 user-chat-border">
                        <div class="row">
                            <div class="col-md-4 col-6">
                                <h5 class="font-size-15 mb-1 text-truncate">Jan Nowak</h5>
                                <p class="text-muted text-truncate mb-0"><i
                                        class="mdi mdi-circle text-primary font-size-10 align-middle me-1"></i> Active now
                                </p>
                            </div>
                            <div class="col-md-8 col-6">
                                <ul class="list-inline user-chat-nav text-end mb-0">
                                    <li class="list-inline-item d-inline-block d-sm-none">
                                        <div class="dropdown">
                                            <button class="btn nav-btn dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-search-line"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-md">
                                                <form class="p-2">
                                                    <div class="search-box">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control rounded"
                                                                placeholder="Search...">
                                                            <i class="ri-search-line search-icon"></i>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-none d-sm-inline-block">
                                        <div class="search-box me-2">
                                            <div class="position-relative">
                                                <input type="text" class="form-control border"
                                                    placeholder="Search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-inline-item m-0 d-none d-sm-inline-block">
                                        <div class="dropdown">
                                            <button class="btn nav-btn dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-cog"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">View Profile</a>
                                                <a class="dropdown-item" href="#">Clear chat</a>
                                                <a class="dropdown-item" href="#">Muted</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-inline-item">
                                        <div class="dropdown">
                                            <button class="btn nav-btn dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else</a>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="chat-conversation py-3">
                        <ul class="list-unstyled mb-0 pe-3" data-simplebar style="max-height: 630px;">
                            <li>
                                <div class="conversation-list">
                                    <div class="d-flex">
                                        <div class="chat-avatar">
                                            <img src="{{ URL::asset('build/images/users/avatar-4.jpg') }}" alt="avatar-2">
                                        </div>

                                        <div class="flex-grow-1">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <p class="mb-0">
                                                        Hi Jordan! <br>
                                                        Feels like it's been a while! Home are you? Do you
                                                        have ant time for the remainder of the week to help me with an
                                                        ongoing project?
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex-shrink-0 ps-2">
                                            <div class="dropdown align-self-start">
                                                <a class="dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical font-size-18"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Copy</a>
                                                    <a class="dropdown-item" href="#">Save</a>
                                                    <a class="dropdown-item" href="#">Forward</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="right">
                                <div class="conversation-list">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 pe-2">
                                            <div class="dropdown align-self-start">
                                                <a class="dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical font-size-18"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Copy</a>
                                                    <a class="dropdown-item" href="#">Save</a>
                                                    <a class="dropdown-item" href="#">Forward</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-0">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <p class="mb-0">
                                                        Hi Martin, Glad to hear from you, I'm fine,what about you? and how
                                                        it's going with the velocity website?
                                                        Of course I will help with this project
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat-avatar">
                                            <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}" alt="avatar-2">
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="chat-day-title">
                                    <span class="title font-size-13">Today</span>
                                </div>
                            </li>

                            <li>
                                <div class="conversation-list">
                                    <div class="d-flex">
                                        <div class="chat-avatar">
                                            <img src="{{ URL::asset('build/images/users/avatar-4.jpg') }}" alt="avatar-2">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <p class="mb-0">
                                                        Super, I will get you the new brief for our own site over to you
                                                        this evening,
                                                        so you have time to read over I'm good thank you!
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 ps-2">
                                            <div class="dropdown align-self-start">
                                                <a class="dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical font-size-18"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Copy</a>
                                                    <a class="dropdown-item" href="#">Save</a>
                                                    <a class="dropdown-item" href="#">Forward</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="right">
                                <div class="conversation-list">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 pe-2">
                                            <div class="dropdown align-self-start">
                                                <a class="dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical font-size-18"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Copy</a>
                                                    <a class="dropdown-item" href="#">Save</a>
                                                    <a class="dropdown-item" href="#">Forward</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex-grow-0">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <p class="mb-0">
                                                        Of course I can, just catching up with Steve on it and i'll write it
                                                        out.
                                                        Speak tomorrow! Let me know if you have any questions!
                                                    </p>
                                                    <ul class="list-inline message-img mt-2 mb-0">
                                                        <li class="list-inline-item message-img-list">
                                                            <a class="d-inline-block" href="">
                                                                <img src="{{ URL::asset('build/images/small/img-1.jpg') }}" alt=""
                                                                    style="width: 80px;" class="rounded img-thumbnail">
                                                            </a>
                                                        </li>

                                                        <li class="list-inline-item message-img-list">
                                                            <a class="d-inline-block" href="">
                                                                <img src="{{ URL::asset('build/images/small/img-2.jpg') }}" alt=""
                                                                    style="width: 80px;" class="rounded img-thumbnail">
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat-avatar">
                                            <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}" alt="avatar-2">
                                        </div>
                                    </div>

                                </div>
                            </li>

                            <li>
                                <div class="conversation-list">
                                    <div class="d-flex">
                                        <div class="chat-avatar">
                                            <img src="{{ URL::asset('build/images/users/avatar-4.jpg') }}" alt="avatar-2">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <p class="mb-0">
                                                        Thank You very much, I am waiting Project
                                                    </p>
                                                </div>
                                                <p class="chat-time mb-0"><i class="mdi mdi-clock-outline me-1"></i> 10:06
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 ps-2">
                                            <div class="dropdown align-self-start">
                                                <a class="dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical font-size-18"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Copy</a>
                                                    <a class="dropdown-item" href="#">Save</a>
                                                    <a class="dropdown-item" href="#">Forward</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="right">
                                <div class="conversation-list">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 pe-2">
                                            <div class="dropdown align-self-start">
                                                <a class="dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical font-size-18"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Copy</a>
                                                    <a class="dropdown-item" href="#">Save</a>
                                                    <a class="dropdown-item" href="#">Forward</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-0">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <p class="mb-0">
                                                        When someone thanks us, our automatic response is to say, “You’re
                                                        welcome.” This is something that we have
                                                        learned from our parents and family and have been doing for a long
                                                        time.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat-avatar">
                                            <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}" alt="avatar-2">
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="px-lg-3">
                        <div class="pt-3">
                            <div class="row">
                                <div class="col">
                                    <div class="position-relative">
                                        <input type="text" class="form-control chat-input"
                                            placeholder="Enter Message...">

                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="submit"
                                        class="btn btn-primary chat-send w-md waves-effect waves-light"><span
                                            class="d-none d-sm-inline-block me-2">Send</span> <i
                                            class="mdi mdi-send"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="w-100 user-chat mt-4 mt-sm-0 card mb-0">
                <div class="card-body d-flex flex-column">
                    <div class="pb-3 user-chat-border">
                        <div class="row">
                            <div class="col-md-4 col-6">
                                <h5 class="font-size-15 mb-1 text-truncate" id="chat-user-name">Select a user</h5>
                            </div>
                        </div>
                    </div>

                    <!-- Chat Conversation -->
                    <div class="chat-conversation flex-grow-1 d-flex flex-column" id="chat-container"
                        style="display: none; overflow-y: auto;">
                        <ul class="list-unstyled mb-0 pe-3" data-simplebar
                            style="flex-grow: 1; max-height: calc(100vh - 260px);" id="chat-messages">
                            <!-- Messages will be dynamically loaded here -->
                        </ul>
                    </div>


                    <div id="loader" style="display: none;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>


                    <!-- Message Input and Send Button -->
                    <div class="mt-auto" id="message-input-container"
                        style="display: none; position: sticky; bottom: 0; background-color: white;">
                        <div class="px-lg-3">
                            <div class="pt-3">
                                <div class="row">
                                    <div class="col">
                                        <div class="position-relative">
                                            <input type="text" class="form-control chat-input"
                                                placeholder="Enter Message..." id="body">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit"
                                            class="btn btn-primary chat-send w-md waves-effect waves-light"
                                            id="send-message-btn">
                                            <span class="d-none d-sm-inline-block me-2">Send</span> <i
                                                class="mdi mdi-send"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="messages">
                        <!-- Incoming messages will appear here -->
                    </div>

                </div>
            </div> --}}

        </div>
    @endsection

    @section('scripts')
        <script>
            let page = 1; // Track current page or offset
            const chatList = document.getElementById('chat-list');

            chatList.addEventListener('scroll', function() {
                if (chatList.scrollTop + chatList.clientHeight >= chatList.scrollHeight) {
                    loadMoreData(); // Load more data when user reaches the bottom
                }
            });

            function loadMoreData() {
                page++;
                fetch(`/load-more-leads?page=${page}`)
                    .then(response => response.json())
                    .then(data => {
                        data.leads.forEach(lead => {
                            const li = document.createElement('li');
                            li.innerHTML = `
                        <a href="#" class="mt-0 chat-user" data-id="${lead._id}" data-name="${lead.first_name} ${lead.last_name}" data-phone="${lead.country_code}${lead.phone}">
                            <div class="d-flex">
                                <div class="user-img online align-self-center me-3">
                                    <img src="{{ URL::asset('build/images/users/avatar-4.jpg') }}" class="rounded-circle avatar-xs" alt="avatar-2">
                                    // <span class="user-status"></span>
                                </div>
                                <div class="flex-1 overflow-hidden">
                                    <h5 class="text-truncate font-size-14 mb-1">${lead.first_name} ${lead.last_name}</h5>
                                    <p class="text-truncate mb-0">${lead.country_code}${lead.phone}</p>
                                </div>
                                <div class="font-size-11">04 min</div>
                            </div>
                        </a>
                    `;
                            chatList.appendChild(li);
                        });
                    })
                    .catch(error => console.log('Error loading more leads:', error));
            }
        </script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/7.0.3/pusher.min.js"></script> --}}
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function() {
                let currentUserPhone = null;

                // When a user clicks on a chat-user, set the currentUserPhone
                $('.chat-user').on('click', function(e) {
                    e.preventDefault();
                    let countryCode = $(this).data('country-code');  // Assuming the country code is available in data attributes
                        currentUserPhone = $(this).data('phone');
                        currentUserPhone = currentUserPhone.replace(/\s+/g, '');    

                        console.log('User selected:', currentUserPhone);
                    

                    // Convert to string if necessary
                    if (typeof currentUserPhone !== 'string') {
                        currentUserPhone = String(currentUserPhone);
                        console.error('Converted currentUserPhone to string:', currentUserPhone);
                    }

                    $('#chat-container').show();
                    $('#message-input-container').show();
                    $('#chat-user-name').text($(this).data('name'));

                    // Clear the chat messages container
                    $('#chat-messages').empty();

                    // Optionally, load the existing conversation messages here
                });

                const urlParams = new URLSearchParams(window.location.search);
                const selectedPhone = urlParams.get('phone');  
                
                // Function to normalize phone numbers i have dought here 
               function normalizePhoneNumber(phone) {
                    // Check if phone is null or undefined
                    if (!phone) {
                        console.error('Phone number is null or undefined:', phone);
                        return ''; // Return an empty string or handle the error appropriately
                    }
                
                    // Ensure the phone is treated as a string, and remove all non-numeric characters
                    const numericPhone = phone.toString().replace(/\D/g, ''); 
                    console.log(numericPhone);
                    return `${numericPhone}`; // Return the numeric string
                }

                // Initialize Pusher
                var pusher = new Pusher('ca3024112cfb52d49d71', {
                    cluster: 'mt1',
                    encrypted: true,
                    forceTLS: true
                });

                // Subscribe to the 'messages' channel
                var channel = pusher.subscribe('messages');

                // Bind to the 'MessageReceived' event
                channel.bind('App\\Events\\MessageReceived', function(data) {
                    console.log('Event received:', data);

                    if (data && data.from && data.message) {
                        // Normalize both the current user phone and the sender's phone
                        const normalizedCurrentUserPhone = normalizePhoneNumber(selectedPhone);
                        const normalizedFromPhone = normalizePhoneNumber(data.message.from);

                        console.log('Normalized Current User Phone:', normalizedCurrentUserPhone);
                        console.log('Normalized From Phone:', normalizedFromPhone);

                        // Check if the incoming message is for the currently selected phone number
                        if (normalizedCurrentUserPhone === normalizedFromPhone) {
                            console.log('Appending message for:', normalizedFromPhone);

                            const messageClass = data.message.direction === 'incoming' ? 'right' : '';
                            const avatarSrc = data.message.direction === 'incoming' ?
                                '{{ URL::asset('build/images/users/avatar-2.jpg') }}' :
                                '{{ URL::asset('build/images/users/avatar-4.jpg') }}';

                            const formattedDate = new Date(data.message.created_at).toLocaleString();

                            const messageHtml = `
                                    <li >
                                        <div class="conversation-list">
                                            <div class="d-flex">
                                                ${messageClass === '' ? `<div class="chat-avatar"><img src="${avatarSrc}" alt="avatar"></div>` : ''}
                                                <div class="flex-grow-1">
                                                    <div class="ctext-wrap">
                                                        <div class="ctext-wrap-content">
                                                            <p class="mb-0">${data.message.body}</p>
                                                            <span class="chat-time text-muted">${formattedDate}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                ${messageClass === 'right' ? `<div class="chat-avatar"><img src="${avatarSrc}" alt="avatar"></div>` : ''}
                                            </div>
                                        </div>
                                    </li>
                                `;

                            $('#chat-messages').append(messageHtml);

                            // Scroll to the bottom of the chat container
                            $('#chat-messages').scrollTop($('#chat-messages')[0].scrollHeight);
                        } else {
                            console.log('Phone numbers do not match. Message not appended.');
                        }
                    }
                });
            });
        </script>




        <script>
            $(document).ready(function() {
                $('.chat-user').on('click', function(e) {
                    e.preventDefault();

                    // Remove active class from all users
                    $('.chat-user').closest('li').removeClass('active-user');

                    // Add active class to the selected user
                    $(this).closest('li').addClass('active-user');

                    // Optionally, you can perform other actions here, like loading the chat for the selected user
                });
            });




            // important code 

            document.addEventListener('DOMContentLoaded', function() {
                let currentUserPhone = null;
                let currentPage = 1;
                let hasMore = true;
                let isLoading = false;

                const chatUsers = document.querySelectorAll('.chat-user');
                const chatUserName = document.getElementById('chat-user-name');
                const chatMessages = document.getElementById('chat-messages');
                const messageInputContainer = document.getElementById('message-input-container');
                const loader = document.getElementById('loader');
                const chatContainer = chatMessages.parentElement;

                // Fetch messages function
                function fetchMessages(page = 1, append = false) {
                    if (isLoading) return;
                    isLoading = true;
                    loader.style.display = 'block';

                    // Save current scroll position
                    const scrollTop = chatContainer.scrollTop;
                    const scrollHeight = chatContainer.scrollHeight;

                    fetch(`/get-messages/${currentUserPhone}?page=${page}`)
                        .then(response => response.json())
                        .then(result => {
                            console.log('Fetched items:', result);

                            const items = result.data;
                            hasMore = result.has_more;

                            // Sort all items (messages and calls) by created_at timestamp
                            items.sort((a, b) => new Date(a.created_at) - new Date(b.created_at));

                            // Display sorted items
                            const itemsHtml = items.map(item => {
                                const formattedDate = new Date(item.created_at).toLocaleString();
                                let messageHtml = '';

                                if (item.type === 'message') {
                                    const messageClass = item.direction === 'outgoing' ? 'right' : '';
                                    const avatarSrc = item.direction === 'outgoing' ?
                                        '{{ URL::asset('build/images/users/avatar-2.jpg') }}' :
                                        '{{ URL::asset('build/images/users/avatar-4.jpg') }}';

                                    messageHtml = `
                            <li class="${messageClass}">
                                <div class="conversation-list">
                                    <div class="d-flex">
                                        ${messageClass === '' ? `<div class="chat-avatar"><img src="${avatarSrc}" alt="avatar"></div>` : ''}
                                        <div class="flex-grow-1">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <p class="mb-0">${item.body}</p>
                                                    <span class="chat-time text-muted">${formattedDate}</span>
                                                </div>
                                            </div>
                                        </div>
                                        ${messageClass === 'right' ? `<div class="chat-avatar"><img src="${avatarSrc}" alt="avatar"></div>` : ''}
                                    </div>
                                </div>
                            </li>
                        `;
                                } else if (item.type === 'call') {
                                    const callClass = item.direction === 'outgoing' ? 'right' : '';
                                    const callAvatarSrc = item.direction === 'outgoing' ?
                                        '{{ URL::asset('build/images/users/avatar-2.jpg') }}' :
                                        '{{ URL::asset('build/images/users/avatar-4.jpg') }}';
                                        messageHtml = `
                        <li class="${callClass}">
                            <div class="conversation-list">
                                <div class="d-flex">
                                    ${callClass === '' ? `<div class="chat-avatar"><img src="${callAvatarSrc}" alt="avatar"></div>` : ''}
                                    <div class="flex-grow-1">
                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">Call from ${chatUserName.textContent} to ${item.to}</p>
                                                <p class="mb-0">Duration: ${item.duration}</p>
                                                <span class="chat-time text-muted">${formattedDate}</span>
                                                ${item.recording_url ? `
                                                    <div class="custom-audio-container">
                                                        <audio controls>
                                                            <source src="${item.recording_url}" type="audio/mpeg">
                                                            Your browser does not support the audio element.
                                                        </audio>
                                                    </div>
                                                    <a href="${item.recording_url}" class="btn btn-primary btn-sm" download>Download</a>
                                                ` : '<p>No recording available</p>'}
                                            </div>
                                        </div>
                                    </div>
                                    ${callClass === 'right' ? `<div class="chat-avatar"><img src="${callAvatarSrc}" alt="avatar"></div>` : ''}
                                </div>
                            </div>
                        </li>
                    `;
                                }

                                return messageHtml;
                            }).join('');

                            if (!append) {
                                chatMessages.innerHTML = ''; // Clear previous messages if not appending
                            }

                            if (append) {
                                // Prepend new messages
                                chatMessages.insertAdjacentHTML('afterbegin', itemsHtml);
                            } else {
                                // Display messages for the first page or reset
                                chatMessages.innerHTML = itemsHtml;
                            }

                            // Adjust scroll position to maintain view
                            chatContainer.scrollTop = chatContainer.scrollHeight - scrollHeight + scrollTop;

                            isLoading = false;
                            loader.style.display = 'none';
                        })
                        .catch(error => {
                            console.error('Error fetching messages and calls:', error);
                            isLoading = false;
                            loader.style.display = 'none';
                        });
                }

                // Add event listeners for chat users
                chatUsers.forEach(user => {
                    user.addEventListener('click', function(e) {
                        e.preventDefault();

                        // Get user data
                        const userName = this.dataset.name;
                        currentUserPhone = this.dataset.phone;

                        // Update chat window
                        chatUserName.textContent = userName;
                        messageInputContainer.style.display = 'block';
                        currentPage = 1;
                        hasMore = true;

                        // Fetch the first page of messages
                        fetchMessages(currentPage);
                    });
                });

                // Infinite scroll handling
                chatContainer.addEventListener('scroll', function() {
                    if (chatContainer.scrollTop === 0 && hasMore && !isLoading) {
                        currentPage++;
                        fetchMessages(currentPage, true);
                    }
                });

                // Send message logic remains unchanged
                const sendMessageBtn = document.getElementById('send-message-btn');
                sendMessageBtn.addEventListener('click', function(e) {
                    e.preventDefault();

                    const body = document.getElementById('body').value;

                    if (!currentUserPhone || !body) {
                        return;
                    }

                    fetch('/messages/send', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            },
                            body: JSON.stringify({
                                to: currentUserPhone,
                                body: body
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const messageHtml = `
                    <li class="right">
                        <div class="conversation-list">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <div class="ctext-wrap">
                                        <div class="ctext-wrap-content">
                                            <p class="mb-0">${body}</p>
                                            <span class="chat-time text-muted">${new Date().toLocaleString()}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-avatar">
                                    <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}" alt="avatar">
                                </div>
                            </div>
                        </div>
                    </li>
                `;
                                chatMessages.insertAdjacentHTML('beforeend', messageHtml);
                                document.getElementById('body').value = '';

                                chatContainer.scrollTop = chatContainer.scrollHeight;
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Failed to send message!'
                                });
                                console.error('Error sending message:', data.error);
                            }
                        })
                        .catch(error => {
                            console.error('Error sending message:', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Error sending message. Please try again later!'
                            });
                        });
                });
            });
        </script>
        <script>
            // After the page loads, automatically select the user and load the chat messages
            document.addEventListener('DOMContentLoaded', function() {
                const urlParams = new URLSearchParams(window.location.search);
                const selectedPhone = urlParams.get('phone');

                if (selectedPhone) {
                    // Simulate a click on the chat user with the corresponding phone number
                    const chatUser = document.querySelector(`.chat-user[data-phone="${selectedPhone}"]`);

                    if (chatUser) {
                        chatUser.click();
                    }
                }
            });
        </script>
    @endsection
