<select class="form-control" name="year">
    @for($y = date("Y"); $y <= date("Y")+4; $y++)
        <option value="{{$y}}">{{$y}}</option>
    @endfor
</select>