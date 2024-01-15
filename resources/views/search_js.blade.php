<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>

    /////// search ////
    $(document).ready(function (){

        $(document).on('input',"#search",function (e){
            var search=$(this).val();
            e.preventDefault();
            $.ajax({
               url:"{{route('search')}}",
               type:'get',
               datatype:'html',
                cache:false,
                data:{search:search,"_token":'{{csrf_token()}}'},
                success:function (data){
                   $("#ajax_search_result").html(data);
                },
                error:function (){

                }
            });
        });

    });


</script>
