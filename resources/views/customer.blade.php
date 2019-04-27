<h1>Customer List</h1>
<p>
    @foreach ($customers as $customer )
        <li>{{ $customer->name }}</li>
    @endforeach
</p>
