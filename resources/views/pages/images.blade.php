@extends('app')

@section('content')
  
<!--            <img src="data:image/jpeg;base64,{{ base64_encode('pic.jpg') }}">-->
            <h1>{{Auth::user()->name}}, choose your profile image by clicking on it!</h1> 
            <img id="{{ Auth::user()->name.'_pic1' }}" src='{{asset('img.jpg')}}'  height="200px" >          
            <img id="{{ Auth::user()->name.'_pic2' }}" src='{{asset('pic.jpg')}}'  height="200px">         
           
            <h1>Files of {{Auth::user()->name}}:</h1> 
            
            <table border="solid">   
                <tr>
                    <th> Filename </th>
                    <th> Delete </th> 
                </tr>
                @foreach($userFilenames as $file)
                <tr>
                    <td>{{ $file }}</td>
                    <?php
                      $id=DB::table('files')->where('user_id', Auth::user()->id)->where('user_filename',$file)->pluck('id');
                    ?>
                    <td><a class="delete" href='{{ url('/delete/'.$id) }}'>delete</a></td>
                </tr>                
                @endforeach                        
            </table>
             
<script>
 $("img").click(function() {
   var img = $(this).attr('src');
   var confirmation = confirm("Are you sure that you want to make this image your profile picture?");
    if (confirmation == true) {
       $.ajax({
                url: "{{ url('/makeProfile') }}",
                type: "get",
                data: {
                    profileImage: function () {
                        return img;
                    }
                },
                success: function(response) {
                     console.log(response.profileImage);
                }
            });
     } 
});  


//$(document).ready(function () {
//   $(".delete").click(function() {      
//        var confirmation = confirm("Are you sure that you want to delete this file?");    
//        if (confirmation == true) {
//             var href = $(this).attr('id');   
//             var id = href.slice(-2);
////             alert(id);
//             window.location.href = href;
//        }
//      }
//    )  
//});
</script>
<style>
    table{
        margin-top: 50px;
        width: 100%;
    }
    h1{
        margin-top: 50px;
    }
</style>
           
@endsection
