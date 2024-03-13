<li class="border border-success "><a class="dropdown-item text-bg-success p-3"
    href="{{ route('task.show', [
        'category' => $category->id,
        'task' => $task->id,
    ]) }}"
    @auth
@if ($task->users->contains(Auth::user()->id) || $task->user_id == Auth::user()->id)
onclick = "return true"
style="text-decoration:underline"
@else   onclick = "return false"
@endif
@endauth
    @guest
onclick = "return false"
@endguest>
{{ $task->name }}</a>
<p class="text-center bg-warning bg-gradient">remind <span class="border border-info">{{$task->deadline}}</span>
</br>   <input  type="checkbox" id="myCheckbox"
    @if($task->done ==1)
    checked disabled
    @else disabled
    @endif>closed </input>
 </p>

</li>
<li><hr class="dropdown-divider"></li>
