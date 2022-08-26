<ul class="nav side-menu">
    <li><a><i class="fa fa-edit"></i> Menu <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            {{-- <li><a href="">Home</a></li> --}}
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('product.create') }}">Add Product</a></li>
            <li><a href="{{ route('category.create') }}">Add Category</a></li>
        </ul>
    </li>
    <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="{{ route('product.index') }}">Info Product</a></li>
            <li><a href="{{ route('category.index') }}">Info Category</a></li>

        </ul>
    </li>
</ul>
