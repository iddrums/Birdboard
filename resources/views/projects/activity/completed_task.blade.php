 {{-- @if ($activity->description == 'incompleted_task') --}}
               {{-- You Created the project --}}
{{ $activity->user->name }} completed "{{ $activity->subject->body }}"
