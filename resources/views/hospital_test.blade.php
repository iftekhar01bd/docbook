<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>DocBook : Tests</title>
</head>
<body>
   
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Doctor Email</th>
            <th scope="col">Patient Email</th>
            <th scope="col">Test Name</th>
            <th scope="col">Time</th>
            <th scope="col">Hospital</th>

          </tr>
        </thead>
        <tbody>

    @foreach($tests as $t)
    <tr>
        <th scope="row">{{$t->id}}</th>
        <td>{{$t->doctor_email}}</td>
        <td>{{$t->patient_email}}</td>
        <td>{{$t->test_name}}</td>
        <td>{{$t->time}}</td>
        <td>{{$t->hospital}}</td>



      </tr>
    @endforeach
          
         
        </tbody>
      </table>


    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <!-- Option 2: Separate Popper and Bootstrap JS -['
      <!--
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>\    
</body>
</html>