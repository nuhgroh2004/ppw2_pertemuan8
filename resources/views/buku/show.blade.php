
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Books</h1>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">ID</th>
                <th class="py-2">Judul</th>
                <th class="py-2">Penulis</th>
                <th class="py-2">Harga</th>
                <th class="py-2">Tahun Terbit</th>
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
                    <td class="border px-4 py-2">${book.judul}</td>
                    <td class="border px-4 py-2">${book.penulis}</td>
                    <td class="border px-4 py-2">Rp. ${book.harga.toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                    <td class="border px-4 py-2">${new Date(book.tahun_terbit).toLocaleDateString('id-ID')}</td>
                `;
                bookTableBody.appendChild(row);
            });
        });
});
</script>
