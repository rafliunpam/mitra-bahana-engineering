@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ auth()->user()->name }} Yuk Bisa Yuk !!!</h1>
      </div>
<div  id="text"></div>

<script>
  var i=0,text;
  text = "You Are Gonna Be Okay, You Can Rest Now"

  function ketik() {
    if(i<text.length){
      document.getElementById("text").innerHTML += text.charAt(i);
      i++;
      setTimeout(ketik, 15);
    }
  }
  ketik();
</script>
@endsection