@include('dashboard.categories._form', [
'action' => route('dashboard.categories.update', $category->id),
'method' => 'PUT',
'buttonText' => 'Update Category',
'title' => 'Edit Category',
])