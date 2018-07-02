@extends('backend.layouts.app')

@section('title', 'Add Location | '. app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <strong>{{ __('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}!</strong>
                </div><!--card-header-->
                <div class="card-block">
                    <form>
                        <fieldset>
                            <legend>Add a State</legend>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" aria-describedby="emailHelp" name="name" placeholder="Adamawa" type="text">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleSelect1">Located in ...</label>
                                <select class="form-control" id="exampleSelect1">
                                    <option selected="selected">1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect2">Example multiple select</label>
                                <select multiple="multiple" class="form-control" id="exampleSelect2">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea">Example textarea</label>
                                <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" type="file">
                                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                            </div>
                            <fieldset class="form-group">
                                <legend>Radio buttons</legend>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked="checked" type="radio">
                                        Option one is this and that—be sure to include why it's great
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
                                        Option two can be something else and selecting it will deselect option one
                                    </label>
                                </div>
                                <div class="form-check disabled">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3" disabled="disabled" type="radio">
                                        Option three is disabled
                                    </label>
                                </div>
                            </fieldset>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox">
                                    Check me out
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </fieldset>
                    </form>
                </div><!--card-block-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
