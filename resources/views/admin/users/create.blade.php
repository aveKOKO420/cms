<x-admin-master>
    @section('content')
        <h1> Create Users </h1>

        <div class="col-sm-6">
            <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control  {{$errors->has('name') ? 'is-invalid' : ''}}">
                    @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control  {{$errors->has('username') ? 'is-invalid' : ''}}">
                    @error('username')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control  {{$errors->has('email') ? 'is-invalid' : ''}}">
                    @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label><br>

                    <input type="file" name="avatar" id="avatar">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control  {{$errors->has('password') ? 'is-invalid' : ''}}">
                    @error('password')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation  {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}" class="form-control">
                    @error('password_confirmation')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    @endsection

    {{--    @section('scripts')--}}
    {{--    <!-- Page level plugins -->--}}
    {{--        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>--}}
    {{--        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>--}}

    {{--        <!-- Page level custom scripts -->--}}
    {{--        --}}{{--   VARIANT OF PAGINATION FROM THE PLUGIN( doesnt keep page at refresh)  --}}
    {{--        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>--}}
    {{--    @endsection--}}

</x-admin-master>