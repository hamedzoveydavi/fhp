
<div style="border-radius:15px 0 0 15px " class="input-group">
    <div  class="input-group-prepend">
        <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">{{$subject}}</label>
    </div>
    @if(@$is_lock)
    <input style="border-radius: 0 15px 15px 0;text-align: center" type="text" class="form-control" name="{{$name}}" value="{{$value}}" disabled>
        @else
        <input  style="border-radius: 0 15px 15px 0;text-align: center" type="text" class="form-control" name="{{$name}}" value="{{$value}}">
        @error('{{ $name }}')
        <span class="invalid-feedback" role="alert">
          <strong>{{ message }}</strong>
          </span>
        @enderror
        @endif
  </div>


