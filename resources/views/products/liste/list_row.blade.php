<div class="row mb-3">

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($products as $product)

                <tr>

                    <td>
                        <button
                            class="btn p-0 border-0"
                            data-bs-toggle="modal"
                            data-bs-target="{{ '#product_'.$product->id }}">

                            <img
                                src="{{ $product->image_path ? asset($product->image_path) : asset('uploads/product/sans.png') }}"
                                class="rounded border shadow-sm"
                                style="width:50px;height:50px;object-fit:cover;transition:.2s;"
                                alt="Produit">

                        </button>

                        @include('products.liste.image_product',[
                            'id'=>$product->id,
                            'image_link'=>$product->image_path ? asset($product->image_path) : asset('uploads/product/sans.png'),
                            'product_name'=>$product->name_product
                        ])
                    </td>

                    <td class="fw-semibold">
                        {{ $product->name_product }}
                    </td>

                    <td>
                        <span class="text-success fw-bold">
                            {{ number_format($product->price,0,',',' ') }} Ar
                        </span>
                    </td>

                    <td>

                        @if($product->mouvement->sum('in_stock') > 0)

                            <span class="badge bg-success px-3 py-2">
                                <i class="bi bi-box-seam me-1"></i>
                                {{ $product->mouvement->sum('in_stock') }}
                            </span>

                        @else

                            <span class="badge bg-danger px-3 py-2">
                                <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                Rupture
                            </span>

                        @endif

                    </td>

                    <td>

                        <div class="btn-group">

                            <a
                                href="{{ route('modify_product',$product) }}"
                                class="btn btn-warning btn-sm">

                                <i class="bi bi-pencil-square"></i>

                            </a>

                            <a
                                href="{{ route('show_product',$product) }}"
                                class="btn btn-info text-white btn-sm">

                                <i class="bi bi-eye-fill"></i>

                            </a>

                        </div>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <div class="mt-3">
        {{ $products->withQueryString()->links() }}
    </div>

</div>