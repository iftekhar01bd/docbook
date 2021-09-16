<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View PDF</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
<!--    -------font awesome kit link------->
    <script src="https://kit.fontawesome.com/ae163c3f97.js" crossorigin="anonymous">
    
    function back(){
      window.history.back();

    }
    </script>

    <style>
@media print {
  #printBtn {
    display: none;
  }
}
    </style>
</head>
<body>
    <div id="prescription">
    @if($id2 == $chosen_ids[0])
    <table>
        <thead> 
          <th> Medicine Name</th>
          <th> Time</th>
          <th> Continuation Days</th>
          <th> Intake Amount</th>
          <th> Description</th>
        </thead>

        <tbody>
       
         


          @foreach($detail1 as $d1)
          @php
          $index = 0
          @endphp
           <tr>
          @foreach($d1 as $d)
         
          @if($index <= 4)
         
          <td> {{$d}}</td>
        
          @php
          $index += 1
          @endphp
          @else
        </tr>
            
        
        
          @endif
         
          @endforeach
       
      
         

          @endforeach
       
        </tbody>

      </table>

      <table>
        <thead> 
          <th> Test Name</th>
          <th> Time</th>
          <th> Hospital</th>
        </thead>

        <tbody>
       
         

        @php
        $index2 = 0;

        @endphp

          @foreach($detail1_t as $d1)
          @if($index2 == count($detail1_t) - 1)
          @break
          @endif
          @php
          $index = 0;
          @endphp
           <tr>
          @foreach($d1 as $d)
         
          @if($index <= 2)
         
          <td> {{$d}}</td>
        
          @php
          $index += 1
          @endphp
          @else
        </tr>
            
        
        
          @endif
         
          @endforeach
       
      
         @php
         $index2 += 1
         @endphp

          @endforeach
       
        </tbody>

      </table>


      Tips: {{end($detail1_t)[0]}}
      Advice: {{end($detail1_t)[1]}}

      @elseif($id2 == $chosen_ids[1])
      <table>
        <thead> 
          <th> Medicine Name</th>
          <th> Time</th>
          <th> Continuation Days</th>
          <th> Intake Amount</th>
          <th> Description</th>
        </thead>

        <tbody>
       
         


          @foreach($detail2 as $d1)
          @php
          $index = 0
          @endphp
           <tr>
          @foreach($d1 as $d)
         
          @if($index <= 4)
         
          <td> {{$d}}</td>
        
          @php
          $index += 1
          @endphp
          @else
        </tr>
            
        
        
          @endif
         
          @endforeach
       
      
         

          @endforeach
       
        </tbody>

      </table>

      <table>
        <thead> 
          <th> Test Name</th>
          <th> Time</th>
          <th> Hospital</th>
        </thead>

        <tbody>
       
         

        @php
        $index2 = 0;

        @endphp

          @foreach($detail2_t as $d1)
          @if($index2 == count($detail1_t) - 1)
          @break
          @endif
          @php
          $index = 0;
          @endphp
           <tr>
          @foreach($d1 as $d)
         
          @if($index <= 2)
         
          <td> {{$d}}</td>
        
          @php
          $index += 1
          @endphp
          @else
        </tr>
            
        
        
          @endif
         
          @endforeach
       
      
         @php
         $index2 += 1
         @endphp

          @endforeach
       
        </tbody>

      </table>


      Tips: {{end($detail2_t)[0]}}
      Advice: {{end($detail2_t)[1]}}


      @elseif($id2 == $chosen_ids[2])
      <table>
        <thead> 
          <th> Medicine Name</th>
          <th> Time</th>
          <th> Continuation Days</th>
          <th> Intake Amount</th>
          <th> Description</th>
        </thead>

        <tbody>
       
         


          @foreach($detail3 as $d1)
          @php
          $index = 0
          @endphp
           <tr>
          @foreach($d1 as $d)
         
          @if($index <= 4)
         
          <td> {{$d}}</td>
        
          @php
          $index += 1
          @endphp
          @else
        </tr>
            
        
        
          @endif
         
          @endforeach
       
      
         

          @endforeach
       
        </tbody>

      </table>

      <table>
        <thead> 
          <th> Test Name</th>
          <th> Time</th>
          <th> Hospital</th>
        </thead>

        <tbody>
       
         

        @php
        $index2 = 0;

        @endphp

          @foreach($detail3_t as $d1)
          @if($index2 == count($detail3_t) - 1)
          @break
          @endif
          @php
          $index = 0;
          @endphp
           <tr>
          @foreach($d1 as $d)
         
          @if($index <= 2)
         
          <td> {{$d}}</td>
        
          @php
          $index += 1
          @endphp
          @else
        </tr>
            
        
        
          @endif
         
          @endforeach
       
      
         @php
         $index2 += 1
         @endphp

          @endforeach
       
        </tbody>

      </table>


      Tips: {{end($detail3_t)[0]}}
      Advice: {{end($detail3_t)[1]}}


      @endif
    </div>
      <br/><br/>

      <div>
        <button id="printBtn" class="btn btn-primary" onClick="window.print()">Print this Prescription
    </button>
    <button id="back" class="btn btn-primary" onclick="window.history.go(-1); return false;">Go Back
    </button>
  </div>

      <script src="/js/bootstrap.min.js"></script>
</body>
</html>