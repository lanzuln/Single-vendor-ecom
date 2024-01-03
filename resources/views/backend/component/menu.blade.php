<div class="menu-container flex-grow-1">
    <ul id="menu" class="menu">
        {{-- dashboard  --}}
        <li>
            <a href="{{ route('dashboard') }}">
                <i data-cs-icon="shop" class="icon" data-cs-size="18"></i>
                <span class="label">Dashboard</span>
            </a>
        </li>
        {{-- category  --}}
        <li>
            <a href="#categories">
                <i data-cs-icon="cupcake" class="icon" data-cs-size="18"></i>
                <span class="label">Category</span>
            </a>
            <ul id="categories">
                <li>
                    <a href="{{ route('category.index') }}">
                        <span class="label">All category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category.create') }}">
                        <span class="label">Create category</span>
                    </a>
                </li>
            </ul>
        </li>
        {{-- testmonial  --}}
        <li>
            <a href="#testimonial">
                <i data-cs-icon="cupcake" class="icon" data-cs-size="18"></i>
                <span class="label">Testimonial</span>
            </a>
            <ul id="testimonial">
                <li>
                    <a href="{{ route('testimonial.index') }}">
                        <span class="label">All testimonial</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('testimonial.create') }}">
                        <span class="label">Create testimonial</span>
                    </a>
                </li>
            </ul>
        </li>
        {{-- product  --}}
        <li>
            <a href="#product">
                <i data-cs-icon="cupcake" class="icon" data-cs-size="18"></i>
                <span class="label">Product</span>
            </a>
            <ul id="product">
                <li>
                    <a href="{{ route('product.index') }}">
                        <span class="label">All product</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('product.create') }}">
                        <span class="label">Create product</span>
                    </a>
                </li>
            </ul>
        </li>
        {{-- product  --}}
        <li>
            <a href="#coupne">
                <i data-cs-icon="cupcake" class="icon" data-cs-size="18"></i>
                <span class="label">Product cupon</span>
            </a>
            <ul id="coupne">
                <li>
                    <a href="{{ route('coupne.index') }}">
                        <span class="label">All cupon </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('coupne.create') }}">
                        <span class="label">Create cupon</span>
                    </a>
                </li>
            </ul>
        </li>
        {{-- order  --}}
        <li>
            <a href="#order">
                <i data-cs-icon="cupcake" class="icon" data-cs-size="18"></i>
                <span class="label">Order </span>
            </a>
            <ul id="order">
                <li>
                    <a href="{{ route('admin.orderlist') }}">
                        <span class="label">order list</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
