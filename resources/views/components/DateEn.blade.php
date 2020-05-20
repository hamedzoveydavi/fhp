<div  class="input-group" style="top: 5px;padding-bottom: 10px">
    <div  class="input-group-prepend">
        <label style="border-radius:15px 0 0 15px;height: 36px;border: 1px solid #DCDCDC" class="input-group-text" style="height: 37px">{{$subject}}</label>
    </div>

        @if(@$is_require)
            <input  style="text-align: center" type="date" class="form-control @error('{{$name}}') is-invalid @enderror" name="{{$name}}" {{--value="{{$value}}"--}} required autofocus>
        @else
            <input  style="text-align: center" type="date" class="form-control @error('{{$name}}') is-invalid @enderror" name="{{$name}}" {{--value="{{$value}}"--}}>
        @endif
        @error('{{ $name }}')
        <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>

@enderror
</div>
