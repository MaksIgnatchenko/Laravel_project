@extends('layouts.layout_mark')
@section('sidebar')
    <input type="hidden" id="groupId" value="{{ $group->id }}">
    <table class="simple-little-table" >
        <tr>
            <th colspan="{{count($tasklists)+1}}"
                style="
                letter-spacing: 15px;
                text-align: center;
                background:-webkit-gradient(linear, left top, left bottom, from(#a6a6a6), to(#ffffff));
                font-size: 30px;
                color: #898e93;
                text-shadow: 2px 2px 0px #102c44; ">
                {{$group->name}}
            </th>
        </tr>
        <br>
        <tr>
            <th style="background: -webkit-gradient(linear, left top, left bottom, from(rgb(112, 147, 193)), to(rgb(238, 242, 248)));">
                Users/Moduls
            </th>
            @foreach($tasklists as $tasklist)
            <th class="tasklist" id="tasklist{{$tasklist->name}}">{{$tasklist->name}}
                <br>
                tasks in modul : {{ count($tasklists) }}
            </th>

            @endforeach
        </tr>
        @foreach($array as $user => $moduls)
            <tr>
                <td>{{$user}}</td>
                @foreach($moduls as $key => $rate)
                    @if(count($rate))
                        <td id="{{$key}}:{{$rate[0]->user_id}}" class="trigger" style="cursor:pointer">
                            <br>
                            solved task: {{count($rate)}}
                            <br>
                            ready : {{ count($rate)/count($tasklists)*100 }} %
                        </td>

                    @else
                        <td>
                            no solutions yet
                        </td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </table>

    <!-- Modal -->
    <div class="modal-wrapper">
        <div class="modal">
            <div class="head">
                <a class="btn-close trigger" href="#">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
            <div class="content">
                <div class="good-job">
                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>

    <script  type="text/javascript" charset="utf-8">
        $(document).ready(function () {
            $('.trigger').on('click', function (event) {

                var userId = event.target.id.split(':')[1]
                var tasklistName = event.target.id.split(':')[0]
                $.get("/ajax-marks/",
                    {
                        user_id: userId,
                        tasklist_name: tasklistName
                    }, function (data) {
                        var content = $('.content');
                        content.innerHTML = "";
                        for (var key in data.tasks) {
                            content.append('<div>' + data.tasks[key][0].short_desc + '</div><br>');
                        }
                    })
                $('.content')[0].innerHTML = "";

                $('.modal-wrapper').toggleClass('open');
                $('.page-wrapper').toggleClass('blur-it');
                return false;
            });
        })

        var groupId = document.getElementById('groupId');
        var tasklists = document.getElementsByClassName('tasklist');
        for (let i = 0; tasklists.length > i; i++) {
            var tasklistId = tasklists[i].id.match(/\d+/g)[0];
            var res = {'groupId' : groupId,
                   'tasklistId' : tasklistId
            };
        tasklists[i].onclick = function() {
                return new Promise((resolve, reject) => {
                    let ajax = new XMLHttpRequest();
                    ajax.open("POST", '/ajax-modul-group', true);
                    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    ajax.send(res);
                    ajax.onreadystatechange = () => {
                        if (ajax.readyState == XMLHttpRequest.DONE && ajax.status == 200) {
                            var data = JSON.parse(ajax.responseText);

                            render(data);
                            resolve(data);
                        } else if (ajax.status != 200) {
                            reject(new Error("status is not 200"))
                        }
                    }
                })

                function render(data) {
                    // $('.modal-wrapper').toggleClass('open');
                    // $('.page-wrapper').toggleClass('blur-it');
                    var content = $('.content');
                    let table = document.createElement('table');
                    content.appendChild(table);
                    // for (let key in data[0]) {
                    //     content.append('<div>' + data[0][key].theme + '</div><br>');
                    // }
                }
            }
        }



    </script>


@endsection