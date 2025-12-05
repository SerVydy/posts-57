<form {{$attributes}}
class="grid gap-y-6"
method="POST">
@csrf
    {{ $slot }}
</form>
