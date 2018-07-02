<select class="form-control" name="day">
        @for($d = 1; $d <= 31; $d++)
                <option value="{{$d}}">{{$d}}</option>
        @endfor
</select>