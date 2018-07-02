@push('after-styles')
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />--}}
    <link href="{{asset('select2/select2.4.0.6.min.css')}}" rel="stylesheet" />
@endpush

    <select name="place_id" id="places_location" class="form-control">
        <option disabled="disabled">Select Location</option>
{{--@foreach($places as $place)--}}
    {{--<option value="{{$place->id}}">{{$place->name}}</option>--}}
{{--@endforeach--}}
    </select>


@push('after-scripts')
    <script src="{{asset('select2/select2.4.0.3.min.js')}}"></script>

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>--}}
    <script>
        var placesApiUrl = "{{route('places.ajax')}}";
        $(document).ready(function() {
            $('#places_location').select2({
                ajax :{
                    url : placesApiUrl,
                    dataType : 'json',
                    delay : 200,
                    data : function(params){
                        return{
                            q : params.term,
                            page : params.page
                        };
                    },
                    processResults : function(data, params){
                        params.page = params.page || 1;

                        return {
                          results : data.data,
                          pagination: {
                              more : (params.page * 10) < data.total
                          }
                        };
                    }
                },
                minimumInputLength : 1,
                templateResult : function (repo){
                    if(repo.loading) return repo.name;

                    var markup = repo.name;

                    return markup;
                },
                templateSelection : function(repo)
                {
                    return repo.name;
                },
                escapeMarkup : function(markup){ return markup; }
            });
        });
    </script>
    @endpush