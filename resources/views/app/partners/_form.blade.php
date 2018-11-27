<div class="form-group">
    <label for="partnerName">Partner name</label>
    <input type="text" class="form-control" id="partnerName" name="name" placeholder="Enter partner name" value="@if( isset($partner)) {{ $partner->name }} @endif">
</div>
<div class="form-group">
    <label for="partnerPoint">Partner point</label>
    <input type="number" class="form-control" id="partnerPoint" name="point" placeholder="Enter partner point" value="@if( isset($partner)){{ $partner->point }}@endif" min="1" max="10" step="0.1">
</div>
<div class="form-group">
    <label for="propertiesSelect">Property select</label>
    <select class="form-control" id="propertiesSelect" name="properties[]" multiple>
        @foreach($properties as $property)
            <option value="{{$property->id}}" @if(isset($partner) && in_array($property->id, $partnerPropertyIds)) selected @endif>{{$property->name}}</option>
        @endforeach
    </select>
</div>