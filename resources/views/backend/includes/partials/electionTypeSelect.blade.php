
    <select name="election_type_id" class="form-control" required>
@foreach($election_types as $election_type)
    <option value="{{$election_type->id}}">{{$election_type->type}}</option>
@endforeach
    </select>