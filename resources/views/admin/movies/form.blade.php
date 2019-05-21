<div class="form-group">
    <label for="title">Movie title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Movie title" value="{{ !empty($movie)?$movie->title:'' }}">
</div>
<div class="form-group">
    <label for="title">Year of release</label>
    <input type="number" class="form-control" id="release_year" name="release_year"
           placeholder="Year of release"
           min="1900"
           max="2100" value="{{ !empty($movie)?$movie->release_year:'' }}">
</div>
<div class="form-group">
    <label for="title">Movie poster</label>
    <input type="file" class="form-control" id="movie_poster" name="movie_poster"
           placeholder="Movie title">
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="title">Movie actors</label>
            <select multiple class="form-control" name="actors[]" id="">
                <option value="">None</option>
                @foreach($people as $person)
                    <option {{ !empty($actors) && in_array($person->id, $actors)?'selected':'' }} value="{{ $person->id }}">{{ $person->full_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="title">Movie directors</label>
            <select multiple class="form-control" name="directors[]" id="">
                <option value="">None</option>
                @foreach($people as $person)
                    <option {{ !empty($directors) && in_array($person->id, $directors)?'selected':'' }} value="{{ $person->id }}">{{ $person->full_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="title">Movie producers</label>
            <select multiple class="form-control" name="producers[]" id="">
                <option value="">None</option>
                @foreach($people as $person)
                    <option {{ !empty($producers) && in_array($person->id, $producers)?'selected':'' }} value="{{ $person->id }}">{{ $person->full_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <input type="submit" class="btn btn-primary" value="Save movie"/>
    </div>
</div>
