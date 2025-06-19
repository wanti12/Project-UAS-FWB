<!DOCTYPE html>
<html>
{{-- @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif --}}
@include('warga.head')

<bodybody class="d-flex flex-column min-vh-100">
    <div id="app" class="flex-grow-1"> {{-- ✅ Ini akan mendorong footer ke bawah --}}
        <div class="header_section">  

        @include('warga.nav')

        @yield('content')
        </div>
    </div>

        @include('warga.footer')

        @include('warga.script')
</body>

</html>
