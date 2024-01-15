{{--@if(Session::has('error'))--}}
{{--    <div class="row mr-2 ml-2" >--}}
{{--        <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"--}}
{{--                id="type-error">{{Session::get('error')}}--}}
{{--        </button>--}}
{{--    </div>--}}
{{--@endif--}}


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(Session::has('error'))
    <script>
        toastr.options={
            "progressBar":true,
            "closeButton":true,
        }
        toastr.error("{!!Session::get('error')!!}",'Error!....');
    </script>
@endif
