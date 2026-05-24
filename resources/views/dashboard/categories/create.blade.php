@include('dashboard.categories._form', [
'action' => route('dashboard.categories.store'),
'method' => 'POST',
'buttonText' => 'Create Category'
])