<form action="chek" method="post">
    <legend>description_task</legend>
    <textarea  class="t" name="task_desc"  id="1" cols="80" rows="10">{{$task->task_desc}}</textarea>
    <br><br>
    <legend>task_test_code</legend>
    <textarea class="t" name="check_code" id="2" cols="80" rows="20">{{$task->check_code}}</textarea>
    <br><br>
    <legend>preview_task</legend>
    <textarea class="t" name="task_view" id="3" cols="80" rows="10">{{$task->task_view}}</textarea>
    <br>
    <legend>chek_params</legend>
    <textarea class="t" name="params" id="3" cols="80" rows="10" required></textarea>
    <br>
    <input type="submit" name="chek" value="проверить" title="Отправить данные формы">
    <input type="submit" name="create"  value="create" title="Отправить данные формы">
</form>

@if(isset($code))
<div style="position: absolute; top: 0; left: 40%">
    <h3>fix if you need it</h3>
<legend>yor code</legend>
<textarea class="t" name="allcode" id="3" cols="100" rows="20">{{$code}}</textarea>
<br>
</div>
<div style="position: absolute; top: 40%; left: 40%">
    <legend>result</legend>
    <textarea class="t" name="" id="3" cols="80" rows="10">{{$result}}</textarea>
    <br>
</div>
@endif