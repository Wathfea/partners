<div class="form-group">
    <label for="propertyName">Property name</label>
    <input type="text" class="form-control" id="propertyName" name="name" placeholder="Enter property name" value="@if( isset($property)){{ $property->name }}@endif">
</div>

<div class="form-group">
    <label for="propertyType">Property type</label>
    <select id="propertyType" name="type">
        <option value="">Please select</option>
        <option value="TEXT" @if( isset($property) && $property->type === 'TEXT') selected @endif>Text</option>
        <option value="NUMBER" @if( isset($property) && $property->type === 'NUMBER') selected @endif>Number</option>
        <option value="BOOLEAN" @if( isset($property) && $property->type === 'BOOLEAN') selected @endif>Boolean</option>
    </select>
</div>

<!-- TEXT TYPE -->
<div class="form-group hiddenElement" data-target="TEXT" @if( isset($property) && $property->type === 'TEXT') style="" @else style="display: none" @endif>
    <label for="propertyText">Text</label>
    <textarea id="propertyText" name="text" placeholder="Enter the text here">@if( isset($property) && $property->type === 'TEXT' ){{ $property->text_value }}@endif</textarea>
</div>

<!-- NUMBER TYPE -->
<div class="form-group hiddenElement" data-target="NUMBER" @if( isset($property) && $property->type === 'NUMBER') style="" @else style="display: none" @endif>
    <label for="propertyNumber">Number</label>
    <input type="number" class="form-control" id="propertyNumber" name="number" placeholder="Enter the number" value="@if( isset($property)){{ $property->number_value }}@endif" min="1" max="500" step="1">
</div>

<!-- BOOLEAN TYPE -->
<div class="form-group form-check hiddenElement" data-target="BOOLEAN" @if( isset($property) && $property->type === 'BOOLEAN') style="" @else style="display: none" @endif>
    <input type="hidden" name="boolean" value="0">
    <input type="checkbox" class="form-check-input" id="propertyBoolean" name="boolean" value="1" @if( isset($property) && $property->type === 'BOOLEAN' && $property->boolean_value == 1) checked @endif>
    <label class="form-check-label" for="propertyBoolean" >True or false</label>
</div>

<script>
    $(function() {
        $('#propertyType').change(function(e) {
            let type = $(this).find("option:selected").val();

            $('.hiddenElement').each( function() {
                if ( $(this).data('target') === type ) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>