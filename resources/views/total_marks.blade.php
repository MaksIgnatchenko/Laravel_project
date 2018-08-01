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
            <th class="statisticButton" style="background: -webkit-gradient(linear, left top, left bottom, from(rgb(112, 147, 193)), to(rgb(238, 242, 248)));">
                Users/Moduls
            </th>
            @foreach($tasklists as $tasklist)
            <th class="tasklist statisticButton" id="tasklist{{$tasklist->name}}">{{$tasklist->name}}
                <br>
                tasks in modul : {{ count($tasklists) }}
                <br>
                <span style="font-size: 18px; color: black">Push for detail statistic</span>
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

        var groupId = document.getElementById('groupId').value;
        var tasklists = document.getElementsByClassName('tasklist');
        for (let i = 0; tasklists.length > i; i++) {
            tasklists[i].onclick = function() {
                var tasklistId = (this.id.match(/\d+/g)[0]);
                var groupId = document.getElementById('groupId').value;
                postAjax();
                function postAjax() {
                    return new Promise((resolve, reject) => {
                        let ajax = new XMLHttpRequest();
                        let url = "/ajax-modul-group/" + groupId + "/" + tasklistId;
                        ajax.open("GET", url, true);
                        // ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        ajax.send();
                        ajax.onreadystatechange = () => {
                            if (ajax.readyState == XMLHttpRequest.DONE && ajax.status == 200) {
                                var data = JSON.parse(ajax.responseText);
                                console.log(data);
                                render(data);
                                resolve(data);
                            } else if (ajax.status != 200) {
                                reject(new Error("status is not 200"))
                            }
                        }
                    })
                }

                function render(data) {
                    $('.modal-wrapper').toggleClass('open');
                    $('.page-wrapper').toggleClass('blur-it');
                    var content = $('.content')[0];
                    $('.content')[0].innerHTML = "";
                    var table = document.createElement('table');
                    table.classList.add("simple-little-table");
                    table.classList.add("modalTable");
                    content.appendChild(table);
                    let tr = document.createElement('tr');
                    table.appendChild(tr);
                    for (let key in data[0]) {
                        let th = document.createElement('td');
                        th.innerHTML = data[0][key].theme;
                        tr.appendChild(th);
                    }
                    for (let i = 1; i < data.length; i++) {

                        let tr = document.createElement('tr');
                        table.appendChild(tr);
                            for (let n = 0; n < data[i].length; n++) {
                                if (n > 0) {
                                    if (data[i][n]) {
                                        var td = document.createElement('td');
                                        td.innerHTML = "<span style='color : green'> &#10004; </span>";
                                        tr.appendChild(td);
                                    } else {
                                        var td = document.createElement('td');
                                        td.innerHTML = "<span style='color : red'> &#10008; </span>";
                                        tr.appendChild(td);
                                    }
                                } else {
                                    var th = document.createElement('td');
                                    th.innerHTML = data[i][n].name;
                                    tr.appendChild(th);
                            }
                        }
                    }
                }
            }
        }



    </script>


@endsection