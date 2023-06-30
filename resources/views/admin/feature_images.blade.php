@extends('layouts.admin_layout')
@section('content')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <form action = "{{route('admin.feature_images.save.store')}}" method = "post" enctype="multipart/form-data">        
          @csrf
          <div class="mb-3" style = "max-width:400px">
            <label for="formFile" class="form-label">照片1</label>
            <input class="form-control" type="file" id="featureImageInput1" name = "imageUrl1">
            <img  id = "imageDisplay1" style = "width:100%" src = "{{asset($images->imageUrl1)}}"/>
          </div>
          <div class="mb-3" style = "max-width:400px">
            <label for="formFile" class="form-label">照片2</label>
            <input class="form-control" type="file" id="featureImageInput2" name = "imageUrl2">
            <img  id = "imageDisplay2" style = "width:100%" src = "{{asset($images->imageUrl2)}}"/>
          </div>
          <div class="mb-3" style = "max-width:400px">
            <label for="formFile" class="form-label">照片3</label>
            <input class="form-control" type="file" id="featureImageInput3" name = "imageUrl3">
            <img  id = "imageDisplay3" style = "width:100%" src = "{{asset($images->imageUrl3)}}"/>
          </div>
          <button class = "btn btn-primary">更新</button>
      </form>
      </div>
      <script src="{{asset('assets/js/jquery.js')}}"> </script>
      <script>
        $(document).ready(()=>{
          $('#featureImageInput1').change((event)=>{
            var fileReader = new FileReader();
              fileReader.onload = function(event){
                $(imageDisplay1).attr("src",event.target.result);
              }
              fileReader.readAsDataURL(event.target.files[0]);
              })
              $('#featureImageInput2').change((event)=>{
            var fileReader = new FileReader();
              fileReader.onload = function(event){
                $(imageDisplay2).attr("src",event.target.result);
              }
              fileReader.readAsDataURL(event.target.files[0]);
              })
              $('#featureImageInput3').change((event)=>{
            var fileReader = new FileReader();
              fileReader.onload = function(event){
                $(imageDisplay3).attr("src",event.target.result);
              }
              fileReader.readAsDataURL(event.target.files[0]);
              })

      })
          
   
      </script>
     
      @endsection
