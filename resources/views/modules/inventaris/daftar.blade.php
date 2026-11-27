[head]
[navbar]

<main class="container py-5">
    <div class="mb-4">

        <h1 class="h3 fw-bold mb-1">Pengelolaan Master Inventaris</h1>
        <p class="text-muted">Rekapitulasi data barang inventaris yang masuk ke dalam sistem.</p>
    </div>

    <div class="table-responsive bg-white p-3 border rounded-1">
        <table class="table table-bordered table-striped align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th scope="col" style="width: 35%;">Barang</th>
                    <th scope="col" style="width: 35%;">Merk</th>
                    <th scope="col" class="width: 25%;">Kondisi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengelolaan as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->Barang }}</td>
                    <td>{{ $item->Merek }}</td>
                    <td>{{ $item->Kondisi }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
