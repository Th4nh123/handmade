<table id="example2" class="table table-bordered table-hover">
    <thead>
     <tr>
       <th width="2%">id</th>
       <th>key1</th>
       <th>key2</th>
       <th>key3</th>
       <th>Key4</th> 
       <th>Key5</th> 
       <th>Key6</th> 
       <th>Key7</th> 
       <th>Key8</th> 
       <th>Key9</th> 
       <th>Key10</th> 
       <th>Key11</th> 
     </tr>
    </thead>
    <tbody>
      @foreach ($key_table as $key => $item)
      <tr>
           <td>{{$key+1}}</td>
           <td>{{ $item['key1']}}</td>
           <td>{{ $item['key2']}}</td>
           <td>{{ $item['key3']}}</td>
           <td>{{ $item['key4']}}</td>
           <td>{{ $item['key5']}}</td>
           <td>{{ $item['key6']}}</td>
           <td>{{ $item['key7']}}</td>
           <td>{{ $item['key8']}}</td>
           <td>{{ $item['key9']}}</td>
           <td>{{ $item['key10']}}</td>
           <td>{{ $item['key11']}}</td>
      </tr>
      @endforeach
    </tbody>
</table>