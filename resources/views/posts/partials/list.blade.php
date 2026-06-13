@foreach ($posts as $post)
    <x-contents.post-card :post="$post" />
@endforeach