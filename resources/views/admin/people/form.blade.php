<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="first_name">First name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name"
                   value="{{ !empty($person)?$person->first_name:'' }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="last_name">Last name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name"
                   value="{{ !empty($person)?$person->last_name:'' }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="date_of_birth">Date of birth</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Date of birth"
                   value="{{ !empty($person)?$person->date_of_birth:'' }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="title">Movies as actor</label>
            <select multiple class="form-control" name="as_actor[]">
                <option value="">None</option>
                @foreach($movies as $movie)
                    <option
                        {{ !empty($asActor) && in_array($movie->id, $asActor)?'selected':'' }} value="{{ $movie->id }}">{{ $movie->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="title">Movies as director</label>
            <select multiple class="form-control" name="as_director[]">
                <option value="">None</option>
                @foreach($movies as $movie)
                    <option
                        {{ !empty($asDirector) && in_array($movie->id, $asDirector)?'selected':'' }} value="{{ $movie->id }}">{{ $movie->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="title">Movies as producer</label>
            <select multiple class="form-control" name="as_producer[]">
                <option value="">None</option>
                @foreach($movies as $movie)
                    <option
                        {{ !empty($asProducer) && in_array($movie->id, $asProducer)?'selected':'' }} value="{{ $movie->id }}">{{ $movie->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <input type="submit" class="btn btn-primary" value="Save person"/>
    </div>
</div>
