@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Books</h1>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">ID</th>
                <th class="py-2">Title</th>
                <th class="py-2">Author</th>
                <th class="py-2">Year</th>
            </tr>
        </thead>
        <tbody id="bookTableBody">
            <!-- Data akan diisi oleh JavaScript -->
        </tbody>
    </table>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    fetch('/api/books')
        .then(response => response.json())
        .then(data => {
            const bookTableBody = document.getElementById('bookTableBody');
            data.data.forEach(book => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="border px-4 py-2">${book.id}</td>
                    <td class="border px-4 py-2">${book.title}</td>
                    <td class="border px-4 py-2">${book.author}</td>
                    <td class="border px-4 py-2">${book.year}</td>
                `;
                bookTableBody.appendChild(row);
            });
        });
});
</script>
@endsection
