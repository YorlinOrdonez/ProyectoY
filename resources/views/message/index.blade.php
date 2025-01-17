@extends('layouts.app') @section('template_title') Message @endsection @section('content') 
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> <style> body{margin-top:20px;} .chat-search-box { -webkit-border-radius: 3px 0 0 0; -moz-border-radius: 3px 0 0 0; border-radius: 3px 0 0 0; padding: .75rem 1rem; } .chat-search-box .input-group .form-control { -webkit-border-radius: 2px 0 0 2px; -moz-border-radius: 2px 0 0 2px; border-radius: 2px 0 0 2px; border-right: 0; } .chat-search-box .input-group .form-control:focus { border-right: 0; } .chat-search-box .input-group .input-group-btn .btn { -webkit-border-radius: 0 2px 2px 0; -moz-border-radius: 0 2px 2px 0; border-radius: 0 2px 2px 0; margin: 0; } .chat-search-box .input-group .input-group-btn .btn i { font-size: 1.2rem; line-height: 100%; vertical-align: middle; } @media (max-width: 767px) { .chat-search-box { display: none; } } .users-container { position: relative; padding: 1rem 0; border-right: 1px solid #e6ecf3; height: 100%; display: -ms-flexbox; display: flex; -ms-flex-direction: column; flex-direction: column; } .users { padding: 0; } .users .person { position: relative; width: 100%; padding: 10px 1rem; cursor: pointer; border-bottom: 1px solid #f0f4f8; } .users .person:hover { background-color: #ffffff; background-image: -webkit-gradient(linear, left top, left bottom, from(#e9eff5), to(#ffffff)); background-image: -webkit-linear-gradient(right, #e9eff5, #ffffff); background-image: -moz-linear-gradient(right, #e9eff5, #ffffff); background-image: -ms-linear-gradient(right, #e9eff5, #ffffff); background-image: -o-linear-gradient(right, #e9eff5, #ffffff); background-image: linear-gradient(right, #e9eff5, #ffffff); } .users .person.active-user { background-color: #ffffff; background-image: -webkit-gradient(linear, left top, left bottom, from(#f7f9fb), to(#ffffff)); background-image: -webkit-linear-gradient(right, #f7f9fb, #ffffff); background-image: -moz-linear-gradient(right, #f7f9fb, #ffffff); background-image: -ms-linear-gradient(right, #f7f9fb, #ffffff); background-image: -o-linear-gradient(right, #f7f9fb, #ffffff); background-image: linear-gradient(right, #f7f9fb, #ffffff); } .users .person:last-child { border-bottom: 0; } .users .person .user { display: inline-block; position: relative; margin-right: 10px; } .users .person .user img { width: 48px; height: 48px; -webkit-border-radius: 50px; -moz-border-radius: 50px; border-radius: 50px; } .users .person .user .status { width: 10px; height: 10px; -webkit-border-radius: 100px; -moz-border-radius: 100px; border-radius: 100px; background: #e6ecf3; position: absolute; top: 0; right: 0; } .users .person .user .status.online { background: #9ec94a; } .users .person .user .status.offline { background: #c4d2e2; } .users .person .user .status.away { background: #f9be52; } .users .person .user .status.busy { background: #fd7274; } .users .person p.name-time { font-weight: 600; font-size: .85rem; display: inline-block; } .users .person p.name-time .time { font-weight: 400; font-size: .7rem; text-align: right; color: #8796af; } @media (max-width: 767px) { .users .person .user img { width: 30px; height: 30px; } .users .person p.name-time { display: none; } .users
        .selected-user {
            width: 100%;
            padding: 0 15px;
            min-height: 64px;
            line-height: 64px;
            border-bottom: 1px solid #e6ecf3;
            -webkit-border-radius: 0 3px 0 0;
            -moz-border-radius: 0 3px 0 0;
            border-radius: 0 3px 0 0;
        }

        .selected-user span {
            line-height: 100%;
        }

        .selected-user span.name {
            font-weight: 700;
        }

        .chat-container {
            position: relative;
            padding: 1rem;
        }

        .chat-container li.chat-left,
        .chat-container li.chat-right {
            display: flex;
            flex: 1;
            flex-direction: row;
            margin-bottom: 40px;
        }

        .chat-container li img {
            width: 48px;
            height: 48px;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;
            border-radius: 30px;
        }

        .chat-container li .chat-avatar {
            margin-right: 20px;
        }

        .chat-container li.chat-right {
            justify-content: flex-end;
        }

        .chat-container li.chat-right > .chat-avatar {
            margin-left: 20px;
            margin-right: 0;
        }

        .chat-container li .chat-name {
            font-size: .75rem;
            color: #999999;
            text-align: center;
        }

        .chat-container li .chat-text {
            padding: .4rem 1rem;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            background: #ffffff;
            font-weight: 300;
            line-height: 150%;
            position: relative;
        }

        .chat-container li .chat-text:before {
            content: '';
            position: absolute;
            width: 0;
            height: 0;
            top: 10px;
            left: -20px;
            border: 10px solid;
            border-color: transparent #ffffff transparent transparent;
        }

        .chat-container li.chat-right > .chat-text {
            text-align: right;
        }

        .chat-container li.chat-right > .chat-text:before {
            right: -20px;
            border-color: transparent transparent transparent #ffffff;
            left: inherit;
        }

        .chat-container li .chat-hour {
            padding: 0;
            margin-bottom: 10px;
            font-size: .75rem;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            margin: 0 0 0 15px;
        }

        .chat-container li .chat-hour > span {
            font-size: 16px;
            color: #9ec94a;
        }

        .chat-container li.chat-right > .chat-hour {
            margin: 0 15px 0 0;
        }

        @media (max-width: 767px) {
            .chat-container li.chat-left,
            .chat-container li.chat-right {
                flex-direction: column;
                margin-bottom: 30px;
            }
            .chat-container li img {
                width: 32px;
                height: 32px;
            }
            .chat-container li.chat-left .chat-avatar {
                margin: 0 0 5px 0;
                display: flex;
                align-items: center;
            }
            .chat-container li.chat-left .chat-hour {
                justify-content: flex-end;
            }
            .chat-container li.chat-left .chat-name {
                margin-left: 5px;
            }
            .chat-container
            @media (max-width: 767px) {
            .chat-container li.chat-left,
            .chat-container li.chat-right {
                flex-direction: column;
                margin-bottom: 30px;
            }
            .chat-container li img {
                width: 32px;
                height: 32px;
            }
            .chat-container li.chat-left .chat-avatar {
                margin: 0 0 5px 0;
                display: flex;
                align-items: center;
            }
            .chat-container li.chat-left .chat-hour {
                justify-content: flex-end;
            }
            .chat-container li.chat-left .chat-name {
                margin-left: 5px;
            }
            .chat-container li.chat-right .chat-avatar {
                order: -1;
                margin: 0 0 5px 0;
                align-items: center;
                display: flex;
                justify-content: right;
                flex-direction: row-reverse;
            }
            .chat-container li.chat-right .chat-hour {
                justify-content: flex-start;
                order: 2;
            }
            .chat-container li.chat-right .chat-name {
                margin-right: 5px;
            }
            .chat-container li .chat-text {
                font-size: .8rem;
            }
        }

        .chat-form {
            padding: 15px;
            width: 100%;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ffffff;
            border-top: 1px solid white;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .card {
            border: 0;
            background: #f4f5fb;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            margin-bottom: 2rem;
            box-shadow: none;
        }
    </style>

    <div class="container">

        <div class="content-wrapper">

            <div class="row gutters">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <div class="card m-0">

                        <div class="row no-gutters">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                                <div class="users-container">
                                    <div class="chat-search-box">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Search">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-info">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="users">
                                        @foreach ($users->take(10) as $user) <!-- Reducido a 10 usuarios -->
                                            <li class="person" data-chat="{{ $user->id }}">
                                                <div class="user">
                                                    <img src="https://www.bootdey.com/img/Content/avatar/avatar{{ $loop->index % 5 + 1 }}.png" alt="{{ $user->name }}">
                                                    <span class="status online"></span>
                                                </div>
                                                <p class="name-time">
                                                    <span class="name">{{ $user->name }}</span>
                                                    <span class="time">{{ $user->created_at->format('d/m/Y') }}</span>
                                                </p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                                <div class="selected-user">
                                    <span>A: <span class="name">Emily Russell</span></span>
                                </div>
                                <div class="chat-container">
                                    <ul class="chat-box chatContainerScroll">
                                        <li class="chat-left">
                                            <div class="chat-avatar">
                                                <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                                <div class="chat-name">Russell</div>
                                            </div>
                                            <div class="chat-text">Hola, soy Russell.
                                                <br>¿Cómo puedo ayudarte hoy?</div>
                                            <div class="chat-hour">08:55 <span class="fa fa-check-circle"></span></div>
                                        </li>
                                        
                                    </ul>
                                    <div class="form-group mt-3 mb-0">
                                        <textarea class="form-control" rows="3" placeholder="Escribe tu mensaje aquí..."></textarea>
                                        <button type="button" class="btn btn-primary mt-2">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
