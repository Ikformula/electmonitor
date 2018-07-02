
    <select name="polling_station_id" class="form-control" required>
@foreach($polling_stations as $polling_station)
    <option value="{{$polling_station->id}}">{{$polling_station->unit_number}}</option>
@endforeach
    </select>