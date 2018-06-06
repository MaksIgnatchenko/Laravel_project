<form action="createtask" method="post">
    <legend>description_task</legend>
    <textarea class="t" name="task_desc"  id="1" cols="80" rows="10">{{$task->task_desc}}</textarea>
    <br><br>
    <legend>task_test_code</legend>
    <textarea class="t" name="check_code" id="2" cols="80" rows="20">{{$task->check_code}}</textarea>
    <br><br>
    <legend>preview_task</legend>
    <textarea class="t" name="task_view" id="3" cols="80" rows="10">{{$task->task_view}}</textarea>
    <br>
    <input type="submit"  value="Отправить" title="Отправить данные формы">
</form>
